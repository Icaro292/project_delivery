<?php

namespace Tests\Feature;

use App\Models\Entrega;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_to_login(): void
    {
        $this->get('/')->assertRedirect('/login');
    }

    public function test_comercio_can_create_entrega(): void
    {
        $comercio = User::factory()->create(['nivel_acesso' => 'comercio']);

        $this->actingAs($comercio)
            ->post('/entregas', [
                'origem' => 'Rua A',
                'destino' => 'Rua B',
                'valor' => 25.50,
            ])
            ->assertRedirect('/entregas/historico');

        $this->assertDatabaseHas('entregas', [
            'comercio_id' => $comercio->id,
            'origem' => 'Rua A',
            'destino' => 'Rua B',
            'status' => 'disponivel',
        ]);
    }

    public function test_motoqueiro_cannot_create_entrega(): void
    {
        $motoqueiro = User::factory()->create(['nivel_acesso' => 'motoqueiro']);

        $this->actingAs($motoqueiro)
            ->post('/entregas', [
                'origem' => 'Rua A',
                'destino' => 'Rua B',
            ])
            ->assertForbidden();
    }

    public function test_motoqueiro_acceptance_waits_for_comercio(): void
    {
        $comercio = User::factory()->create(['nivel_acesso' => 'comercio']);
        $motoqueiro = User::factory()->create(['nivel_acesso' => 'motoqueiro']);
        $entrega = Entrega::create([
            'comercio_id' => $comercio->id,
            'origem' => 'Rua A',
            'destino' => 'Rua B',
            'status' => 'disponivel',
            'valor' => 10,
        ]);

        $this->actingAs($motoqueiro)
            ->post(route('entregas.aceitar', $entrega))
            ->assertRedirect(route('entregas.detalhes', $entrega));

        $this->assertDatabaseHas('entregas', [
            'id' => $entrega->id,
            'motoqueiro_id' => $motoqueiro->id,
            'status' => 'aguardando_comercio',
        ]);
    }

    public function test_comercio_can_confirm_motoqueiro_acceptance(): void
    {
        $comercio = User::factory()->create(['nivel_acesso' => 'comercio']);
        $motoqueiro = User::factory()->create(['nivel_acesso' => 'motoqueiro']);
        $entrega = Entrega::create([
            'comercio_id' => $comercio->id,
            'motoqueiro_id' => $motoqueiro->id,
            'origem' => 'Rua A',
            'destino' => 'Rua B',
            'status' => 'aguardando_comercio',
            'valor' => 10,
            'motoqueiro_aceitou_em' => now(),
        ]);

        $this->actingAs($comercio)
            ->post(route('entregas.aceitar-comercio', $entrega))
            ->assertRedirect(route('entregas.detalhes', $entrega));

        $this->assertDatabaseHas('entregas', [
            'id' => $entrega->id,
            'status' => 'aceita',
        ]);
    }

    public function test_api_create_from_browser_redirects_to_history(): void
    {
        $this->post('/api/entregas', [
            'origem' => 'Rua A',
            'destino' => 'Rua B',
            'valor' => 25.50,
        ])->assertRedirect('/entregas/historico');
    }

    public function test_comercio_deletes_unaccepted_entrega(): void
    {
        $comercio = User::factory()->create(['nivel_acesso' => 'comercio']);
        $entrega = Entrega::create([
            'comercio_id' => $comercio->id,
            'origem' => 'Rua A',
            'destino' => 'Rua B',
            'status' => 'disponivel',
            'valor' => 10,
        ]);

        $this->actingAs($comercio)
            ->delete(route('entregas.excluir-ou-cancelar', $entrega))
            ->assertRedirect('/entregas/historico');

        $this->assertDatabaseMissing('entregas', [
            'id' => $entrega->id,
        ]);
    }

    public function test_comercio_cancels_accepted_entrega(): void
    {
        $comercio = User::factory()->create(['nivel_acesso' => 'comercio']);
        $motoqueiro = User::factory()->create(['nivel_acesso' => 'motoqueiro']);
        $entrega = Entrega::create([
            'comercio_id' => $comercio->id,
            'motoqueiro_id' => $motoqueiro->id,
            'origem' => 'Rua A',
            'destino' => 'Rua B',
            'status' => 'aceita',
            'valor' => 10,
        ]);

        $this->actingAs($comercio)
            ->delete(route('entregas.excluir-ou-cancelar', $entrega))
            ->assertRedirect('/entregas/historico');

        $this->assertDatabaseHas('entregas', [
            'id' => $entrega->id,
            'status' => 'cancelada',
        ]);
    }

    public function test_motoqueiro_revenue_ignores_cancelled_entregas(): void
    {
        $motoqueiro = User::factory()->create(['nivel_acesso' => 'motoqueiro']);

        Entrega::create([
            'motoqueiro_id' => $motoqueiro->id,
            'origem' => 'Rua A',
            'destino' => 'Rua B',
            'status' => 'concluida',
            'valor' => 30,
        ]);

        Entrega::create([
            'motoqueiro_id' => $motoqueiro->id,
            'origem' => 'Rua C',
            'destino' => 'Rua D',
            'status' => 'cancelada',
            'valor' => 99,
        ]);

        $this->actingAs($motoqueiro)
            ->get('/entregas/historico')
            ->assertOk()
            ->assertSee('R$ 30,00')
            ->assertDontSee('R$ 129,00');
    }

    public function test_comercio_can_see_legacy_entrega_without_owner(): void
    {
        $comercio = User::factory()->create(['nivel_acesso' => 'comercio']);

        Entrega::create([
            'origem' => 'Rua antiga',
            'destino' => 'Rua final',
            'status' => 'disponivel',
            'valor' => 15,
        ]);

        $this->actingAs($comercio)
            ->get('/entregas/historico')
            ->assertOk()
            ->assertSee('Rua antiga');
    }

    public function test_comercio_can_cancel_legacy_accepted_entrega_and_claim_it(): void
    {
        $comercio = User::factory()->create(['nivel_acesso' => 'comercio']);
        $motoqueiro = User::factory()->create(['nivel_acesso' => 'motoqueiro']);
        $entrega = Entrega::create([
            'motoqueiro_id' => $motoqueiro->id,
            'origem' => 'Rua antiga',
            'destino' => 'Rua final',
            'status' => 'aceita',
            'valor' => 15,
        ]);

        $this->actingAs($comercio)
            ->delete(route('entregas.excluir-ou-cancelar', $entrega))
            ->assertRedirect('/entregas/historico');

        $this->assertDatabaseHas('entregas', [
            'id' => $entrega->id,
            'comercio_id' => $comercio->id,
            'status' => 'cancelada',
        ]);
    }
}

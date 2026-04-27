<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entrega;
use Exception;

class EntregaController extends Controller
{
    public function listarEntregas()
    {
        try {
            $entregas = Entrega::all();
            return response()->json($entregas, 200);

        } catch (Exception $e) {
            return response()->json([
                'message' => "Erro ao listar as entregas",
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function criaEntregas(Request $request)
    {
        try {
            $dados = $request->validate([
                "origem"  => "required|string|max:50",
                "destino" => "required|string|max:50",
                "status"  => "required|in:destino,entregue",
            ]);

            $entrega = Entrega::create($dados);

            return response()->json($entrega, 201);

        } catch (Exception $e) {
            return response()->json([
                'message' => "Erro ao cadastrar a entrega",
                'error'   => $e->getMessage()
            ], 500);
        }
    }

    public function atualizarEntregas(Request $request, $id)
    {
        try {
            $entrega = Entrega::find($id);

            if (!$entrega) {
                return response()->json([
                    'message' => "Entrega não encontrada"
                ], 404);
            }

            $dados = $request->validate([
                "origem"  => "required|string|max:50",
                "destino" => "required|string|max:50",
                "status"  => "required|in:destino,entregue",
            ]);

            $entrega->update($dados);

            return response()->json([
                'message'=> "Entrega atualizada com sucesso",
                'data'=> $entrega
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'message' => "Erro ao atualizar a entrega",
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function deletarEntregas($id)
    {
        try {
            $entrega = Entrega::find($id);

            if (!$entrega) {
                return response()->json([
                    'message'=> "Entrega não encontrada"
                ], 404);
            }

            $entrega->delete();

            return response()->json([
                'message' => "Entrega deletada com sucesso"
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'message' => "Erro ao deletar a entrega",
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
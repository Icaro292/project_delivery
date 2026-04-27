<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entregador;
use Exception;

class EntregadorController extends Controller
{
    public function listarEntregadores()
    {
        try {
            $entregadores = Entregador::all();

            return response()->json($entregadores, 200);

        } catch (Exception $e) {
            return response()->json([
                'message' => "Erro ao listar os entregadores",
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function criaEntregadores(Request $request)
    {
        try {
            $dados = $request->validate([
                "nome"       => "required|string|max:200",
                "cpf"        => "required|string|size:11",
                "entrega_id" => "required|exists:entregas,id",
            ]);

            $entregador = Entregador::create($dados);

            return response()->json($entregador, 201);

        } catch (Exception $e) {
            return response()->json([
                'message' => "Erro ao cadastrar o entregador",
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function atualizarEntregadores(Request $request, $id)
    {
        try {
            $entregador = Entregador::find($id);

            if (!$entregador) {
                return response()->json([
                    'message' => "Entregador não encontrado"
                ], 404);
            }

            $dados = $request->validate([
                "nome"       => "required|string|max:200",
                "cpf"        => "required|string|size:11",
                "entrega_id" => "required|exists:entregas,id",
            ]);

            $entregador->update($dados);

            return response()->json([
                'message'=> "Entregador atualizado com sucesso",
                'data'=> $entregador
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'message' => "Erro ao atualizar o entregador",
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function deletarEntregadores($id)
    {
        try {
            $entregador = Entregador::find($id);

            if (!$entregador) {
                return response()->json([
                    'message'=> "Entregador não encontrado"
                ], 404);
            }

            $entregador->delete();

            return response()->json([
                'message' => "Entregador deletado com sucesso",
                'data' => $entregador
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'message' => "Erro ao deletar o entregador",
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
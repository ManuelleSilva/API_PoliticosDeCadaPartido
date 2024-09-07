<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TblPartido;
use App\Models\TblPolitico;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;

class TblPartidoController extends Controller
{

    // Mostrar tudo
    public function index()
    {
        $regPartidos = TblPartido::all();
        $contador = $regPartidos->count();

        return response()->json([
            'message' => 'Partidos encontrados',
            'data' => $regPartidos,
            'count' => $contador
        ], Response::HTTP_OK);
    }

    // Mostrar um tipo
    public function show(string $id)
    {
        $regPartido = TblPartido::find($id);

        if ($regPartido) {
            return response()->json([
                'message' => 'Partido encontrado',
                'data' => $regPartido
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'message' => 'Partido não encontrado'
            ], Response::HTTP_NOT_FOUND);
        }
    }

    // Cadastrar 
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'nomepartido' => 'required|string|max:100',
            'siglapartido' => 'required|string|max:10',
            'dataFundacao' => 'required|date'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Dados inválidos',
                'errors' => $validator->errors()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $regPartido = TblPartido::create($data);

        return response()->json([
            'message' => 'Partido cadastrado com sucesso',
            'data' => $regPartido
        ], Response::HTTP_CREATED);
    }

    // Alterar 
    public function update(Request $request, string $id)
    {
        $regPartido = TblPartido::find($id);

        if (!$regPartido) {
            return response()->json([
                'message' => 'Partido não encontrado'
            ], Response::HTTP_NOT_FOUND);
        }

        $data = $request->all();

        $validator = Validator::make($data, [
            'nomepartido' => 'required|string|max:100',
            'siglapartido' => 'required|string|max:10',
            'dataFundacao' => 'required|date'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Dados inválidos',
                'errors' => $validator->errors()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $regPartido->update($data);

        return response()->json([
            'message' => 'Partido atualizado com sucesso',
            'data' => $regPartido
        ], Response::HTTP_OK);
    }

    // Deletar 
    public function destroy(string $id)
    {
        $regPartido = TblPartido::find($id);

        if ($regPartido) {
            $regPartido->delete();
            return response()->json([
                'message' => 'Partido deletado com sucesso'
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'message' => 'Partido não encontrado'
            ], Response::HTTP_NOT_FOUND);
        }
    }
}
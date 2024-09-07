<?php

namespace App\Http\Controllers;

use App\Models\TblPolitico;
use App\Models\TblPartido;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class TblPoliticoController extends Controller
{

    // Mostrar tudo
    public function index()
    {
        $regPoliticos = TblPolitico::all();
        $contador = $regPoliticos->count();

        return response()->json([
            'message' => 'Políticos encontrados',
            'data' => $regPoliticos,
            'count' => $contador
        ], Response::HTTP_OK);
    }

    // Mostrar um tipo
    public function show(string $idpolitico)
    {
        $regPolitico = TblPolitico::find($idpolitico);

        if ($regPolitico) {
            return response()->json([
                'message' => 'Político encontrado',
                'data' => $regPolitico
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'message' => 'Político não encontrado'
            ], Response::HTTP_NOT_FOUND);
        }
    }

    //cadastrar
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'nomepolitico' => 'required|string|max:100',
            'cargopolitico' => 'required|string|max:50',
            'idpartidofk' => 'required|exists:tblpartido,idpartido'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Dados inválidos',
                'errors' => $validator->errors()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $regPolitico = TblPolitico::create($data);

        return response()->json([
            'message' => 'Político cadastrado com sucesso',
            'data' => $regPolitico
        ], Response::HTTP_CREATED);
    }

    //alterar
    public function update(Request $request, string $idpolitico)
    {
        $regPolitico = TblPolitico::find($idpolitico);

        if (!$regPolitico) {
            return response()->json([
                'message' => 'Político não encontrado'
            ], Response::HTTP_NOT_FOUND);
        }

        $data = $request->all();

        $validator = Validator::make($data, [
            'nomepolitico' => 'required|string|max:100',
            'cargopolitico' => 'required|string|max:50',
            'idpartidofk' => 'required|exists:tblpartido,idpartido'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Dados inválidos',
                'errors' => $validator->errors()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $regPolitico->update($data);

        return response()->json([
            'message' => 'Político atualizado com sucesso',
            'data' => $regPolitico
        ], Response::HTTP_OK);
    }


    //deletar
    public function destroy(string $idpolitico)
    {
        $regPolitico = TblPolitico::find($idpolitico);

        if ($regPolitico) {
            $regPolitico->delete();
            return response()->json([
                'message' => 'Político deletado com sucesso'
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'message' => 'Político não encontrado'
            ], Response::HTTP_NOT_FOUND);
        }
    }
}

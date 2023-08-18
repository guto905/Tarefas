<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use App\Models\Categoria;
use Illuminate\Http\Request;


class TarefaController extends Controller
{
    public function index()
    {
        $tarefas = Tarefa::all();
        return response()->json($tarefas);
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'concluida' => 'boolean',
            'categoria_id' => 'nullable|exists:categorias,id',
            'data_vencimento' => 'nullable|date',
        ]);
    
        $dados['usuario_id'] = auth()->user()->id;
    
        $tarefa = Tarefa::create($dados);
    
        return response()->json($tarefa, 201);
    }
    

    public function show($id)
    {
        $tarefa = Tarefa::findOrFail($id);
        return response()->json($tarefa);
    }

    public function update(Request $request, $id)
    {
        $tarefa = Tarefa::findOrFail($id);
    
        $dados = $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'concluida' => 'boolean',
            'categoria_id' => 'nullable|exists:categorias,id',
            'data_vencimento' => 'nullable|date',
        ]);
    
        $tarefa->update($dados);
    
        return response()->json($tarefa, 200);
    }
    

    public function destroy($id)
    {
        Tarefa::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}

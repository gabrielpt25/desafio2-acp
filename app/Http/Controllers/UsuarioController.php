<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all(['id','nome','email','cpf','perfil','endereco']);
        return response()->json($usuarios);
    }

    public function store(Request $request)
    {
        $usuario = Usuario::create($request->post());
        return response()->json([
            'message'=>'Usuário criado!',
            'usuario'=>$usuario
        ]);
    }

    public function show(Usuario $usuario)
    {
        return response()->json($usuario);
    }

    public function update(Request $request, Usuario $usuario)
    {
        $usuario->fill($request->post())->save();
        return response()->json([
            'message'=>'Usuário alterado!',
            'usuario'=>$usuario
        ]);
    }

    public function search(Request $request){
        // Get the search value from the request
        $search = $request->input('search');
    
        // Search in the title and body columns from the posts table
        $usuarios = Usuario::query()
            ->where('nome', 'LIKE', "%{$search}%")
            ->orWhere('cpf', 'LIKE', "%{$search}%")
            ->get();
    
        // Return the search view with the resluts compacted
        return view('search', compact('usuarios'));
    }

    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return response()->json([
            'message'=>'Usuário excluído!'
        ]);
    }
}

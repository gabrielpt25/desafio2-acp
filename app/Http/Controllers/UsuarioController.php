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

    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return response()->json([
            'message'=>'Usuário excluído!'
        ]);
    }
}

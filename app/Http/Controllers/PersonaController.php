<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;

class PersonaController extends Controller
{
        // GET http://localhost:8000/api/usuarios
        public function index($correo = null)
        {
            if($correo == null){
                $usuarios = Usuario::select('id', 'cedula', 'nombres', 'apellidos', 'correo', 'telefono')->orderBy('id')->get();
            } else {
                $usuarios = Usuario::where('correo', $correo)->get();
            }
            
    
            return $usuarios;
        }
    
        // POST http://localhost:8000/api/usuarios
        public function store(Request $request)
        {
            $request->validate([
                'cedula' => 'required|numeric|unique:usuarios',
                'nombres' => 'required|string',
                'apellidos' => 'required|string',
                'correo' => 'required|email|unique:usuarios',
                'telefono' => 'nullable|numeric'
            ]);
            $usuario = Usuario::create($request->all());
    
            return response()->json($usuario, 201);
        }
    
        // PUT http://localhost:8000/api/usuarios/:id
        public function update(Request $request, Usuario $usuario)
        {
            
            $request->validate([
                'cedula' => 'required|numeric|unique:usuarios,cedula,' . $usuario->id,
                'nombres' => 'required|string',
                'apellidos' => 'required|string',
                'correo' => 'required|email|unique:usuarios,correo,' . $usuario->id,
                'telefono' => 'nullable|numeric'
            ]);
            $usuario->update($request->all());
    
            return response()->json($usuario, 200);
        }

        
        public function delete(Request $request, $id){
            
            $usuarios = Usuario::findOrFail($id);
            $usuarios->delete();

            return response()->json($usuarios, 204);
          }

}

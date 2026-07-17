<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use Illuminate\Http\Request;

abstract class Controller
{
    public function index(){
        
    $registros = Registro::all();

        if(!$registros){

            $data = [
                "message" => "No se han registrado registros.",
                "status"  => 201
            ];

            return response()->json($data, 201);
        }

        $data = [
            "registros" => $registros,
            "total" => $registros->count()
        ];
        
        return response()->json($data, 201);
    }

    public function store(Request $request){
        
        $validated = $request->validate([
            "temperatura" => "required|min:-50|max:100",
            "humedad" => "required|min:0|max:100"
        ]);

        $registro = Registro::create([
            "temperatura" => $validated["temperatura"],
            "humedad" => $validated["humedad"]
        ]);

        if(!$registro){
            $data = [
                "message" => "Ocurrio un error, vuelva a intentarlo",
                "status" => 201
            ];

            return response()->json($data, 201);
        }

        $data = [
            "message" => "Se guardo el registro",
            "status" => 201
        ];

        return response()->json($data, 201);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Empleado;


use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

// use Illuminate\Http\Request;

class prueba extends Controller
{
    public function index()
    {

        $empleados = Empleado::all();

        return $empleados;

        // return view('welcome', compact('empleados'), ['empleados' => $empleados]);
    }

    public function create(Request $request)
    {

        // return $request->all();

        $empleado = new Empleado();
        $empleado->nombre = $request->nombre;
        $empleado->apaterno = $request->apaterno;
        $empleado->amaterno = $request->amaterno;
        $empleado->puesto = $request->puesto;

        $empleado->save();

        return back();
    }
    public function update(Request $request)
    {

        $empleado = Empleado::findOrFail($request->id);
        $empleado->nombre = $request-> nombre;
        $empleado->apaterno = $request-> apaterno;
        $empleado->amaterno = $request-> amaterno;
        $empleado->puesto = $request-> puesto;

        $empleado->save();
    }


    public function destroy($id)


{

    Empleado::destroy($id);

}

}

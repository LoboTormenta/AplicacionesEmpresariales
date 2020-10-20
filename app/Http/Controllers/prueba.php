<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models;


use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

// use Illuminate\Http\Request;

class prueba extends Controller
{
  public function index(){

    $empleados = Models\Empleado::all();



      return view('welcome', compact('empleados'));
  }

  public function create(Request $request)
  {

      // return $request->all();

      $empleadoNuevo = new Models\Empleado;
      $empleadoNuevo->nombre = $request->nombre;
      $empleadoNuevo->apaterno = $request->apaterno;
      $empleadoNuevo->amaterno = $request->amaterno;
      $empleadoNuevo->puesto= $request->puesto;

      $empleadoNuevo->save();

      return back();
  }
}

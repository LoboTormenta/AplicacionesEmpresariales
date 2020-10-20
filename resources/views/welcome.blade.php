<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Prueba de Query - Laravel</title>
  </head>
  <body>
   <div class="container my-4">

     <h1 class="display-4">Empleados</h1>
   </div>

   <table class="table">
  <thead>
    <tr>
      <th scope="col">#id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido Paterno</th>
      <th scope="col">Apellido Materno</th>
      <th scope="col">Puesto</th>
      <th scope="col">Creado</th>
      <th scope="col">Actualizado</th>




    </tr>
  </thead>
  <tbody>
  @foreach($empleados as $item)
    <tr>
      <th scope="row">{{$item->id}}</th>
      <td>{{$item->nombre}}</td>
      <td>{{$item->apaterno}}</td>
      <td>{{$item->amaterno}}</td>
      <td>{{$item->puesto}}</td>
      <td>{{$item->created_at}}</td>
      <td>{{$item->updated_at}}</td>
    </tr>
@endforeach()
    </tr>
  </tbody>
</table>



<form action = "{{ route('empleados.guardar') }}" method ="POST">
@csrf
	<table>
	<tr>
	<td>Nombre</td>
	<td><input type='text' name='nombre' /></td>
	<tr>
	<td>Apellido Paterno</td>
	<td><input type="text" name='apaterno'/></td>
	</tr>

  <tr>
	<td>Apellido Materno</td>
	<td><input type="text" name='amaterno'/></td>
	</tr>


  <tr>
	<td>Puesto</td>
	<td><input type="text" name='puesto'/></td>
	</tr>


	<tr>
	<td colspan = '2'>
	<input type = 'submit' value = "Agregar empleado"/>
	</td>
	</tr>
	</table>
</form>
      <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>

{{-- <!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema Ventas Laravel Vue Js- IncanatoIT">
    <meta name="author" content="Incanatoit.com">
    <meta name="keyword" content="Sistema ventas Laravel Vue Js, Sistema compras Laravel Vue Js">
    <link rel="shortcut icon" href="img/favicon.png">
    <title>Sistema Ventas - IncanatoIT</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Icons -->


    <link href="css/plantilla.css" rel="stylesheet">



</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
    <div id="app">
    <header class="app-header navbar">
        <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button">
          <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="nav navbar-nav d-md-down-none">
            <li class="nav-item px-3">
                <a class="nav-link" href="#">Escritorio</a>
            </li>
            <li class="nav-item px-3">
                <a class="nav-link" href="#">Configuraciones</a>
            </li>
        </ul>
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item d-md-down-none">
                <a class="nav-link" href="#" data-toggle="dropdown">
                    <i class="icon-bell"></i>
                    <span class="badge badge-pill badge-danger">5</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-header text-center">
                        <strong>Notificaciones</strong>
                    </div>
                    <a class="dropdown-item" href="#">
                        <i class="fa fa-envelope-o"></i> Ingresos
                        <span class="badge badge-success">3</span>
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fa fa-tasks"></i> Ventas
                        <span class="badge badge-danger">2</span>
                    </a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <img src="img/avatars/6.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                    <span class="d-md-down-none">admin </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-header text-center">
                        <strong>Cuenta</strong>
                    </div>
                    <a class="dropdown-item" href="#"><i class="fa fa-user"></i> Perfil</a>
                    <a class="dropdown-item" href="#"><i class="fa fa-lock"></i> Cerrar sesión</a>
                </div>
            </li>
        </ul>
    </header>

    <div class="app-body">

        @include('plantilla/sidebar')
        <!-- Contenido Principal -->
        @yield('contenido')
        <!-- /Fin del contenido principal -->
    </div>
    </div>

    <footer class="app-footer">
        <span><a href="http://www.incanatoit.com/">IncanatoIT</a> &copy; 2017</span>
        <span class="ml-auto">Desarrollado por <a href="http://www.incanatoit.com/">IncanatoIT</a></span>
    </footer>
    <script src="js/app.js"></script>
    <script src="js/plantilla.js"></script>

</body>

</html> --}}


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

    <!-- Icons -->


    <link href="css/plantilla.css" rel="stylesheet">
  </head>
  <body>


    <form class="mt-5" action = "{{ route('empleados.guardar') }}" method ="POST">
        @csrf
            <table>
            <tr>
            <td>Nombre</td>
            <td><input class="form-control" type='text' name='nombre' placeholder="Ingresa nombre" /></td>
            <tr>
            <td>Apellido Paterno</td>
            <td><input  class="form-control" type="text" name='apaterno' placeholder="Ingresa apellido paterno"/></td>
            </tr>

          <tr>
            <td>Apellido Materno</td>
            <td><input class="form-control" type="text" name='amaterno' placeholder="Ingresa apellido materno"/></td>
            </tr>


          <tr>
            <td>Puesto</td>
            <td><input  class="form-control" type="text" name='puesto' placeholder="Ingresa apellido materno" /></td>
            </tr>


            <tr>
            <td colspan = '2'>
            <input class="btn btn-primary" type = 'submit' value = "Agregar empleado"/>
            </td>
            </tr>
            </table>
        </form>
   <div class="container my-4">

     <h1 class="display-4">Empleados</h1>
   </div>

   <table class="table table-striped">
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
      <td>{{$item->apaterno}}</td>
      <td>{{$item->nombre}}</td>
      <td>{{$item->amaterno}}</td>
      <td>{{$item->puesto}}</td>
      <td>{{$item->created_at}}</td>
      <td>{{$item->updated_at}}</td>
    </tr>
@endforeach()
    </tr>
  </tbody>
</table>




      <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="js/app.js"></script>
    <script src="js/plantilla.js"></script>
  </body>
</html>








@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Mostrar Usuario</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
              <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuarios</a></li>
              <li class="breadcrumb-item active">Mostrar</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <!-- /.col-md-8 -->
            <div class="col-lg-8">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Mostrar Usuario</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="name">Usuario</label>
                                <input id="name" name="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Usuario" value="{{ $user->name }}" disabled>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="rol">Rol</label>
                                <input id="rol" name="rol" type="rol" class="form-control {{ $errors->has('rol') ? ' is-invalid' : '' }}" placeholder="Rol" value="{{ $user->getRoleNames()->first() }}" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="email">Email</label>
                                <input id="email" name="email" type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" value="{{ $user->email }}" disabled>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <div class="d-flex justify-content-center">
                        <div class='col-sm-5'>
                          <button type="button" class="btn btn-danger btn-block" id="cancelarButton">Cancelar</button>
                        </div>
                      </div>
                    </div>
              </div>
            </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection

@section('specific_js')
<script>
    //Navegacion
    $(document).ready(function(){
        $("#nav_item_users").addClass("menu-open");
        $("#nav_item_title_users").addClass("active");
        $("#nav_item_option_gestionar_users").addClass("active");
    });
    //Boton Cancelar
    $('#cancelarButton').click(function(){
        window.location.href = "{{ route('users.index') }}";
    }); 
</script>
@endsection
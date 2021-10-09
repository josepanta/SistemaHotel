@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Editar de Usuarios</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
              <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuarios</a></li>
              <li class="breadcrumb-item active">Editar</li>
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
                  <h3 class="card-title">Editar Usuarios</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="guardar_usuarios" method="post" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  {{ method_field('PATCH') }}
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label for="name">Usuario</label>
                                <input id="name" name="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Usuario" value="{{ $user->name }}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="Rol">Rol</label>
                                <select id="rol_id" name="rol_id" class="form-control select {{ $errors->has('rol_id') ? ' is-invalid' : '' }}">
                                <option disabled selected>Selecciona</option>
                                @foreach($roles as $rol)
                                    @if( $user->getRoleNames()->first() == $rol->name)
                                   
                                    <option value="{{ $rol->id }}" selected>{{ $rol->name }}</option>
                                    @else
                                    <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                                    @endif
                                @endforeach
                                </select>
                                @error('rol_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="estado">Estado</label>
                                <select id="estado" name="estado" class="form-control select {{ $errors->has('estado') ? ' is-invalid' : '' }}">
                                <option disabled selected>Selecciona</option>
                                @foreach($estados as $estado)
                                    @if( $user->estado == $estado)
                                    <option value="{{ $estado }}" selected>{{ $estado }}</option>
                                    @else
                                    <option value="{{ $estado }}">{{ $estado }}</option>
                                    @endif
                                @endforeach
                                </select>
                                @error('estado')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label for="email">Email</label>
                                <input id="email" name="email" type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" value="{{ $user->email }}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <div class="d-flex justify-content-center">
                        <div class='col-sm-5'>
                          <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                        </div>
                        <div class='col-sm-5'>
                          <button type="button" class="btn btn-danger btn-block" id="cancelarButton">Cancelar</button>
                        </div>
                      </div>
                    </div>
                </form>
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
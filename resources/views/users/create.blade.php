@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Agregar de Usuarios</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
              <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuarios</a></li>
              <li class="breadcrumb-item active">Agregar</li>
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
                  <h3 class="card-title">Agregar Usuarios</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="guardar_usuarios" method="post" action="{{ route('users.store') }}" enctype="multipart/form-data">
                  {{ csrf_field() }}
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label for="name">Usuario</label>
                                <input id="name" name="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Usuario" value="{{ old('name') }}">
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
                                    @if( old('rol_id') == $rol->id)
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
                                <label for="password">Contraseña</label>
                                <input id="password" name="password" type="password"  class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Contraseña" value="{{ old('password') }}">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-8">
                                <label for="email">Email</label>
                                <input id="email" name="email" type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" value="{{ old('email') }}">
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
                            <div class='col-sm-6'>
                            <button type="submit" class="btn btn-primary btn-block">Agregar</button>
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
</script>
@endsection
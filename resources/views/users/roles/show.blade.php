@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Mostrar Roles</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
              <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
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
                        <h3 class="card-title">Mostrar Rol</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label for="nombre">Nombre</label>
                                <input id="nombre" name="nombre" type="text" class="form-control" placeholder="Nombre" value="{{ $rol->name }}" disabled>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="estado">Estado</label>
                                <input id="estado" name="estado" type="text" class="form-control" placeholder="Estado" value="{{ $rol->estado }}" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="descripcion">Descripcion</label>
                                <textarea id="descripcion" name="descripcion" cols="30" class="form-control {{ $errors->has('descripcion') ? ' is-invalid' : '' }}" style="resize:none;" rows="3" disabled>{{ $rol->descripcion }}</textarea>
                            </div>
                        </div>    
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <div class="d-flex justify-content-center">
                            <div class='col-sm-6'>
                                <button type="button" id="regresarButton" class="btn btn-danger btn-block">Regresar</button>
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
        $("#nav_item_option_roles_users").addClass("active");
    }); 

    //Boton Regresar
    $('#regresarButton').click(function(){
        window.location.href = "{{ route('roles.index') }}";
    });

</script>


@endsection
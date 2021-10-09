@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Agregar de Roles</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
              <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roless</a></li>
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
                  <h3 class="card-title">Agregar Roles</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="guardar_habitacion" method="post" action="{{ route('roles.store') }}" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="card-body">
                    <div class="row">
                      <div class="form-group col-sm-4">
                        <label for="name">Nombre</label>
                        <input id="name" name="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Nombre" value="{{ old('name') }}">
                        @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-sm-12">
                        <label for="descripcion">Descripcion</label>
                        <textarea id="descripcion" name="descripcion" cols="30" class="form-control {{ $errors->has('descripcion') ? ' is-invalid' : '' }}" style="resize:none;" rows="3">{{ old('descripcion') }}</textarea>
                        @error('descripcion')
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
        $("#nav_item_option_roles_users").addClass("active");
    }); 
</script>
<script>
    // File
    $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

    //Cargar Archivo en Iframe
    function cargar_archivo() {
      var archivo = document.getElementById("archivo").files[0];
      document.getElementById("iframe_archivo").src = URL.createObjectURL( archivo );

      iframe_archivo.style.display = "";
      icono_archivo.style.display = "none";
    }
</script>
@endsection
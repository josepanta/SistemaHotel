@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Mostrar Tipo de Habitacion</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
              <li class="breadcrumb-item"><a href="{{ route('tipo_habitaciones.index') }}">Tipos de Habitaciones</a></li>
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
                  <h3 class="card-title">Mostrar Tipo de Habitacion</h3>
                </div>
                <!-- /.card-header -->
                  
                <div class="card-body">
                    <div class="row">
                      <div class="form-group col-sm-8">
                        <label for="nombre">Nombre</label>
                        <input id="nombre" name="nombre" type="text" class="form-control" placeholder="Nombre" value="{{ $tipo_habitacion->nombre }}" disabled>
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="precio">Precio</label>
                        <input id="precio" name="precio" type="number" step="0.01" class="form-control" placeholder="Precio" value="{{ $tipo_habitacion->precio }}" disabled>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="descripcion">Descripcion</label>
                      <textarea id="descripcion" name="descripcion" class="form-control" rows="3" placeholder="Descripcion" style="resize:none;" disabled>{{ $tipo_habitacion->descripcion }}</textarea>
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <div class="d-flex justify-content-center">
                      <div class='col-sm-6'>
                        <button id="regresarButton" type="button" form="guardar_tipo_habitacion" class="btn btn-primary btn-block">Regresar</button>
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
    $("#nav_item_habitaciones").addClass("menu-open");
    $("#nav_item_title_habitaciones").addClass("active");
    $("#nav_item_option_tipo_habitaciones").addClass("active");
  }); 
</script>

<script>
    $('#regresarButton').click(function(){
        window.location.href = "{{ route('tipo_habitaciones.index') }}";
    });
</script>
@endsection
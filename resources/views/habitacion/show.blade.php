@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Mostrar de Habitacion</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
              <li class="breadcrumb-item"><a href="{{ route('habitaciones.index') }}">Habitaciones</a></li>
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
                  <h3 class="card-title">Mostrar Habitacion</h3>
                </div>
                <!-- /.card-header -->
                  <div class="card-body">
                    <div class="row">
                      <div class="form-group col-sm-4">
                        <label for="letra_numero">Letra - Numero</label>
                        <input id="letra_numero" name="letra_numero" type="text" class="form-control" placeholder="Letra - Numero" value="{{ $habitacion->letra_numero }}" disabled>
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="estado">Estado</label>
                        <input id="estado" name="estado" type="text" class="form-control" placeholder="Estado" value="{{ $habitacion->estado }}" disabled>
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="tipo_habitacion_id">Tipo de Habitacion</label>
                        <input id="tipo_habitacion_id" name="tipo_habitacion_id" type="text" class="form-control" placeholder="Tipo Habitacion" value="{{ $habitacion->tipo_habitacion->nombre }}" disabled>
                      </div>
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <div class="d-flex justify-content-center">
                      <div class='col-sm-6'>
                        <button id="regresarButton" type="submit" class="btn btn-primary btn-block">Regresar</button>
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
    $("#nav_item_option_gestionar_habitaciones").addClass("active");
  }); 
</script>

<script>
    $('#regresarButton').click(function(){
        window.location.href = "{{ route('habitaciones.index') }}";
    });
</script>
@endsection
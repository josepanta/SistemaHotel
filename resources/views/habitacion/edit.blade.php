@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Editar de Habitacion</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
              <li class="breadcrumb-item"><a href="{{ route('habitaciones.index') }}">Habitaciones</a></li>
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
                  <h3 class="card-title">Editar Habitacion</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="guardar_habitacion" method="post" action="{{ route('habitaciones.update', $habitacion->id) }}">
                  {{ csrf_field() }}
                  {{ method_field('PATCH') }}
                  <div class="card-body">
                    <div class="row">
                      <div class="form-group col-sm-4">
                        <label for="letra_numero">Letra - Numero</label>
                        <input id="letra_numero" name="letra_numero" type="text" class="form-control {{ $errors->has('letra_numero') ? ' is-invalid' : '' }}" placeholder="Letra - Numero" value="{{ $habitacion->letra_numero }}">
                        @error('letra_numero')
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
                            @if( $habitacion->estado == $estado)
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
                      <div class="form-group col-sm-4">
                        <label for="tipo_habitacion_id">Tipo de Habitacion</label>
                        <select id="tipo_habitacion_id" name="tipo_habitacion_id" class="form-control select {{ $errors->has('tipo_habitacion_id') ? ' is-invalid' : '' }}">
                          <option disabled selected>Selecciona</option>
                          @foreach($tipo_habitaciones as $tipo_habitacion)
                            @if( $habitacion->tipo_habitacion_id == $tipo_habitacion->id )
                              <option value="{{ $tipo_habitacion->id }}" selected>{{ $tipo_habitacion->nombre }}</option>
                            @else
                              <option value="{{ $tipo_habitacion->id }}">{{ $tipo_habitacion->nombre }}</option>
                            @endif
                          @endforeach
                        </select>
                        @error('tipo_habitacion_id')
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
                        <button id="guardarButton" type="submit" class="btn btn-primary btn-block">Guardar</button>
                      </div>
                      <div class='col-sm-5'>
                        <button id="cancelarButton" type="button" class="btn btn-danger btn-block">Cancelar</button>
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
    $("#nav_item_habitaciones").addClass("menu-open");
    $("#nav_item_title_habitaciones").addClass("active");
    $("#nav_item_option_gestionar_habitaciones").addClass("active");
  }); 
</script>

<script>
    $("#cancelarButton").click(function(){
        window.location.href = "{{ route('habitaciones.index') }}";
    });
</script>
@endsection
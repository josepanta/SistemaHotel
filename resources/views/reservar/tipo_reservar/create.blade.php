@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Agregar Tipo de Reserva</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
              <li class="breadcrumb-item"><a href="{{ route('tipo_reservas.index') }}">Tipos de Reservas</a></li>
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
                  <h3 class="card-title">Agregar Tipo de Reserva</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="guardar_tipo_reserva" method="post" action="{{ route('tipo_reservas.store') }}">
                  {{ csrf_field() }}

                  <div class="card-body">
                    <div class="row">
                      <div class="form-group col-sm-12">
                        <label for="nombre">Nombre</label>
                        <input id="nombre" name="nombre" type="text" class="form-control {{ $errors->has('nombre') ? ' is-invalid' : '' }}" placeholder="Nombre" value="{{ old('nombre') }}" >
                        @error('nombre')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>    
                    </div>
                    <div class="form-group">
                      <label for="descripcion">Descripcion</label>
                      <textarea id="descripcion" name="descripcion" class="form-control {{ $errors->has('descripcion') ? ' is-invalid' : '' }}" rows="3" placeholder="Descripcion" style="resize:none;">{{ old('descripcion') }}</textarea>
                      @error('descripcion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <div class="d-flex justify-content-center">
                      <div class='col-sm-6'>
                        <button type="submit" form="guardar_tipo_reserva" class="btn btn-primary btn-block">Agregar</button>
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
    $("#nav_item_reservas").addClass("menu-open");
    $("#nav_item_title_reservas").addClass("active");
    $("#nav_item_option_tipo_reservas").addClass("active");
  }); 
</script>
@endsection
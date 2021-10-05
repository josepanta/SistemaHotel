@extends('layouts.app')

@section('specific_css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
@endsection

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Editar Reserva</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
              <li class="breadcrumb-item"><a href="{{ route('reservas.index') }}">Reservas</a></li>
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
            <!-- /.col-md-12 -->
            <div class="col-lg-12">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Editar Reserva</h3>
                </div>
                <!-- /.card-header -->
                  <input id="tabla_array" name="tabla_array" type="hidden">
                  <div class="card-body">
                    <div class="row">
                      <div class="form-group col-sm-4">
                        <label for="user">Usuario</label>
                        <select id="user" name="user_id" class="form-control select2bs4" style="width:100%!important;" disabled>
                          <option disabled selected>Selecciona</option>
                          @foreach($users as $user)
                            @if($user->id == $reserva->user_id)
                              <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                            @else
                              <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endif
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="estado">Estado</label>
                        <select id="estado" name="estado" class="form-control select" style="width:100%!important;" disabled>
                          <option disabled selected>Selecciona</option>
                          @foreach($estados as $estado)
                            @if($estado == $reserva->estado)
                              <option value="{{ $estado }}" selected>{{ $estado }}</option>
                            @else
                              <option value="{{ $estado }}">{{ $estado }}</option>
                            @endif
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="tipo_reserva">Tipo</label>
                        <select id="tipo_reserva" name="tipo_reserva_id" class="form-control select" style="width:100%!important;" disabled>
                          <option disabled selected>Selecciona</option>
                          @foreach($tipos_reservas as $tipo_reserva)
                            @if($tipo_reserva->id == $reserva->tipo_reserva_id)
                              <option value="{{ $tipo_reserva->id }}" selected>{{ $tipo_reserva->nombre }}</option>
                            @else
                              <option value="{{ $tipo_reserva->id }}">{{ $tipo_reserva->nombre }}</option>
                            @endif
                          @endforeach
                        </select>
                      </div>
                    </div>  
                    <div class="row mt-1">
                      <table id="reservas_tabla" class="table">
                          <thead>
                              <tr>
                                  <th>Habitacion</th>
                                  <th>Fecha Inicio</th>
                                  <th>Fecha Fin</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach($reserva_habitaciones as $reserva_habitacion)
                              <tr id="{{ $reserva_habitacion->id }}">
                                <td id="{{ $reserva_habitacion->habitacion_id }}">{{ $reserva_habitacion->habitacion->letra_numero }}</td>
                                <td>{{ $reserva_habitacion->fecha_inicio }}</td>
                                <td>{{ $reserva_habitacion->fecha_fin }}</td>
                              </tr>
                            @endforeach
                          </tbody>
                      </table>
                    </div>
                  </div>

                  <div class="card-footer">
                    <div class="d-flex justify-content-center">
                      <div class='col-sm-6'>
                        <button type="button" class="btn btn-primary btn-block" onclick="history.back();">Volver</button>
                      </div>
                    </div>
                  </div>
                
              </div>
            </div>
          <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection

@section('specific_js')
<!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<!-- SweetAlert2 -->
<script src="../../plugins/sweetalert2/sweetalert2.min.js"></script>

<script>  
  //Initialize Select2 Elements
  $('.select2bs4').select2({
      theme: 'bootstrap4'
  });

  //Navegacion
  $(document).ready(function(){
      $("#nav_item_reservas").addClass("menu-open");
      $("#nav_item_title_reservas").addClass("active");
      $("#nav_item_option_gestionar_reservas").addClass("active");
  }); 
</script>
@endsection
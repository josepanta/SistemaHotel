@extends('layouts.app')

@section('specific_css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Agregar Reserva</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
              <li class="breadcrumb-item"><a href="{{ route('reservas.index') }}">Reservas</a></li>
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
            <!-- /.col-md-12 -->
            <div class="col-lg-12">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Agregar Reserva</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{ route('reservas.store') }}">
                  {{ csrf_field() }}
                  <input id="tabla_array" name="tabla_array" type="hidden">
                  <div class="card-body">
                    <div class="row mt-1">
                      <div class="row ml-1 mb-3">
                          <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modal-agregar"><i class="fa fa-plus"></i>Agregar</button>
                      </div>
                      <table id="reservas_tabla" class="table">
                          <thead>
                              <tr>
                                  <th>Habitacion</th>
                                  <th>Usuario</th>
                                  <th>Fecha Comienzo</th>
                                  <th>Fecha Fin</th>
                                  <th>Opciones</th>
                              </tr>
                          </thead>
                          <tbody></tbody>
                      </table>
                      <div class="modal fade" id="modal-agregar">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Agregar</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="habitacion_agregar">Habitacion</label>
                                    <select id="habitacion_agregar" class="form-control select">
                                        @foreach($habitaciones as $habitacion)
                                            <option value="{{ $habitacion->id }}">{{ $habitacion->letra_numero }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="user_agregar">Usuario</label>
                                    <select id="user_agregar" class="form-control select2bs4" style="width:100%!important;">
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="fecha_comienzo_agregar">Fecha Comienzo</label>
                                    <input id="fecha_comienzo_agregar" type="date" class="form-control">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="fecha_fin_agregar">Fecha Fin</label>
                                    <input id="fecha_fin_agregar" type="date" class="form-control">
                                </div>     
                              </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                              <button id="guardar_modal" type="button" class="btn btn-primary" data-dismiss="modal">Guardar</button>
                            </div>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <!-- /.modal -->
                    </div>
                  </div>

                  <div class="card-footer">
                    <div class="d-flex justify-content-center">
                      <div class='col-sm-6'>
                        <button id="agregar" type="submit" class="btn btn-primary btn-block">Agregar</button>
                      </div>
                    </div>
                  </div>
                </form>
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

  //Agregar Modal
  $("#guardar_modal").click(function(){
    $('#reservas_tabla > tbody:last-child').append("<tr><td id="+$('#habitacion_agregar').val()+">"+$("#habitacion_agregar option:selected").text()+"</td><td id="+$('#user_agregar').val()+">"+$("#user_agregar option:selected").text()+"</td><td>"+$("#fecha_comienzo_agregar").val()+"</td><td>"+$("#fecha_fin_agregar").val()+"</td><td><div class='row justify-content-between'><button type='button' class='btn col-md-4 btn-primary btn-sm'><i class='fa fa-edit'></i >Editar</button><button type='button' class='btn col-md-3 btn-primary btn-sm'><i class='fa fa-eye'></i> Ver</button><button type='button' class='btn col-md-4 btn-primary btn-sm'><i class='fa fa-trash'></i> Eliminar</button></div></td></tr>");
  });

  //Transforma a Array
  $("#agregar").click(function(){
    var filas = [];
    $('#reservas_tabla tbody tr').each(function() {
        var habitacion = $(this).find('td').eq(0).attr('id');
        var user = $(this).find('td').eq(1).attr('id');
        var fecha_comienzo = $(this).find('td').eq(2).text();
        var fecha_fin = $(this).find('td').eq(2).text();
        var fila = {
            'habitacion': habitacion,
            'user': user,
            'fecha_comienzo': fecha_comienzo,
            'fecha_fin': fecha_fin
        };
        filas.push(fila);
    });

    $('#tabla_array').val(JSON.stringify(filas));
  });
</script>
@endsection
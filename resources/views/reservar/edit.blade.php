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
                <!-- form start -->
                <form method="post" action="{{ route('reservas.update', $reserva->id) }}">
                  {{ csrf_field() }}
                  {{ method_field('PATCH') }}
                  <input id="tabla_array" name="tabla_array" type="hidden">
                  <div class="card-body">
                    <div class="row">
                      <div class="form-group col-sm-4">
                        <label for="user">Usuario</label>
                        <select id="user" name="user_id" class="form-control select2bs4" style="width:100%!important;">
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
                        <select id="estado" name="estado" class="form-control select" style="width:100%!important;">
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
                        <select id="tipo_reserva" name="tipo_reserva_id" class="form-control select" style="width:100%!important;">
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
                      <div class="row ml-1 mb-3">
                          <button id="agregar_tabla" type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modal-agregar"><i class="fa fa-plus"></i>Agregar</button>
                      </div>
                      <table id="reservas_tabla" class="table">
                          <thead>
                              <tr>
                                  <th>Habitacion</th>
                                  <th>Fecha Inicio</th>
                                  <th>Fecha Fin</th>
                                  <th>Opciones</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach($reserva_habitaciones as $reserva_habitacion)
                              <tr id="{{ $reserva_habitacion->id }}">
                                <td id="{{ $reserva_habitacion->habitacion_id }}">{{ $reserva_habitacion->habitacion->letra_numero }}</td>
                                <td>{{ $reserva_habitacion->fecha_inicio }}</td>
                                <td>{{ $reserva_habitacion->fecha_fin }}</td>
                                <td>
                                <div class='row justify-content-between'><button onclick='editar_modal($(this))' type='button' class='btn col-md-5 btn-primary btn-sm' data-toggle='modal' data-target='#modal-editar'><i class='fa fa-edit'></i >Editar</button><button onclick='eliminar_modal($(this))' type='button' class='btn col-md-5 btn-primary btn-sm'><i class='fa fa-trash'></i> Eliminar</button></div>
                                </td>
                              </tr>
                            @endforeach
                          </tbody>
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
                                <div class="form-group col-sm-12">
                                    <label for="habitacion_agregar">Habitacion</label>
                                    <select id="habitacion_agregar" class="form-control select" disabled>
                                        <option disabled selected>Selecciona</option>
                                        @foreach($habitaciones as $habitacion)
                                          @if($habitacion->id == old('habitacion_agregar'))
                                            <option value="{{ $habitacion->id }}" selected>{{ $habitacion->letra_numero }}</option>
                                          @else
                                            <option value="{{ $habitacion->id }}">{{ $habitacion->letra_numero }}</option>
                                          @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="fecha_inicio_agregar">Fecha Inicio</label>
                                    <input id="fecha_inicio_agregar" type="date" class="form-control" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" max="{{ Carbon\Carbon::now()->add(2, 'week')->format('Y-m-d') }}">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="fecha_fin_agregar">Fecha Fin</label>
                                    <input id="fecha_fin_agregar" type="date" class="form-control" min="" disabled>
                                </div>     
                              </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                              <button id="guardar_agregar_modal" type="button" class="btn btn-primary" data-dismiss="modal">Guardar</button>
                            </div>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <!-- /.modal -->
                      <div class="modal fade" id="modal-editar">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Editar</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="row">
                                <input id="index" type="hidden">
                                <div class="form-group col-sm-12">
                                    <label for="habitacion_editar">Habitacion</label>
                                    <select id="habitacion_editar" class="form-control select">
                                        <option disabled selected>Selecciona</option>
                                        @foreach($habitaciones as $habitacion)
                                          @if($habitacion->id == old('habitacion_agregar'))
                                            <option value="{{ $habitacion->id }}" selected>{{ $habitacion->letra_numero }}</option>
                                          @else
                                            <option value="{{ $habitacion->id }}">{{ $habitacion->letra_numero }}</option>
                                          @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="fecha_inicio_editar">Fecha Inicio</label>
                                    <input id="fecha_inicio_editar" type="date" class="form-control" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" max="{{ Carbon\Carbon::now()->add(2, 'week')->format('Y-m-d') }}">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="fecha_fin_editar">Fecha Fin</label>
                                    <input id="fecha_fin_editar" type="date" class="form-control" min="">
                                </div>     
                              </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                              <button id="guardar_editar_modal" type="button" class="btn btn-primary" data-dismiss="modal">Guardar</button>
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
                        <button id="agregar" type="button" class="btn btn-primary btn-block">Guardar</button>
                      </div>
                      <div class='col-sm-6'>
                        <button type="button" class="btn btn-danger btn-block" onclick="history.back();">Cancelar</button>
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
<!-- SweetAlert2 -->
<script src="../../plugins/sweetalert2/sweetalert2.min.js"></script>

<script>
  //SweetAlert
  const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  });

  function crear_alert(texto, tipo) {
    switch(tipo){
      case "error":
        Toast.fire({
          icon: 'error',
          title: texto
        })
        break;
      case "info":
        Toast.fire({
          icon: 'info',
          title: texto
        })
        break;
      case "success":
        Toast.fire({
          icon: 'success',
          title: texto
        })
        break;
      case "warning":
        Toast.fire({
          icon: 'warning',
          title: texto
        })
        break;
    }
  }
  
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
  
  //Agregar de Modal
  $("#agregar_tabla").click(function(){
    crear_alert("Selecciona un intervalo de fechas para elegir las habitaciones disponibles.", "info");
  });

  $("#fecha_inicio_agregar, #fecha_fin_agregar").change(function(){
    if($("#fecha_inicio_agregar").val().length !== 0){
      $("#fecha_fin_agregar").prop("disabled", false);
      $("#fecha_fin_agregar").attr("min", $("#fecha_inicio_agregar").val());
    }

    if($("#fecha_inicio_agregar").val().length !== 0 && $("#fecha_fin_agregar").val().length !== 0){
      $("#habitacion_agregar").prop("disabled", false);
    }
  });

  var index = "{{ $reserva_habitaciones->count() > 0 ? $reserva_habitaciones->last()->id : 0 }}";
  $("#guardar_agregar_modal").click(function(){
    if($("#habitacion_agregar option:selected").text() == "Selecciona" || $("#fecha_inicio_agregar").val().length === 0 || $("#fecha_fin_agregar").val().length === 0){
      crear_alert('Selecciona una habitacion, una fecha de inicio y una fecha de fin.', 'error');
    }else{
      index++;
      $('#reservas_tabla > tbody:last-child').append("<tr id='"+ index +"'><td id="+$('#habitacion_agregar').val()+">"+$("#habitacion_agregar option:selected").text()+"</td><td>"+$("#fecha_inicio_agregar").val()+"</td><td>"+$("#fecha_fin_agregar").val()+"</td><td><div class='row justify-content-between'><button onclick='editar_modal($(this))' type='button' class='btn col-md-5 btn-primary btn-sm' data-toggle='modal' data-target='#modal-editar'><i class='fa fa-edit'></i >Editar</button><button onclick='eliminar_modal($(this))' type='button' class='btn col-md-5 btn-primary btn-sm'><i class='fa fa-trash'></i> Eliminar</button></div></td></tr>");
    }
  });

  //Editar de Modal
  $("#fecha_inicio_editar, #fecha_fin_editar").change(function(){
    if($("#fecha_inicio_editar").val().length !== 0){
      $("#fecha_fin_editar").attr("min", $("#fecha_inicio_editar").val());
    }
  });

  function editar_modal(button){
    crear_alert("Selecciona un intervalo de fechas para elegir las habitaciones disponibles.", "info");
    $("#index").val(button.parents('tr').attr("id"));
    $("#habitacion_editar option[value='"+button.parents('tr').find('td').eq(0).attr('id')+"']").attr("selected", true);
    $("#fecha_inicio_editar").val(button.parents('tr').find('td').eq(1).text());
    $("#fecha_fin_editar").val(button.parents('tr').find('td').eq(2).text());

    $("#fecha_fin_editar").attr("min", $("#fecha_inicio_editar").val());
  }

  $("#guardar_editar_modal").click(function(){
    let i = $("#index").val();
    $("#reservas_tabla tbody tr").filter(function(index){
      return $(this).attr("id") === i;
    }).remove();

    $('#reservas_tabla > tbody:last-child').append("<tr id='"+ i +"'><td id="+$('#habitacion_editar').val()+">"+$("#habitacion_editar option:selected").text()+"</td><td>"+$("#fecha_inicio_editar").val()+"</td><td>"+$("#fecha_fin_editar").val()+"</td><td><div class='row justify-content-between'><button onclick='editar_modal($(this))' type='button' class='btn col-md-5 btn-primary btn-sm' data-toggle='modal' data-target='#modal-editar'><i class='fa fa-edit'></i >Editar</button><button onclick='eliminar_modal($(this))' type='button' class='btn col-md-5 btn-primary btn-sm'><i class='fa fa-trash'></i> Eliminar</button></div></td></tr>");
  });

  //Eliminar de Modal
  function eliminar_modal(button){
    button.parents('tr').remove();
  }

  //Agregar General
  $("#agregar").click(function(){
    if($('#reservas_tabla tbody tr').length > 0 && $("#user option:selected").text() !== "Selecciona" && $("#estado option:selected").text() !== "Selecciona" && $("#tipo_reserva option:selected").text() !== "Selecciona"){
      var filas = [];
      $('#reservas_tabla tbody tr').each(function() {
          var habitacion = $(this).find('td').eq(0).attr('id');
          var fecha_inicio = $(this).find('td').eq(1).text();
          var fecha_fin = $(this).find('td').eq(2).text();
          var fila = {
              'habitacion': habitacion,
              'fecha_inicio': fecha_inicio,
              'fecha_fin': fecha_fin
          };
          filas.push(fila);
      });

      $('#tabla_array').val(JSON.stringify(filas));
      
      $("form").submit();
    }else{
      crear_alert('Elige una Usaurio, Estado, Tipo y llena la tabla con las Habitaciones/Fechas.', 'warning');
    }
  });
</script>
@endsection
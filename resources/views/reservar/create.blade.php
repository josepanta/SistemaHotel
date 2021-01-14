@extends('layouts.app')

@section('specific_css')
    <!-- DataTables -->
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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
                <form>
                  <div class="card-body">
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="tipo_reserva_nombre">Estado</label>
                            <select class="form-control select">
                                @foreach($estados as $estado)
                                    <option value="{{ $estado }}">{{ $estado }}</option>
                                @endforeach
                            </select>
                        </div> 
                        <div class="form-group col-sm-4">
                            <label for="tipo_reserva_descripcion">Tipo Reserva</label>
                            <select class="form-control select">
                                @foreach($tipo_reservas as $tipo_reserva)
                                    <option value="{{ $tipo_reserva->id }}">{{ $tipo_reserva->nombre }}</option>
                                @endforeach
                            </select>
                        </div>   
                        <div class="form-group col-sm-4">
                            <label for="tipo_reserva_descripcion">Usuario</label>
                            <select class="form-control select2bs4" style="width:100%!important;">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div> 
                    </div>
                  </div>
                  <div class="d-flex justify-content-center">
                    <div class="from-group col-sm-10">
                        <table id="reservas_habitaciones_table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Fecha Inicio</th>
                                    <th>Fecha fin</th>
                                    <th>Habitacion</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Trident</td>
                                    <td>Internet
                                    Explorer 4.0
                                    </td>
                                    <td>Win 95+</td>
                                    <td>
                                        <div class="row justify-content-between">
                                            <button type="button" class="btn col-md-4 btn-primary btn-sm"><i class="fa fa-edit"></i >Editar</button>
                                            <button type="button" class="btn col-md-3 btn-primary btn-sm"><i class="fa fa-eye"></i> Ver</button>
                                            <button type="button" class="btn col-md-4 btn-primary btn-sm"><i class="fa fa-trash"></i> Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Trident</td>
                                    <td>Internet
                                    Explorer 5.0
                                    </td>
                                    <td>Win 95+</td>
                                    <td>
                                        <div class="row justify-content-between">
                                            <button type="button" class="btn col-md-4 btn-primary btn-sm"><i class="fa fa-edit"></i >Editar</button>
                                            <button type="button" class="btn col-md-3 btn-primary btn-sm"><i class="fa fa-eye"></i> Ver</button>
                                            <button type="button" class="btn col-md-4 btn-primary btn-sm"><i class="fa fa-trash"></i> Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Trident</td>
                                    <td>Internet
                                    Explorer 5.5
                                    </td>
                                    <td>Win 95+</td>
                                    <td>
                                        <div class="row justify-content-between">
                                            <button type="button" class="btn col-md-4 btn-primary btn-sm"><i class="fa fa-edit"></i >Editar</button>
                                            <button type="button" class="btn col-md-3 btn-primary btn-sm"><i class="fa fa-eye"></i> Ver</button>
                                            <button type="button" class="btn col-md-4 btn-primary btn-sm"><i class="fa fa-trash"></i> Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
          <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection

@section('specific_js')
<!-- Datatable -->
<script src="../../dist/js/demo.js"></script>
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

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

    //DataTable
    $('#reservas_habitaciones_table').DataTable({
        "pageLength": 5,
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": false,
        "info": false,
        "autoWidth": false,
        "responsive": true,
        "language": {
            "url": "{{ asset('plugins/language/spanish.json') }}"
        },
    });
</script>
@endsection
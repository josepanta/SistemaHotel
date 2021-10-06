@extends('layouts.app')

@section('specific_css')
<!-- fullCalendar -->
<link rel="stylesheet" href="../plugins/fullcalendar/main.css">
@endsection

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Calendario</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
              <li class="breadcrumb-item"><a href="{{ route('reservas.index') }}">Reservas</a></li>
              <li class="breadcrumb-item active">Calendario</li>
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
                  <h3 class="card-title">Calendario</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="col">
                    <div class="row">
                      <label>Color</label>: Indica el estado de la Reserva.
                    </div>
                    <div class="row justify-content-center">
                      <h3 class="col-md-2 mr-1"><span class="badge" style="background-color:#AF7AC5">Reservada</span></h1>
                      <h3 class="col-md-2 mr-1"><span class="badge" style="background-color:#3498DB">Pagada</span></h1>
                      <h3 class="col-md-2 mr-1"><span class="badge" style="background-color:#E74C3C">Cancelada</span></h1>
                      <h3 class="col-md-2"><span class="badge" style="background-color:#E67E22">Inactiva</span></h1>
                    </div>
                    <div id='calendar'></div>
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
<!-- fullCalendar 2.2.5 -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/fullcalendar/main.js"></script>

<script>
  //Calendario
  document.addEventListener('DOMContentLoaded', function() {
    
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      locale: 'es',
      buttonText:{
        today: "Ir a Hoy"
      },
      eventSources: [
        {
          url: '{{ route("reservas.dataCalendario") }}',
          method: 'GET',
          failure: function() {
            alert('Hubo un error al cargar!');
          }, 
          textColor: 'white'
        }
      ] 
    });
    calendar.render();
    
  });
</script>
<script>
  //Navegacion
  $(document).ready(function(){
      $("#nav_item_reservas").addClass("menu-open");
      $("#nav_item_title_reservas").addClass("active");
      $("#nav_item_option_calendario").addClass("active");
  }); 
</script>
@endsection
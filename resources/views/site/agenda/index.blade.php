@extends('site.layouts.main')

@section('titulo', 'Agenda')
<link rel="stylesheet" href="{{ asset('css/calendario.css') }}">
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.4/main.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.11.4/locales-all.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.11.4/main.min.css" integrity="sha512-1P/SRFqI1do4eNtBsGIAqIZIlnmOQkaY7ESI2vkl+q+hl9HSXmdPqotN0McmeZVyR4AWV+NvkP6pKOiVdY/V5A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script> 
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
            },
            eventClick: function(event) {
                diaInicial  = event.event.start.getDate().toString().padStart(2, '0'),
                mesInicial  = (event.event.start.getMonth()+1).toString().padStart(2, '0'), //+1 pois no getMonth Janeiro começa com zero.
                anoInicial  = event.event.start.getFullYear();
                   // diaInicial+"/"+mesInicial+"/"+anoInicial
                horaInicial = event.event.start.getHours().toString().padStart(2, "0");
                minsIniciais = event.event.start.getMinutes().toString().padStart(2, "0");

                diaFinal  = event.event.end.getDate().toString().padStart(2, '0'),
                mesFinal  = (event.event.end.getMonth()+1).toString().padStart(2, '0'), //+1 pois no getMonth Janeiro começa com zero.
                anoFinal  = event.event.end.getFullYear();
                   // diaFinal+"/"+mesFinal+"/"+anoFinal
                horaFinal = event.event.end.getHours().toString().padStart(2, "0");
                minsFinais = event.event.end.getMinutes().toString().padStart(2, "0");
                var modal = $("#modal-agenda");
                modal.modal('show');
                $("#modal-agenda .modal-title").text(event.event.title);
                $("#modal-agenda .modal-body .data-inicial p").text("Data de Início: "+diaInicial+"/"+mesInicial+"/"+anoInicial+ " às " +horaInicial+":"+minsIniciais+"hrs");
                $("#modal-agenda .modal-body .data-final p").text("Data de Término: "+diaFinal+"/"+mesFinal+"/"+anoFinal+ " às " +horaFinal+":"+minsFinais+"hrs");
            },
            locale: 'pt-br',
            editable: true,
            events: @json($events),
        });
        calendar.render();
    });
</script>
@endpush
@section('conteudo')
{{ Breadcrumbs::render('agenda') }}
    <section class="container-fluid">
        <div class="row">
            <div></div>
                <!-- Calendario -->
                <div class="col-12 order-1">
                    <div class="">
                      <div class="">
                        <div id='calendar'></div>
                      </div>
                    </div>
                    <br /><br />
                </div>
            </div>
            <br>
        </div>
        <div class="row">
          @if ($eventosLista)              
            @foreach ($eventosLista as $evento)      
                @include('site.agenda._list_item' , ['evento' => $evento])
            @endforeach
          @endif
        </div>
    </section>
    <br><br><br><br>
    <!--Modal-->
    @if ($evento)
        @include('site.agenda._modal_agenda' , ['evento' => $evento])
    @endif
@endsection


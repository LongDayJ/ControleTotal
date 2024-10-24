<x-appBarAdmin title="Agendamento">
  <!-- Adicionar o CSS do FullCalendar via CDN -->
  <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css' rel='stylesheet' />
  <!-- Adicionar o CSS do Bootstrap via CDN -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

  <!-- Adicionar CSS para definir o tamanho do calendário -->
  <style>
    #calendar {
      max-width: 900px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ccc;
      /* Adicionar uma borda para visualização */
    }
  </style>

  <!-- Div onde o calendário será renderizado -->
  <div id='calendar'></div>

  <!-- Modal HTML -->
  <div id="eventModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Criar/Editar Evento</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="eventForm">
            <div class="form-group">
              <label for="eventTitle">Nome do Paciente</label>
              <select class="form-control" id="eventTitle">
                <option value="">Selecione um paciente</option>
                @foreach($pacientes as $paciente)
                <option value="{{ $paciente->name }}">{{ $paciente->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="dentistaNome">Nome do Dentista</label>
              <select class="form-control" id="dentistaNome">
                <option value="">Selecione um dentista</option>
                @foreach($dentistas as $dentista)
                <option value="{{ $dentista->nome }}">{{ $dentista->nome }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="eventDescription">Observação</label>
              <textarea class="form-control" id="eventDescription" rows="3" style="resize: none;" required></textarea>
            </div>
            <div class="form-group">
              <label for="eventDate">Data</label>
              <input type="date" class="form-control" id="eventDate" required>
            </div>
            <div class="form-group">
              <label for="eventStartTime">Hora de Início</label>
                <input type="time" class="form-control" id="eventStartTime" step="900" required>
            </div>
            <div class="form-group">
              <label for="eventEndTime">Hora de Fim</label>
              <input type="time" class="form-control" id="eventEndTime" step="900" required>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="saveEvent">Salvar</button>
          <button type="button" class="btn btn-danger" id="deleteEvent">Excluir</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Adicionar o JS do jQuery via CDN -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <!-- Adicionar o JS do Popper.js via CDN -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <!-- Adicionar o JS do Bootstrap via CDN -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Adicionar o JS do FullCalendar via CDN -->
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js'></script>
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/interaction.min.js'></script>

  <!-- Inicializar o calendário -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      console.log('DOM fully loaded and parsed'); // Adicionar log para depuração
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        selectable: true,
        editable: true,
        locale: 'pt-br',
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay createEventButton' // Adicionar botões de navegação
        },
        customButtons: {
          createEventButton: {
            text: '+ Criar Evento',
            click: function() {
              $('#eventModal').modal('show');
              $('#saveEvent').off('click').on('click', function() {
                var title = $('#eventTitle').val();
                var dateStr = $('#eventDate').val();
                var startTime = $('#eventStartTime').val();
                var endTime = $('#eventEndTime').val();
                var start = new Date(dateStr + 'T' + startTime);
                var end = new Date(dateStr + 'T' + endTime);

                if (title && !isNaN(start) && !isNaN(end)) {
                  calendar.addEvent({
                    title: title,
                    start: start,
                    end: end,
                    allDay: false
                  });
                  $('#eventModal').modal('hide');
                } else {
                  alert('Por favor, preencha todos os campos corretamente.');
                }
              });
            }
          }
        },
        buttonText: {
          today: 'Hoje',
          month: 'Mês',
          week: 'Semana',
          day: 'Dia'
        },
        events: function(fetchInfo, successCallback, failureCallback) {
          $.ajax({
            url: '/events',
            method: 'GET',
            success: function(data) {
              var events = data.map(function(event) {
                return {
                  id: event.id,
                  title: event.title, // Usando o campo correto para o título
                  start: event.start, // Usando o campo correto para o início
                  end: event.end // Usando o campo correto para o fim
                };
              });
              successCallback(events);
            },
            error: function() {
              failureCallback();
            }
          });
        },
        select: function(info) {
          // Função de seleção de data
          $('#eventDate').val(info.startStr);
          $('#eventModal').modal('show');
          $('#saveEvent').off('click').on('click', function() {
            var title = $('#eventTitle').val();
            var dateStr = $('#eventDate').val();
            var startTime = $('#eventStartTime').val();
            var endTime = $('#eventEndTime').val();
            var start = new Date(dateStr + ' ' + startTime);
            var end = new Date(dateStr + ' ' + endTime);

            console.log('Title:', title);

            if (title && !isNaN(start) && !isNaN(end)) {
              calendar.addEvent({
                title: title,
                start: start,
                end: end,
                allDay: false
              });
              $('#eventModal').modal('hide');
            } else {
              alert('Por favor, preencha todos os campos corretamente.');
            }
          });
          calendar.unselect();
        },
        eventClick: function(info) {
          $('#eventTitle').val(info.event.title);
          $('#eventDate').val(info.event.start.toISOString().split('T')[0]);
          $('#eventStartTime').val(info.event.start.toISOString().split('T')[1].substring(0, 5));
          $('#eventEndTime').val(info.event.end ? info.event.end.toISOString().split('T')[1].substring(0, 5) : '');

          $('#eventModal').modal('show');

          $('#saveEvent').off('click').on('click', function() {
            var newTitle = $('#eventTitle').val();
            var newStartTime = $('#eventStartTime').val();
            var newEndTime = $('#eventEndTime').val();
            var newStart = new Date($('#eventDate').val() + 'T' + newStartTime);
            var newEnd = new Date($('#eventDate').val() + 'T' + newEndTime);
            var description = $('#eventDescription').val();
            var paciente = $('#eventTitle').val();
            var dentista = $('#dentistaNome').val();
            var date = $('#eventDate').val();

            console.log('Description:', description);
            console.log('Paciente:', paciente);
            console.log('Dentista:', dentista);

            if (newTitle && newStartTime && newEndTime && description && date && paciente && dentista) {
              $.ajax({
                url: '/agendamento',
                method: 'POST',
                data: {
                  _token: '{{ csrf_token() }}', // Adicionar token CSRF
                  date: date,
                  title: newTitle,
                  start: newStartTime,
                  end: newEndTime,
                  description: description,
                  paciente: paciente,
                  dentista: dentista
                },
                success: function(response) {
                  console.log('Success:', response);
                  info.event.setProp('title', newTitle);
                  info.event.setStart(newStart);
                  info.event.setEnd(newEnd);
                },
                error: function(xhr, status, error) {
                  console.error('Error:', error);
                  console.error('Status:', status);
                  console.error('Response:', xhr.responseText);
                }
              });
            } else {
              alert('Por favor, preencha todos os campos corretamente.');
            }
            $('#eventModal').modal('hide');
          });

          $('#deleteEvent').off('click').on('click', function() {
            info.event.remove();
            $('#eventModal').modal('hide');
          });
        }
      });
      console.log('Calendar initialized:', calendar); // Adicionar log para depuração
      calendar.render();

      //Adicionar evento de clique no botão de salvar
      document.getElementById('saveEvent').addEventListener('click', function() {
        var title = document.getElementById('eventTitle').value;
        var startTime = document.getElementById('eventStartTime').value;
        var endTime = document.getElementById('eventEndTime').value;
        var date = document.getElementById('eventDate').value;
        var description = document.getElementById('eventDescription').value;
        var paciente = document.getElementById('eventTitle').value;
        var dentista = document.getElementById('dentistaNome').value;

        console.log('Title:', title);
        console.log('Start Time:', startTime);
        console.log('End Time:', endTime);
        console.log('Date:', date);
        console.log('Description:', description);
        console.log('Paciente:', paciente);
        console.log('Dentista:', dentista);

        if (title && startTime && endTime && description && date && paciente && dentista) {
          $.ajax({
            url: '/agendamento',
            method: 'POST',
            data: {
              _token: '{{ csrf_token() }}', // Adicionar token CSRF
              date: date,
              title: title,
              start: startTime,
              end: endTime,
              description: description,
              paciente: paciente,
              dentista: dentista
            },
            success: function(response) {
              console.log('Success:', response);
            },
            error: function(xhr, status, error) {
              console.error('Error:', error);
              console.error('Status:', status);
              console.error('Response:', xhr.responseText);
            }
          });
        } else {
          console.error('Todos os campos são obrigatórios.');
        }
      });
    });
  </script>
</x-appBarAdmin>
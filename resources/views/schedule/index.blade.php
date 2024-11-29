<x-appBarAdmin title="Agendamento">
  <!-- Adicionar o CSS do FullCalendar via CDN -->
  <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css' rel='stylesheet' />
  <!-- Adicionar o CSS do Bootstrap via CDN -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

  <!-- Adicionar CSS para definir o tamanho do calendário -->
  <style>
    #calendar {
      max-height: 90vh;
      margin: 0 auto;
      padding: 10px;
      border: 1px solid #ccc;
      /* Adicionar uma borda para visualização */
    }
  </style>

  <!-- Div onde o calendário será renderizado -->
  <div id='calendar'></div>

  <div id="createEventModal" class="modal" tabindex="1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Criar Evento</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="createEventForm">
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
                @foreach($medicos as $medico)
                <option value="{{ $medico->name }}">{{ $medico->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="procedimento">Procedimento</label>
              <select class="form-control" id="procedimento">
                <option value="">Selecione um procedimento</option>
                @foreach($procedimentos as $procedimento)
                <option value="{{ $procedimento->nome }}">{{ $procedimento->nome }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="eventDescription">Observação</label>
              <textarea class="form-control" id="eventDescription" rows="2" style="resize: none;" required></textarea>
            </div>
            <div class="form-group">
              <label for="eventDate">Data</label>
              <input type="date" class="form-control" id="eventDate" required>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="eventStartTimeHour">Horário</label>
                  <select class="form-control" id="eventStartTimeHour" required>
                    @for ($i = 8; $i < 13; $i++)
                      <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
                      @endfor
                      @for ($i = 14; $i < 19; $i++)
                        <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
                      @endfor
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="eventStartTimeMinute">Minuto</label>
                  <select class="form-control" id="eventStartTimeMinute" required>
                    @foreach ([0, 15, 30, 45] as $minute)
                    <option value="{{ str_pad($minute, 2, '0', STR_PAD_LEFT) }}">{{ str_pad($minute, 2, '0', STR_PAD_LEFT) }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="eventColor">Cor do Evento</label>
              <select class="form-control" id="eventColor">
                <option value="#ff0000" style="color: #ff0000;">Vermelho</option>
                <option value="#00ff00" style="color: #00ff00;">Verde</option>
                <option value="#0000ff" style="color: #0000ff;">Azul</option>
                <option value="#ffff00" style="color: #ffff00;">Amarelo</option>
                <option value="#ff00ff" style="color: #ff00ff;">Rosa</option>
                <option value="#00ffff" style="color: #00ffff;">Ciano</option>
                <option value="#ff8000" style="color: #ff8000;">Laranja</option>
                <option value="#8000ff" style="color: #8000ff;">Roxo</option>
              </select>
            </div>
            @csrf
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="saveCreateEvent">Salvar</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>

  <div id="editEventModal" class="modal" tabindex="1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Editar Evento</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="editEventForm">
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
                @foreach($medicos as $medico)
                <option value="{{ $medico->name }}">{{ $medico->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="procedimento">Procedimento</label>
              <select class="form-control" id="procedimento">
                <option value="">Selecione um procedimento</option>
                @foreach($procedimentos as $procedimento)
                <option value="{{ $procedimento->nome }}">{{ $procedimento->nome }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="eventDescription">Observação</label>
              <textarea class="form-control" id="eventDescription" rows="2" style="resize: none;" required></textarea>
            </div>
            <div class="form-group">
              <label for="eventDate">Data</label>
              <input type="date" class="form-control" id="eventDate" required>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="eventStartTimeHour">Horário</label>
                  <select class="form-control" id="eventStartTimeHour" required>
                    @for ($i = 8; $i < 13; $i++)
                      <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
                      @endfor
                      @for ($i = 14; $i < 19; $i++)
                        <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
                        @endfor
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="eventStartTimeMinute">Minuto</label>
                  <select class="form-control" id="eventStartTimeMinute" required>
                    @foreach ([0, 15, 30, 45] as $minute)
                    <option value="{{ str_pad($minute, 2, '0', STR_PAD_LEFT) }}">{{ str_pad($minute, 2, '0', STR_PAD_LEFT) }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="eventColor">Cor do Evento</label>
              <select class="form-control" id="eventColor">
                <option value="#ff0000" style="color: #ff0000;">Vermelho</option>
                <option value="#00ff00" style="color: #00ff00;">Verde</option>
                <option value="#0000ff" style="color: #0000ff;">Azul</option>
                <option value="#ffff00" style="color: #ffff00;">Amarelo</option>
                <option value="#ff00ff" style="color: #ff00ff;">Rosa</option>
                <option value="#00ffff" style="color: #00ffff;">Ciano</option>
                <option value="#ff8000" style="color: #ff8000;">Laranja</option>
                <option value="#8000ff" style="color: #8000ff;">Roxo</option>
              </select>
            </div>
            @csrf
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="saveEditEvent">Salvar</button>
          <button type="button" class="btn btn-danger" id="deleteEvent">Excluir</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
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
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'timeGridWeek',
        selectable: true,
        editable: true,
        locale: 'pt-br',
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay createEventButton'
        },
        customButtons: {
          createEventButton: {
            text: '+ Criar Evento',
            click: function() {
              $('#createEventModal').modal('show');
              $('#saveCreateEvent').off('click').on('click', function() {
                saveEvent(calendar);
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
                  title: event.title,
                  start: event.start,
                  end: event.start,
                  color: event.color,
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
          $('#createEventModal').modal('show');
          $('#saveCreateEvent').off('click').on('click', function() {
            saveEvent(calendar);
          });
          calendar.unselect();
        },
        eventContent: function(info) {
          var eventTitle = info.event.title;
          var eventStart = info.event.start.toLocaleTimeString([], {
            hour: '2-digit',
            minute: '2-digit'
          });
          var eventElement = document.createElement('div');
          eventElement.innerHTML = '<span style="cursor:pointer;">🗑️</span> - ' + eventStart + ' - ' + eventTitle;

          eventElement.querySelector('span').addEventListener('click', function() {
            if (confirm('Deseja realmente excluir este evento?')) {
              $.ajax({
                url: '/agendamento/' + info.event.id,
                method: 'DELETE',
                data: {
                  _token: '{{ csrf_token() }}',
                  event: info.event.id
                },
                success: function(response) {
                  info.event.remove();
                  console.log('Event deleted:', response);
                },
                error: function(xhr, status, error) {
                  console.error('Error:', error);
                  console.error('Status:', status);
                  console.error('Response:', xhr.responseText);
                }
              });
            }
          });
          return {
            domNodes: [eventElement]
          };
        },
        eventClick: function(info) {
          if (info.jsEvent.target.tagName !== 'SPAN') {
            window.location.href = '/agendamento/' + info.event.id + '/edit';
          }
        },
        businessHours: [{
            daysOfWeek: [0, 1, 2, 3, 4, 5, 6],
            startTime: '08:00',
            endTime: '12:00'
          },
          {
            daysOfWeek: [0, 1, 2, 3, 4, 5, 6],
            startTime: '14:00',
            endTime: '18:00'
          }
        ],
        slotMinTime: '08:00:00',
        slotMaxTime: '18:00:01'
      });

      calendar.render();
    });

    function saveEvent(calendar, event = null) {
      var title = $('#eventTitle').val();
      var startHour = $('#eventStartTimeHour').val();
      var startMinute = $('#eventStartTimeMinute').val();
      var startTime = startHour + ':' + startMinute + ':00';
      var date = $('#eventDate').val();
      var description = $('#eventDescription').val();
      var paciente = $('#eventTitle').val();
      var dentista = $('#dentistaNome').val();
      var color = $('#eventColor').val();

      if (title && startTime && description && date && paciente && dentista && color) {
        var start = new Date(date + 'T' + startTime);
        var eventData = {
          title: title,
          start: start,
          description: description,
          paciente: paciente,
          dentista: dentista,
          color: color,
          allDay: false
        };

        if (event) {
          event.setProp('title', title);
          event.setStart(start);
          event.setExtendedProp('description', description);
          event.setExtendedProp('dentista', dentista);
          event.setProp('backgroundColor', color);
        } else {
          calendar.addEvent(eventData);
        }

        $.ajax({
          url: '/agendamento',
          method: 'POST',
          data: {
            _token: '{{ csrf_token() }}',
            date: date,
            title: title,
            start: startTime,
            description: description,
            paciente: paciente,
            dentista: dentista,
            color: color
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

        $('#createEventModal').modal('hide');
        $('#editEventModal').modal('hide');
      } else {
        alert('Por favor, preencha todos os campos corretamente.');
      }
    }
  </script>
</x-appBarAdmin>
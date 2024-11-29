<x-appBarAdmin>
    
</x-appBarAdmin>

@section('content')
    <div class="container">
        <h1>Detalhes da Consulta</h1>
        <div class="card">
            <div class="card-header">
                Consulta #{{ $consulta->id }}
            </div>
            <div class="card-body">
                <p><strong>Queixa:</strong> {{ $consulta->queixa }}</p>
                <p><strong>Medicação Pré-Consulta:</strong> {{ $consulta->medicacao_pre_consulta }}</p>
                <p><strong>Alergia:</strong> {{ $consulta->alergia }}</p>
                <p><strong>Cirurgia:</strong> {{ $consulta->cirurgia }}</p>
                <p><strong>Sangramento:</strong> {{ $consulta->sangramento }}</p>
                <p><strong>Cicatrização:</strong> {{ $consulta->cicatrizacao }}</p>
                <p><strong>Falta de Ar:</strong> {{ $consulta->falta_ar }}</p>
                <p><strong>Gestante:</strong> {{ $consulta->gestante }}</p>
                <p><strong>Semanas:</strong> {{ $consulta->semanas }}</p>
                <p><strong>Observações:</strong> {{ $consulta->observacoes }}</p>
                <p><strong>Agendamento ID:</strong> {{ $consulta->agendamento_id }}</p>
                <p><strong>Usuário:</strong> {{ $consulta->user->name }}</p>
                <a href="{{ route('consultas.index') }}" class="btn btn-primary">Voltar</a>
            </div>
        </div>
    </div>
@endsection
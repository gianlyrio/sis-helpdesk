@extends('layouts.app') 
 
@section('title', 'Painel de Chamados - Help Desk') 
 
@section('content') 
   
   
 
<div class="d-flex justify-content-between align-items-center mb-4"> 
    <div> 
        <h3 class="fw-bold text-dark mb-1">Painel de Chamados</h3> 
        <p class="text-muted small mb-0">Gerencie e acompanhe as solicitações 
de suporte técnico.</p> 
    </div> 
    <a href="{{ route('tickets.create') }}" class="btn btn-primary shadow-sm"> 
        <i class="bi bi-plus-lg me-1"></i> Novo Chamado 
    </a> 
</div> 
 
<!-- Card de Filtros e Pesquisa --> 
<div class="card border-0 shadow-sm mb-4"> 
    <div class="card-body p-3"> 
        <form action="{{ route('tickets.index') }}" method="GET" class="row g
2"> 
            <div class="col-md-4"> 
                <div class="input-group"> 
                    <span class="input-group-text bg-white border-end-0"><i 
class="bi bi-search text-muted"></i></span> 
                    <input type="text" name="search" class="form-control 
border-start-0" placeholder="Buscar por título ou solicitante..." value="{{ 
request('search') }}"> 
                </div> 
            </div> 
            <div class="col-md-3"> 
                <select name="department_id" class="form-select"> 
                    <option value="">Todos os Departamentos</option> 
                    @foreach($departments as $dept) 
                        <option value="{{ $dept->id }}" {{ 
request('department_id') == $dept->id ? 'selected' : '' }}> 
                            {{ $dept->name }} 
                        </option> 
                    @endforeach 
                </select> 
            </div> 
            <div class="col-md-3"> 
                <select name="status" class="form-select"> 
                    <option value="">Todos os Status</option> 
                    <option value="Aberto" {{ request('status') == 'Aberto' ? 
'selected' : '' }}>Aberto</option> 
                    <option value="Em Atendimento" {{ request('status') == 'Em 
Atendimento' ? 'selected' : '' }}>Em Atendimento</option> 
                    <option value="Concluído" {{ request('status') == 
'Concluído' ? 'selected' : '' }}>Concluído</option> 
                </select> 
            </div> 
            <div class="col-md-2 d-flex gap-2"> 
   
   
 
                <button type="submit" class="btn btn-secondary w-100"><i 
class="bi bi-funnel me-1"></i> Filtrar</button> 
                <a href="{{ route('tickets.index') }}" class="btn btn-outline
secondary" title="Limpar Filtros"><i class="bi bi-x-lg"></i></a> 
            </div> 
        </form> 
    </div> 
</div> 
 
<!-- Tabela de Chamados --> 
<div class="card border-0 shadow-sm"> 
    <div class="card-body p-0"> 
        <div class="table-responsive"> 
            <table class="table table-hover align-middle mb-0"> 
                <thead class="table-light"> 
                    <tr> 
                        <th class="ps-4">ID / Título</th> 
                        <th>Departamento</th> 
                        <th>Solicitante</th> 
                        <th>Prioridade</th> 
                        <th>Status</th> 
                        <th>Abertura</th> 
                        <th class="text-end pe-4">Ações</th> 
                    </tr> 
                </thead> 
                <tbody> 
                    @forelse($tickets as $ticket) 
                        <tr> 
                            <td class="ps-4"> 
                                <span class="fw-bold text-dark">#{{ $ticket->id }} — {{ $ticket->title }}</span> 
                            </td> 
                            <td> 
                                <span class="badge bg-light text-dark 
border">{{ $ticket->department->name ?? 'N/A' }}</span> 
                            </td> 
                            <td><i class="bi bi-person me-1 text-muted"></i>{{ 
$ticket->requester_name }}</td> 
                            <td> 
                                @if($ticket->priority == 'Urgente') 
                                    <span class="badge bg
danger">Urgente</span> 
                                @elseif($ticket->priority == 'Alta') 
                                    <span class="badge bg-warning text
dark">Alta</span> 
                                @elseif($ticket->priority == 'Média') 
                                    <span class="badge bg-info text
dark">Média</span> 
   
   
 
                                @else 
                                    <span class="badge bg
secondary">Baixa</span> 
                                @endif 
                            </td> 
                            <td> 
                                @if($ticket->status == 'Aberto') 
                                    <span class="badge bg-primary rounded
pill">Aberto</span> 
                                @elseif($ticket->status == 'Em Atendimento') 
                                    <span class="badge bg-warning text-dark 
rounded-pill">Em Atendimento</span> 
                                @else 
                                    <span class="badge bg-success rounded
pill">Concluído</span> 
                                @endif 
                            </td> 
                            <td class="small text-muted">{{ $ticket->created_at->format('d/m/Y H:i') }}</td> 
                            <td class="text-end pe-4"> 
                                <div class="btn-group btn-group-sm"> 
                                    <a href="{{ route('tickets.edit', $ticket->id) }}" class="btn btn-outline-secondary" title="Editar"> 
                                        <i class="bi bi-pencil"></i> 
                                    </a> 
                                    <form action="{{ route('tickets.destroy', 
$ticket->id) }}" method="POST" class="d-inline"> 
                                        @csrf 
                                        @method('DELETE') 
                                        <button type="submit" class="btn btn
outline-danger" title="Excluir" onclick="return confirm('Tem certeza que 
deseja remover este chamado?')"> 
                                            <i class="bi bi-trash"></i> 
                                        </button> 
                                    </form> 
                                </div> 
                            </td> 
                        </tr> 
                    @empty 
                        <tr> 
                            <td colspan="7" class="text-center py-5 text
muted"> 
                                <i class="bi bi-inbox fs-1 d-block mb-2 text
secondary"></i> 
                                Nenhum chamado encontrado para os filtros 
selecionados. 
                            </td> 
                        </tr> 
   
   
 
                    @endforelse 
                </tbody> 
            </table> 
        </div> 
    </div> 
    @if($tickets->hasPages()) 
        <div class="card-footer bg-white border-0 py-3"> 
            {{ $tickets->links() }} 
        </div> 
    @endif 
</div> 
@endsection
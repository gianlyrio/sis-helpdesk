@extends('layouts.app') 
 
@section('title', 'Editar Chamado #' . $ticket->id) 
 
@section('content') 
<div class="row justify-content-center"> 
    <div class="col-lg-8"> 
        <div class="d-flex justify-content-between align-items-center mb-4"> 
            <h3 class="fw-bold text-dark mb-0">Editar Chamado #{{ $ticket->id 
}}</h3> 
            <a href="{{ route('tickets.index') }}" class="btn btn-outline
secondary btn-sm"> 
                <i class="bi bi-arrow-left me-1"></i> Voltar 
            </a> 
        </div> 
   
   
 
 
        <div class="card border-0 shadow-sm"> 
            <div class="card-body p-4"> 
                <form action="{{ route('tickets.update', $ticket->id) }}" 
method="POST"> 
                    @csrf                    @method('PUT') 
                     
                    <div class="row g-3"> 
                        <div class="col-12"> 
                            <label for="title" class="form-label fw
semibold">Título do Chamado <span class="text-danger">*</span></label> 
                            <input type="text" class="form-control 
@error('title') is-invalid @enderror" id="title" name="title" value="{{ 
old('title', $ticket->title) }}"> 
                            @error('title') <div class="invalid-feedback">{{ 
$message }}</div> @enderror 
                        </div> 
 
                        <div class="col-md-6"> 
                            <label for="department_id" class="form-label fw
semibold">Departamento <span class="text-danger">*</span></label> 
                            <select class="form-select @error('department_id') 
is-invalid @enderror" id="department_id" name="department_id"> 
                                @foreach($departments as $dept) 
                                    <option value="{{ $dept->id }}" {{ 
old('department_id', $ticket->department_id) == $dept->id ? 'selected' : '' 
}}> 
                                        {{ $dept->name }} 
                                    </option> 
                                @endforeach 
                            </select> 
                            @error('department_id') <div class="invalid
feedback">{{ $message }}</div> @enderror 
                        </div> 
 
                        <div class="col-md-6"> 
                            <label for="status" class="form-label fw
semibold">Status do Atendimento <span class="text-danger">*</span></label> 
                            <select class="form-select @error('status') is
invalid @enderror" id="status" name="status"> 
                                <option value="Aberto" {{ old('status', 
$ticket->status) == 'Aberto' ? 'selected' : '' }}>Aberto</option> 
                                <option value="Em Atendimento" {{ 
old('status', $ticket->status) == 'Em Atendimento' ? 'selected' : '' }}>Em 
Atendimento</option> 
                                <option value="Concluído" {{ old('status', 
$ticket->status) == 'Concluído' ? 'selected' : '' }}>Concluído</option> 
   
   
 
                            </select> 
                            @error('status') <div class="invalid-feedback">{{ 
$message }}</div> @enderror 
                        </div> 
 
                        <div class="col-md-6"> 
                            <label for="requester_name" class="form-label fw
semibold">Solicitante <span class="text-danger">*</span></label> 
                            <input type="text" class="form-control 
@error('requester_name') is-invalid @enderror" id="requester_name" 
name="requester_name" value="{{ old('requester_name', $ticket->requester_name) 
}}"> 
                            @error('requester_name') <div class="invalid
feedback">{{ $message }}</div> @enderror 
                        </div> 
 
                        <div class="col-md-6"> 
                            <label for="priority" class="form-label fw
semibold">Prioridade <span class="text-danger">*</span></label> 
                            <select class="form-select @error('priority') is
invalid @enderror" id="priority" name="priority"> 
                                <option value="Baixa" {{ old('priority', 
$ticket->priority) == 'Baixa' ? 'selected' : '' }}>Baixa</option> 
                                <option value="Média" {{ old('priority', 
$ticket->priority) == 'Média' ? 'selected' : '' }}>Média</option> 
                                <option value="Alta" {{ old('priority', 
$ticket->priority) == 'Alta' ? 'selected' : '' }}>Alta</option> 
                                <option value="Urgente" {{ old('priority', 
$ticket->priority) == 'Urgente' ? 'selected' : '' }}>Urgente</option> 
                            </select> 
                            @error('priority') <div class="invalid
feedback">{{ $message }}</div> @enderror 
                        </div> 
 
                        <div class="col-12"> 
                            <label for="description" class="form-label fw
semibold">Descrição <span class="text-danger">*</span></label> 
                            <textarea class="form-control 
@error('description') is-invalid @enderror" id="description" 
name="description" rows="4">{{ old('description', $ticket->description) 
}}</textarea> 
                            @error('description') <div class="invalid
feedback">{{ $message }}</div> @enderror 
                        </div> 
 
                        <div class="col-12 text-end pt-3"> 
                            <a href="{{ route('tickets.index') }}" class="btn 
btn-light me-2">Cancelar</a> 
<button type="submit" class="btn btn-primary px
4"><i class="bi bi-save me-1"></i> Salvar Alterações</button> 
</div> 
</div> 
</form> 
</div> 
</div> 
</div> 
</div> 
@endsection 
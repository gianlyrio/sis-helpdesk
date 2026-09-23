@extends('layouts.app') 
 
@section('title', 'Abrir Chamado - Help Desk') 
 
@section('content') 
<div class="row justify-content-center"> 
    <div class="col-lg-8"> 
        <div class="d-flex justify-content-between align-items-center mb-4"> 
            <h3 class="fw-bold text-dark mb-0">Abrir Novo Chamado</h3> 
            <a href="{{ route('tickets.index') }}" class="btn btn-outline secondary btn-sm"> 
                <i class="bi bi-arrow-left me-1"></i> Voltar </a> 
        </div> 
 
        <div class="card border-0 shadow-sm"> 
            <div class="card-body p-4"> 
                <form action="{{ route('tickets.store') }}" method="POST"> 
                    @csrf 
                    <div class="row g-3"> 
                        <div class="col-12"> 
                            <label for="title" class="form-label fw
semibold">Título do Chamado <span class="text-danger">*</span></label> 
                            <input type="text" class="form-control 
@error('title') is-invalid @enderror" id="title" name="title" value="{{ 
old('title') }}" placeholder="Ex: Impressora do setor financeiro não 
responde"> 
                            @error('title') <div class="invalid-feedback">{{ 
$message }}</div> @enderror 
                        </div> 
 
   
   
 
                        <div class="col-md-6"> 
                            <label for="department_id" class="form-label fw semibold">Departamento Destino <span class="text-danger">*</span></label> 
                            <select class="form-select @error('department_id') is-invalid @enderror" id="department_id" name="department_id"> 
                                <option value="" selected disabled>Selecione o setor...</option> 
                                @foreach($departments as $dept) 
                                    <option value="{{ $dept->id }}" {{old('department_id') == $dept->id ? 'selected' : '' }}> 
                                        {{ $dept->name }} ({{ $dept->code }})
                                    </option> 
                                @endforeach 
                            </select> 
                            @error('department_id') <div class="invalid feedback">{{ $message }}</div> @enderror 
                        </div> 
 
                        <div class="col-md-6"> 
                            <label for="requester_name" class="form-label fw
semibold">Nome do Solicitante <span class="text-danger">*</span></label> 
                            <input type="text" class="form-control @error('requester_name') is-invalid @enderror" id="requester_name" 
name="requester_name" value="{{ old('requester_name') }}" placeholder="Seu nome completo"> 
                            @error('requester_name') <div class="invalid feedback">{{ $message }}</div> @enderror 
                        </div> 
 
                        <div class="col-md-6"> 
                            <label for="priority" class="form-label fw
semibold">Nível de Prioridade <span class="text-danger">*</span></label> 
                            <select class="form-select @error('priority') is invalid @enderror" id="priority" name="priority"> 
                                <option value="" selected 
disabled>Selecione...</option> 
                                <option value="Baixa" {{ old('priority') == 'Baixa' ? 'selected' : '' }}>Baixa</option> 
                                <option value="Média" {{ old('priority') == 'Média' ? 'selected' : '' }}>Média</option> 
                                <option value="Alta" {{ old('priority') == 'Alta' ? 'selected' : '' }}>Alta</option> 
                                <option value="Urgente" {{ old('priority') == 'Urgente' ? 'selected' : '' }}>Urgente</option> 
                            </select> 
                            @error('priority') <div class="invalid
feedback">{{ $message }}</div> @enderror 
   
   
 
                        </div> 
 
                        <div class="col-12"> 
                            <label for="description" class="form-label fw
semibold">Descrição Detalhada do Problema <span class="text
danger">*</span></label> 
                            <textarea class="form-control 
@error('description') is-invalid @enderror" id="description" 
name="description" rows="4" placeholder="Detalhe o ocorrido, mensagens de erro 
exibições ou procedimentos já tentados...">{{ old('description') }}</textarea> 
                            @error('description') <div class="invalid
feedback">{{ $message }}</div> @enderror 
                        </div> 
 
                        <div class="col-12 text-end pt-3"> 
                            <a href="{{ route('tickets.index') }}" class="btn 
btn-light me-2">Cancelar</a> 
                            <button type="submit" class="btn btn-primary px
4"><i class="bi bi-check-lg me-1"></i> Confirmar Abertura</button> 
                        </div> 
                    </div> 
                </form> 
            </div> 
        </div> 
    </div> 
</div> 
@endsection
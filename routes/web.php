<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;

// Interface principal / Redirecionamento amigável
Route::get('/', [TicketController::class, 'index'])->name('home');

// Grupo de Rotas do CRUD de Chamados
    Route::prefix('tickets')->name('tickets.')->group(function () {
    Route::get('/', [TicketController::class, 'index'])->name('index');
    Route::get('/create', [TicketController::class, 'create'])->name('create');
    Route::post('/', [TicketController::class, 'store'])->name('store');
    Route::get('/{ticket}/edit', [TicketController::class, 'edit'])->name('edit');
    Route::put('/{ticket}', [TicketController::class, 'update'])->name('update');
    
    // Rota customizada PATCH para alternar status
    Route::patch('/{ticket}/status', [TicketController::class, 'toggleStatus'])->name('status');
    
    Route::delete('/{ticket}', [TicketController::class, 'destroy'])->name('destroy');
});

// ROTA TEMPORÁRIA PARA FORÇAR A CRIAÇÃO DOS DEPARTAMENTOS
Route::get('/forcar-banco', function() {
    $departments = [
        ['name' => 'TI / Suporte', 'code' => 'TI'],
        ['name' => 'Sistema & Software', 'code' => 'SOFT'],
        ['name' => 'Recursos Humanos', 'code' => 'RH'],
        ['name' => 'Infraestrutura & Manutenção', 'code' => 'INFRA'],
    ];

    foreach ($departments as $dept) {
        // Cria se não existir para não duplicar
        \App\Models\Department::firstOrCreate(['code' => $dept['code']], $dept);
    }

    return "Departamentos criados com sucesso no banco de dados ativo!";
});

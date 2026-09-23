<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Department;
use App\Http\Requests\TicketRequest;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    // Listagem com Filtros Avançados e Paginação
    public function index(Request $request)
    {
        $query = Ticket::with('department');

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('requester_name', 'like', "%{$search}%"); // <--- O PONTO E VÍRGULA FOI ADICIONADO AQUI
            });
        }

        if ($request->filled('department_id')) {
            $query->where('department_id', $request->input('department_id'));
        }

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        $tickets = $query->paginate(10)->withQueryString();
        $departments = Department::all();

        return view('tickets.index', compact('tickets', 'departments'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('tickets.create', compact('departments'));
    }

    public function store(TicketRequest $request)
    {
        Ticket::create($request->validated());
        return redirect()->route('tickets.index')->with('success', 'Chamado aberto com sucesso!');
    }

    public function edit(Ticket $ticket)
    {
        $departments = Department::all();
        return view('tickets.edit', compact('ticket', 'departments'));
    }

    public function update(TicketRequest $request, Ticket $ticket)
    {
        $ticket->update($request->validated());
        return redirect()->route('tickets.index')->with('success', 'Chamado atualizado com sucesso!');
    }

    // Altera rapidamente o status do chamado sequencialmente (PATCH)
    public function toggleStatus(Ticket $ticket)
    {
        $statusOrder = ['Aberto', 'Em Atendimento', 'Concluído'];
        $currentKey = array_search($ticket->status, $statusOrder);
        
        // Avança para o próximo status ou volta para o início caso queira rotacionar
        $nextStatus = $statusOrder[($currentKey + 1) % count($statusOrder)];
        
        $ticket->update(['status' => $nextStatus]);
        return redirect()->route('tickets.index')->with('success', "Status do chamado alterado para {$nextStatus}!");
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('tickets.index')->with('success', 'Chamado excluído com sucesso!');
    }
}

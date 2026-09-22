!DOCTYPE html> 
<html lang="pt-BR"> 
   
   
 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>@yield('title', 'Help Desk - Sistema de Chamados')</title> 
    <!-- Bootstrap 5 CSS --> 
    <link 
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
rel="stylesheet"> 
    <!-- Bootstrap Icons --> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap
icons.css" rel="stylesheet"> 
    <style> 
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            background-color: #f4f6f9; 
        } 
        #wrapper { 
            display: flex; 
            width: 100%; 
            min-height: 100vh; 
        } 
        #sidebar-wrapper { 
            width: 260px; 
            background-color: #212529; 
            color: #fff; 
            flex-shrink: 0; 
            transition: margin 0.25s ease-out; 
        } 
        #sidebar-wrapper .sidebar-heading { 
            padding: 1.25rem 1.5rem; 
            font-size: 1.2rem; 
            font-weight: bold; 
            border-bottom: 1px solid rgba(255, 255, 255, 0.1); 
            background-color: #1a1d20; 
        } 
        #sidebar-wrapper .list-group { 
            width: 100%; 
        } 
        #sidebar-wrapper .list-group-item { 
            border: none; 
            padding: 0.85rem 1.5rem; 
            background-color: transparent; 
            color: #adb5bd; 
            font-size: 0.95rem; 
            display: flex; 
            align-items: center; 
            gap: 12px; 
   
   
 
            transition: all 0.2s; 
        } 
        #sidebar-wrapper .list-group-item:hover,  
        #sidebar-wrapper .list-group-item.active { 
            color: #fff; 
            background-color: #0d6efd; 
            font-weight: 500; 
        } 
        #page-content-wrapper { 
            flex-grow: 1; 
            overflow-x: hidden; 
        } 
        .top-navbar { 
            background-color: #fff; 
            border-bottom: 1px solid #e3e6f0; 
            padding: 0.8rem 1.5rem; 
        } 
    </style> 
</head> 
<body> 
    <div id="wrapper"> 
        <!-- Sidebar / Menu Lateral --> 
        <aside id="sidebar-wrapper"> 
            <div class="sidebar-heading text-primary"> 
                <i class="bi bi-headset me-2"></i>TechAssist 
            </div> 
            <div class="list-group list-group-flush mt-3"> 
                <a href="{{ route('tickets.index') }}" class="list-group-item 
list-group-item-action {{ request()->routeIs('tickets.index') ? 'active' : '' 
}}"> 
                    <i class="bi bi-grid-1x2-fill"></i> Painel de Chamados 
                </a> 
                <a href="{{ route('tickets.create') }}" class="list-group-item 
list-group-item-action {{ request()->routeIs('tickets.create') ? 'active' : '' 
}}"> 
                    <i class="bi bi-plus-circle-fill"></i> Abrir Novo Chamado 
                </a> 
            </div> 
            <div class="p-3 mt-auto text-muted small position-absolute bottom
0"> 
                <hr class="border-secondary mb-2"> 
                <span>Help Desk v2.0 &bull; SENAI</span> 
            </div> 
        </aside> 
 
        <!-- Área de Conteúdo Principal --> 
        <div id="page-content-wrapper"> 
            <!-- Navbar Superior --> 
   
   
 
            <header class="top-navbar d-flex justify-content-between align
items-center"> 
                <span class="fw-semibold text-secondary"> 
                    <i class="bi bi-building me-1"></i> Sistema de Suporte por 
Departamento 
                </span> 
                <div class="d-flex align-items-center gap-2"> 
                    <span class="badge bg-light text-dark border px-3 py-2"> 
                        <i class="bi bi-person-circle me-1"></i> Operador 
                    </span> 
                </div> 
            </header> 
 
            <!-- Conteúdo Injetado das Views Filhas --> 
            <main class="container-fluid p-4"> 
                <!-- Mensagens Flash de Sucesso --> 
                @if(session('success')) 
                    <div class="alert alert-success alert-dismissible fade 
show border-0 shadow-sm mb-4" role="alert"> 
                        <i class="bi bi-check-circle-fill me-2"></i>{{ 
session('success') }} 
                        <button type="button" class="btn-close" data-bs
dismiss="alert" aria-label="Close"></button> 
                    </div> 
                @endif 
 
                @yield('content') 
            </main> 
        </div> 
    </div> 
 
    <!-- Bootstrap 5 JS Bundle --> 
    <script 
src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"><
/script> 
</body> 
</html>
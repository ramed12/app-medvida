<!-- Sidebar -->
<ul class="navbar-nav  sidebar sidebar-dark accordion bg-white" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('dashboard.home')}}">
        {{-- <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div> --}}
        <img src="{!! asset('assets/img/logo.png')!!}" alt="Logo Medvida" class="logo-in-sidebar">
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link text-gray-800" href="{{route('dashboard.home')}}">
            <i class="fas fa-fw fa-tachometer-alt text-gray-800"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider text-gray-800">

    <!-- Heading -->
    <div class="sidebar-heading text-gray-800">
        Serviços
    </div>

    <li class="nav-item">
        <a class="nav-link text-gray-800" href="{{route('dashboard.specialties')}}">
            <i class="fas fa-chart-bar text-gray-800"></i>
            <span>Especialidades</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-gray-800" href="{{route('dashboard.plan')}}">
            <i class="fas fa-newspaper text-gray-800"></i>
            <span>Planos</span></a>
    </li>

    <hr class="sidebar-divider my-0">
    <div class="sidebar-heading text-gray-800">
        Prestador de Serviços
    </div>
    <li class="nav-item">
        <a class="nav-link text-gray-800" href="{!! route('dashboard.provider') !!}">
            <i class="fas fa-users text-gray-800"></i>
            <span>Prestador de Serviço</span></a>
    </li>

    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading text-gray-800">
        Usuários
    </div>

    {{-- <li class="nav-item">
        <a class="nav-link" href="{!! route('dashboard.category') !!}">
            <i class="far fa-list-alt"></i>
            <span>Categorias</span></a>
    </li> --}}

    <!-- Nav Item - Pages Collapse Menu -->

    <li class="nav-item">
        <a class="nav-link text-gray-800" href="{!! route('dashboard.patient') !!}">
            <i class="fas fa-users text-gray-800"></i>
            <span>Pacientes do sistema</span></a>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading text-gray-800">
        Administrador
    </div>

    <li class="nav-item">
        <a class="nav-link text-gray-800" href="{!! route('dashboard.administrator') !!}">
            <i class="fas fa-users text-gray-800"></i>
            <span>Usuários</span></a>
    </li>

    <hr class="sidebar-divider">
    <span class="nav-item text-center">Desenvolvido por:</span>
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="https://gaotech.com.br/">
        <img src="{!! asset('assets/img/logo-gao-transparent.png')!!}" alt="Logo GaoTech" style="width: 9rem;">
    </a>
    
    <hr class="sidebar-divider d-none d-md-block">
    <br />

    <!-- Sidebar Toggler (Sidebar) -->
    {{-- <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div> --}}

</ul>
<!-- End of Sidebar -->

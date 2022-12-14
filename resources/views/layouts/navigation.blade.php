@section('sidebar')
        <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top mb-5">
            <div class="container-fluid">
            <a class="navbar-brand" href="#">Zamix</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav  ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Página Inicial</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Relatórios
                    </a>
                    <ul class="dropdown-menu ml-5" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Relatório de Entrada</a></li>
                        <li><a class="dropdown-item" href="#">Relatório de Saída</a></li>
                    </ul>
                </li>
                </ul>
            </div>
            </div>
        </nav>
    @show

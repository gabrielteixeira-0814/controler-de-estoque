@section('sidebar')
        <nav class="navbar navbar-expand-md navbar-light bg-white fixed-top mb-5 shadow">
            <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home')}}" style="color: #ff5400; font-weight: bold;"><span class="h1">Estoque</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav  ms-auto">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('home')}}">Página Inicial</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Relatórios Gerenciais
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="margin">
                        <li><a class="dropdown-item" href="#"data-toggle="modal" data-target="#entryReport" >Relatório de Entrada</a></li>
                        <li><a class="dropdown-item" href="#">Relatório de Saída</a></li>
                    </ul>
                </li>
                </ul>
            </div>
            </div>
        </nav>
    @show

     <!-- Relatório de entrada -->
<div class="modal fade" id="entryReport" tabindex="-1" role="dialog" aria-labelledby="modalFomrentryReport" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalFomrentryReport" style="font-weight: bold; color: #ff5400">Relatório de Entrada</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body modalFormGif">
            <div class="form-entryProduct">
                <form method="POST" action="{{ route('report') }} " id="logout-form" class="form_entryProduct" id="form_entryProduct">
                    @csrf
                    <div class="mb-3">
                      <label for="dateIni" class="form-label">Data Inicial</label>
                      <input type="text" class="form-control" id="dateIni" name="dateIni" aria-describedby="dateIni" placeholder="01/01/2022">
                    </div>
                    <div class="mb-3">
                        <label for="dateFin" class="form-label">Data Final</label>
                        <input type="text" class="form-control" id="dateFin" name="dateFin" aria-describedby="dateFin" placeholder="31/01/2022">
                      </div>
                </form>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary closeCreate" data-dismiss="modal">Fechar</button>
          <button type="button" class="btn btn-primary saveForm" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">Executar</button>
        </div>
      </div>
    </div>
  </div>

@section('script')

@endsection

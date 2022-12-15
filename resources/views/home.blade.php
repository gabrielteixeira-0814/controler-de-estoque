@extends('layouts.layout')

@section('content')
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="row">
                <div class="col-md-6">
                    <a href="{{ route('pageUser')}}" class="bloco-link">
                        <div class="border bloco text-white p-5 rounded shadow text-center">
                            <div class="d-inline h3" style="margin-right: 25px;">Usuários</div>
                            <div class="d-inline h3"><i class='bx bxs-user'></i></div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('pageProduct')}}" class="bloco-link">
                        <div class="border bloco text-white p-5 rounded shadow text-center">
                            <div class="d-inline h3" style="margin-right: 25px;">Produtos</div>
                            <div class="d-inline h3"><i class='bx bx-package'></i></div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 mt-4">
                    <a href="{{ route('pageEntryProduct')}}" class="bloco-link">
                        <div class="border text-white p-5 rounded shadow text-center bloco">
                            <div class="d-inline h3" style="margin-right: 25px;">Entrada de produto</div>
                            <div class="d-inline h3"><i class='bx bx-up-arrow-alt'></i></div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 mt-4">
                    <a href="#" class="bloco-link outputProduct" data-toggle="modal" data-target="#message">
                        <div class="border bloco text-white p-5 rounded shadow text-center">
                            <div class="d-inline h3" style="margin-right: 25px;">Saída de produto</div>
                            <div class="d-inline h3"><i class='bx bx-down-arrow-alt' ></i></i></div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 mt-4">
                    <a href="#" class="bloco-link requisitionProduct" data-toggle="modal" data-target="#message">
                        <div class="border bloco text-white p-5 rounded shadow text-center">
                            <div class="d-inline h3" style="margin-right: 25px;">Requisição de produtos</div>
                            <div class="d-inline h3"><i class='bx bx-clipboard'></i></i></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

 <!-- Message -->
 <div class="modal fade" id="message" tabindex="-1" role="dialog" aria-labelledby="message" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="message" style="font-weight: bold; color: #ff5400"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body message">
            <div class="message">
               <div class='alert alert-danger text-center' role='alert'>Essa página ainda não foi desenvolvida! Peço desculpas  :( </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary closeCreate" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>

@section('script')
    <script src="{{ asset('js/home.js') }}" defer></script>
@endsection


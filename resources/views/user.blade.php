
@extends('layouts.layout')

<div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-10 mt-5" id="successDelete">
        <div class="alert alert-success text-center" role="alert">
          Usuário deletado com sucesso!
        </div>
      </div>
    </div>
    <div class="h2 pt-5" style="font-weight: bold; color: #0099B2">Usuários</div>
      <div class="row bg-white rounded px-3">
        <div class="col-6 py-4">
          <div>
            <span class="p-2" >Pesquisar:</span>
            <input type="text" class="rounded" id="search" name="search" placeholder="John Doe...">
          </div>
        </div>
        <div class="col-6 py-3 text-end">
          <button type="button" class="btn btn-success createUser" data-toggle="modal" data-target="#userForm" >Usuário <i class='bx bx-user nav_icon' style="font-size: 15px"></i></button>
        </div>
          <div class="users_data"></div>
      </div>
  </div>

  <!-- Modal form Users -->
<div class="modal fade" id="userForm" tabindex="-1" role="dialog" aria-labelledby="modalFomrUser" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalFomrUser" style="font-weight: bold; color: #0099B2">Criar Usuário</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="row justify-content-center">
        <div class="col-10 mt-2">
          <div class="alert alert-success text-center" id="successCreate" role="alert">
            Usuário criado com sucesso!
          </div>
        </div>
      </div>

      {{-- Error message --}}
      <div class="row justify-content-center ">
        <div class="col-10 mt-2">
          <div class="msgError"></div>
        </div>
      </div>

      {{-- Gif --}}
      <div class="row justify-content-center mt-5" id="gifForm">
        <div class="col-1 text-center">
          <div class="loading">Loading&#8230;</div>
        </div>
      </div>

      <div class="modal-body modalFormGif">
          <div class="form-user"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary closeCreate" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary saveForm">Salvar</button>
      </div>
    </div>
  </div>
</div>



















<!-- Modal Edit -->
<div class="modal fade" id="user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold; color: #0099B2">Editar Usuário</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="row justify-content-center">
        <div class="col-10 mt-2">
          <div class="alert alert-success text-center" id="successEdit" role="alert">
            Usuário editado com sucesso!
          </div>
        </div>
      </div>

      {{-- Error message --}}
      <div class="row justify-content-center ">
        <div class="col-10 mt-2">
          <div class="msgErrorEdit"></div>
        </div>
      </div>


      {{-- Gif --}}
      <div class="row justify-content-center mt-5" id="gif">
        <div class="col-1 text-center">
          <div class="loading">Loading&#8230;</div>
        </div>
      </div>

      <div class="modal-body modalGif">
          <form action="" class="form_user_edit" id="form_user_edit">
              <input type="hidden" class="id" id="id" name="id">
              <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control name" id="name" name="name" aria-describedby="name">
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control email" id="email" name="email">
              </div>
              <div class="mb-3">
                <label for="checkbox" class="form-label">Permissões</label>
              </div>
              <div class="form-check divlistRole">
                <div class="listRole"></div>
              </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary closeEdit" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary saveEdit">Salvar</button>
      </div>
    </div>
  </div>
</div>

@section('script')
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/user.js') }}" defer></script>
@endsection


@extends('layouts.layout')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-10 mt-5" id="successDelete">
                <div class="alert alert-success text-center" role="alert">
                    Produto deletado com sucesso!
                </div>
            </div>
            <div class="col-10 mt-5" id="errorDelete">
                <div class="alert alert-danger text-center" role="alert">
                    Primeiro exclua o produto do cadastro de estoque!
                </div>
            </div>
        </div>
        <div class="h2 pt-5" style="font-weight: bold; color: #ff5400">Produto</div>
        <div class="row bg-white rounded px-3">
            <div class="col-6 py-4">
                {{-- <div>
                  <span class="p-2" >Pesquisar:</span>
                  <input type="text" class="rounded" id="search" name="search" placeholder="John Doe...">
                </div> --}}
            </div>
            <div class="col-6 py-3 text-end">
                <button type="button" class="btn btn-success createProduct" data-toggle="modal" data-target="#ProductForm" >Produto <i class='bx bx-package nav_icon' style="font-size: 15px"></i></button>
            </div>
            <div class="products_data"></div>
        </div>
    </div>

    <!-- Modal form Product -->
    <div class="modal fade" id="productForm" tabindex="-1" role="dialog" aria-labelledby="modalFomrProduct" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalFomrUser" style="font-weight: bold; color: #ff5400">Criar Produto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="row justify-content-center">
                    <div class="col-10 mt-2">
                        <div class="alert alert-success text-center" id="successCreate" role="alert">
                            Produto criado com sucesso!
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

                    {{-- Form Product --}}
                    <div class="form-product"></div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary closeCreate" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary saveForm">Salvar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold; color: #ff5400">Editar Produto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="row justify-content-center">
                    <div class="col-10 mt-2">
                        <div class="alert alert-success text-center" id="successEdit" role="alert">
                            Produto editado com sucesso!
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
                    <form action="" class="form_product_edit" id="form_product_edit">
                        <input type="hidden" class="id" id="id" name="id">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nome</label>
                            <input type="text" class="form-control name" id="name" name="name" aria-describedby="name">
                        </div>
                        <div class="mb-3">
                            <label for="costPrice" class="form-label">Preço de custo</label>
                            <input type="text" class="form-control costPrice" id="costPrice" name="costPrice">
                        </div>
                        <div class="mb-3">
                            <label for="salePrice" class="form-label">Preço de venda</label>
                            <input type="text" class="form-control salePrice" id="salePrice" name="salePrice">
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label">Tipo</label>
                            <select class="form-select" id="type" name="type" aria-label="Default select example">
                                <option id = "1" value="1">Simples</option>
                                <option id = "2" value="2">Composto</option>
                            </select>
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
@endsection

@section('script')
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/product.js') }}" defer></script>
@endsection

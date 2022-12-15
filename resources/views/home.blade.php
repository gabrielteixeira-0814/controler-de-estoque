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
                    <a href="###as" class="bloco-link">
                        <div class="border bloco text-white p-5 rounded shadow text-center">
                            <div class="d-inline h3" style="margin-right: 25px;">Saída de produto</div>
                            <div class="d-inline h3"><i class='bx bx-down-arrow-alt' ></i></i></div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 mt-4">
                    <a href="###as" class="bloco-link">
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

@section('script')

@endsection


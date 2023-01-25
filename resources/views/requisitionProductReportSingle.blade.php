
@extends('layouts.layout')

<div class="container mt-5">
    <div class="py-5 mb-5">
        <div class="border border-5 p-5">
            <div class="text-center my-3"><h3>Relatório de Requisição de Produto</h3></div>
            <div class="row justify-content-center">
                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <table class='table table-light'>
                                <thead>
                                    <tr class="text-center" style="border: 1px solid #000000">
                                        <th scope="col" class="header">
                                            Nome
                                        </th>
                                        <th scope="col" class="header">
                                            Data da retirada
                                        </th>
                                        <th scope="col" class="header">
                                            Produto
                                        </th>
                                        <th scope="col" class="header">
                                            Quantidade
                                        </th>
                                    </tr>
                                </thead>


                                <tr class="">
                                    <td>
                                        <div class="title-requisition-number p-1">N° da requisição: {{ $listRequisicao['requisition'] }}</div>
                                        <div class="title-requisition-number text-center mt-2">{{ $listRequisicao['name'] }}</div>
                                        @foreach ($listRequisitionProduct as $requisitionProduct)

                                            @if($requisitionProduct->numero == $listRequisicao['requisition'])
                                                <tr>
                                                    <td class="text-center"></td>
                                                    <td class="text-center">
                                                        {{ date("d/m/Y", strtotime($requisitionProduct->dataRetirada)) }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $requisitionProduct->nomeProduto }}
                                                    </td>
                                                    <td class="valueTable line">
                                                        {{ $requisitionProduct->quantidade ? number_format($requisitionProduct->quantidade, 2, ',', '.') : "-" }}
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr class="text-center">
                                    <td class="totalGeral"></td>
                                    <td class="totalGeral"></td>
                                    <td class="totalGeral"></td>
                                    <td class="valueTable line totalGeral"> <span class="p-4">Total Geral:</span> {{ $totalQuant ? number_format($totalQuant, 2, ',', '.') : "-" }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('script')

@endsection

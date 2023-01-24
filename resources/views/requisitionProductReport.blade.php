
@extends('layouts.layout')

<div class="container mt-5">
    <div class="py-5 mb-5">
        <div class="border border-5 p-5">
            <div>
                <div class="text-right mb-2" style="text-align: right !important; font-weight: bold; font-size: 12px;">Data Inicial: {{ $dateIni ? date("d/m/Y", strtotime($dateIni)) : "-" }}</div>
                <div class="text-right" style="text-align: right !important; font-weight: bold; font-size: 12px; "><span class="" style="padding-right: 7px;">Data Final: {{ $dateFin ? date("d/m/Y", strtotime($dateFin)) : "-" }}</span></div>
            </div>
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

                                @foreach($listRequisicao as $requisitionGroup)
                                <tr class="">
                                    <td>
                                        <div class="title-requisition-number p-2">N° da requisição: {{ $requisitionGroup['requisition'] }}</div>
                                        @foreach ($listRequisitionProduct as $requisitionProduct)

                                            @if($requisitionProduct->numero == $requisitionGroup['requisition'])
                                                <tr>
                                                    <td class="text-center">
                                                        {{ $requisitionProduct->nome }}
                                                    </td>
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
                                <tr class="text-center">
                                    <td class="total"></td>
                                    <td class="total"></td>
                                    <td class="total"></td>
                                    <td class="valueTable line total"> <span class="p-4">Total:</span> {{ $requisitionGroup['totalPorRequisicao'] ? number_format($requisitionGroup['totalPorRequisicao'], 2, ',', '.') : "-" }}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
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

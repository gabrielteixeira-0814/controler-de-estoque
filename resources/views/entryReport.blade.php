
@extends('layouts.layout')

<div class="container mt-5">
    <div class="pt-5">
        <div class="border border-5 p-5">
            <div>
                <div class="text-right mb-2" style="text-align: right !important; font-weight: bold; font-size: 12px;">Data Inicial: {{ date("d/m/Y", strtotime($dateIni)) }}</div>
                <div class="text-right" style="text-align: right !important; font-weight: bold; font-size: 12px;"><span class="" style="padding-right: 7px;">Data Final: {{ date("d/m/Y", strtotime($dateFin)) }}</span></div>
                <div class="text-center my-3"><h3>Relatório de Entrada de Produto</h3></div>
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
                                            Quantidade
                                        </th>
                                        <th scope="col" class="header">
                                            Preço de Custo
                                        </th>
                                        <th scope="col" class="header">
                                            Preço de Venda
                                        </th>
                                    </tr>
                                    </thead>
                                    @foreach ($listEntryReport as $entryReport)
                                        <tr>
                                            <td class="text-center">
                                                {{ $entryReport->name }}
                                            </td>
                                            <td class="valueTable line">
                                                {{ number_format($entryReport->quantidade, 2, ',', '.') }}
                                            </td>
                                            <td class="valueTable line">
                                                {{ $entryReport->precoCustoTotal ? number_format($entryReport->precoCustoTotal, 2, ',', '.') : "-" }}
                                            </td>
                                            <td class="valueTable line">
                                                {{ $entryReport->precoVendaTotal ? number_format($entryReport->precoVendaTotal, 2, ',', '.') : "-" }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr class="text-center">
                                        <td class="total"></td>
                                        <td class="valueTable line total"> <span class="p-4">Total:</span> {{ $totalQuant ? number_format($totalQuant, 2, ',', '.') : "-" }}</td>
                                        <td class="valueTable line total"> <span class="p-4">Total:</span> {{ $totalPrecoCusto ? number_format($totalPrecoCusto, 2, ',', '.') : "-" }}</td>
                                        <td class="valueTable line total"> <span class="p-4">Total:</span> {{ $totalPrecoVenda ? number_format($totalPrecoVenda, 2, ',', '.') : "-" }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('script')

@endsection


@extends('layouts.layout')

<div class="container mt-5">
    <div class="pt-5">
        <div class="text-right mb-2" style="text-align: right !important; font-weight: bold;">Data Inicial: {{ date("d/m/Y", strtotime($dateIni)) }}</div>
        <div class="text-right" style="text-align: right !important; font-weight: bold;"><span class="" style="padding-right: 7px;">Data Final: {{ date("d/m/Y", strtotime($dateFin)) }}</span></div>
    </div>
    <div class="text-center my-3"><h3>Relatório de Saída de Produto</h3></div>
    <div class="row justify-content-center">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-8">
                    <table class='table table-light'>
                        <thead>
                            <tr class="text-center">
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

                        @foreach ($listOutPutReport as $outputReport)
                            <tr>
                                <td class="text-center">
                                    {{ $outputReport->name }}
                                </td>
                                <td class="valueTable line">
                                    {{ number_format($outputReport->quantidade, 2, ',', '.') }}
                                </td>
                                <td class="valueTable line">
                                    {{ $outputReport->precoCustoTotal ? number_format($outputReport->precoCustoTotal, 2, ',', '.') : "-" }}
                                </td>
                                <td class="valueTable line">
                                    {{ $outputReport->precoVendaTotal ? number_format($outputReport->precoVendaTotal, 2, ',', '.') : "-" }}
                                </td>
                            </tr>
                            @endforeach
                        <tr class="text-center">
                            <td></td>
                            <td class="valueTable line"> <span class="p-4">Total:</span> {{ $totalQuant ? number_format($totalQuant, 2, ',', '.') : "-" }}</td>
                            <td class="valueTable line"> <span class="p-4">Total:</span> {{ $totalPrecoCusto ? number_format($totalPrecoCusto, 2, ',', '.') : "-" }}</td>
                            <td class="valueTable line"> <span class="p-4">Total:</span> {{ $totalPrecoVenda ? number_format($totalPrecoVenda, 2, ',', '.') : "-" }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@section('script')

@endsection

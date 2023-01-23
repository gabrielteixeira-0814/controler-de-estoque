
@extends('layouts.layout')

<div class="container mt-5">
    <div class="pt-5">
        <div class="text-right mb-2" style="text-align: right !important;">Data Inicial: {{ date("d/m/Y", strtotime($dateIni)) }}</div>
        <div class="text-right" style="text-align: right !important;"><span class="" style="padding-right: 7px;">Data Final: {{ date("d/m/Y", strtotime($dateFin)) }}</span></div>
    </div>
    <div class="text-center my-5"><h3>Relatório de Entrada de Produto</h3></div>
    <div class="row justify-content-center">
        <div class="container mt-5">
            <table class='table table-light'>
                <thead>
                    <tr style="background: #000000 !important;">
                        <th scope="col">
                            Nome
                         </th>
                         <th scope="col">
                             Quantidade
                         </th>
                         <th scope="col">
                             Preço de Custo
                         </th>
                         <th scope="col">
                             Preço de Venda
                         </th>
                    </tr>
                </thead>

                @foreach ($listEntryReport as $entryReport)
                    <tr>
                        <td>
                            {{ $entryReport->name }}
                        </td>
                        <td>
                            {{ $entryReport->quantidade }}
                        </td>
                        <td>
                            {{ $entryReport->precoCustoTotal ? str_replace('.', ',', $entryReport->precoCustoTotal) : "-" }}
                        </td>
                        <td>
                            {{ $entryReport->precoVendaTotal ? str_replace('.', ',', $entryReport->precoVendaTotal) : "-" }}
                        </td>
                    </tr>
                @endforeach
                </tr>
            </table>
        </div>
    </div>
</div>

@section('script')

@endsection

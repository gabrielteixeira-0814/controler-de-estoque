
@extends('layouts.layout')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="container mt-5">
            <table class='table'>
                <tr>
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

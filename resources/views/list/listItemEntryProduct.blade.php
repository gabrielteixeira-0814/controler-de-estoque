<table class='table'>
    <tr>
        <th scope="col">
            Código de entrada
        </th>
        <th scope="col">
            Data de Entrada
        </th>
        <th scope="col">
            Total
        </th>
        <th scope="col">
            Ações
        </th>
    </tr>

    @foreach ($listEntryProduct as $entryProduct)
        <tr>
            <td>
                {{ $entryProduct->id }}
            </td>
            <td>
                {{ date("d/m/Y", strtotime($entryProduct->entryDate)) }}
            </td>
            <td>
                {{ $entryProduct->total ? str_replace('.', ',', $entryProduct->total) : "-" }}
            </td>
            <td>
                <button class='delete actionButton' id='deleteEntryProduct' value="{{ $entryProduct->id }}" name="{{ $entryProduct ->id }}" data-toggle="tooltip" data-placement="top" title="Deleta" style="color: #e93535; font-size: 16px;" ><i class='bx bxs-trash'></i></button>
            </td>
        </tr>
    @endforeach
    </tr>
</table>

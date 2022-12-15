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
                <button class='edit entryProductButton' id='editEntryProduct' value="{{ $entryProduct->id }}" name="{{ $entryProduct->id }}" data-toggle="modal" data-target="#entryProduct" style="color: #0099B2; font-size: 16px;"><i class='bx bxs-edit-alt'></i></button>
                <button class='delete entryProductButton' id='deleteEntryProduct' value="{{ $entryProduct->id }}" name="{{ $entryProduct ->id }}" style="color: #e93535; font-size: 16px;" ><i class='bx bxs-trash'></i></button>
            </td>
        </tr>
    @endforeach
    </tr>
</table>

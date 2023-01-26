<table class='table'>
    <tr class="text-center">
        <th scope="col">
            Código do produto
        </th>
        <th scope="col">
            Produto
        </th>
        <th scope="col">
            Quantidade
        </th>
        <th scope="col">
            Ações
        </th>
    </tr>

    @foreach ($listItemEntryProduct as $itemEntryProduct)
        <tr class="text-center">
            <td>
                {{ $itemEntryProduct->product_id }}
            </td>
            <td>
                {{ $itemEntryProduct->name }}
{{--                {{ date("d/m/Y", strtotime($entryProduct->entryDate)) }}--}}
            </td>
            <td>
                {{ $itemEntryProduct->quantity }}
{{--                {{ $entryProduct->total ? str_replace('.', ',', $entryProduct->total) : "-" }}--}}
            </td>
            <td>
                <button class='delete actionButton' id='deleteEntryProduct' value="{{ $itemEntryProduct->id }}" name="{{ $itemEntryProduct ->id }}" data-toggle="tooltip" data-placement="top" title="Deleta" style="color: #e93535; font-size: 16px;" ><i class='bx bxs-trash'></i></button>
            </td>
        </tr>
    @endforeach
    </tr>
</table>

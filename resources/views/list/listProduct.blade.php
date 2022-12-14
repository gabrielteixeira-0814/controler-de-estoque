<table class='table'>
    <tr>
        <th scope="col">
            Código
        </th>
        <th scope="col">
            Nome
        </th>
        <th scope="col">
            Preço de custo
        </th>
        <th scope="col">
            Preço de venda
        </th>
        <th scope="col">
            Tipo
        </th>
    </tr>

    @foreach ($listProduct as $product)
        <tr>
            <td>
                {{ $product->id }}
            </td>
            <td>
                {{ $product->name }}
            </td>
            <td>
                {{ $product->costPrice }}
            </td>
            <td>
                {{ $product->salePrice }}
            </td>
            <td>
                {{ $product->type }}
            </td>
            <td>
                <button class='edit productButton' id='editProduct' value="{{ $product->id }}" name="{{ $product->id }}" data-toggle="modal" data-target="#user" style="color: #0099B2; font-size: 16px;"><i class='bx bxs-edit-alt'></i></button>
                <button class='delete productButton' id='deleteProduct' value="{{ $product->id }}" name="{{ $product->id }}" style="color: #e93535; font-size: 16px;" ><i class='bx bxs-trash'></i></button>
            </td>
        </tr>
    @endforeach
    </tr>
</table>

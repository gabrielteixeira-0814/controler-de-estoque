<table class='table'>
    <tr>
        <th scope="col">
            Código
        </th>
        <th scope="col">
            Nome
        </th>
        <th scope="col">
            Preço de custo (R$)
        </th>
        <th scope="col">
            Preço de venda (R$)
        </th>
        <th scope="col">
            Tipo
        </th>
        <th scope="col">
            Ações
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
                {{ $product->costPrice ? str_replace('.', ',', $product->costPrice) : "-" }}
            </td>
            <td>
                {{ str_replace('.', ',', $product->salePrice) }}
            </td>
            <td>
                @if ($product->type == 1)
                    simples
                @else
                    composto
                @endif
            </td>
            <td>
                <button class='edit productButton' id='editProduct' value="{{ $product->id }}" name="{{ $product->id }}" data-toggle="modal" data-target="#product" style="color: #0099B2; font-size: 16px;"><i class='bx bxs-edit-alt'></i></button>
                <button class='delete productButton' id='deleteProduct' value="{{ $product->id }}" name="{{ $product->id }}" style="color: #e93535; font-size: 16px;" ><i class='bx bxs-trash'></i></button>
            </td>
        </tr>
    @endforeach
    </tr>
</table>

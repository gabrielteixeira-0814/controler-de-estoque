<table class='table'>
    <tr>
        <th scope="col">
            N° Requisição
        </th>
        <th scope="col">
            Responsável
        </th>
        <th scope="col">
            Data da geração
        </th>
        <th scope="col">
            Ações
        </th>
    </tr>

    @foreach ($listRequisitionProduct as $requisitionProduct)
        <tr>
            <td>
                {{ $requisitionProduct->id }}
            </td>
            <td>
                {{ $requisitionProduct->name }}
            </td>
            <td>
                {{ date("d/m/Y", strtotime($requisitionProduct->date)) }}
            </td>
            <td>
                <a href="{{ route('reportRequisitionSingle', $requisitionProduct->id) }}" class='edit actionButton' id='reportRequisitionProduct' value="{{ $requisitionProduct->id }}" name="{{ $requisitionProduct->id }}" style="color: #0099B2; font-size: 16px;"><i class='bx bxs-report'></i></a>
                <button class='edit actionButton' id='editRequisitionProduct' value="{{ $requisitionProduct->id }}" name="{{ $requisitionProduct->id }}" data-toggle="modal" data-target="#requisitionProduct" style="color: #0099B2; font-size: 16px;"><i class='bx bxs-edit-alt'></i></button>
                <button class='delete actionButton' id='deleteRequisitionProduct' value="{{ $requisitionProduct->id }}" name="{{ $requisitionProduct->id }}" style="color: #e93535; font-size: 16px;" ><i class='bx bxs-trash'></i></button>
            </td>
        </tr>
    @endforeach
    </tr>
</table>
<div>
    <button id="anterior">&lsaquo; Anterior</button>
    <span id="numeracao"></span>
    <button id="proximo">Próximo &rsaquo;</button>
</div>

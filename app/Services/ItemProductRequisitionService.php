<?php

namespace App\Services;
use App\Repositories\ItemProductRequisitionRepositoryInterface;
use Validator;

class ItemProductRequisitionService
{
    private $repo;

    public function __construct(ItemProductRequisitionRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function store($request)
    {
        // Converte number(values)
        $request['product_requisition_id '] = intval($request['product_requisition_id ']);
        $request['product_id'] = intval($request['product_id']);
        $request['quantity'] = intval($request['quantity']);

        $mensagens = [
            'product_requisition_id.required' => 'O id da requisição do produto é obrigatório!',
            'product_requisition_id.required' => 'O id deve ser um valor!',

            'product_id.required' => 'O id do produto é obrigatório!',
            'product_id.required' => 'O id deve ser um valor!',

            'quantity.required' => 'A quantidade é obrigatório!',
            'quantity.required' => 'A quantidade deve ser um valor!',
        ];

        $data = $request->validate([
            'product_requisition_id' => 'required|numeric',
            'product_id' => 'required|numeric',
            'quantity' => 'required|numeric',
        ], $mensagens);

        $data = [$data['product_requisition_id'],$data['product_id'],$data['quantity']];

        return $this->repo->store($data);
    }

    public function getList()
    {
        return $this->repo->getList();
    }

    public function get($id)
    {
        return $this->repo->get($id);
    }

    public function update($request, $id)
    {
       // Converte number(values)
        $request['product_requisition_id '] = intval($request['product_requisition_id ']);
        $request['product_id'] = intval($request['product_id']);
        $request['quantity'] = intval($request['quantity']);

        $mensagens = [
            'product_requisition_id.required' => 'O id da requisição do produto é obrigatório!',
            'product_requisition_id.required' => 'O id deve ser um valor!',

            'product_id.required' => 'O id do produto é obrigatório!',
            'product_id.required' => 'O id deve ser um valor!',

            'quantity.required' => 'A quantidade é obrigatório!',
            'quantity.required' => 'A quantidade deve ser um valor!',
        ];

        $data = $request->validate([
            'product_requisition_id' => 'required|numeric',
            'product_id' => 'required|numeric',
            'quantity' => 'required|numeric',
        ], $mensagens);

        $data = [$data['product_requisition_id'],$data['product_id'],$data['quantity']];

        return $this->repo->update($data, $id);
    }

    public function destroy($id)
    {
        return $this->repo->destroy($id);
    }
}

?>

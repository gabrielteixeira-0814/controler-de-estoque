<?php

namespace App\Services;
use App\Repositories\InventoryRepositoryInterface;
use Validator;

class InventoryService
{
    private $repo;

    public function __construct(InventoryRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function store($request)
    {
        // Converte number(values)
        $request['product_id'] = intval($request['product_id']);
        $request['quantity'] = intval($request['quantity']);

        $mensagens = [
            'product_id.required' => 'O id do produto é obrigatório!',
            'product_id.numeric' => 'O id deve ser um valor!',

            'quantity.required' => 'A quantidade é obrigatório!',
            'quantity.numeric' => 'A quantidade deve ser um valor!',
        ];

        $data = $request->validate([
            'product_id' => 'required|numeric',
            'quantity' => 'required|numeric'
        ], $mensagens);

        $data = [$data['product_id'],$data['quantity']];

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
        $request['product_id'] = intval($request['product_id']);
        $request['quantity'] = intval($request['quantity']);

        $mensagens = [
            'product_id.required' => 'O id do produto é obrigatório!',
            'product_id.numeric' => 'O id deve ser um valor!',

            'quantity.required' => 'A quantidade é obrigatório!',
            'quantity.numeric' => 'A quantidade deve ser um valor!',
        ];

        $data = $request->validate([
            'product_id' => 'required|numeric',
            'quantity' => 'required|numeric'
        ], $mensagens);

        $data = [$data['product_id'],$data['quantity']];

        return $this->repo->update($data, $id);
    }

    public function destroy($id)
    {
        return $this->repo->destroy($id);
    }
}

?>

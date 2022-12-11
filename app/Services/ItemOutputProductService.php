<?php

namespace App\Services;
use App\Repositories\ItemOutputProductRepositoryInterface;
use Validator;
use Illuminate\Support\Facades\Storage;


class ItemOutputProductService
{
    private $repo;

    public function __construct(ItemOutputProductRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function store($request)
    {
        // Converte number(values)
        $request['output_product_id'] = intval($request['output_product_id']);
        $request['product_id'] = intval($request['product_id']);
        $request['quantity'] = intval($request['quantity']);
        $request['value'] = floatval($request['value']);

        $mensagens = [
            'output_product_id.required' => 'O id da saída é obrigatório!',
            'output_product_id.numeric' => 'O id deve ser um valor!',

            'product_id.required' => 'O id do produto é obrigatório!',
            'product_id.numeric' => 'O id deve ser um valor!',

            'quantity.required' => 'A quantidade do item é obrigatório!',
            'quantity.numeric' => 'A quantidade deve ser um valor!',

            'value.required' => 'O valor é obrigatório!',
            'value.numeric' => 'O valor do item deve ser um valor!',
        ];

        $data = $request->validate([
            'output_product_id' => 'required|numeric',
            'product_id' => 'required|numeric',
            'quantity' => 'required|numeric',
            'value' => 'required|numeric',
        ], $mensagens);

        $data = [$data['output_product_id'],$data['product_id'],$data['quantity'],$data['value']];

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
        $request['output_product_id'] = intval($request['output_product_id']);
        $request['product_id'] = intval($request['product_id']);
        $request['quantity'] = intval($request['quantity']);
        $request['value'] = floatval($request['value']);

        $mensagens = [
            'output_product_id.required' => 'O id da saída é obrigatório!',
            'output_product_id.numeric' => 'O id deve ser um valor!',

            'product_id.required' => 'O id do produto é obrigatório!',
            'product_id.numeric' => 'O id deve ser um valor!',

            'quantity.required' => 'A quantidade do item é obrigatório!',
            'quantity.numeric' => 'A quantidade deve ser um valor!',

            'value.required' => 'O valor é obrigatório!',
            'value.numeric' => 'O valor do item deve ser um valor!',
        ];

        $data = $request->validate([
            'output_product_id' => 'required|numeric',
            'product_id' => 'required|numeric',
            'quantity' => 'required|numeric',
            'value' => 'required|numeric',
        ], $mensagens);

        $data = [$data['output_product_id'],$data['product_id'],$data['quantity'],$data['value']];


        return $this->repo->update($data, $id);
    }

    public function destroy($id)
    {
        return $this->repo->destroy($id);
    }
}

?>

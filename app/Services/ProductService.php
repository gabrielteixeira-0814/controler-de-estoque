<?php

namespace App\Services;
use App\Repositories\ProductRepositoryInterface;
use App\Services\InventoryService;
use Validator;

class ProductService
{
    private $repo;

    public function __construct(ProductRepositoryInterface $repo, InventoryService $serviceInventory)
    {
        $this->repo = $repo;
        $this->service = $service;
    }

    public function store($request)
    {
        // Converte number(values)
        $request['costPrice'] = floatval($request['costPrice']);
        $request['salePrice'] = floatval($request['salePrice']);

        $mensagens = [
            'name.required' => 'O nome do produto é obrigatório!',
            'name.min' => 'É necessário no mínimo 5 caracteres no nome do produto!',
            'name.max' => 'É necessário no Máximo 255 caracteres no nome do produto!',

            'costPrice.required' => 'O preço de custo é obrigatório!',
            'costPrice.numeric' => 'O preço de custo deve ser um valor!',

            'salePrice.required' => 'O preço de venda é obrigatório!',
            'salePrice.numeric' => 'O preço de venda deve ser um valor!',

            'type.required' => 'O tipo do produto é obrigatório!',
            'type.min' => 'É necessário no mínimo 5 caracteres no tipo do produto!',
            'type.max' => 'É necessário no Máximo 255 caracteres no tipo do produto!',
        ];

        $data = $request->validate([
            'name' => 'required|string|min:1|max:255',
            'costPrice' => 'required|numeric',
            'salePrice' => 'required|numeric',
            'type' => 'required|string|min:5|max:255',
        ], $mensagens);


        // Send data to stock crud
        // $stock = [
        //     product_id: '1',
        //     quantity: 63
        // ]

        $stock =  [$data['name'], 0];
        $this->service->store($stock);
        // End

        $data = [$data['name'],$data['costPrice'],$data['salePrice'],$data['type']];

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
        $request['costPrice'] = floatval($request['costPrice']);
        $request['salePrice'] = floatval($request['salePrice']);

        $mensagens = [
            'name.required' => 'O nome do produto é obrigatório!',
            'name.min' => 'É necessário no mínimo 5 caracteres no nome do produto!',
            'name.max' => 'É necessário no Máximo 255 caracteres no nome do produto!',

            'costPrice.required' => 'O preço de custo é obrigatório!',
            'costPrice.numeric' => 'O preço de custo deve ser um valor!',

            'salePrice.required' => 'O preço de venda é obrigatório!',
            'salePrice.numeric' => 'O preço de venda deve ser um valor!',

            'type.required' => 'O tipo do produto é obrigatório!',
            'type.min' => 'É necessário no mínimo 5 caracteres no tipo do produto!',
            'type.max' => 'É necessário no Máximo 255 caracteres no tipo do produto!',
        ];

        $data = $request->validate([
            'name' => 'required|string|min:1|max:255',
            'costPrice' => 'required|numeric',
            'salePrice' => 'required|numeric',
            'type' => 'required|string|min:5|max:255',
        ], $mensagens);

        $data = [$data['name'],$data['costPrice'],$data['salePrice'],$data['type']];

        return $this->repo->update($data, $id);
    }

    public function destroy($id)
    {
        return $this->repo->destroy($id);
    }
}

?>

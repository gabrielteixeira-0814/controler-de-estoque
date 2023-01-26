<?php

namespace App\Services;
use App\Repositories\ItemEntryProductRepositoryInterface;
use App\Repositories\EntryProductRepositoryInterface;
use App\Services\ProductService;
use Validator;


class ItemEntryProductService
{
    private $repo;
    private $serviceProduct;

    public function __construct(ItemEntryProductRepositoryInterface $repo, ItemEntryProductRepositoryInterface $repoInvetory, ProductService $serviceProduct)
    {
        $this->repo = $repo;
        $this->repoInvetory = $repoInvetory;
        $this->serviceProduct = $serviceProduct;
    }

    public function store($request)
    {

        // Pega lista de produto do banco
        $product = $this->serviceProduct;
        $data['search'] = false;
        $products = $product->getList($data);

        $totalProduct = count($products);
        $totalProduct = $totalProduct * 20;

        $listItemProducts = [];
        for ($i = 0; $i < $totalProduct; $i++ ) {

            $id = "name-select-".$i;
            $quantity = "name-quantity-".$i;

            if($request[$id]){

                foreach ($products as $product) {

                    if($request[$id] == $product->id){

                        $listItemProducts[] = [
                            "idEntryProduct" => $request['id'],
                            "idProduct" => $request[$id],
                            "quantity" => $request[$quantity],
                            "value" => $request[$quantity] * $product->salePrice
                        ];
                    }
                }
            }
        }

        $validate = true;
        foreach ($listItemProducts as $listItemProduct) {

            // Converte number(values)
            $request['entry_product_id'] = intval($listItemProduct['idEntryProduct']);
            $request['product_id'] = intval($listItemProduct['idProduct']);
            $request['quantity'] = intval($listItemProduct['quantity']);
            $request['value'] = floatval($listItemProduct['value']);

            $data = [$request['entry_product_id'],$request['product_id'],$request['quantity'],$request['value']];

            if(!$this->repo->store($data)){
                $validate = false;
            }
        }

        return $validate ? 'Inserido com sucesso!' : 'Não foi inserido!';
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
        $request['entry_product_id'] = intval($request['entry_product_id']);
        $request['product_id'] = intval($request['product_id']);
        $request['quantity'] = intval($request['quantity']);
        $request['value'] = floatval($request['value']);

        $mensagens = [
            'entry_product_id.required' => 'O id da entrada é obrigatório!',
            'entry_product_id.numeric' => 'O id deve ser um valor!',

            'product_id.required' => 'O id do produto é obrigatório!',
            'product_id.numeric' => 'O id deve ser um valor!',

            'quantity.required' => 'A quantidade do item é obrigatório!',
            'quantity.numeric' => 'A quantidade deve ser um valor!',

            'value.required' => 'O valor é obrigatório!',
            'value.numeric' => 'O valor do item deve ser um valor!',
        ];

        $data = $request->validate([
            'entry_product_id' => 'required|numeric',
            'product_id' => 'required|numeric',
            'quantity' => 'required|numeric',
            'value' => 'required|numeric',
        ], $mensagens);

        $data = [$data['entry_product_id'],$data['product_id'],$data['quantity'],$data['value']];

        return $this->repo->update($data, $id);
    }

    public function destroy($id)
    {
        return $this->repo->destroy($id);
    }
}

?>

<?php

namespace App\Services;
use App\Repositories\EntryProductRepositoryInterface;
use Validator;
use DateTime;

class EntryProductService
{
    private $repo;

    public function __construct(EntryProductRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function store($request)
    {
        // Converte number(values)
        $request['total'] = intval($request['total']);

        $request['entryDate'] = DateTime::createFromFormat('d/m/Y H:i:s', $request['entryDate'].' 00:00:00');
        $request['entryDate'] = $request['entryDate']->format('Y-m-d');

        $mensagens = [
            'entryDate.required' => 'A data de entrada é obrigatório!',

            'total.required' => 'O total de entrada de produto é obrigatório!',
            'total.numeric' => 'O total deve ser um valor!',
        ];

        $data = $request->validate([
            'entryDate' => 'required|date',
            'total' => 'required|numeric',
        ], $mensagens);

        $data = [$data['entryDate'],$data['total']];

        return $this->repo->store($data);
    }

    public function getList($request)
    {
        if($request['search']){
            $entryProduct = $this->repo->getListSearch($request['search']);
            return $entryProduct;

        }else {
            $entryProduct = $this->repo->getList();
            return $entryProduct;
        }
    }

    public function get($id)
    {
        return $this->repo->get($id);
    }

    public function update($request, $id)
    {
        // Converte number(values)
        $request['total'] = intval($request['total']);

        $request['entryDate'] = DateTime::createFromFormat('d/m/Y H:i:s', $request['entryDate'].' 00:00:00');
        $request['entryDate'] = $request['entryDate']->format('Y-m-d');

        $mensagens = [
            'entryDate.required' => 'A data de entrada é obrigatório!',

            'total.required' => 'O total de entrada de produto é obrigatório!',
            'total.numeric' => 'O total deve ser um valor!',
        ];

        $data = $request->validate([
            'entryDate' => 'required|date',
            'total' => 'required|numeric',
        ], $mensagens);

        $data = [$data['entryDate'],$data['total']];

        return $this->repo->update($data, $id);
    }

    public function destroy($id)
    {
        return $this->repo->destroy($id);
    }
}

?>

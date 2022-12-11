<?php

namespace App\Services;
use App\Repositories\EntryProductRepositoryInterface;
use Validator;
use Illuminate\Support\Facades\Storage;


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
        $request['total'] = intval($request['total']);

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

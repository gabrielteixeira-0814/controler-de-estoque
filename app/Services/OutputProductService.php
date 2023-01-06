<?php

namespace App\Services;
use App\Repositories\OutputProductRepositoryInterface;
use Validator;
use Illuminate\Support\Facades\Storage;


class OutputProductService
{
    private $repo;

    public function __construct(OutputProductRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function store($request)
    {
        // Converte number(values)
        $request['total'] = intval($request['total']);

        $mensagens = [
            'outputDate.required' => 'A data de saída é obrigatório!',

            'total.required' => 'O total de saída de produto é obrigatório!',
            'total.numeric' => 'O total deve ser um valor!',
        ];

        $data = $request->validate([
            'outputDate' => 'required|date',
            'total' => 'required|numeric',
        ], $mensagens);

        $data = [$data['outputDate'],$data['total']];

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
            'outputDate.required' => 'A data de saída é obrigatório!',

            'total.required' => 'O total de saída de produto é obrigatório!',
            'total.numeric' => 'O total deve ser um valor!',
        ];

        $data = $request->validate([
            'outputDate' => 'required|date',
            'total' => 'required|numeric',
        ], $mensagens);

        $data = [$data['outputDate'],$data['total']];

        return $this->repo->update($data, $id);
    }

    public function destroy($id)
    {
        return $this->repo->destroy($id);
    }
}

?>

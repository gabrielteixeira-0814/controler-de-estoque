<?php

namespace App\Services;
use App\Repositories\ProductRequisitionRepositoryInterface;
use Validator;

class ProductRequisitionService
{
    private $repo;

    public function __construct(ProductRequisitionRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function store($request)
    {
        // Converte number(values)
        $request['user_id'] = intval($request['user_id']);

        $mensagens = [
            'user_id.required' => 'O id do usuário é obrigatório!',
            'user_id.required' => 'O id deve ser um valor!',

            'date.required' => 'A data de requisição é obrigatório!',
        ];

        $data = $request->validate([
            'user_id' => 'required|numeric',
            'date' => 'required|date',
        ], $mensagens);

        $data = [$data['user_id'],$data['date']];

        return $this->repo->store($data);
    }

    public function getList($request)
    {
        $pag_limit = $request['pag_limit'];
        $pag = $request['pag'];

        if($request['search']){
            $users = $this->repo->getListSearch($request['search']);
            return $users;

        }else {
            if($pag > 0) {
                $conf = ['limit' =>  $pag_limit, 'pag' => $pag];
                $users = $this->repo->getList($conf);
                return $users;
            }
        }
    }

    public function get($id)
    {
        return $this->repo->get($id);
    }

    public function update($request, $id)
    {
       // Converte number(values)
       $request['user_id'] = intval($request['user_id']);

       $mensagens = [
           'user_id.required' => 'O id do usuário é obrigatório!',
           'user_id.required' => 'O id deve ser um valor!',

           'date.required' => 'A data de requisição é obrigatório!',
       ];

       $data = $request->validate([
           'user_id' => 'required|numeric',
           'date' => 'required|date',
       ], $mensagens);

       $data = [$data['user_id'],$data['date']];

        return $this->repo->update($data, $id);
    }

    public function destroy($id)
    {
        return $this->repo->destroy($id);
    }
}

?>

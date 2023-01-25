<?php

namespace App\Services;
use App\Repositories\UserRepositoryInterface;
use Validator;
use Illuminate\Support\Facades\Storage;


class UserService
{
    private $repo;

    public function __construct(UserRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function store($request)
    {
        $mensagens = [
            'name.required' => 'O nome do usuário é obrigatório!',
            'name.min' => 'É necessário no mínimo 5 caracteres no nome do usuário!',
            'name.max' => 'É necessário no Máximo 255 caracteres no nome do usuário!',

            'office.required' => 'O cargo é obrigatório!',
            'office.min' => 'É necessário no mínimo 5 caracteres no cargo do usuário!',
            'office.max' => 'É necessário no Máximo 255 caracteres no cargo do usuário!',

        ];

        $data = $request->validate([
            'name' => 'required|string|min:5|max:255',
            'office' => 'required|string|min:5|max:255',
        ], $mensagens);

        $data = [$data['name'],$data['office']];

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
        $mensagens = [
            'name.required' => 'O nome do usuário é obrigatório!',
            'name.min' => 'É necessário no mínimo 5 caracteres no nome do usuário!',
            'name.max' => 'É necessário no Máximo 255 caracteres no nome do usuário!',

            'office.required' => 'O cargo é obrigatório!',
            'office.min' => 'É necessário no mínimo 5 caracteres no cargo do usuário!',
            'office.max' => 'É necessário no Máximo 255 caracteres no cargo do usuário!',

        ];

        $data = $request->validate([
            'name' => 'required|string|min:5|max:255',
            'office' => 'required|string|min:5|max:255',
        ], $mensagens);

        $data = [$data['name'],$data['office']];

        return $this->repo->update($data, $id);
    }

    public function destroy($id)
    {
        return $this->repo->destroy($id);
    }
}

?>

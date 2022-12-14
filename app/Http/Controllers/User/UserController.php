<?php

namespace App\Http\Controllers\User;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\UserService;

class UserController extends Controller
{
    private $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return view('user');
    }

    public function formUser()
    {
        return view('form.productFormModal')->render();
    }

    public function getList(Request $request)
    {
        $search = !$request['search'] ? true : false;
        $listUser = $this->service->getList($request);
        return view('list.listUser', compact('listUser', 'search'))->render();
    }

    public function get($id)
    {
        return $this->service->get($id);
    }

    public function store(Request $request)
    {
        return $this->service->store($request);
    }

    public function update(Request $request)
    {
        return $this->service->update($request, $request['id']);
    }

    public function delete($id)
    {
        return $this->service->destroy($id);
    }
}

<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\EntryProductService;

class EntryProductController extends Controller
{
    private $service;

    public function __construct(EntryProductService $service)
    {
        $this->service = $service;
    }

    public function getList()
    {
        return $this->service->getList();
    }

    public function get($id)
    {
        return $this->service->get($id);
    }

    public function store(Request $request)
    {
        return $this->service->store($request);
    }

    public function update(Request $request, $id)
    {
        return $this->service->update($request, $id);
    }

    public function delete($id)
    {
        return $this->service->destroy($id);
    }
}

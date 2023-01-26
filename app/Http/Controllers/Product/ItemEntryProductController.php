<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ItemEntryProductService;
use App\Services\ProductService;

class ItemEntryProductController extends Controller
{
    private $service;
    private $serviceProductServer;

    public function __construct(ItemEntryProductService $service, ProductService $serviceProductServer)
    {
        $this->service = $service;
        $this->serviceProductServer = $serviceProductServer;
    }

    public function getList()
    {
        return $this->service->getList();
    }

    public function get($id)
    {
        $listItemEntryProduct = $this->service->get($id);
        return view('list.listItemEntryProduct', compact('listItemEntryProduct'));
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
    public function getListProduct()
    {
        $request['search'] = null;

        return $this->serviceProductServer->getList($request);
    }
}

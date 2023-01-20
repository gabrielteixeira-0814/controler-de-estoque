<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\EntryProductService;
use App\Services\ProductService;

class EntryProductController extends Controller
{
    private $service;
    private $serviceProduct;

    public function __construct(EntryProductService $service, ProductService $serviceProduct)
    {
        $this->service = $service;
        $this->serviceProduct = $serviceProduct;
    }

    public function index()
    {
        return view('entryProduct');
    }

    public function formEntryProduct()
    {
        $request['search'] = false;
        $listProduct = $this->serviceProduct->getList($request);
        return view('form.entryProductFormModal', compact('listProduct'))->render();
    }

    public function getList(Request $request)
    {
        $search = !$request['search'] ? true : false;
        $listEntryProduct = $this->service->getList($request);
        return view('list.listEntryProduct', compact('listEntryProduct', 'search'))->render();
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
        $id = $request['id'];
        return $this->service->update($request, $id);
    }

    public function delete($id)
    {
        return $this->service->destroy($id);
    }
}

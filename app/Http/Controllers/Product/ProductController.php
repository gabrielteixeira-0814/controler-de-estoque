<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ProductService;

class ProductController extends Controller
{
    private $service;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return view('product');
    }

    public function formUser()
    {
        return view('form.productFormModal')->render();
    }

    public function getList(Request $request)
    {
        $search = !$request['search'] ? true : false;
        $listProduct = $this->service->getList($request);
        return view('list.listProduct', compact('listProduct', 'search'))->render();
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
        $id =  $request['id'];
        return $this->service->update($request, $id);
    }

    public function delete($id)
    {
        return $this->service->destroy($id);
    }
}

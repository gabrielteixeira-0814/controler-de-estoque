<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ProductRequisitionService;

class ProductRequisitionController extends Controller
{
    public function __construct(ProductRequisitionService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return view('requisitionProduct');
    }

    public function getList(Request $request)
    {
        $search = !$request['search'] ? true : false;
        $listRequisitionProduct = $this->service->getList($request);

        return view('list.listRequisitionProduct', compact('listRequisitionProduct', 'search'))->render();
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

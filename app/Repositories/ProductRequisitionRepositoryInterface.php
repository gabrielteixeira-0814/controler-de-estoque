<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

interface ProductRequisitionRepositoryInterface
{
    public function __construct($table = 'tb_product_requisition');
    public function store(array $data);
    public function getList();
    public function get($id);
    public function update(array $data, $id);
    public function destroy($id);
}

?>

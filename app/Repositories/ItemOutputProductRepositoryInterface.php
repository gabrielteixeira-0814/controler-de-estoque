<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

interface ItemOutputProductRepositoryInterface
{
    public function __construct($table = 'tb_item_output_product');
    public function store(array $data);
    public function getList();
    public function get($id);
    public function update(array $data, $id);
    public function destroy($id);
}

?>

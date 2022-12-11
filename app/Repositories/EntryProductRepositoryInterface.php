<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

interface EntryProductRepositoryInterface
{
    public function __construct($table = 'tb_entry_product');
    public function store(array $data);
    public function getList();
    public function get($id);
    public function update(array $data, $id);
    public function destroy($id);
}

?>

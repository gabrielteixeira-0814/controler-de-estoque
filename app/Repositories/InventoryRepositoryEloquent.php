<?php

namespace App\Repositories;

Use DB;

class InventoryRepositoryEloquent implements InventoryRepositoryInterface
{
    protected $table;

    public function __construct($table = 'tb_inventory')
    {
        $this->table = $table;
    }

    public function store(array $data)
    {
        try {
            DB::insert('insert into '.$this->table.' (product_id, quantity) values (?, ?)', $data);
            return 'Inserido com sucesso!';

        } catch (\Exception $e) {

            return $e->getMessage();
        }
    }

    public function getList()
    {
        try {
            return DB::select('select * from '.$this->table);

        } catch (\Exception $e) {

            return $e->getMessage();
        }
    }

    public function get($id)
    {
        try {
            return DB::select('select * from '.$this->table.' where id = ?',[$id]);

        } catch (\Exception $e) {

            return $e->getMessage();
        }
    }

    public function update(array $data, $id)
    {
        $data[] = $id;

        try {
            DB::update('update '.$this->table.' set product_id = ?, quantity = ? where id = ?', $data);
            return 'Editado com sucesso!';

        } catch (\Exception $e) {

            return $e->getMessage();
        }
    }

    public function destroy($id)
    {
        try {
            DB::select('DELETE from '.$this->table.' WHERE id = ?',[$id]);
            return 'Registro deletado com sucesso';

        } catch (\Exception $e) {

            return $e->getMessage();
        }
    }
}

?>

<?php

namespace App\Repositories;

Use DB;

class ItemOutputProductRepositoryEloquent implements ItemOutputProductRepositoryInterface
{
    protected $table;

    public function __construct($table = 'tb_item_output_product')
    {
        $this->table = $table;
    }

    public function store(array $data)
    {
        try {
            DB::insert('insert into '.$this->table.' (output_product_id, product_id, quantity, value) values (?, ?, ?, ?)', $data);
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
            DB::update('update '.$this->table.' set output_product_id = ?, product_id = ?, quantity = ?, value = ? where id = ?', $data);

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

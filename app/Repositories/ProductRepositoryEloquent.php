<?php

namespace App\Repositories;

Use DB;

class ProductRepositoryEloquent implements ProductRepositoryInterface
{
    protected $table;

    public function __construct($table = 'tb_product')
    {
        $this->table = $table;
    }

    public function store(array $data)
    {
        try {
            DB::insert('insert into '.$this->table.' (name, costPrice, salePrice, type) values (?, ?, ?, ?)', $data);
            $response = DB::select('SELECT LAST_INSERT_ID() as id');
            $response = $response[0];
            $response = $response->id;

            return $response;

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
            DB::update('update '.$this->table.' set name = ?, costPrice = ?, salePrice = ?, type = ? where id = ?', $data);
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

            return 'Error';
        }
    }
}

?>

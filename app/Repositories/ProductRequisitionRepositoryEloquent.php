<?php

namespace App\Repositories;

Use DB;

class ProductRequisitionRepositoryEloquent implements ProductRequisitionRepositoryInterface
{
    protected $table;

    public function __construct($table = 'tb_product_requisition')
    {
        $this->table = $table;
    }

    public function store(array $data)
    {
        try {
            DB::insert('insert into '.$this->table.' (user_id, date) values (?, ?)', $data);
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

    public function getListSearch($request)
    {
        try {

            return DB::select("select * from" .$this->table. "where name like '%'".$request."'%'");
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
            DB::update('update '.$this->table.' set user_id = ?, date = ? where id = ?', $data);
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

<?php

namespace App\Repositories;

Use DB;

class ItemEntryProductRepositoryEloquent implements ItemEntryProductRepositoryInterface
{
    protected $table;

    public function __construct($table = 'tb_item_entry_product')
    {
        $this->table = $table;
    }

    public function store(array $data)
    {
        try {
            DB::insert('insert into '.$this->table.' (entry_product_id, product_id, quantity, value) values (?, ?, ?, ?)', $data);

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
            return DB::select("
                        SELECT
                            iep.entry_product_id,
                            iep.product_id,
                            iep.quantity,
                            iep.value,
                            ep.id,
                            ep.entryDate,
                            ep.total,
                            p.name,
                            p.type
                        FROM tb_item_entry_product AS iep
                        LEFT JOIN tb_entry_product AS ep ON(iep.entry_product_id = ep.id)
                        LEFT JOIN tb_product AS p ON(iep.product_id = p.id)
                        WHERE iep.entry_product_id = ".$id);

        } catch (\Exception $e) {

            return $e->getMessage();
        }
    }

    public function update(array $data, $id)
    {
        $data[] = $id;

        try {
            DB::update('update '.$this->table.' set entry_product_id = ?, product_id = ?, quantity = ?, value = ? where id = ?', $data);

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

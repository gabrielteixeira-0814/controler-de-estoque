<?php

namespace App\Repositories;

Use DB;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

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

    public function getList($conf)
    {
        $page = $conf['pag'];
        $perPage = $conf['limit'];
        $offset = ($page * $perPage) - $perPage;

        try {
            $data = DB::select("select pr.id,
	                                   u.name,
	                                   pr.date
    	                                    from ".$this->table." as pr LEFT JOIN tb_user as u ON(pr.user_id = u.id)");
            $collect = collect($data);

            $paginationData = new Paginator(
                $collect->forPage($page, $perPage),
                $collect->count(),
                $perPage,
                $page
            );

            return $paginationData;

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

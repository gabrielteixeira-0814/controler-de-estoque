<?php

namespace App\Repositories;

Use DB;

class ReportRepositoryEloquent implements ReportRepositoryInterface
{
    protected $table;

    public function __construct($table = 'tb_entry_product')
    {
        $this->table = $table;
    }

    public function entryReport($data)
    {
        $date[] = $data['dateIni'];
        $date[] = $data['dateFin'];

        try {

            return DB::select("SELECT name,
                                ROUND(SUM(quantity),2) AS quantidade,
                                    IF(SUM(quantity * costPrice) IS NULL,ROUND((SELECT SUM(quantity * costPrice) as custoTotal from tb_item_composite_product AS icp LEFT JOIN tb_product AS p ON (icp.product_id = p.id) where icp.composite_product_id = 2),2), ROUND(SUM(quantity * costPrice),2)) AS precoCustoTotal,
                                ROUND(SUM(quantity * salePrice),2) AS precoVendaTotal
                                    from tb_entry_product AS ep
                                LEFT JOIN tb_item_entry_product AS iep ON (ep.id = iep.entry_product_id)
                                LEFT JOIN tb_product AS p ON (iep.product_id = p.id)
                                    WHERE ep.entryDate between '".$date[0]."' and '".$date[1]."'  AND name IS NOT NULL
                                        GROUP BY name
                                                ORDER BY ep.id ASC;");

        } catch (\Exception $e) {

            return $e->getMessage();
        }
    }

    public function outputReport($data)
    {
        try {
            return DB::select('select * from '.$this->table.' where id = ?',[$id]);

        } catch (\Exception $e) {

            return $e->getMessage();
        }
    }
}

?>

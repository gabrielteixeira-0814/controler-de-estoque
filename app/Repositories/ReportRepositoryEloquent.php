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

        // Criterios
        $dateSql = "";
        if($data['dateIni'] && $data['dateFin']){
            $date[] = $data['dateIni'];
            $date[] = $data['dateFin'];

            $dateSql = "WHERE ep.entryDate BETWEEN '".$date[0]."' AND '".$date[1]."'";
        }

        try {
            return DB::select("
                        SELECT
                            name,
                            ROUND(SUM(quantity),2) AS quantidade,
                            IF(SUM(quantity * costPrice) IS NULL,ROUND((SELECT SUM(quantity * costPrice) as custoTotal from tb_item_composite_product AS icp LEFT JOIN tb_product AS p ON (icp.product_id = p.id) where icp.composite_product_id = 2),2), ROUND(SUM(quantity * costPrice),2)) AS precoCustoTotal,
                            ROUND(SUM(quantity * salePrice),2) AS precoVendaTotal
                        FROM tb_entry_product AS ep
                        LEFT JOIN tb_item_entry_product AS iep ON (ep.id = iep.entry_product_id)
                        LEFT JOIN tb_product AS p ON (iep.product_id = p.id)
                        ".$dateSql."
                            AND name IS NOT NULL
                        GROUP BY name
                        ORDER BY ep.id ASC;");

        } catch (\Exception $e) {

            return $e->getMessage();
        }
    }

    public function outputReport($data)
    {
        // Criterios
        $dateSql = "";
        if($data['dateIni'] && $data['dateFin']){
            $date[] = $data['dateIni'];
            $date[] = $data['dateFin'];

            $dateSql = "WHERE ep.outputDate BETWEEN '".$date[0]."' AND '".$date[1]."'";
        }


        try {
            return DB::select("
                        SELECT name,
                                SUM(quantity) AS quantidade,
                                ROUND(SUM(quantity * costPrice), 2) AS precoCustoTotal,
                                ROUND(SUM(quantity * salePrice),2) AS precoVendaTotal
                            FROM tb_output_product AS ep
                            LEFT JOIN tb_item_output_product AS iop ON (ep.id = iop.output_product_id)
                            LEFT JOIN tb_product AS p ON (iop.product_id = p.id)
                            ".$dateSql."
                                AND name IS NOT NULL
                            GROUP BY name
                            ORDER BY ep.id ASC");

        } catch (\Exception $e) {

            return $e->getMessage();
        }
    }

    public function requisitionProductReport($data)
    {
        // Criterios
        $dateSql = "";
        if($data['dateIni'] && $data['dateFin'] && $data['requisicao']){
            $date[] = $data['dateIni'];
            $date[] = $data['dateFin'];

            $dateSql = "WHERE pr.date between '".$date[0]."' and '".$date[1]."' and pr.id = '".$data['requisicao']."'";
        }

        if($data['dateIni'] && $data['dateFin'] && $data['requisicao'] == false){
            $date[] = $data['dateIni'];
            $date[] = $data['dateFin'];

            $dateSql = "WHERE pr.date between '".$date[0]."' and '".$date[1]."'";
        }

        if($data['dateIni'] == false && $data['dateFin'] == false && $data['requisicao']){
            $dateSql = "WHERE pr.id = '".$data['requisicao']."'";
        }

        if($data['dateIni'] == false && $data['dateFin'] == false && $data['requisicao'] == false){
            $dateSql = "";
        }

        try {
            return DB::select("
                SELECT
                    pr.id AS numero,
                    u.name AS nome,
                    pr.date AS dataRetirada,
                    p.name AS nomeProduto,
                    ipr.quantity AS quantidade
                FROM tb_product_requisition AS pr
                LEFT JOIN tb_user AS u ON (pr.user_id = u.id)
                LEFT JOIN tb_item_product_requisition AS ipr ON (ipr.product_requisition_id = pr.id)
                LEFT JOIN tb_product AS p ON (p.id = ipr.product_id) ".$dateSql);

        } catch (\Exception $e) {

            return $e->getMessage();
        }
    }

    public function requisitionProductReportSingle($id)
    {
        try {
            return DB::select("
                SELECT
                    pr.id AS numero,
                    u.name AS nome,
                    pr.date AS dataRetirada,
                    p.name AS nomeProduto,
                    ipr.quantity AS quantidade
                FROM tb_product_requisition AS pr
                LEFT JOIN tb_user AS u ON (pr.user_id = u.id)
                LEFT JOIN tb_item_product_requisition AS ipr ON (ipr.product_requisition_id = pr.id)
                LEFT JOIN tb_product AS p ON (p.id = ipr.product_id)
                WHERE pr.id = ".$id);

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}

?>

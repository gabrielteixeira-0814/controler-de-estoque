<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

interface ReportRepositoryInterface
{
    public function __construct($table = 'tb_entry_product');
    public function entryReport(array $data);
    public function outputReport(array $data);
    public function requisitionProductReport(array $data);
    public function requisitionProductReportSingle($id);
}

?>

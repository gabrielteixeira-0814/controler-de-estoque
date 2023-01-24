<?php

namespace App\Services;
use App\Repositories\ReportRepositoryInterface;
use Validator;
use DateTime;

class ReportService
{
    private $repo;

    public function __construct(ReportRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function entryReport($request)
    {
        $request['dateIni'] = DateTime::createFromFormat('d/m/Y H:i:s', $request['dateIni'].' 00:00:00');
        $request['dateIni'] = $request['dateIni']->format('Y-m-d');

        $request['dateFin'] = DateTime::createFromFormat('d/m/Y H:i:s', $request['dateFin'].' 00:00:00');
        $request['dateFin'] = $request['dateFin']->format('Y-m-d');

        $data = $this->repo->entryReport($request);

        $totalQuant = 0;
        $totalPrecoCusto = 0;
        $totalPrecoVenda = 0;

        foreach ($data as $item) {
            $totalQuant = $totalQuant + $item->quantidade;
            $totalPrecoCusto = $totalPrecoCusto + $item->precoCustoTotal;
            $totalPrecoVenda = $totalPrecoVenda + $item->precoVendaTotal;
        }

        return $listValue = ['data' => $data, 'totalQuant' => $totalQuant, 'totalPrecoCusto' => $totalPrecoCusto, 'totalPrecoVenda' => $totalPrecoVenda];
    }

    public function outputReport($request)
    {

        $request['dateIni'] = DateTime::createFromFormat('d/m/Y H:i:s', $request['dateIni'].' 00:00:00');
        $request['dateIni'] = $request['dateIni']->format('Y-m-d');

        $request['dateFin'] = DateTime::createFromFormat('d/m/Y H:i:s', $request['dateFin'].' 00:00:00');
        $request['dateFin'] = $request['dateFin']->format('Y-m-d');

        $data = $this->repo->outputReport($request);

        $totalQuant = 0;
        $totalPrecoCusto = 0;
        $totalPrecoVenda = 0;

        foreach ($data as $item) {
            $totalQuant = $totalQuant + $item->quantidade;
            $totalPrecoCusto = $totalPrecoCusto + $item->precoCustoTotal;
            $totalPrecoVenda = $totalPrecoVenda + $item->precoVendaTotal;
        }

        return $listValue = ['data' => $data, 'totalQuant' => $totalQuant, 'totalPrecoCusto' => $totalPrecoCusto, 'totalPrecoVenda' => $totalPrecoVenda];
    }

    public function requisitionProductReport($request)
    {
        $request['dateIni'] = DateTime::createFromFormat('d/m/Y H:i:s', $request['dateIni'].' 00:00:00');
        $request['dateIni'] = $request['dateIni']->format('Y-m-d');

        $request['dateFin'] = DateTime::createFromFormat('d/m/Y H:i:s', $request['dateFin'].' 00:00:00');
        $request['dateFin'] = $request['dateFin']->format('Y-m-d');

        return $this->repo->requisitionProductReport($request);
    }
}
?>

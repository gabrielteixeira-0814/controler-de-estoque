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
        if(!$request['dateIni']) {
            $request['dateIni'] = false;
        }else{
            $request['dateIni'] = DateTime::createFromFormat('d/m/Y H:i:s', $request['dateIni'].' 00:00:00');
            $request['dateIni'] = $request['dateIni']->format('Y-m-d');
        }

        if(!$request['dateFin']) {
            $request['dateFin'] = false;
        }else{
            $request['dateFin'] = DateTime::createFromFormat('d/m/Y H:i:s', $request['dateFin'].' 00:00:00');
            $request['dateFin'] = $request['dateFin']->format('Y-m-d');
        }

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
        if(!$request['dateIni']) {
            $request['dateIni'] = false;
        }else{
            $request['dateIni'] = DateTime::createFromFormat('d/m/Y H:i:s', $request['dateIni'].' 00:00:00');
            $request['dateIni'] = $request['dateIni']->format('Y-m-d');
        }

        if(!$request['dateFin']) {
            $request['dateFin'] = false;
        }else{
            $request['dateFin'] = DateTime::createFromFormat('d/m/Y H:i:s', $request['dateFin'].' 00:00:00');
            $request['dateFin'] = $request['dateFin']->format('Y-m-d');
        }

        if(!$request['requisicao']){
            $request['requisicao'] = false;
        }

        $data =  $this->repo->requisitionProductReport($request);
        $totalQuant = 0;
        $listIdRequisitionGroup = [];
        foreach ($data as $item) {

            // Coloca o número das requisicoes em uma lista
            if(!in_array($item->numero, $listIdRequisitionGroup)){
                // Converte int para string para adicionar 5 digitos
                $itens = strval($item->numero);

                $countIdRequisition = strlen($itens);

                if($countIdRequisition == 1){
                    $itens = "0000".$itens;
                }
                if($countIdRequisition == 2){
                    $itens = "000".$itens;
                }
                if($countIdRequisition == 3){
                    $itens = "00".$itens;
                }
                if($countIdRequisition == 4){
                    $itens = "0".$itens;
                }

                $listIdRequisitionGroup[] = $itens;
            }

            // Total geral das quantidades de produtos
            $totalQuant = $totalQuant + $item->quantidade;
        }

        $listRequisicao = [];
        foreach ($listIdRequisitionGroup as $requisition) {

            // Pega o total geral por requisição
            $totalPorRequisicao = 0;

             foreach ($data as $item) {

                 if($item->numero == $requisition){
                     $totalPorRequisicao = $totalPorRequisicao + $item->quantidade;
                }
             }

            $listRequisicao[] = [
                "requisition" => $requisition,
                "totalPorRequisicao" => $totalPorRequisicao
            ];
        }

         $listValue = [
            'data' => $data,
            'totalQuant' => $totalQuant,
            'listRequisicao' => $listRequisicao
        ];

        return $listValue;
    }
}
?>

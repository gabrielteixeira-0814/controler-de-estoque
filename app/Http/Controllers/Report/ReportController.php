<?php

namespace App\Http\Controllers\Report;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ReportService;

class ReportController extends Controller
{
    private $service;

    public function __construct(ReportService $service)
    {
        $this->service = $service;
    }

    public function entryReport(Request $request)
    {

        $data = $this->service->entryReport($request);
        $listEntryReport = $data['data'];
        $totalQuant = $data['totalQuant'];
        $totalPrecoCusto = $data['totalPrecoCusto'];
        $totalPrecoVenda = $data['totalPrecoVenda'];
        $dateIni = $request['dateIni'];
        $dateFin = $request['dateFin'];
        return view('entryReport', compact('listEntryReport', 'dateIni', 'dateFin', 'totalQuant', 'totalPrecoCusto', 'totalPrecoVenda'));
    }

    public function outputReport(Request $request)
    {
        $data = $this->service->outputReport($request);
        $listOutPutReport = $data['data'];
        $totalQuant = $data['totalQuant'];
        $totalPrecoCusto = $data['totalPrecoCusto'];
        $totalPrecoVenda = $data['totalPrecoVenda'];
        $dateIni = $request['dateIni'];
        $dateFin = $request['dateFin'];

        return view('outputReport', compact('listOutPutReport', 'dateIni', 'dateFin', 'totalQuant', 'totalPrecoCusto', 'totalPrecoVenda'));
    }
}

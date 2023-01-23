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
        $listEntryReport = $this->service->entryReport($request);
//        $request['dateIni'] = DateTime::createFromFormat('d/m/Y H:i:s', $request['dateIni'].' 00:00:00');
//        $request['dateIni'] = $request['dateIni']->format('Y-m-d');
        $dateIni = $request['dateIni'];
        $dateFin = $request['dateFin'];
        return view('entryReport', compact('listEntryReport', 'dateIni', 'dateFin'));
    }

    public function outputReport($id)
    {
        return $this->service->outputReport($id);
    }

}

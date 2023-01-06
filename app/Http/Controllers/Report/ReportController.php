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
        return view('entryReport', compact('listEntryReport'));
    }

    public function outputReport($id)
    {
        return $this->service->outputReport($id);
    }

}

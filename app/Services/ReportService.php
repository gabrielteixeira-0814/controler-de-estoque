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

        return $this->repo->entryReport($request);
    }

    public function outputReport($request)
    {
        return $this->repo->outputReport($request);
    }
}

?>

<?php


namespace App\Http\Controllers\api;


use App\Http\Controllers\Controller;
use App\Models\DailyCases;
use App\Services\DailyCasesService;
use Illuminate\Http\Request;
use Log;

class APIController extends Controller
{
    public function __construct()
    {
    }

    /**
     * function to get total figures and daily figures of covid data
     * @param Request $request
     * @return array|mixed
     */
    function getDailyCasesTotalFigures(Request $request)
    {
        $dailyCasesService = new DailyCasesService(new DailyCases());
        return $dailyCasesService->getDailyCasesTotalFigures();
    }

    /**
     * function to get Covid Progress for a date range
     * @param Request $request
     * @return array|mixed
     * @throws \Exception
     */
    function getCovidProgressForDateRange(Request $request)
    {
        $dailyCasesService = new DailyCasesService(new DailyCases());
        return $dailyCasesService->getCovidProgressForDateRange($request);
    }

    /**
     * function to get Covid recovery progress counts
     * @param Request $request
     * @return array|mixed
     * @throws \Exception
     */
    function getCovidRecoveriesForDateRange(Request $request)
    {
        $dailyCasesService = new DailyCasesService(new DailyCases());
        return $dailyCasesService->getCovidRecoveriesForDateRange($request);
    }

    /**
     * function to get District wise distribution of covid data
     * @return array|mixed
     */
    function getDistrictDistribution()
    {
        $dailyCasesService = new DailyCasesService(new DailyCases());
        return $dailyCasesService->getDistrictDistribution();
    }

    /**
     * function to get gender wise breakdown of covid data
     * @return array|mixed
     */
    function getGenderWiseBreakdown()
    {
        $dailyCasesService = new DailyCasesService(new DailyCases());
        return $dailyCasesService->getGenderWiseBreakdown();
    }

    /**
     * function to get all covid data
     * @return mixed
     */
    function getAllDailyCases()
    {
        $dailyCasesService = new DailyCasesService(new DailyCases());
        return $dailyCasesService->getAllDailyCases();
    }
}

<?php


namespace App\Http\Controllers\web;

use App\Http\Controllers\api\DailyCasesController;
use App\Http\Controllers\Controller;
use App\Models\DailyCases;
use App\Services\DailyCasesService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\PassportOAuthClient;
use Auth;
use Log;

class DashboardController extends Controller
{

    public function __construct()
    {
    }

    /**
     * load main dashboard
     * @param Request $request
     * @return \Illuminate\Contracts\View\View
     * @throws \Exception
     */
    function index(Request $request)
    {

        $dailyCasesService = new DailyCasesService(new DailyCases());
        $data['total_figures'] = $dailyCasesService->getDailyCasesTotalFigures();
        $data['covid_progress'] = $dailyCasesService->getCovidProgressForDateRange($request);
        $data['covid_recoveries'] = $dailyCasesService->getCovidRecoveriesForDateRange($request);
        $data['district_distribusion'] = $dailyCasesService->getDistrictDistribution();
        $data['gender_breakdown'] = $dailyCasesService->getGenderWiseBreakdown();

        return View::make('dashboard.main_dashboard', compact('data'));
    }

    /**
     * load API Documentation Page
     * @return \Illuminate\Contracts\View\View
     */
    function get_api_list()
    {
        return View::make('manage_api.api_list');
    }
}

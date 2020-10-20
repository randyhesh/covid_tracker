<?php


namespace App\Services;


use App\Models\DailyCases;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Contracts\Cache\Factory;
use DateTime;
use DatePeriod;
use DateInterval;
use Carbon\Carbon;
use DB;
use Log;

class DailyCasesService
{
    private $dailyCases;

    public function __construct(DailyCases $dailyCases)
    {
        $this->dailyCases = $dailyCases;
    }

    /**
     * function to get total figures and daily figures of covid data
     * @return array|mixed
     */
    function getDailyCasesTotalFigures()
    {
        //Total Figures
        $total_confirmed_cases = Cache::remember(strtoupper('total_confrmed_cases'), Carbon::now()->addDays(1), function () {
            return $this->dailyCases::whereIn('status', array('CONFIRMED_CASE', 'DIED', 'RECOVERED_DISCHARGED'))
                ->count();
        });

        $total_deaths = Cache::remember(strtoupper('total_deaths'), Carbon::now()->addDays(1), function () {
            return $this->dailyCases::whereIn('status', array('DIED'))
                ->count();
        });

        $total_recovered = Cache::remember(strtoupper('total_recovered'), Carbon::now()->addDays(1), function () {
            return $this->dailyCases::whereIn('status', array('RECOVERED_DISCHARGED'))
                ->count();
        });

        $total_suspect_hospitalized = Cache::remember(strtoupper('total_suspect_hospitalized'), Carbon::now()->addDays(1), function () {
            return $this->dailyCases::whereIn('status', array('SUSPECTED_HOSPITALIZED'))
                ->count();
        });

        //Daily Figures
        $daily_confirmed_cases = $this->dailyCases::whereIn('status', array('CONFIRMED_CASE', 'DIED', 'RECOVERED_DISCHARGED'))
            ->where('reported_date', date('Y-m-d'))
            ->count();
        $daily_deaths = $this->dailyCases::whereIn('status', array('DIED'))
            ->where('reported_date', date('Y-m-d'))
            ->count();
        $daily_recovered = $this->dailyCases::whereIn('status', array('RECOVERED_DISCHARGED'))
            ->where('reported_date', date('Y-m-d'))
            ->count();
        $daily_suspect_hospitalized = $this->dailyCases::whereIn('status', array('SUSPECTED_HOSPITALIZED'))
            ->where('reported_date', date('Y-m-d'))
            ->count();

        $data['total_figures'] = array('total_confirmed_cases' => $total_confirmed_cases, 'total_deaths' => $total_deaths,
            'total_recovered' => $total_recovered, 'total_suspect_hospitalized' => $total_suspect_hospitalized,
            'daily_confirmed_cases' => $daily_confirmed_cases, 'daily_deaths' => $daily_deaths, 'daily_recovered' => $daily_recovered,
            'daily_suspect_hospitalized' => $daily_suspect_hospitalized);

        return $data['total_figures'];
    }

    /**
     * function to get Covid Progress for a date range
     * @param Request $request
     * @return array|mixed
     * @throws \Exception
     */
    function getCovidProgressForDateRange(Request $request)
    {
        $start_date = $request->input('start_date');
        if ($start_date == "")
            $start_date = date('Y-m-d', strtotime('-7 days'));
        $end_date = $request->input('end_date');
        if ($end_date == "")
            $end_date = date('Y-m-d');


        $date_list = array();
        $interval = new DateInterval('P1D');

        $realEnd = new DateTime($end_date);
        $realEnd->add($interval);

        $period = new DatePeriod(new DateTime($start_date), $interval, $realEnd);

        foreach ($period as $date) {
            $date_list[] = $date->format("Y-m-d");
        }

        $covid_progress = array();
        foreach ($date_list as $date) {

            $total_confirmed_cases = $this->dailyCases::whereIn('status', array('CONFIRMED_CASE', 'DIED', 'RECOVERED_DISCHARGED'))
                ->whereDate('reported_date', '<=', $date)
                ->count();

            $daily_confirmed_cases = $this->dailyCases::whereIn('status', array('CONFIRMED_CASE', 'DIED', 'RECOVERED_DISCHARGED'))
                ->whereDate('reported_date', $date)
                ->count();

            $covid_progress[] = array('date' => $date, 'total_confirmed_cases' => $total_confirmed_cases,
                'daily_confirmed_cases' => $daily_confirmed_cases);
        }

        $data['covid_progress'] = array('data_list' => $covid_progress);

        return $data['covid_progress'];
    }

    /**
     * function to get Covid recovery progress counts
     * @param Request $request
     * @return array|mixed
     * @throws \Exception
     */
    function getCovidRecoveriesForDateRange(Request $request)
    {

        $start_date = $request->input('start_date');
        if ($start_date == "")
            $start_date = date('Y-m-1');
        $end_date = $request->input('end_date');
        if ($end_date == "")
            $end_date = date('Y-m-d');


        $date_list = array();
        $interval = new DateInterval('P1D');

        $realEnd = new DateTime($end_date);
        $realEnd->add($interval);

        $period = new DatePeriod(new DateTime($start_date), $interval, $realEnd);

        foreach ($period as $date) {
            $date_list[] = $date->format("Y-m-d");
        }

        $recovery_list = array();

        foreach ($date_list as $date) {

            $recovery_count = $this->dailyCases::whereIn('status', array('RECOVERED_DISCHARGED'))
                ->whereDate('reported_date', $date)
                ->count();

            $recovery_list[] = array('date' => $date, 'recovery_count' => $recovery_count);
        }

        $data['covid_recoveries'] = array('data_list' => $recovery_list);

        return $data['covid_recoveries'];
    }

    /**
     * function to get District wise distribution of covid data
     * @return array|mixed
     */
    function getDistrictDistribution()
    {

        $district_distribusion = DB::table('daily_cases')
            ->join('districts', 'districts.id', '=', 'daily_cases.detected_district_id')
            ->groupBy('daily_cases.detected_district_id')->groupBy('districts.name')
            ->select(DB::raw('count(*) AS count'), 'districts.name')
            ->get();

        $district_distribusion_list = array();
        foreach ($district_distribusion as $rec) {
            $district_distribusion_list[] = array('district' => $rec->name, 'count' => $rec->count);
        }

        $data['district_distribusion'] = array('data_list' => $district_distribusion_list);

        return $data['district_distribusion'];
    }

    /**
     * function to get gender wise breakdown of covid data
     * @return array|mixed
     */
    function getGenderWiseBreakdown()
    {

        $male_count = $this->dailyCases::where('gender', "M")
            ->count();

        $female_count = $this->dailyCases::where('gender', "F")
            ->count();

        $data['gender_breakdown'] = array('male_count' => $male_count, 'female_count' => $female_count);

        return $data['gender_breakdown'];
    }

    /**
     * function to get all covid data
     * @return mixed
     */
    function getAllDailyCases()
    {
        $data['all_data'] = $this->dailyCases::get();

        return $data['all_data'];
    }
}

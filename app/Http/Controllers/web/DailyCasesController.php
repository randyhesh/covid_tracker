<?php


namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\DailyCases;
use DB;
use Illuminate\Support\Facades\View;
use Log;
use Illuminate\Support\Facades\Cache;

class DailyCasesController extends Controller
{

    public function __construct()
    {
    }

    /**
     * load Manage Covid Data page
     * @return \Illuminate\Contracts\View\View
     */
    function getCovidDataList()
    {
        $data = DailyCases::paginate(8);
        return View::make('manage_covid_data.covid_data_list', compact('data'));
    }

    /**
     * filter covid data
     * @param Request $request
     * @return array
     */
    function filterCovidData(Request $request){

        $status = $request->input('status');
        $reported_date = $request->input('reported_date');

        $data = DailyCases::orderBy('reported_date', 'DESC');
        if($status != ''){
            $data = $data->where('status', $status);
        }

        if($reported_date != ''){
            $data = $data->where('reported_date', $reported_date);
        }
        $data = $data->paginate(2);

        return array(
            'code' => 200,
            'content' => View::make('manage_covid_data.data_list_content', compact('data'))->render()
        );
    }

    /**
     * load covid data adding page
     * @return \Illuminate\Contracts\View\View
     */
    function createCovidData()
    {
        $action = 'save_form';
        return View::make('manage_covid_data.add_covid_data', compact('action'));
    }

    /**
     * Save Covid data
     * @param Request $request
     * @return array
     */
    function saveCovidData(Request $request){

        $validate = Validator::make($request->input(), array(
            'status' => 'required',
            'reported_date' => 'required',
            'gender' => 'required'
        ));

        if ($validate->fails()) {
            return array('code' => 400, 'error' => $validate->messages());
        }

        DB::beginTransaction();
        try {
            $covid = new DailyCases();

            $covid->reported_date = $request->input('reported_date');
            $covid->detected_province_id = $request->input('detected_province_id');
            $covid->detected_district_id = $request->input('detected_district_id');
            $covid->detected_city_id = $request->input('detected_city_id');
            $covid->patient_name = $request->input('patient_name');
            $covid->gender = $request->input('gender');
            $covid->dob = $request->input('dob');
            $covid->nationality = $request->input('nationality');
            $covid->status = $request->input('status');
            $covid->date_of_death = $request->input('date_of_death');
            $covid->place_of_death = $request->input('place_of_death');

            $covid->save();

            DB::commit();
            Cache::flush();

            return array(
                'code' => 200,
                'message' => 'Record created successfully.'
            );
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            log::error($e);
            return array(
                'code' => 401,
                'message' => 'Something went wrong.'
            );
        }
    }

    /**
     * load edit covid data page
     * @param Request $request
     * @return array
     */
    function editCovidData(Request $request)
    {
        $action = 'update_form';
        $covid_record = DailyCases::where('id', $request->input('id'))->first();
        $edit_view = true;

        return array(
            'code' => 200,
            'message' => View::make('manage_covid_data.form_fields', compact('covid_record', 'action' , 'edit_view'))->render()
        );
    }

    /**
     * update Covid data
     * @param Request $request
     * @return array
     */
    function updateCovidData(Request $request){

        $validate = Validator::make($request->input(), array(
            'id' => 'required',
            'status' => 'required',
            'reported_date' => 'required',
            'gender' => 'required'
        ));

        if ($validate->fails()) {
            return array('code' => 400, 'error' => $validate->messages());
        }

        DB::beginTransaction();
        try {
            $covid = DailyCases::find($request->input('id'));

            if(null($covid)){
                return array('code' => 401, 'error' => 'Record Not Found');
            }

            $covid->reported_date = $request->input('reported_date');
            $covid->detected_province_id = $request->input('detected_province_id');
            $covid->detected_district_id = $request->input('detected_district_id');
            $covid->detected_city_id = $request->input('detected_city_id');
            $covid->patient_name = $request->input('patient_name');
            $covid->gender = $request->input('gender');
            $covid->dob = $request->input('dob');
            $covid->nationality = $request->input('nationality');
            $covid->status = $request->input('status');
            $covid->date_of_death = $request->input('date_of_death');
            $covid->place_of_death = $request->input('place_of_death');

            $covid->save();

            DB::commit();
            Cache::flush();

            return array(
                'code' => 200,
                'message' => 'Record updated successfully.'
            );
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            log::error($e);
            return array(
                'code' => 401,
                'message' => 'Something went wrong.'
            );
        }


    }

    /**
     * delete covid data
     * @param Request $request
     * @return array
     */
    function deleteCovidData(Request $request){

        DB::beginTransaction();
        try {
            $id = $request->input('id');
            $covid = DailyCases::find($id);

           if(!is_null($covid)){

               $covid->delete();
               DB::commit();
               Cache::flush();

               return array(
                   'code' => 200,
                   'message' => 'Record deleted successfully.'
               );

           }else{
               return array(
                   'code' => 401,
                   'message' => 'Record not found.'
               );
           }

        }
        catch (\Exception $e)
        {
            DB::rollBack();
            log::error($e);
            return array(
                'code' => 401,
                'message' => 'Something went wrong.'
            );
        }


    }

}

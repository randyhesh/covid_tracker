<?php


namespace App\Http\Controllers;


use Illuminate\Support\Facades\View;

class UserController extends Controller
{

    function test(){

       return View::make('dashboard.main_dashboard');
    }

}

<?php


namespace App\Http\Controllers\web;


use App\Http\Controllers\Controller;
use App\Models\DailyCases;
use App\Models\PassportOAuthClient;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Auth;

use Log;

class LoginController extends Controller
{
    public function __construct()
    {

    }

    /**
     * function to register a user
     * @param Request $request
     * @return array
     */
    public function register(Request $request)
    {

        DB::beginTransaction();
        try {
            $email = $request->input('email_reg');
            $password = $request->input('password_reg');

            $validator = Validator::make($request->all(), [
                'email_reg' => 'required|email',
                'password_reg' => 'required'
            ]);

            if ($validator->fails()) {

                return array('code' => 400, 'error' => $validator->messages());

            }

            $user = new User();
            $user->email = $email;
            $user->name = $email;
            $user->password = bcrypt($password);
            $user->role = "user";
            $user->save();

            DB::commit();

            return array(
                'code' => 200,
                'content' => 'Record added successfully. <br>Please Login to Proceed'
            );

        } catch (\Exception $e) {
            DB::rollBack();
            log::error($e);
            return array(
                'code' => 401,
                'message' => 'Something went wrong.'
            );
        }

    }

    /**
     * login function
     * @param Request $request
     * @return array
     */
    public function login(Request $request)
    {
        try {

            $email = $request->input('email');
            $password = $request->input('password');

            $validate = Validator::make($request->input(), array(
                'email' => 'required',
                'password' => 'required'
            ));

            if ($validate->fails()) {
                return array('code' => 400, 'error' => $validate->messages());
            }

            $user = User::where('email', '=', $email)->first();

            if (is_null($user) || !$user->validateForPassportPasswordGrant($password)) {
                return array(
                    'code' => 401,
                    'message' => 'Your Credentials are Incorrect.'
                );
            }

            $oClient = PassportOAuthClient::where('password_client', 1)->first();

            $req = Request::create('/oauth/token', 'POST', [
                'grant_type' => 'password',
                'client_id' => $oClient->id,
                'client_secret' => $oClient->secret,
                'username' => $user->email,
                'password' => $password,
                'scope' => '',
            ]);

            $response = app()->handle($req);
            log::info($response->status());
            if ($response->status() === 200) {

                $response = json_decode($response->getContent(), true);
                $token = $response['access_token'];

                Session::put('access_token', $token);

                Auth::login($user, true);

                return array(
                    'code' => 200,
                    'message' => 'success.'
                );

            }

            return array(
                'code' => 401,
                'message' => 'Something went wrong.'
            );

        } catch (\Exception $e) {

            log::error($e);
            return array(
                'code' => 401,
                'message' => 'Something went wrong.'
            );
        }
    }

    /**
     * logout function
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logoutUser(Request $request)
    {
        Session::forget('access_token');
        Auth::logout();
        return redirect('/');
    }

    /**
     * function to API login
     * @param Request $request
     * @return array|mixed|null
     */
    public function apiLogin(Request $request)
    {
        try {

            $email = $request->input('email');
            $password = $request->input('password');

            $user = User::where('email', '=', $email)->first();

            if (is_null($user) || !$user->validateForPassportPasswordGrant($request->input('password'))) {
                return array(
                    'code' => 400,
                    'message' => 'Your Credentials are Incorrect.'
                );
            }

            $oClient = PassportOAuthClient::where('password_client', 1)->first();

            $req = Request::create('/oauth/token', 'POST', [
                'grant_type' => 'password',
                'client_id' => $oClient->id,
                'client_secret' => $oClient->secret,
                'username' => $user->email,
                'password' => $password,
                'scope' => '',
            ]);

            $response = app()->handle($req);

            return ($response->status() === 200) ? json_decode($response->getContent(), true) : null;

        } catch (\Exception $e) {

            log::error($e);
            return array(
                'code' => 401,
                'message' => 'Something went wrong.'
            );
        }
    }

}

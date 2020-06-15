<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'admin/stagiaires';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }
     /**
     * Show the application's login Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('admin.login');
    }
     /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->intended('/admin');
    }

    public function changepassword(Request $request)
    {
        if($request->password != $request->password_confirmation)
        {
            return back()->with('error','La confirmation de mot de pass ne corespond pas');
        }
        if(strlen($request->password)<8)
        {
            return back()->with('error','Le mot de passe doit comporter au moins 8 caractères.');
        }
        $admin = Admin::first();
        $admin->password = $request->password;
        $admin->save();
        return redirect('/admin/messages')->with('success','Votre mot de passe a été changé');
    }
}

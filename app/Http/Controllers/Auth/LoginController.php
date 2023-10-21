<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function login(Request $request){
        $credentials=$request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::attempt($credentials)){
            $user_role=Auth::user()->role;

            switch($user_role){
                case 1:
                    // return redirect('/dashboard');
                    return redirect()->route('director.home');
                    break;
                case 2:
                    // return redirect('/dashboard');
                    return redirect()->route('staff.home');
                    break;
                case 3:
                    // return redirect('/dashboard');
                    return redirect()->route('researcher.home');
                    break;
                case 4:
                    // return redirect('/dashboard');
                    return redirect()->route('reviewer.home');
                    break;
                default:
                    Auth::logout();
                    return redirect('/login')->with('error', 'something went wrong!');

            }
        }else{
            return redirect('/login');
        }

    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $socialiteUser = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            // Handle any exceptions that may occur during the OAuth process
            return redirect('/login')->with('error', 'Unable to authenticate with Google.');
        }

        // You can create a new user or log in an existing user based on $socialiteUser data
        $user = User::where('email', $socialiteUser->getEmail())->first();

        if (!$user) {
            // If the user doesn't exist, display a message and prompt them to register
            return redirect('/login')->with('error', 'Please register an account first.');
        }

        Auth::login($user);

        // Check the user's role and redirect accordingly
        if ($user->role === 1) {
            return redirect()->route('director.home');
        } elseif ($user->role === 2) {
            return redirect()->route('staff.home');
        } elseif ($user->role === 3) {
            return redirect()->route('researcher.home');
        } elseif ($user->role === 4) {
            return redirect()->route('reviewer.home');
        } else {
            // Handle other roles or a default redirection here
            return redirect('/home');
        }
    }

}

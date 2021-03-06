<?php

namespace App\Http\Controllers\Auth;

use App\Mail\UserRegister;
use App\User;
use Carbon\Carbon;
use Dompdf\Exception;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|same:password',
            'department_id' => 'required|integer|exists:departments,id',
            'phone' => 'required|integer',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'department_id' => $data['department_id'],
            'phone' => $data['phone'],
            'admin' => '0',
            'blocked' => '0',
            'print_evals' => 0,
            'print_counts' => 0,
            'created_at' => Carbon::now(),
            'updated_at' =>Carbon::now(),
        ]);

        $user->remember_token = str_random(10);

        $user->save();
        try {
            Mail::to($user)->send(new UserRegister($user));
        } catch (Exception $e) {
            $user->delete();
            return null;
        }

        return $user;
    }


    public function form()
    {
        $user = new User;
        return view('auth.register', compact('user'));
    }
}

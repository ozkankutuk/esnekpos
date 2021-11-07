<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Service;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'name'          => ['required', 'string', 'max:255'],
            'gsm'           => 'required|digits_between:10,11|unique:users',
            'tckno'         => "digits:11|required_if:register_type,bireysel|unique:users",
            'vergino'      => "digits:10|required_if:register_type,kurumsal|unique:users",

            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function showRegistrationForm()
    {
        $companies = User::companies()->get();

        empty($companies) ?? $companies = [];

        return view('auth.register', compact('companies'));
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $createdData = [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'gsm' => $data['gsm'],
            'tckno' => isset( $data['tckno'] ) ? $data['tckno'] : Null,
            'vergino' => isset( $data['vergino'] ) ? $data['vergino'] : Null ,
        ];

        if( isset($data['tckno'] ) ){
            $createdData['parent_id'] = $data["company"];
        }

        return User::create($createdData);
    }
}

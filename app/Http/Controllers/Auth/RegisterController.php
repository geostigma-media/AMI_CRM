<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
      $this->middleware('admin');
    }

    protected function validator(array $data)
    {
      return Validator::make($data, [
        'name' => ['required', 'string', 'max:255'],
        'lastname' => ['required', 'string'],
        'phone' => ['required', 'integer'],
        'numIdentification' => ['required', 'integer'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'role' => [],
      ]);
    }

    protected function create(array $data)
    {
      dd($data);
        return User::create([
          'name' => $data['name'],
          'email' => $data['email'],
          'numIdentification' => $data['numIdentification'],
          'password' => Hash::make($data['numIdentification']),
          'lastname' => $data['lastname'],
          'phone' => $data['phone'],
          'role' => 2,
        ]);
    }
}

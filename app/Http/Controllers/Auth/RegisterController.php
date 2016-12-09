<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller {
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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
                    'first_name' => 'required|max:40',
                    'last_name' => 'required|max:40',
                    'username' => 'required|max:60|unique:users',
                    'email' => 'required|email|max:80|unique:users',
                    'password' => 'required|min:6|confirmed',
                    'avatar_image' => 'image|mimes:jpg,png,jpeg,gif|required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data) {
        $image = Input::file('avatar_image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $path = public_path('uploads/'.$filename);
        Image::make($image->getRealPath())->resize(200, 200)->save($path);
        $data['avatar_image'] = $filename;
        return User::create([
                    'firstname' => $data['first_name'],
                    'lastname' => $data['last_name'],
                    'username' => $data['username'],
                    'email' => $data['email'],
                    'password' => bcrypt($data['password']),
                    'avatar_user' => $data['avatar_image'],
        ]);
    }

}

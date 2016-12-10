<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Socialite;

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
        $file = Request::file('avatar_image');
        $image_name  = time() . '.' . $file->getClientOriginalExtension();
        $path = public_path('uploads/'.$image_name);
        $file->move('uploads', $image_name);
        $data['avatar_image'] = $image_name;
        return User::create([
                    'firstname' => $data['first_name'],
                    'lastname' => $data['last_name'],
                    'email' => $data['email'],
                    'password' => bcrypt($data['password']),
                    'avatar_user' => $data['avatar_image'],
        ]);
    }
    
     public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        
        try{
            $socialUser = Socialite::driver('facebook')->user();
        } catch (\Exception $e){
            return redirect("/");
        }
        
        $user = User::where('facebook_id',$socialUser->getId())->first();
        if(!$user){
            User::create([
                    'facebook_id' => $socialUser->getId(),
                    'firstname' => $socialUser->getName(),
                    'lastname' => '',
                    'email' => $socialUser->getEmail(),
                    'password' => '',
                    'avatar_user' => $socialUser->getAvatar(),
            ]);    
        }
        if($user == null){
            return redirect()->to('/login');
        }else{
            auth()->login($user);
            return redirect()->to('/home');
        }
        // $user->token;
    }

}

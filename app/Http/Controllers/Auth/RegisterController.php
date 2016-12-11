<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use Request;
use Illuminate\Support\Facades\Mail;
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
                    'fb_email' => $socialUser->getEmail(),
                    'password' => '',
                    'avatar_user' => $socialUser->getAvatar(),
            ]);
            $user = User::where('facebook_id',$socialUser->getId())->first();
        }
        if($user == null){
            return redirect()->to('/login');
        }else{
            auth()->login($user);
            return redirect()->to('/home');
        }
    }
    
    public function register(\Illuminate\Http\Request $request)
    {
        $this->validator($request->all())->validate();
        event(new \Illuminate\Auth\Events\Registered($user = $this->create($request->all())));
        
        Mail::to($user->email)->send(new \App\Mail\ConfirmationAccount($user));
        
        return back()->with('status', 'Please confirm your email address.');
        // $this->guard()->login($user);
        // return redirect($this->redirectPath());
    }
    /**
     * Confirm a user's email address.
     *
     * @param  string $token
     * @return mixed
     */
    public function confirmEmail($token)
    {
        if(Auth::user()){
            return redirect('/home');
        }
        User::whereToken($token)->firstOrFail()->confirmEmail();
        return redirect('login')->with('status', 'You are now confirmed. Please login.');
    }

}

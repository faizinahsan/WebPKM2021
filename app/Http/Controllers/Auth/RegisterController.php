<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

use App\User;
use App\Models\Mahasiswa;
use App\Models\Kemahasiswaan;
use App\Models\DosenPendamping;
use App\Models\DosenReviewer;

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role_id'=> ['required','string','max:20'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        if ($data['role_id']==1) {
            # code...
            $user = User::create([
                        'name' => $data['name'],
                        'email' => $data['email'],
                        'password' => Hash::make($data['password']),
                        'role_id'=>$data['role_id'],
                    ]);
            $kemahasiswaan = Kemahasiswaan::create([
                'nip_kemahasiswaan'=>$data['npmNip'],
                'nip_reviewer'=>null,
                'users_id'=>$user->id,
            ]);
            kemahasiswaanRegisterTesting($data['npmNip'],$user->name);
            return $user;
        }else if ($data['role_id']==2){
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'role_id'=>$data['role_id'],
            ]);

            $reviewer = DosenReviewer::create([
                'nip_reviewer'=>$data['npmNip'],
                'users_id'=>$user->id,
            ]);
            reviewerRegisterTesting($data['npmNip'],$user->name);
            return $user;
        }else if ($data['role_id']==3) {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'role_id'=>$data['role_id'],
            ]);

            $pendamping = DosenPendamping::create([
                'nip_pendamping'=>$data['npmNip'],
                'users_id'=>$user->id,
            ]);
            pendampingRegisterTesting($data['npmNip'],$user->name);
            return $user;
        }else if($data['role_id']==4){
             # code...
             $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'role_id'=>$data['role_id'],
            ]);

            $mahasiswa = Mahasiswa::create([
                'npm_mahasiswa'=>$data['npmNip'],
                'nip_pendamping'=>null,
                'nip_reviewer'=>null,
                'users_id'=>$user->id,
            ]);
            return $user;
        }
    }
}

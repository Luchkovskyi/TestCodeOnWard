<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Request;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
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
            'name' => 'required|max:255',
            'phone' => 'required|regex:/[0-9]{3}-[0-9]{7}/',
            'date' => 'required|regex:/[0-9]{4}-[0-9]{2}-[0-9]{2}/',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'CaptchaCode' => 'required|valid_captcha'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
   public function create(array $data )
    {

        if(isset($data['preview']))
        {
            $root=$_SERVER['DOCUMENT_ROOT']."/images/"; // ��� �������� ����� ��� �������� ��������
            $f_name=$data['preview']->getClientOriginalName();//���������� ��� �����

            $data['preview']->move($root,$f_name); //���������� ���� � ����� � ������������ ������

            $data['preview']="/images/".$f_name; // ������ �������� preview �� ���� ������, ����� � ���� ������� ���-�� ����� /tmp/sdfWEsf.tmp
          // echo $data['_token'];
            $data['password']= bcrypt($data['password']);
            return  User::create($data); //��������� ������ � ����

        }
        else
        {
            $data['preview']="/images/temp.jpg";
            $data['password']= bcrypt($data['password']);
            return User::create($data);
        }


    }


    public function index()
    {

        return view('Register');
    }

    public function indexPost(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|same:password_confirmation',
            'password_confirmation' => 'required',
            'CaptchaCode' => 'required|valid_captcha'
        ]);
        print('write your other code here.');
    }

}

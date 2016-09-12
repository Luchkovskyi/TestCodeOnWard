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
        print_r($data);
        if($data->hasFile('preview')) //Проверяем была ли передана картинка
        {
            $request=date('d.m.Y'); //опеределяем текущую дату, она же будет именем каталога для картинок
            $root=$_SERVER['DOCUMENT_ROOT']."/images/"; // это корневая папка для загрузки картинок
            if(!file_exists($root.$request))
            {
                mkdir($root.$request); // если папка с датой не существует, то создаем ее
            }
            $f_name=$data->file('preview')->getClientOriginalName();//определяем имя файла
            $data->file('preview')->move($root.$request,$f_name); //перемещаем файл в папку с оригинальным именем
            $all=$data->all(); //в переменой $all будет массив, который содержит все введенные данные в форме
            $all['preview']="/images/".$request."/".$f_name;// меняем значение preview на нашу ссылку, иначе в базу попадет что-то вроде /tmp/sdfWEsf.tmp
            User::create($all); //сохраняем массив в базу
        }
        else
        {
            return User::create([
                'Soname' => $data['Soname'],
                'name' => $data['name'],
                'email' => $data['email'],
                'date' => $data['date'],
                'phone' => $data['phone'],
                'password' => bcrypt($data['password']),
            ]);
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

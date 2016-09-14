<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\User;
use Validator;
use App\Http\Controllers\Auth\AuthController;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

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

    public function updateProfile(Request $request)
    {
        if ($request->user()) {
            // $request->user() возвращает экземпл€р аутентифицированного пользовател€...
        }
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $info= Auth::User()->id;
      $user=User::find($info);
       return view('/home',['user'=>$user]);

    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required|max:255',
            'phone' => 'required|regex:/[0-9]{3}-[0-9]{7}/',
            'date' => 'required|regex:/[0-9]{4}-[0-9]{2}-[0-9]{2}/',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|confirmed',
            'CaptchaCode' => 'required|valid_captcha'
        ]);

        $user=User::find($id);

        if($request->hasFile('preview'))
        {
            $root=$_SERVER['DOCUMENT_ROOT']."/images/"; // это корнева€ папка дл€ загрузки картинок
            $f_name=$request->file('preview')->getClientOriginalName();//определ€ем им€ файла
            $request->file('preview')->move($root,$f_name); //перемещаем файл в папку с оригинальным именем



            $all=$request->all();
            $all['password']= bcrypt($request['password']);
            $all['preview']="/images/".$f_name;
            $user->update($all); //сохран€ем массив в базу
            return back();
        }
        else
        {
           $all=$request->all();

          $all['password']=bcrypt($request['password']);
          $all['preview']="/images/temp.jpg";
           $user->update($all);
            return back();
        }

    }


    public function destroy($id)
    {

        $user=User::find($id);
        $user->delete();
        $root=$_SERVER['DOCUMENT_ROOT'];
        if(!empty($user->preview))
        {
            unlink($root.$user->preview); //удал€ем превьюшку
        }
        return redirect('/login');

    }
}

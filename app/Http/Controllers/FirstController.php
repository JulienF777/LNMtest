<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FirstController extends Controller
    {
    function login(){

    return view('login');
    }
    
    function loginT(){
        //$films = DB::select('select * from film');
            if (!isset($_POST['mail']) || !isset($_POST['pwd'])) {
              return redirect('/login');
              } else {
                var_dump($_POST["pwd"]);
                $vars=[$_POST["mail"],$_POST["pwd"]];
                $user = DB::select('select * from user where email=? and mdp=sha1(?)',[$_POST['mail'],$_POST['pwd']]); 
                $user = $user[0];

                if ($user === false) {
                  return redirect('/login');
                } else {
                  session(["id" => $user->id]);
                  session(["login" => $user->login]);
                  if (isset($_POST['rememberme'])) {
                      $token = bin2hex(random_bytes(20));
                      setcookie('token', $token, time() + 86400 );
                  } else {
                      $token = '';
                      setcookie('token', $token, time() - 3600 );
                  }
                  $sql = DB::select("update user set remember=? where id=?",[$token,session('id')]);
                  return redirect('/index');

                }
              
              }
          }

    }



    
 





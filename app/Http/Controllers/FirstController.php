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
                header('location: login');
              } else {
                $user = DB::select('select * from user where email=? and mdp=sha1(?)',[$_POST['mail']],[$_POST['pwd']]); // il faut un array pour que ca marche check ça mon frere https://stackoverflow.com/questions/10966251/error-when-preparing-a-multiple-insert-query
              
                if ($user === false) {
                  header('location: login');
                } else {
                  $_SESSION['id'] = $user['id'];
                  $_SESSION['login'] = $user['login'];
              
                  if (isset($_POST['rememberme'])) {
                      $token = bin2hex(random_bytes(20));
                      setcookie('token', $token, time() + 86400 );
                  } else {
                      $token = '';
                      setcookie('token', $token, time() - 3600 );
                  }
                  $sql = "update user set remember=? where id=?";
                  $query = $pdo->prepare($sql);
                  $query->execute([$token,$_SESSION['id']]);
                  header('location: index');
                }
              
              }
            }
              
    }



    
 





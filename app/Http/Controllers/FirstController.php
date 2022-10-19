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
        if (!isset($_POST['mail']) || !isset($_POST['pwd'])) {
          return redirect('/index');
          } else {
            var_dump($_POST["pwd"]);
            $vars=[$_POST["mail"],$_POST["pwd"]];
            $user = DB::select('select * from user where email=? and mdp=sha1(?)',[$_POST['mail'],$_POST['pwd']]); 

            if (!isset($user[0])) {
              return redirect('/login');
            } else {
              session(["id" => $user[0]->id]);
              session(["login" => $user[0]->login]);
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

function signin(){
  if (session('id')!==NULL){
    return view('index');
  }
  return view('signin');
}

function signinT(){
    if(session("login")!=NULL){
        echo"vous etes deja connecté";
    }elseif(isset($_POST["id"]) AND isset($_POST["mdp"])){
            
            $login=$_POST["id"];
            $mdp=$_POST["mdp"];
            $mail=$_POST["mail"];
            $mdpC=$_POST["mdpC"];

            $mails = DB::select("SELECT * from user where email=?",[$mail]);
            $logins = DB::select("SELECT * from user where login=?",[$login]);
            
            $test=0;
            if($mdp!=$mdpC){
                $test=1;
                $_POST['tmp']="Veuillez entrer deux fois le meme mot de passe";
            }elseif($mails != NULL){ 
                $test=2;
                $_POST['tmp']="Cette adresse mail est deja utilisée";
            }elseif($logins != NULL){
                $test=3;
                $_POST['tmp']="Ce nom d'utilisateur est deja utilisé";
            }
            if($test==0){
              $addUser = DB::select('INSERT INTO user (login, mdp, email) VALUES (?,sha1(?),?);',[$login,$mdp,$mail]);
              var_dump($addUser);
              session(["login" => $login]);
              session(["id" => DB::getPdo()->lastInsertId()]);
              var_dump(session("login"));
              return redirect('/index');
            }elseif($test==1){
              return redirect('/signin');
            }
        }else{
            echo"erreur";
        }
}
}



    
 





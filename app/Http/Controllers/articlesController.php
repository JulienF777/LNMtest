<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class articlesController extends Controller
    {
        function articles(){

$id=$_SESSION['id'];
if (isset($_GET['id'])){
  $idA=$_GET['id'];
}else{
  $idA=$_SESSION['id'];
}

$_SESSION['page']="articles";

$Rusers=DB::select("SELECT id,login,email,avatar FROM user WHERE id=?",[$_POST['id']]);
$a= $pdo->prepare($Rusers);
$a -> execute([$idA]);
$userInfo=$a -> fetch();

$sql = "SELECT article.*,user.login, liked.idArticle as liked from article inner join user on user.id = article.idAuteur LEFT join liked on liked.idArticle= article.id and liked.idUser = ? where idAuteur=? order by dateEcrit DESC ";
$q = $pdo->prepare($sql);
$q->execute([$id,$idA]);
$articles=$q -> fetchall();
if($articles != NULL){
  echo $blade->make("articles",array('articles' => $articles ,'idA' => $idA,'id' => $id,"userInfo" => $userInfo))->render();
}else{
  echo $blade->make("articles",array("userInfo" => $userInfo))->render();

}
    }

    function aarticles(){
        $art=DB::select("SELECT * FROM article");
       // $art = 'ok';
        return view('aarticles', ['art' => $art]);
}
    }


?>
        
 





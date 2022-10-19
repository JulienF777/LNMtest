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
       $url=DB::select("SELECT img_url,id FROM article");
       

       // fonction pour corriger les URL (on retire le /public) creation du tableau turl ou la clef est l'id de l'article et la valeur le lien corrigé vers limg
       $turl=[];
        foreach($url as $url){ // ici, je retire /public de lurl des images
        // dump($url->img_url);
        $str = $url->img_url;
        $prefix = '/public';
 
                if (substr($str, 0, strlen($prefix)) == $prefix) {
                $str = substr($str, strlen($prefix));
                 } 
        // dump($str);
        // array_push($turl, $str);
        $turl[$url->id] = $str; // j'ajoute la clef id corresepondant à l'article à a chaque url
        // dd($turl);
      }
 
      
        return view('aarticles', ['art' => $art, 'str' => $str, 'turl' => $turl]);
        
}
    }


?>
        
 





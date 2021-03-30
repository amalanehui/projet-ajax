<?php
 $dbname='jquery';
 $host='localhost';
 $username='root';
 try
{ 
   $cnx= new PDO('mysql:host=localhost;dbname=jquery', 'root', '');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());

}
 $username=$_POST["username"];
 $password=$_POST["password"];
 $tel=$_POST["telephone"];
 $email=$_POST["email"];
  if($username<>"" and $password<>""and $tel<>"" and $email<>"")
  {
        $req=$cnx->prepare("insert into utilisateur(username,password,telephone, email) values(:username, :password, :telephone, :email)");
        $req->execute(array(":username"=>$username , ":password"=>$password , ":telephone"=>$tel, ":email"=>$email)) or die($req->errorInfo());
        echo'Success';
  }
  else
  {
    echo'<script>alert("Echec d\Opération");</script>';
  }
?>

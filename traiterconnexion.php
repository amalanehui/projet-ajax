<?php
 $dbname='jquery';
 $host='localhost';
 $username='root';
 $cnx= new PDO('mysql:host=localhost;dbname=jquery', 'root', '');
 $mail=$_POST["mail"];
 $password=$_POST["password"];
 $mail="'".$mail."'";
 $req="SELECT id, password FROM utilisateur where email=".$mail;
 try
{ 
   $stmt=$cnx->query($req);
   if($stmt===false)
   {
   	die("Erreur");
   }
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());

}
$rom=$stmt->fetch(PDO::FETCH_ASSOC);
if($rom["password"]==$password)
{
	echo('Success');
}else
{ 
	echo('mot de passe incorrect');
}
 
?>

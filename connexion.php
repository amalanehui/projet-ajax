<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="bootstrap-5.0.0-beta2-dist/css/bootstrap.min.css">
	<style type="text/css">
	body
	{
		background-color:lightgray;
	}
		#cont
		{
			border:1px solid white;
			border-radius: 50px;
			width: 50%;
			height: 300PX;
			margin-top: 90px;
			margin-left:300px; 
			padding-top:90px;
			background-color:#32CD92;
			background:url(mon.jpg);

		}
		#cont h1{
			text-align: center;
			font-weight: bold;
			color:black;

		}
		#resultat
		{
			text-align: center;
		    color:red;
		    font-weight: bold;
		    font-size: 20px;
		    font-family:calibri;
		}
	</style>
</head>
</head>
<body>
<div id="cont">
	<h1>Connectez-vous</h1><br>	
	<form class="row row-cols-lg-auto g-3 align-items-center">
  <div class="col-12">
    <label class="visually-hidden" for="mail">Email</label>
    <div class="input-group">
      <div class="input-group-text">@</div>
      <input type="text" class="form-control" id="mail" placeholder="Email" >
    </div>
  </div>

  <div class="col-12">
    <label class="visually-hidden" for="mdp">Password</label>
    <input type="password" class="form-control" id="mdp" placeholder="Password" >
  </div>

  <div class="col-12">
    <button type="submit" class="btn btn-primary"id="connexion">Connexion</button>
  </div>
</form>
<div id="resultat">	</div>
</div>
<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
	$(document).ready(function()
	{
		$("#connexion").click(function(e)
		{
			e.preventDefault();
			var $mail=$("#mail").val(),
			    $mdp=$("#mdp").val()
			    if($mail!="" && $mdp!="")
			    {
			    	$.post(
				'traiterconnexion.php',
				{
					mail: $('#mail').val(),
					password: $('#mdp').val(),
				},
				function(data)
				{
					if(data=='Success')
					{
						//$("#resultat").html("<p> Vous avez été connecté avec succès ! </p>");
						 window.location.href="accueil.php";
				    }
				   else
				    {
				    	$("#resultat").html("<p>le mot de passe ou l'email n'est pas correct....</p>");
				    }
			    }
			);

			    }
			    else if($mail!="")
			    {
			      alert("le champ du mot de passe est vide!");
			    }
			    else if($mdp!="")
			    {
			    	alert("le champ du Mail est vide!");
			    }
			    else
			    {
			    	alert("aucun n'est renseigné!!!");
			    }
			
		});
	});
	
</script>
</body>
</html>
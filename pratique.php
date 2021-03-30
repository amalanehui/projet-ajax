<!DOCTYPE html>
<html>
<head>
	<title>	Pratique Ajax</title>
	 <link rel="stylesheet" href="bootstrap-5.0.0-beta2-dist/css/bootstrap.min.css">
	 <style type="text/css">
	 	.card-body{
	 		background:url(img.jpg);
	 	}
	 	body
	{
		background-color:lightgray;
	}
	 </style>
</head>
<body>
	<div class="row">
 		<div class="col-sm-3"></div>
 		<div class="col-sm-5 ">
		 	<div class="card border-info">
 	   		 <div class="card-header  bg-info text-center text-white" > <h2> Inscription</h2></div>
			 <div class="card bordered ">
			 	<div class="card-body">
			 		<form class="row row-cols-lg-auto g-3 align-items-center" method="post">
			 		    <div class="form-group">
			 			    <label for="username" class="form-group">Nom utilisateur:</label>
            	            <input type="text" class="form-control" id="username" placeholder="Username" >
                        </div>
                        <div class="form-group">
				            <label class="form-group" for="password">Password:</label>
                            <input type="password" class="form-control" id="password" placeholder="Password" onkeypress="myFunction()" >
                        </div>
                        <div class="form-group">
				            <label class="" for="tel">Téléphone:</label>
                            <input type="text" class="form-control" id="tel" placeholder="Téléphone">
                        </div>
                        <div class="form-group">
				            <label class="form-group" for="email">Email:</label>
                            <input type="text" class="form-control" id="email" placeholder="Email" >
                        </div>
                        <div class="text-center">
                            <input type="submit" name="submit" id="submit" value="Enregistrer" class="btn btn-primary">
                            <input type="reset" name="reset" id="reset" value="Annuler" class="btn btn-danger">
                        </div>
                    </form>
	                <div id="resultat">
	                </div>
	            </div>
	        </div>
	     </div>
       </div>
   </div>
<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
	function myFunction()
		{ 
			let elt= document.getElementById('password').value;
			 elt=elt.length;
			if(elt>=5)
			{
				document.getElementById("password").style.color="green";
			}
			else
			{
				document.getElementById("password").style.color="red";
			}
			
       }

	$(document).ready(function()
	{
		var tel=$("#tel");
		tel.keyup(function()
		{
			if($(this).val()>=0)
			{
				$(this).css(
				{// si tout est bon, on le rend vert
                   borderColor : 'green',
                   color : 'green'
				});
			}
			else
			{
				$(this).css(
				{
					borderColor : 'red',
                    color : 'red'
                   
               });
				 alert("saisir un chiffre...!");
			}
		});

		 $("#email").change(function()
		  {
		  	var phrase=$("#email").val();
		    var len=phrase.length;
		    var cmpt=0;
		  	for(i=0; i<len; i++)
		  	{
		  		carac=phrase.substring(i,i+1);
		  		if(carac=="@")
		  		{
		  			cmpt=cmpt+1;
		  		}
		  	}
		  	if(cmpt!=0)
		  	{
		  		$.post( 
		  			'verifiermail.php',
		  		{
		  			email:$('#email').val(),
		  		},
		  		function(data)
		  		{
		  			if(data=='Success')
		  			{
		  				alert("Le Mail existe déjà... changez le SVP!!");
		  				$("#email").val("");
		  			}
		  		});
		  	}
		  	else
		  	{
		  		$("#email").val("");
		  	}
		  });
		$("#submit").click(function(e){
			e.preventDefault();
			var nom=$("#username").val(),
			    mot=$("#password").val(),
			    tel=$("#tel").val(),
			    mail=$("#email").val();
			    longtel=tel.length;
			    a=0;
			    b=0;
			    	for(i=0; i<longtel; i++)
			    	{
			    		num=tel.substring(i,i+1);
			    		if(num>=0)
			    		{
			    			a=a+1;
			    			

			    		}
			    		else
			    		{
			    			b=b+1;
			    		}

			    	}
			    	if(a!=0 && longtel==10)
			    	{
			    		//le numéro de téléphon est correct;
			    		
			    	}
			    	else if(b!=0)
			    	{
			    		alert("le numéro de Téléphone n'est pas correct ");
			    		$("#tel").val("");
			    	}
			    	else
			    	{
			    		alert("la taille du numéro de Téléphone doit être 10..!!");
			    		$("#tel").val("");

			    	}
			    	

			if(nom!="" && mot!="" && tel!="" && mail!="")
			{
				$.post(
		    		'traiterpratique.php',
		    	{
		    		username : $('#username').val(),// Nous récupérons la valeur de nos inputs que l'on fait passer à connexion.php
				    password : $('#password').val(),
				    telephone:$('#tel').val(),
				    email:$('#email').val(),
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
					   $("#resultat").html("<p>Erreur lors de la connexion....</p>");
				    }
			    });
			}
			else if (nom!="" && mot!="" && tel!="")
			{
				alert("Le Mail est vide...!!");
			}
			else if(nom!="" && mot!="" && mail!="")
			{
				alert("Le Téléphone est vide..!!");

			}
			else if(mot!="" && mail!="" && tel!="")
			{
				alert("Le Nom est vide");
			}
			else if(nom!="" && tel!="" && mail!="")
			{
				alert("Le mot de passe est vide..!");
			}
			else if(nom!="")
			{
				alert("Le mot de Passe, Le Téléphone et l'Email sont vide!!!");
			}
			else if(mot!="")
			{
				alert("Le nom, Le Téléphone et l'Email sont vide!!!");
			}
			else if(tel!="")
			{
				alert("Le Nom, Le mot de Passe et l'Email sont vide!!!");
			}
			else if(mail!="")
			{
				alert("Le Nom, Le mot de Passe et Le Téléphone sont vide!!!");
			}
			else 
			{
				alert("Aucun champ n'est enregistré!!")
			}
		});
	});
	
</script>
	

</body>
</html>
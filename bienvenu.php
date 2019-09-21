<?php
include('common/functions.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

    <title>HNG Consulting || Obtenez des avis d'experts</title>
</head>
<body>
    <section class="section-main">
        <div class="main-bg">
            <h1>Hng Consulting</h1>
            <p class="text">
            Nous permettons aux petites entreprises de prospérer en proposant une stratégie leur permettant de mener leurs activités dans un environnement numérique plus sûr.
            </p>
        </div>
        <div class="form-bg">
            <h3 class="small-text">Hotels.ng</h3>
            <h4 class="form-home">Vous êtes maintenant connecté avec le compte<?php echo $_SESSION['user'];?></h4>
      
            <h3 class="create-account"><button class="btn btn-start" onclick="logout()">Déconnexion</button></h3>
        </div>
    </section>
    <script>
        function logout(){
            window.location.href = "deconnecter.php";
        }
    </script>
</body>
</html>
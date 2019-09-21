<?php
include('common/functions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

    <title>HNG Consulting || Get expert opinions</title>
</head>
<body>
    <section class="section-main">
        <div class="main-bg">
            <h1>Hng Consulting</h1>
            <p class="text">
                We allow small businesses thrive by delivering a strategy that enables them conduct business in a safer digital environment
            </p>
        </div>
        <div class="form-bg">
            <h3 class="small-text">Hotels.ng</h3>
            <h4 class="form-home">You are now logged in with the account <?php echo $_SESSION['user'];?></h4>
      
            <h3 class="create-account"><button class="btn btn-start" onclick="logout()">Log out</button></h3>
        </div>
    </section>
    <script>
        function logout(){
            window.location.href = "logout.php";
        }
    </script>
</body>
</html>
<?php
include('common/functions.php');
echo locale_get_default();
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
            <h2 class="form-welcome">Welcome back</h2>
            
            <form method="post" action="common/validate.php">
                     <!-- print out login error message-->
                <div class="error_msg">
                        <?php if (!empty($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    $_SESSION['msg'] = "";
}
                        ?>
                </div>
                <input type="email" name="email" placeholder="Email address" required>
                <input type="password" name="password" placeholder="Password" required>
                <button class="btn btn-submit" name="login" value="login" type="submit">Login</button>
            </form>
            <h3 class="password-forget"><a href="forgot.html">Forgot password ?</a></h3>
            <h3 class="create-account">Don't have account ? <button class="btn btn-start" onclick="signup()">Get Started</button></h3> 
        </div>
    </section>
    <script>
        function signup(){
            // var xhttp = new XMLHttpRequest();
            // xhttp.onreadystatechange = function() {
            //     if (this.readyState == 4 && this.status == 200) {
            //         document.write(this.responseText);
                    window.location.href = "signup.php";
            //     }
            // };
            // xhttp.open("GET", "signup.php", true);
            // xhttp.send();
        }
    </script>
</body>
</html>
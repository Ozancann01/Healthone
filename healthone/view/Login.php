<?php
namespace view;

class Login{

    public function showLogin(){

        $html=<<<EOT
      <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100&display=swap" rel="stylesheet"
</head>
<body style="height: 100vh;">
<header class="navbar navbar-light bg-primary d-flex justify-content-center text-light">
    <h1 >Healthone</h1>
</header>
<main style="padding: 10rem; height: 55rem;" class="d-flex justify-content-center" >
    <div class="container bg-primary mt-6 rounded" style="width: 50rem">
        <div class="row justify-content-center align-items-center">
            <div  class="col-md-6">
                <div  class="col-md-14">
                    <form id="login-form" class="form"  action="index.php" method="post">
                        <h3 class="text-center text-light bg-primary " style=" padding: 2rem;">Inloggen</h3>
                        <div class="form-group">
                            <label for="username" class="text-light">Email:</label><br>
                            <input type="email" name="username" id="username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-light">Password:</label><br>
                            <input type="password" name="password" id="password" class="form-control" required>

                        </div>
                        <div class="form-group d-flex justify-content-end">
                            <input type="submit" name="inloggen" class="btn btn-warning btn-md" value="Inloggen">

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>

EOT;
        echo $html;
    }

}
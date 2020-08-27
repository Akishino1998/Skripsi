<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="styles/shards-dashboards.1.1.0.min.css">
    <link rel="stylesheet" href="styles/extras.1.1.0.min.css">
</head>
<body>
            <div class="main-content-container container-fluid px-4 my-auto h-100">
                <div class="row no-gutters h-100">
                  <div class="col-lg-3 col-md-5 auth-form mx-auto my-auto">
                    <div class="card " style="margin-top:30px;">
                      <div class="card-body">
                        <!-- <img class="auth-form__logo d-table mx-auto mb-3" src="{{ asset('img/logo-javis.png') }}" alt="JAVIS"> -->
                        <h5 class="auth-form__title text-center mb-4">LOGIN</h5>
                        <form action="login-check.php" method="POST">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" name="username" class="form-control" id="username" placeholder="Username">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                          </div>
                          <button type="submit" class="btn btn-pill btn-accent d-table mx-auto" name="submit">Login</button>
                        </form>
                      </div>
                      <center><a href="daftar.php"><h6>Daftar</h6></a></center>
                    </div>
                  </div>
                </div>
              </div>
</body>
</html>
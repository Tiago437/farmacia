<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Entrar</title>
    <!-- bootstrap 5.3.2 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Assistant&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style/css.css" type="text/css"> 
</head>
<body  class="body-login1 d-flex align-items-center py-4">

  <main class="main-login form-signin m-auto">
 
      <form method="POST" action="login.php">
        <h2 class="t-login mb-3 fw-normal">Sistema GFarm</h2>
        <p class="t-login">please signin</p>
        <div class="form-floating mb-2">
          <input type="text" name="nomeent" class="form-control" id="nomeent" placeholder="Email">
          <label for="nomeent" class="label-login">ID</label>

        </div>
        <div class="form-floating">
          <input type="password" name="pwent" class="form-control" id="passwordent" placeholder="Password" >
          <label for="passwordent" class="label-login">Password</label>

        </div>
        <div class="form-check text-start my-3">
      <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
      <p class="t-login form-check-label" for="flexCheckDefault">
        Remember me
      </p>
    </div>
        <button type="submit" name="entrar" value="entrar" class="btn btn-primary w-100 py-2">Entrar</button>
        <p class="t-login mt-5 mb-3">©2023</p>
      </form>
    
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
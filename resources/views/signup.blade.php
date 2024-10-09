<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" integrity="sha384-tViUnnbYAV00FLIhhi3v/dWt3Jxw4gZQcNoSCxCIFNJVCx7/D55/wXsrNIRANwdD" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  @vite(['resources/css/app.css'])
  <title>Signup//Login</title>
</head>
<body>
  <div class="wrapper">
    <header>
      <h3>Signup or Login</h3>
    </header>
  </div>
  
  <div class="main-wrapper">
    <img src="https://newsinfo.inquirer.net/files/2023/06/DENR-LOGO.png" class="logo" alt="DENR" width="350" height="250">
    <form action="{{route('home')}}" method="POST" class="space">
      @csrf
      <input type="text" name="name" id="user-user" placeholder="Enter your name" required><br>
      <input type="email" name="email" id="#!" placeholder="Enter email" required><br>
      <input type="password" name="password" id="pwd" placeholder="Enter Password" required><br>
      <button type="submit">Submit</button>
    </form>
  </div>
</body>
</html>
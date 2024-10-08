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
    <div class="px-4">
      <form action="{{route('home')}}" method="Get">
        @csrf
        <div>
          <i class="bi bi-gear-fill"></i>
        </div>
        <input type="text" name="name" id="user-user" placeholder="Enter your name: ">
          <input type="button" value="Submit">
      </form>
    </div>
  </div>
</body>
</html>
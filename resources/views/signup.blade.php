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
  
  <div class="main-wrapper d-flex flex-column align-items-center">
    <div>
      <img src="https://newsinfo.inquirer.net/files/2023/06/DENR-LOGO.png" class="logo" alt="DENR" width="350" height="250">
    </div>    
    <form action="{{route('signup.store')}}" method="POST" class="space">
      @csrf
      <label for="name"><i class="bi bi-person"></i></label>
      <input type="text" name="name" placeholder="Enter your name" required ><br>
      <label for="email"><i class="bi bi-envelope-at-fill"></i></label>
      <input type="email" name="email" placeholder="Enter email" required ><br>
      <label for="pwd"><i class="bi bi-eye-slash" onclick="Toggle()" id="eye"></i></label>
      <input type="password" name="password" id="pwd" placeholder="Enter Password" required><br>
      <button type="submit">Login</button>
    </form>
  </div>
</body>
<script>
  function Toggle() {
            let temp = document.getElementById("pwd");
            let eye = document.getElementById("eye");
            if (temp.type === "password") {
                temp.type = "text";
                eye.classList.add("bi-eye");
                eye.classList.remove("bi-eye-slash");
            }
            else {
                temp.type = "password";
                eye.classList.add("bi-eye-slash");
                eye.classList.remove("bi-eye");
            }
        }
</script>
</html>
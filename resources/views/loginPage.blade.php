<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recipe Ripple | Login</title>
  <link rel="stylesheet" href="{{url('frontend/style.css')}}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  
</head>
<body>
  <div class="container-fluid d-flex justify-content-center align-items-center min-vh-100 bg-image">
    <div class="login-box p-4 shadow-lg rounded">
      <div class="text-center mb-4">
        <img src="{{url('frontend/images/Logo.png')}}" alt="Logo" width="50" class="mb-3" style="border-radius: 50%;">
        <br>
        <h3>Login to your account</h3>
      </div>

      <form action="{{ route('postlogin') }}" method ="post">
        {{ csrf_field() }}
        <br>
        <div class="mb-3">
          <label for="email" class="form-label">Your email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="USER@gmail.com" required>
        </div>
        <div class="mb-3 position-relative">
          <label for="password" class="form-label">Your password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="**************" required>
          <i class="toggle-password bi bi-eye"></i>
        </div>
        <br><br>
        <div class="text-center">
          <button type="submit" class="btn btn-primary w-46" style="border-radius: 32px">Log in</button>
        </div>
      </form>

      <div class="text-center mt-3">
        <p>Don't have an account? <a href="signup">Create account</a></p>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
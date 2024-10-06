<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recipe Ripple | Sign Up</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{url('frontend/style.css')}}">
</head>

<body>
  <div class="container-fluid d-flex justify-content-center align-items-center min-vh-100 bg-image">
    <div class="signup-box p-4 shadow-lg rounded">
      <div class="text-center mb-4">
        <img src="{{url('frontend/images/logo.png')}}" alt="Logo" class="logo mb-3">
        <h5 class="card-title">
          LET'S GET YOU STARTED 
        </h5>
        <h2 class="card-subtitle mb-2 text-muted">
          Create an account
        </h2>
      </div>
      <form action="/signup" method ="post">
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="name" id= "name" name="name" class="form-control @error('name') is-invalid
            
          @enderror form-control-xl" placeholder="samuel sitio" required>
          @error('name')
          <small class="btn btn-danger">{{ $message }}</small>
          @enderror
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" id="Email" class="form-control @error('email') is-invalid
            
          @enderror form-control-xl" name="email" placeholder="USER@gmail.com" required>
          @error('Email')
          <small class="btn btn-danger">{{ $message }}</small>
          @enderror
        </div>

        <div class="mb-3 position-relative">
          <label for="password" class="form-label">Your password</label>
          <input type="password" id="password" class="form-control @error('password')
            
          @enderror" name="password" placeholder="********" required>
          @error('password')
          <small class="btn btn-danger">{{ $message }}</small>
          @enderror
          <i class="toggle-password bi bi-eye"></i>
        </div>

        <div class="mb-3">
          <label for="Phone-num" class="form-label">Phone Number</label>
          <input type="Phone-num" class="form-control" id="number" name="Phone-num"placeholder="081234567890" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">GET STARTED</button>
      </form>
      <div class="text-center mt-3">
        <a class="login-link" href="login">
          Already have an account?
          <strong>
            <p>LOGIN HERE</p>
          </strong>
        </a>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
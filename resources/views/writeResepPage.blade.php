<!DOCTYPE html>
<html lang="en">
<head>
  <title>Recipe Ripple</title>
  <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <style>
    body {
      background-color: #fdf6e3;
      font-family: Arial, sans-serif;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }
    .navbar {
      background-color: #ffffff;
      padding: 1rem;
    }
    .navbar-brand {
      font-weight: bold;
      color: #ff4500;
    }
    .navbar-nav .nav-link {
      color: #000000;
      margin-right: 1rem;
      text-align: center;
    }
    .navbar-nav .nav-link i, .navbar-nav .nav-link img {
      display: block;
      margin: 0 auto;
      width: 30px;
      height: 30px;
    }

    .hero-section {
      background-color: #4b0026;
      color: #ffffff;
      text-align: center;
      padding: 3rem;
      border-radius: 20px;
      margin: 2rem auto;
    }

    .hero-section h1, .hero-section img, .hero-section button {
      display: block;
      margin: 1rem auto;
    }

    .hero-section button {
      background-color: #ff4500;
      color: #ffffff;
      border: none;
      padding: 0.75rem 1.5rem;
      border-radius: 5px;
      font-size: 1.25rem;
      transition: background-color 0.3s ease;
    }

    .hero-section button:hover {
      background-color: #e03e00;
    }

    .footer-section {
      background-color: #4b0026;
      color: #ffffff;
      padding: 2rem;
      text-align: left;
      margin-top: auto;
    }

    .footer-section i {
      font-size: 1.5rem;
      margin: 0.5rem;
      color: #ff4500;
    }

    .footer-section .social-icon {
      display: inline-block;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background-color: #ffffff;
      color: #4b0026;
      text-align: center;
      line-height: 40px;
      margin-right: 10px;
    }

    /* Responsive tweaks */
    @media (max-width: 768px) {
      .navbar-nav {
        display: none;
        flex-direction: column;
        text-align: center;
        width: 100%;
        background-color: #ffffff;
      }

      .navbar-toggler {
        display: block;
        border: none;
        background: none;
      }

      .navbar-toggler-icon {
        font-size: 1.5rem;
        color: #ff4500;
      }

      .navbar-nav.show {
        display: flex;
      }

      .hero-section {
        padding: 2rem;
      }
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="#">
      <img alt="Logo" class="d-inline-block align-top" height="30" src="https://storage.googleapis.com/a1aa/image/0GfnZljQtelHD0DtkaAeVPjZLhSG1946IuOJ7oEE1gxjbfTOB.jpg" width="30"/>
      Recipe Ripple
    </a>
    <button aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" id="navbar-toggler">
      <i class="fas fa-bars navbar-toggler-icon"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="home">
            <i class="fas fa-home"></i>
            Beranda
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="fas fa-search"></i>
            Cari
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="fas fa-pen"></i>
            Tulis
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="fas fa-bell"></i>
            Notifikasi
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <img alt="User Profile" class="d-inline-block align-top rounded-circle" height="30" src="https://storage.googleapis.com/a1aa/image/Lfq93qG3G7xrNqGtr0QA0LAtnPHGl3cByPpfZ7GCQZPztfJnA.jpg" width="30"/>
            <div>Profil</div>
          </a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8 col-md-10 col-sm-12">
        <div class="hero-section">
          <h1>Simpan semua masakanmu dalam satu tempat</h1>
          <img alt="Icon of a fork and knife crossed" class="img-fluid" src="https://storage.googleapis.com/a1aa/image/UmpT0oeDO7TsFq6250P9z0Me1A1MWnBntwqdItUMgpFWMBlTA.jpg" style="max-width: 100px; height: auto;"/>
          <button class="btn btn-lg">Tulis Resepmu Disini!</button>
        </div>
      </div>
    </div>
  </div>

  <div class="footer-section">
    <div class="container">
      <h2>About Us</h2>
      <p>At RecipeRipple, we believe that cooking connects people. Our platform allows food lovers to discover, share, and enjoy recipes from around the world. Whether you’re a beginner or an experienced cook, we provide an easy way to explore new dishes, upload your own creations, and engage with a vibrant community.</p>
      <p>Join us in spreading the joy of cooking, one recipe at a time!</p>
      <h2>Contact</h2>
      <a class="social-icon" href="#"><i class="fab fa-facebook"></i></a>
      <a class="social-icon" href="#"><i class="fab fa-instagram"></i></a>
      <a class="social-icon" href="#"><i class="fab fa-twitter"></i></a>
      <a class="social-icon" href="#"><i class="fas fa-phone"></i></a>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.getElementById('navbar-toggler').addEventListener('click', function () {
      var navbarNav = document.getElementById('navbarNav');
      navbarNav.classList.toggle('show');
    });
  </script>
</body>
</html>

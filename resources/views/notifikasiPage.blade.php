<!DOCTYPE html>
<html lang="en">
<head>
  <title>Recipe Ripple | Notifikasi</title>
  <link rel="shortcut icon" type="x-icon" href="{{url('frontend/images/Logo.png')}}">
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
      background-color: #FFFFFF;
      padding: 1rem;
    }

    .navbar-brand {
      font-weight: bold;
      color: #040100;
    }

    .nav-link {
      font-size: 1rem;
      margin-left: 0.5rem;
      color: #333;
    }

    .nav-link:hover {
      color: #f44708;
    }

    .nav-link.active {
      color: #f44708;
    }

    .notification-container {
      text-align: center;
      margin-top: 2rem;
    }

    .notification-container h1 {
      font-size: 45px;
      font-weight: bold;
      color: #000000;
      margin-bottom: 2rem;
    }

    .notification-card {
      background-color: #550527;
      color: white;
      padding: 1.5rem;
      border-radius: 10px;
      margin-bottom: 1.5rem;
      display: flex;
      align-items: center;
    }

    .notification-card i {
      font-size: 2rem;
      margin-right: 1rem;
    }

    .notification-card .content {
      text-align: left;
    }

    .notification-card .content p {
      margin: 0;
      font-weight: bold;
    }

    .about-container {
      background-color: #550527; /* Dark red background */
      color: white; /* White text color */
      padding: 1.5rem;
      font-family: 'Montserrat', sans-serif;
      border-radius: 10px; /* Rounded corners */
      margin-top: 2rem;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
    }

    .social-icon {
      color: white;
      background-color: #F44708;
      border-radius: 50%;
      width: 40px;
      height: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: 20px; /* Spacing of 20px between icons */
    }

    .social-icon:last-child {
      margin-right: 0; /* No margin on the last icon */
    }

    .social-icon:hover {
      color: #FFFFFF;
      background-color: #FF6347;
    }

    .about-container h2 {
      font-weight: bold;
    }

    .social-icons-container {
      display: flex; /* Display icons in a row */
      align-items: center; /* Center icons vertically */
    }

    /* Popup Styles */
    .profile-popup {
      display: none; /* Hidden by default */
      position: absolute; /* Positioning it absolutely */
      top: 60px; /* Adjust this value based on navbar height */
      right: 20px; /* Adjust to fit within the page */
      background-color: white;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      z-index: 1000; /* Ensures it appears above other elements */
      padding: 1rem;
      min-width: 120px; /* Minimum width to prevent it from being too small */
      width: auto; /* Allow the width to adjust based on content */
    }

    .profile-popup img {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      margin-right: 1rem;
    }

    .profile-popup h5 {
      margin: 0;
      font-size: 14px;
    }

    .profile-popup p {
      margin: 0.5rem 0;
      font-size: 12px;
    }

    .profile-popup button {
      width: 100%;
      background-color: #f44708;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      padding: 0.5rem;
    }

    .profile-popup button:hover {
      background-color: #FF6347;
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
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg">
      <!-- Logo -->
      <a class="navbar-brand d-flex align-items-center" href="#">
          <img src="{{url('frontend/images/logo.png')}}" alt="Recipe Ripple" width="30" class="me-2" style="border-radius: 50%;">
          Recipe <span style="color: #F44708;">Ripple</span>
      </a>

      <!-- Toggler for mobile view -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Navigation Links -->
      <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                  <a class="nav-link" href="/beranda" style="display: flex; flex-direction: column; align-items: center;">
                      <i class="fas fa-home"></i>
                      Beranda
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="searchresep" style="display: flex; flex-direction: column; align-items: center;">
                      <i class="fas fa-search"></i>
                      Cari
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="/writeresep" style="display: flex; flex-direction: column; align-items: center;">
                      <i class="fas fa-pen"></i>
                      Tulis
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link active" href="/notifikasi" style="display: flex; flex-direction: column; align-items: center; color:#F44708">
                      <i class="fas fa-bell"></i>
                      Notifikasi
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link d-flex align-items-center" href="#" onclick="toggleProfilePopup()">
                      <img src="{{ ('frontend/images/profile1.jpg') }}" alt="User Profile" class="rounded-circle me-2" width="30" height="30"/>
                      <span>Profil</span>
                  </a>
              </li>
          </ul>
      </div>
  </nav>

  <div class="container notification-container">
    <h1>Notifikasi</h1>

    <div class="notification-card">
      <i class="fas fa-user-circle"></i>
      <div class="content">
        <p>[Ali**] meninggalkan komentar di postingan Anda: 'Ini adalah konten yang sangat menarik!'</p>
        <small>Selamat datang Desri Dabukke! Ayo mulai memasak</small>
      </div>
    </div>

    <div class="notification-card">
      <i class="fas fa-user-circle"></i>
      <div class="content">
        <p>[Bai**] menyukai postingan Anda.</p>
      </div>
    </div>
  </div>

  <div class="about-container">
      <h2>About Us</h2>
      <p>At RecipeRipple, we believe that cooking connects people. Our platform allows food lovers to discover, share, and enjoy recipes from around the world. Whether you’re a beginner or an experienced cook, we provide an easy way to explore new dishes, upload your own creations, and engage with a vibrant community.</p>
      <p>Join us in spreading the joy of cooking, one recipe at a time!</p>
      <h2>Contact</h2>
      <div class="social-icons-container">
          <a class="social-icon" href="#"><i class="fab fa-facebook"></i></a>
          <a class="social-icon" href="#"><i class="fab fa-instagram"></i></a>
          <a class="social-icon" href="#"><i class="fab fa-twitter"></i></a>
          <a class="social-icon" href="#"><i class="fas fa-phone"></i></a>
      </div>
  </div>

  <!-- Profile Popup -->
  <div class="profile-popup" id="profilePopup">
    <div class="d-flex align-items-center">
        <img src="{{ url('frontend/images/profile1.jpg') }}" alt="User Profile" class="rounded-circle"/>
        <div>
          <a href="/profil">
              <strong>{{ Auth::user()->name }}</strong><br>
          </a>
          <small>{{ Auth::user()->email }}</small>
        </div>
    </div>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" style="width: 100%; background-color: #f44708; color: white; border: none; border-radius: 5px; padding: 0.5rem; cursor: pointer;">
            Keluar
        </button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function toggleProfilePopup() {
      const popup = document.getElementById('profilePopup');
      popup.style.display = popup.style.display === 'block' ? 'none' : 'block';
    }

    function logout() {
      // Implement logout functionality
      alert("Logout clicked!");
      // For example, redirect or perform logout logic here
    }

    // Hide popup when clicking outside
    window.onclick = function(event) {
      const popup = document.getElementById('profilePopup');
      if (!event.target.closest('.nav-link') && !event.target.closest('#profilePopup')) {
        popup.style.display = 'none'; // Hide popup
      }
    }
  </script>
</body>
</html>

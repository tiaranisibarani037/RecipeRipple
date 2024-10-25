<html lang="en">
 <head>
  <title>
   Recipe Ripple
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <style>
   body {
      background-color: #fdf6e3;
      font-family: Arial, sans-serif;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
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
      background-color: #f45d1b;
      color: #ffffff;
      text-align: center;
      line-height: 40px;
      margin-right: 10px;
      transition: background-color 0.3s ease;
    }

    .footer-section .social-icon i {
      color: #ffffff;
    }

    .footer-section .social-icon:hover {
      background-color: #e03e00;
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
 <body class="bg-cream">
  <nav class="bg-white p-4">
   <div class="container mx-auto flex justify-between items-center">
    <a class="text-2xl font-bold text-red-600" href="#">
    <img src="{{url('frontend/images/logo.png')}}" alt="Recipe Ripple" width="30" class="me-2" style="border-radius: 50%;">
     Recipe
     <span class="text-orange-500">
      Ripple
     </span>
    </a>
    <button class="lg:hidden text-red-600" id="navbar-toggler">
     <i class="fas fa-bars">
     </i>
    </button>
    <ul class="hidden lg:flex space-x-6">
     <li>
      <a class="text-black text-center" href="home">
       <i class="fas fa-home block mx-auto mb-1">
       </i>
       Beranda
      </a>
     </li>
     <li>
      <a class="text-black text-center" href="#">
       <i class="fas fa-search block mx-auto mb-1">
       </i>
       Cari
      </a>
     </li>
     <li>
      <a class="text-black text-center" href="#">
       <i class="fas fa-plus block mx-auto mb-1">
       </i>
       Tulis
      </a>
     </li>
     <li>
      <a class="text-black text-center" href="#">
       <i class="fas fa-bell block mx-auto mb-1">
       </i>
       Notifikasi
      </a>
      </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <img alt="User Profile" class="d-inline-block align-top rounded-circle" height="30" src="https://storage.googleapis.com/a1aa/image/Lfq93qG3G7xrNqGtr0QA0LAtnPHGl3cByPpfZ7GCQZPztfJnA.jpg" width="30" />
            <div>Profil</div>
          </a>
        </li>
      </ul>
    </div>
  </nav>

  
  <main class="container mx-auto py-8 px-6">
   <div class="text-center mb-8">
    <div class="flex justify-center items-center">
     <h1 class="text-4xl font-bold text-red-600 ml-2">
      <img src="{{url('frontend/images/logo.png')}}" alt="Recipe Ripple" width="30" class="me-2" style="border-radius: 50%;">
      Recipe
      <span class="text-orange-500">
       Ripple
      </span>
     </h1>
    </div>
    <div class="relative mt-4">
     <input class="w-full py-2 px-4 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500" placeholder="Nasi goreng" type="text"/>
     <button class="absolute right-0 top-0 h-full bg-orange-500 text-white py-2 px-6 rounded-r-full">
      <i class="fas fa-search">
      </i>
     </button>
    </div>
   </div>
   <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="relative">
     <img alt="Nasi Goreng Kampung" class="w-full h-48 object-cover" height="300" src="https://storage.googleapis.com/a1aa/image/xHM8ruriz7pUPttFKsgb12tiEv6j2QvLkegnWMMuAwoH4F1JA.jpg" width="400">
      <div class="absolute top-2 right-2 flex space-x-2">
       <button class="bg-yellow-500 text-white p-2 rounded-full">
        <i class="fas fa-bookmark">
        </i>
       </button>
       <button class="bg-red-500 text-white p-2 rounded-full">
        <i class="fas fa-heart">
        </i>
       </button>
      </div>
      <div class="p-4">
       <h2 class="text-lg font-bold">
        Resep Nasi Goreng Kampung, Lezat, Gampang
       </h2>
       <div class="flex items-center mt-2">
        <span class="text-yellow-500">
         <i class="fas fa-star">
         </i>
         3.8
        </span>
        <span class="ml-2 text-gray-600">
         <i class="fas fa-user">
         </i>
        </span>
       </div>
      </div>
     </img>
    </div>
    <div class="relative">
     <img alt="Nasi Goreng Pedas Gila" class="w-full h-48 object-cover" height="300" src="https://storage.googleapis.com/a1aa/image/pC9jIbSi9WKVDpntf4t9eaVYrj0QeerJg07HKum1qWO5AvoOB.jpg" width="400">
      <div class="absolute top-2 right-2 flex space-x-2">
       <button class="bg-yellow-500 text-white p-2 rounded-full">
        <i class="fas fa-bookmark">
        </i>
       </button>
       <button class="bg-red-500 text-white p-2 rounded-full">
        <i class="fas fa-heart">
        </i>
       </button>
      </div>
      <div class="p-4">
       <h2 class="text-lg font-bold">
        Resep Nasi Goreng Pedas Gila, Sederhana
       </h2>
       <div class="flex items-center mt-2">
        <span class="text-yellow-500">
         <i class="fas fa-star">
         </i>
         4.6
        </span>
        <span class="ml-2 text-gray-600">
         <i class="fas fa-user">
         </i>
        </span>
       </div>
      </div>
     </img>
    </div>
    <div class="relative">
     <img alt="Nasi Goreng Kambing" class="w-full h-48 object-cover" height="300" src="https://storage.googleapis.com/a1aa/image/hf3ydy75BzwQUKl9rdN6FweFfJG7gZsstUVWpCsoVfrtAvoOB.jpg" width="400">
      <div class="absolute top-2 right-2 flex space-x-2">
       <button class="bg-yellow-500 text-white p-2 rounded-full">
        <i class="fas fa-bookmark">
        </i>
       </button>
       <button class="bg-red-500 text-white p-2 rounded-full">
        <i class="fas fa-heart">
        </i>
       </button>
      </div>
      <div class="p-4">
       <h2 class="text-lg font-bold">
        Resep Nasi Goreng Kambing, Rasa Mantap Daging Empuk
       </h2>
       <div class="flex items-center mt-2">
        <span class="text-yellow-500">
         <i class="fas fa-star">
         </i>
         4.8
        </span>
        <span class="ml-2 text-gray-600">
         <i class="fas fa-user">
         </i>
        </span>
       </div>
      </div>
     </img>
    </div>
    <div class="relative">
     <img alt="Nasi Goreng Spesial" class="w-full h-48 object-cover" height="300" src="https://storage.googleapis.com/a1aa/image/ULwecOJSyZ0dNas0zmsRlYwYhKyhulklJyZhr6kEllMF4F1JA.jpg" width="400"/>
     <div class="absolute top-2 right-2 flex space-x-2">
      <button class="bg-yellow-500 text-white p-2 rounded-full">
       <i class="fas fa-bookmark">
       </i>
      </button>
      <button class="bg-red-500 text-white p-2 rounded-full">
       <i class="fas fa-heart">
       </i>
      </button>
     </div>
     <div class="p-4">
      <h2 class="text-lg font-bold">
       Resep Nasi Goreng Spesial ala Restoran Mewah
      </h2>
      <div class="flex items-center mt-2">
       <span class="text-yellow-500">
        <i class="fas fa-star">
        </i>
        5.0
       </span>
       <span class="ml-2 text-gray-600">
        <i class="fas fa-user">
        </i>
       </span>
      </div>
     </div>
    </div>
   </div>
   <div class="text-center mt-8">
    <button class="bg-orange-500 text-white py-2 px-6 rounded-full hover:bg-orange-600">
     Tampilkan lebih banyak
    </button>
   </div>

  <div class="footer-section bg-red-900 text-white p-8">
   <div class="container mx-auto">
    <h2 class="text-2xl font-bold mb-4">
     About Us
    </h2>
    <p class="mb-4">
     At RecipeRipple, we believe that cooking connects people. Our platform allows food lovers to discover, share, and enjoy recipes from around the world. Whether you’re a beginner or an experienced cook, we provide an easy way to explore new dishes, upload your own creations, and engage with a vibrant community.
    </p>
    <p class="mb-4">
     Join us in spreading the joy of cooking, one recipe at a time!
    </p>
    <h2 class="text-2xl font-bold mb-4">
     Contact
    </h2>
    <a class="social-icon" href="#">
     <i class="fab fa-facebook">
     </i>
    </a>
    <a class="social-icon" href="#">
     <i class="fab fa-instagram">
     </i>
    </a>
    <a class="social-icon" href="#">
     <i class="fab fa-twitter">
     </i>
    </a>
    <a class="social-icon" href="#">
     <i class="fas fa-phone">
     </i>
    </a>
   </div>
  </div>

  <script>
   document.getElementById('navbar-toggler').addEventListener('click', function () {
      var navbarNav = document.querySelector('nav ul');
      navbarNav.classList.toggle('hidden');
    });
  </script>
 </body>
 
</html>
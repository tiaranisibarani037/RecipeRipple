<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Ripple | Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{url('homepage/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .btn-sign {
            background-color: #F44708; /* Set the background color to white */
            color: #ffffff; /* Set the text color to white */
            margin-left: 20px; /* Add margin to the left of the button */
        }
        .btn-sign:hover {
            background-color: #000000; /* Set the hover background color to black */
            color: #ffffff; /* Set the hover text color to white */
        }
        .btn-search {
            width: 300px; /* Set a fixed width for the search input */
            
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{url('frontend/images/logo.png')}}" alt="Recipe Ripple" width="30" class="me-2" style="border-radius: 50%;">
                <span style="color: #000000; font-size: 24px;">Recipe</span>
                <span style="color: #F44708; font-size: 24px;">Ripple</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                    <a class="nav-link active" href="#" style="color:#F44708; font-size: 18px;">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" style="font-size: 18px;">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about" style="font-size: 18px;">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact" style="font-size: 18px;">Contact</a>
                </li>
                </ul>
                <form class="d-flex ms-3">
                    <input class="form-control me-2 btn-search" type="search" placeholder="Cari resep favoritmu..." aria-label="Search">
                    <a href="login" class="btn btn-sign">Login</a>
                </form>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="display-4"><span style="color: #ffffff;">Recipe</span> <span style="color: #F44708;">Ripple</span></h1>
                    <p class="lead" style="font-size: 20px;">"Bumbu yang Tepat, Masakan yang Hebat!"</p>
                    <p style="font-size: 19px;">Selamat datang di RecipeRipple, tempat di mana setiap resep menjadi inspirasi! Temukan, bagikan, dan nikmati kreasi kuliner dari seluruh dunia, langsung dari dapur rumah Anda.</p>
                    <a href="writeresep" class="btn btn-lg" style="color: #ffffff; background-color: #F44708; font-size: 20px;">Mulailah memasak!</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Popular Recipes -->
    <section class="popular-recipes py-5">
        <div class="container text-center">
            <h2><strong>Popular Recipes</strong></h2>
            <div class="row">
                <div class="col-6 col-md-3">
                    <div class="recipe-card shadow-sm p-3 mb-5 bg-white rounded">
                        <img src="{{url('frontend/images/nasigoreng.png')}}" class="img-fluid" alt="Nasi Goreng">
                        <h5 class="mt-2">Nasi Goreng</h5>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="recipe-card shadow-sm p-3 mb-5 bg-white rounded">
                        <img src="{{url('frontend/images/buburkacanghijau.png')}}" class="img-fluid" alt="Bubur Kacang Hijau">
                        <h5 class="mt-2">Bubur Kacang Hijau</h5>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="recipe-card shadow-sm p-3 mb-5 bg-white rounded">
                        <img src="{{url('frontend/images/kuelapis.png')}}" class="img-fluid" alt="Kue Lapis">
                        <h5 class="mt-2">Kue Lapis</h5>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="recipe-card shadow-sm p-3 mb-5 bg-white rounded">
                        <img src="{{url('frontend/images/cendol.png')}}" class="img-fluid" alt="Cendol">
                        <h5 class="mt-2">Cendol</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Recipe Categories -->
    <div class="container mt-5">
        <div class="form-inline">
            <h2 class="mb-4" style="display: inline-block; margin: 0;">Telusuri Berdasarkan...</h2>
        </div>

        <div class="carousel slide" data-bs-ride="carousel" id="foodCarousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card category-card" style="display: flex; flex-direction: column; align-items: center; text-align: center;">
                                <img src="{{url('frontend/images/appetizer.png')}}" class="mt-4" alt="Appetizer image" style="width: 75%; height:75%; border-radius:15px;">
                                <div class="card-body">
                                    <h5 class="card-title">Appetizer</h5>
                                    <p class="card-text">Lihat resep</p>
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <span>4.9</span>
                                        <i class="fas fa-comment" style="margin-left: 210px;"></i>
                                    </div>
                                    <div class="heart-icon">
                                        <i class="fas fa-heart" id="heart-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card category-card" style="display: flex; flex-direction: column; align-items: center; text-align: center;">
                                <img src="{{url('frontend/images/maincourse.png')}}" class="mt-4" alt="maincourse image" style="width: 75%; height:75%; border-radius:15px;">
                                <div class="card-body">
                                    <h5 class="card-title">Main Course</h5>
                                    <p class="card-text">Lihat resep</p>
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <span>4.6</span>
                                        <i class="fas fa-comment" style="margin-left: 210px;"></i>
                                    </div>
                                </div>
                                <div class="heart-icon">
                                    <i class="fas fa-heart"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card category-card" style="display: flex; flex-direction: column; align-items: center; text-align: center;">
                                <img src="{{url('frontend/images/dessert.png')}}" class="mt-4" alt="Appetizer image" style="width: 75%; height:75%; border-radius:15px;">
                                <div class="card-body">
                                    <h5 class="card-title">Dessert</h5>
                                    <p class="card-text">Lihat resep</p>
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <span>4.8</span>
                                        <i class="fas fa-comment" style="margin-left: 210px;"></i>
                                    </div>
                                </div>
                                <div class="heart-icon">
                                    <i class="fas fa-heart"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- About Us -->
    <section class="about-us py-5" id="about">
        <div class="about-section">
            <div class="about-image">
                <img src="{{url('frontend/images/logo-about.png')}}" height="200" width="200" />
            </div>
            <div class="about-content">
                <h2 style="color: black;">About Us</h2>
                <p>At RecipeRipple, we believe that cooking connects people. Our platform allows food lovers to discover, share, and enjoy recipes from around the world. Whether you’re a beginner or an experienced cook, we provide an easy way to explore new dishes, upload your own creations, and engage with a vibrant community.</p>
                <p>Join us in spreading the joy of cooking, one recipe at a time!</p>
            </div>
        </div>
    </section>

<!-- Footer -->
<footer class="py-4 text-white text-center">
    <div class="container" id="contact">
    <p style="font-size: 30px;">Contact</p>
        <a href="#" class="text-white me-3"><span class="bg-orange rounded-circle p-2"><i class="bi bi-facebook"></i></span></a>
        <a href="#" class="text-white me-3"><span class="bg-orange rounded-circle p-2"><i class="bi bi-instagram"></i></span></a>
        <a href="#" class="text-white me-3"><span class="bg-orange rounded-circle p-2"><i class="bi bi-twitter"></i></span></a>
        <a href="#" class="text-white"><span class="bg-orange rounded-circle p-2"><i class="bi bi-telephone-fill"></i></span></a>
    </div>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
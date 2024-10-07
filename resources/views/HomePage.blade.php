<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Ripple</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{url('homepage/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{url('frontend/images/logo.png')}}" alt="Recipe Ripple" width="30" class="me-2" style="border-radius: 50%;">
                Recipe <span style="color: orange;">Ripple</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About Us</a>
                    </li>
                </ul>
                <form class="d-flex ms-3">
                    <input class="form-control me-2 btn-search" type="search" placeholder="Cari resep favoritmu..." aria-label="Search">
                    <a href="login" class="btn btn-sign">Login</a>
                </form>
            </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section d-flex align-items-center ">
        <div class="container ">
            <div class="row ">
                <div class="col-md-6 ">
                    <h1 class="display-4"> <span style="color: #ffffff" ;>Recipe</span> <span style="color: #F44708; ">Ripple</span></h1>
                    <p class="lead">"Bumbu yang Tepat, Masakan yang Hebat!"</p>
                    <p>Selamat datang di RecipeRipple, tempat di mana setiap resep menjadi inspirasi! Temukan, bagikan, dan nikmati kreasi kuliner dari seluruh dunia, langsung dari dapur rumah Anda.</p>
                    <a href="#" class="btn btn-lg">Mulailah memasak!</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Popular Recipes -->
    <section class="popular-recipes py-5">
        <div class="container text-center">
            <h2>Popular Recipes</h2>
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
            <button style="margin-left: 650px;" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i>
            </button>
            <button style="margin-left: 6px;" class="btn btn-secondary">
                <i class="fas fa-arrow-right"></i>
            </button>
        </div>



        <div class="carousel slide" data-bs-ride="carousel" id="foodCarousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card category-card" style="display: flex; flex-direction: column; align-items: center; text-align: center;">
                                <img alt="Appetizer image" style="width: 75%; height:75%; border-radius:15px;" class="mt-4" src="https://storage.googleapis.com/a1aa/image/AcbChfeGsToUzkYlMWrrhrQnfvpTGmvreakw4mkH24vpqHMOB.jpg" />
                                <div class="card-body">
                                    <h5 class="card-title">
                                        Appetizer
                                    </h5>
                                    <p class="card-text">
                                        Lihat resep
                                    </p>
                                    <div class="rating">
                                        <i class="fas fa-star">
                                        </i>
                                        <span>
                                            4.9

                                            <i class="fas fa-comment" style="margin-left: 210px;"></i>

                                        </span>
                                    </div>
                                </div>
                                <div class="heart-icon">
                                    <i class="fas fa-heart">
                                    </i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card category-card" style="display: flex; flex-direction: column; align-items: center; text-align: center;">
                                <img alt="Main Course image" style="width: 75%; height:75%; border-radius:15px;" class="mt-4" src="https://storage.googleapis.com/a1aa/image/cYvZVuRxYWaHIdPPuftjXeZPwS1lx6NLd7BkCAZw7dln6BjTA.jpg" />
                                <div class="card-body">
                                    <h5 class="card-title">
                                        Main Course
                                    </h5>
                                    <p class="card-text">
                                        Lihat resep
                                    </p>
                                    <div class="rating">
                                        <i class="fas fa-star">
                                        </i>
                                        <span>
                                            4.6
                                            <i class="fas fa-comment" style="margin-left: 210px;"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="heart-icon">
                                    <i class="fas fa-heart">
                                    </i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card category-card" style="display: flex; flex-direction: column; align-items: center; text-align: center;">
                                <img alt="Dessert image" style="width: 75%; height:75%; border-radius:15px;" class="mt-4" src="https://storage.googleapis.com/a1aa/image/8yTtd5tXCYKyCxhtSvmy16NhwXXKfEqT6pUEAm1fBl3o6BjTA.jpg" />
                                <div class="card-body">
                                    <h5 class="card-title">
                                        Dessert
                                    </h5>
                                    <p class="card-text">
                                        Lihat resep
                                    </p>
                                    <div class="rating">
                                        <i class="fas fa-star">
                                        </i>
                                        <span>
                                            4.8
                                            <i class="fas fa-comment" style="margin-left: 210px;"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="heart-icon">
                                    <i class="fas fa-heart">
                                    </i>
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
                <img src="{{url('frontend/images/logo-about.png')}}" height="200"  width="200" />
            </div>
            <div class="about-content">
                <h2>
                    About Us
                </h2>
                <p>
                    At RecipeRipple, we believe that cooking connects people. Our platform allows food lovers to discover, share, and enjoy recipes from around the world. Whether you’re a beginner or an experienced cook, we provide an easy way to explore new dishes, upload your own creations, and engage with a vibrant community.
                </p>
                <p>
                    Join us in spreading the joy of cooking, one recipe at a time!
                </p>
            </div>
        </div>
    </section>

    <!-- Footer -->
        <footer class="py-4 text-white text-center">
            <div class="container" id="contact">
                <p>Contact us</p>
                <a href="#" class="text-white me-3"><i class="bi bi-facebook"></i></a>
                <a href="#" class="text-white me-3"><i class="bi bi-instagram"></i></a>
                <a href="#" class="text-white me-3"><i class="bi bi-twitter"></i></a>
                <a href="#" class="text-white"><i class="bi bi-telephone-fill"></i></a>
            </div>
        </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
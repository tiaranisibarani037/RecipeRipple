<!DOCTYPE html>
<html lang="en">

<head>
    <title>Recipe</title>
    <link rel="shortcut icon" type="x-icon" href="{{ url('frontend/images/Logo.png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background-color: #FFF7E6;
            font-family: 'Montserrat', sans-serif;
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

        .btn-custom {
            background-color: #FF4500;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
        }

        .btn-custom:hover {
            background-color: #FF6347;
        }

        .container {
            max-width: 600px;
            margin: 2rem auto;
            background-color: #FFF7E6;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .video-placeholder {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: auto;
        }

        .responsive-iframe {
            width: 100%;
            height: auto;
            aspect-ratio: 16 / 9;
            /* Menjaga rasio aspek 16:9 */
            max-width: 100%;
            border: none;
        }

        .video-placeholder i {
            font-size: 3rem;
            color: #A0A0A0;
        }

        .form-control {
            margin-bottom: 1rem;
            border-radius: 10px;
        }

        .section-title {
            font-weight: bold;
            margin-top: 1rem;
            margin-bottom: 0.5rem;
        }

        .add-button {
            display: flex;
            justify-content: center;
            align-items: center;
            color: #FF4500;
            font-weight: bold;
            cursor: pointer;
            margin-top: 1rem;
        }

        .add-button i {
            margin-right: 0.5rem;
        }

        .step-image-placeholder {
            background-color: #E0E0E0;
            height: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 10px;
            margin-bottom: 1rem;
        }

        .step-image-placeholder i {
            font-size: 2rem;
            color: #A0A0A0;
        }

        .step {
            margin-bottom: 20px;
        }

        .step-content {
            display: flex;
            flex-direction: column;
        }

        .step-images {
            display: flex;
            gap: 10px;
        }

        .step-images img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin-top: 10px;
        }

        .text-container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 10px 10px 2px 10px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            font-family: Montserrat, sans-serif;
            color: #333;
            line-height: 1.6;
        }

        .title-container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 10px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            font-family: Montserrat, sans-serif;
            color: #333;
            line-height: 1.6;
            font-weight: bold;
        }

        .rating-container {
            display: flex;
            flex-direction: column;
            /* Atur menjadi kolom agar teks berada di atas bintang */
            align-items: flex-start;
            /* Rata kiri */
        }

        .star-rating {
            display: flex;
            gap: 5px;
        }

        .star-rating i {
            font-size: 1.5rem;
            color: #ccc;
            /* Warna default bintang */
            cursor: pointer;
        }

        .star-rating i.selected,
        .star-rating i:hover,
        .star-rating i:hover~i {
            color: #FF4500;
            /* Warna bintang saat dipilih atau di-hover */
        }

        .comment-section {
            max-width: 600px;
            margin: 2rem auto;
            background-color: #FFF7E6;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .comment-section h2 {
            font-size: 1.8rem;
            color: #FF4500;
            margin-bottom: 1rem;
        }

        .comment-form {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 1.5rem;
        }

        .comment-form img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }

        .comment-form textarea {
            flex: 1;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 10px;
            font-family: 'Montserrat', sans-serif;
            resize: none;
            height: 50px;
        }

        .comment-form .submit-button {
            background-color: #FF4500;
            border: none;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.2rem;
            height: 50px;
        }

        .comment-form .submit-button:hover {
            background-color: #f44708ea;
        }

        .comments-list {
            margin-top: 1.5rem;
        }

        .comment {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-bottom: 10px;
        }

        .comment img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }

        .comment-content {
            background-color: #FFFFFF;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            flex-grow: 1;
        }

        .comment-content p {
            margin: 0;
            font-size: 1rem;
            color: #333;
        }

        .comment-content small {
            display: block;
            margin-top: 0.5rem;
            color: #999;
        }

        .recipe-author {
            max-width: 600px;
            margin: 2rem auto;
            background-color: #FFF7E6;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .recipe-author h2 {
            font-size: 1.8rem;
            color: #FF4500;
            margin-bottom: 1rem;
        }

        .author-info {
            /* display: flex; */
            align-items: center;
            gap: 20px;
        }

        .author-info img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
        }

        .authorName {
            font-size: 1.2rem;
            margin: 0;
            font-family: 'Montserrat', sans-serif;
            color: #333;
            font-weight: bold;
            display: block;
        }

        .time {
            font-size: 0.8rem;
        }

        @media (max-width: 768px) {
            .comment-form {
                flex-direction: column;
            }

            .comments .comment {
                flex-direction: column;
            }

            .author-info {
                flex-direction: column;
                text-align: center;
            }
        }

        .about-container {
            background-color: #550527;
            /* Dark red background */
            color: white;
            /* White text color */
            padding: 1.5rem;
            font-family: 'Montserrat', sans-serif;
            border-radius: 10px;
            /* Rounded corners */
            margin-top: 2rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            /* Subtle shadow */
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
            margin-right: 20px;
            /* Spacing of 20px between icons */
        }

        .social-icon:last-child {
            margin-right: 0;
            /* No margin on the last icon */
        }

        .social-icon:hover {
            color: #FFFFFF;
            background-color: #FF6347;
        }

        .about-container h2 {
            font-weight: bold;
        }

        .social-icons-container {
            display: flex;
            /* Display icons in a row */
            align-items: center;
            /* Center icons vertically */
        }

        /* Popup Styles */
        .profile-popup {
            display: none;
            /* Hidden by default */
            position: absolute;
            /* Positioning it absolutely */
            top: 60px;
            /* Adjust this value based on navbar height */
            right: 20px;
            /* Adjust to fit within the page */
            background-color: white;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            /* Ensures it appears above other elements */
            padding: 1rem;
            min-width: 120px;
            /* Minimum width to prevent it from being too small */
            width: auto;
            /* Allow the width to adjust based on content */
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

        .context-menu {
            display: none;
            /* Tersembunyi secara default */
            position: absolute;
            /* Memungkinkan penempatan di lokasi kursor */
            background-color: white;
            /* Warna latar belakang menu */
            border: 1px solid #ccc;
            /* Garis batas */
            border-radius: 5px;
            /* Sudut membulat */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            /* Bayangan */
            z-index: 1000;
            /* Di atas elemen lain */
        }

        .context-menu button {
            background: none;
            /* Tanpa latar belakang */
            border: none;
            /* Tanpa batas */
            padding: 10px;
            /* Ruang di dalam tombol */
            text-align: left;
            /* Teks rata kiri */
            width: 100%;
            /* Lebar penuh */
            cursor: pointer;
            /* Kursor tangan */
        }

        .context-menu button:hover {
            background-color: #f0f0f0;
            /* Warna latar belakang saat hover */
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="{{ url('frontend/images/logo.png') }}" alt="Recipe Ripple" width="30" class="me-2"
                style="border-radius: 50%;">
            Recipe <span style="color: #F44708;">Ripple</span>
        </a>

        <!-- Toggler for mobile view -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="/beranda"
                        style="display: flex; flex-direction: column; align-items: center; ">
                        <i class="fas fa-home"></i>
                        Beranda
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#"
                        style="display: flex; flex-direction: column; align-items: center; color: #F44708;">
                        <i class="fas fa-book"></i>
                        Resep
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/writeresep"
                        style="display: flex; flex-direction: column; align-items: center;">
                        <i class="fas fa-pen"></i>
                        Tulis
                    </a>
                </li>
                <!-- Profile Link -->
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center" href="#" onclick="toggleProfilePopup()">
                        <img src="../frontend/images/profile1.jpg" alt="User Profile" class="rounded-circle me-2"
                            width="30" height="30" />
                        <span>Profil</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="video-placeholder">
            <div class="video-placeholder">
                @if ($recipe->video_path)
                    <iframe class="responsive-iframe" src="{{ asset('uploads/recipe/video/' . $recipe->video_path) }}"
                        frameborder="0" allowfullscreen></iframe>
                @else
                    <p>No video available</p>
                @endif
            </div>
        </div>


        <div class="rating-container" style="margin: 1rem 0;">
            <p class="section-title" style="font-size: 1.2rem; margin-bottom: 0.5rem;">Beri Rating</p>
            <div class="star-rating">
                <i class="fas fa-star" data-rating="1"></i>
                <i class="fas fa-star" data-rating="2"></i>
                <i class="fas fa-star" data-rating="3"></i>
                <i class="fas fa-star" data-rating="4"></i>
                <i class="fas fa-star" data-rating="5"></i>
            </div>
        </div>

        <div class="title-container" style="margin-bottom: 10px;">
            {{ $recipe->name }}
        </div>

        <div class="text-container" style="margin-bottom: 10px;">
            {{ $recipe->description }}
        </div>
        <p class="section-title">Bahan-bahan</p>
        <div class="text-container" style="margin-bottom: 10px;">
            @php
                $bahan = explode(', ', $recipe->bahan);
            @endphp
            @foreach ($bahan as $item)
                <p>{{ $item }}</p>
            @endforeach
        </div>

        <p class="section-title">Langkah-langkah</p>
        @php
            $langkah = explode(', ', $recipe->langkah);
            $langkah_images = json_decode($recipe->langkah_image, true);
        @endphp
        @foreach ($langkah as $index => $step)
            <div class="text-container">
                <p>{{ $index + 1 }}. {{ $step }}</p>
            </div>
            <div class="step">
                <div class="step-content">
                    <div class="step-images">
                        @if (isset($langkah_images[$index]))
                            <img src="{{ asset('uploads/recipe/image/' . $langkah_images[$index]) }}"
                                alt="Step {{ $index + 1 }}">
                        @endif
                    </div>
                </div>
        @endforeach
    </div>

    <div class="comments-section">
        <h2>Komentar</h2>
        <div id="commentsContainer">
            @foreach ($recipe->comments as $comment)
                <div class="comment" id="comment-{{ $comment->id }}">
                    <p class="authorName">{{ $comment->user->name }}</p>
                    <p>{{ $comment->content }}</p>
                    <p class="time">{{ $comment->created_at }}</p>
                    @if ($comment->user_id === auth()->id())
                        <form id="delete-comment-form-{{ $comment->id }}"
                            action="{{ route('comments.destroy', $comment->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-sm"
                                onclick="deleteComment({{ $comment->id }})">Hapus</button>
                        </form>
                    @endif
                </div>
            @endforeach
        </div>

        @auth
            <!-- Form untuk menambahkan komentar baru -->
            <form id="commentForm" action="{{ route('comments.store', ['recipe' => $recipe->id]) }}" method="POST">
                @csrf
                <textarea id="commentInput" name="content" rows="3" required></textarea>
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">
                <button type="submit">Tambah Komentar</button>
            </form>
        @else
            <p>Silakan <a href="{{ route('login') }}">login</a> untuk menambahkan komentar.</p>
        @endauth
    </div>

    <div class="about-container">
        <h2>About Us</h2>
        <p>At RecipeRipple, we believe that cooking connects people. Our platform allows food lovers to discover, share,
            and enjoy recipes from around the world. Whether you’re a beginner or an experienced cook, we provide an
            easy way to explore new dishes, upload your own creations, and engage with a vibrant community.</p>
        <p>Join us in spreading the joy of cooking, one recipe at a time!</p>
        <h2>Contact</h2>
        <div class="social-icons-container">
            <a class="social-icon" href="#"><i class="fab fa-facebook"></i></a>
            <a class="social-icon" href="#"><i class="fab fa-instagram"></i></a>
            <a class="social-icon" href="#"><i class="fab fa-twitter"></i></a>
            <a class="social-icon" href="#"><i class="fas fa-phone"></i></a>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function deleteComment(commentId) {
            if (confirm('Apakah Anda yakin ingin menghapus komentar ini?')) {
                fetch(`/comment/${commentId}`, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            const commentElement = document.getElementById(`comment-${commentId}`);
                            if (commentElement) {
                                commentElement.remove();
                            }
                        } else {
                            alert(data.message);
                        }
                    })
                    .catch(error => {
                        console.error('Terjadi kesalahan:', error);
                        alert('Gagal menghapus komentar.');
                    });
            }
        }

        function toggleProfilePopup() {
            console.log("Profile clicked!"); // Debug log
            const popup = document.getElementById("profilePopup");
            popup.style.display = popup.style.display === 'block' ? 'none' : 'block';
        }

        // Close profile popup when clicking outside
        window.onclick = function(event) {
            const popup = document.getElementById('profilePopup');
            console.log("Clicked element:", event.target);
            if (!event.target.closest('.profile') && !event.target.closest('#profilePopup')) {
                popup.style.display = 'none'; // Hide popup
            }
        };


        function logout() {
            // Implement logout functionality
            alert("Logout clicked!");
            // For example, redirect or perform logout logic here
        }

        function addComment() {
            const commentInput = document.getElementById('commentInput');
            const commentText = commentInput.value.trim();

            if (commentText !== "") {
                // Mengirim komentar ke server menggunakan Axios
                axios.post('/comments/add', {
                        comment_text: commentText,
                        user_id: 1 // Ganti dengan ID user yang login
                    })
                    .then(response => {
                        const commentData = response.data.comment;
                        const authorName = response.data.authorName;
                        const commentId = commentData.id;

                        // Ambil container untuk menampilkan komentar
                        const commentsContainer = document.getElementById('commentsContainer');

                        // Buat elemen komentar baru
                        const commentDiv = document.createElement('div');
                        commentDiv.className = 'comment';
                        commentDiv.innerHTML = `
                <div class="author-info">
                    <p class="authorName">${authorName}</p>
                    <p>${commentData.comment_text}</p>
                    <p class="time">${new Date(commentData.created_at).toLocaleString()}</p>
                    <i class="fa fa-trash delete-icon" title="Hapus Komentar"></i>
                </div>
            `;

                        // Tambahkan komentar baru ke dalam container
                        commentsContainer.prepend(commentDiv);

                        // Kosongkan input setelah komentar ditambahkan
                        commentInput.value = "";

                        // Tambahkan event listener untuk menghapus komentar
                        const deleteIcon = commentDiv.querySelector('.delete-icon');
                        deleteIcon.addEventListener('click', function() {
                            deleteComment(commentId, commentDiv);
                        });

                    })
                    .catch(error => {
                        console.error('Terjadi kesalahan:', error.response ? error.response.data : error.message);
                        alert('Gagal menambahkan komentar.');
                    });
            } else {
                alert("Komentar tidak boleh kosong!");
            }
        }



        // // Hide popup when clicking outside
        // window.onclick = function(event) {
        //     const popup = document.getElementById('profilePopup');
        //     if (!event.target.closest('.nav-link') && !event.target.closest('#profilePopup')) {
        //         popup.style.display = 'none'; // Hide popup
        //     }
        // }

        document.addEventListener('DOMContentLoaded', function() {
            const stars = document.querySelectorAll('.star-rating i');
            let currentRating = 0;

            stars.forEach(star => {
                star.addEventListener('click', function() {
                    currentRating = parseInt(this.getAttribute('data-rating'));
                    stars.forEach((s, index) => {
                        s.classList.toggle('selected', index < currentRating);
                    });
                });

                star.addEventListener('mouseover', function() {
                    const hoverRating = parseInt(this.getAttribute('data-rating'));
                    stars.forEach((s, index) => {
                        s.classList.toggle('selected', index < hoverRating);
                    });
                });

                star.addEventListener('mouseout', function() {
                    stars.forEach((s, index) => {
                        s.classList.toggle('selected', index < currentRating);
                    });
                });
            });
        });
    </script>
</body>

</html>
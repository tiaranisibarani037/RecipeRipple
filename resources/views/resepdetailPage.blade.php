<html>

<head>
    <title>Recipe Ripple</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background-color: #FFF7E6;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #FFFFFF;
            padding: 1rem;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar-brand {
            font-weight: bold;
        }

        .btn-custom {
            background-color: #FF4500;
            color: white;
            border: none;
            padding: 0.5rem 2rem;
            border-radius: 40px;
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
            background-color: #E0E0E0;
            height: 200px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 10px;
            margin-bottom: 1rem;
            cursor: pointer;
            position: relative;
        }

        .video-placeholder i {
            font-size: 3rem;
            color: #A0A0A0;
        }

        #videoPreview {
            display: none;
            width: 100%;
            margin-top: 1rem;
        }

        input[type="file"] {
            display: none;
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

        textarea {
            overflow: hidden;
            resize: none;
        }

        .remove-button {
            color: red;
            cursor: pointer;
            font-weight: bold;
            margin-left: 1rem;
        }

        .step-image-placeholder {
            background-color: #E0E0E0;
            height: 150px;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 10px;
            margin-top: 1rem;
            cursor: pointer;
            position: relative;
        }

        .step-image-placeholder i {
            font-size: 2rem;
            color: #A0A0A0;
        }

        .step-image {
            display: none;
            width: 100%;
            margin-top: 1rem;
        }

    </style>
</head>

<body>
    <nav class="navbar">
        <a class="navbar-brand" href="#">
            <img src="{{url('frontend/images/logo.png')}}" alt="Recipe Ripple" width="30" class="me-2" style="border-radius: 50%;">
            Recipe <span style="color: orange;">Ripple</span>
        </a>
        <div>
            <form action="{{ route('recipe.store') }}" method="POST" id="recipe-form" enctype="multipart/form-data">
                <button type="submit" class="btn btn-custom">Unggah</button>
                <button type="reset" class="btn btn-custom">Hapus</button>
        </div>
    </nav>
    <div class="container">
        <div class="video-placeholder" id="videoIconLabel">
            <i class="fas fa-play-circle"></i>
        </div>
        <input type="file" id="videoInput" name="video" accept="video/*">
        <video id="videoPreview" controls></video>

        <p class="text-center">Tambahkan video resep Anda!</p>
        @csrf
        <input type="text" class="form-control" id="name" name="name" placeholder="Judul : Nasi Goreng Telur Mata Sapi" required>
        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Cerita di balik masakan anda. Bagaimana hal tersebut menginspirasimu? Deskripsikanlah masakan Anda" required></textarea>

        <p class="section-title">Bahan-bahan</p>
        <div id="bahan-container">
            <div class="bahan-item">
                <input type="text" class="form-control" name="bahan[]" placeholder="1 Piring Nasi">
            </div>
            <div class="bahan-item">
                <input type="text" class="form-control" name="bahan[]" placeholder="1 butir telur">
            </div>
        </div>
        <div class="add-button" id="add-bahan">
            <i class="fas fa-plus-circle"></i> Tambah Bahan
        </div>

        <p class="section-title">Langkah-langkah</p>
        <div id="langkah-container">
            <div class="langkah-item">
                <input type="text" class="form-control" name="langkah[]" placeholder="Iris bawang merah menjadi beberapa bagian">
                <div class="step-image-placeholder" id="imagePlaceholder1">
                    <i class="fas fa-camera"></i>
                </div>
                <input type="file" id="stepImage1" name="langkah_image[]" accept="image/*">
                <img id="stepPreview1" class="step-image">
            </div><br>
            <div class="langkah-item">
                <input type="text" class="form-control" name="langkah[]" placeholder="Panaskan minyak makan terlebih dahulu">
                <div class="step-image-placeholder" id="imagePlaceholder2">
                    <i class="fas fa-camera"></i>
                </div>
                <input type="file" id="stepImage2" name="langkah_image[]" accept="image/*">
                <img id="stepPreview2" class="step-image">
            </div><br>
        </div>
        <div class="add-button" id="add-langkah"><br>
            <i class="fas fa-plus-circle"></i> Tambah Langkah
        </div>
    </div>
    </form>

    <script>
    // Video upload and preview functionality
    const videoInput = document.getElementById('videoInput');
    const videoPreview = document.getElementById('videoPreview');
    const videoIconLabel = document.getElementById('videoIconLabel');

    videoIconLabel.addEventListener('click', () => {
        videoInput.click();
    });

    videoInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const videoUrl = URL.createObjectURL(file);
            videoPreview.src = videoUrl;
            videoPreview.style.display = 'block';
            videoIconLabel.style.display = 'none';
        }
    });

    // Adding new ingredients and steps
    let langkahCount = 2;

    document.getElementById('add-bahan').addEventListener('click', function() {
        var newBahanDiv = document.createElement('div');
        newBahanDiv.className = 'bahan-item';
        newBahanDiv.innerHTML = '<input type="text" class="form-control" name="bahan[]" placeholder="Tambahkan bahan lain">' +
            '<span class="remove-button">Hapus</span>';
        document.getElementById('bahan-container').appendChild(newBahanDiv);

        newBahanDiv.querySelector('.remove-button').addEventListener('click', function() {
            newBahanDiv.remove();
        });
    });

    document.getElementById('add-langkah').addEventListener('click', function() {
        langkahCount++;
        var newLangkahDiv = document.createElement('div');
        newLangkahDiv.className = 'langkah-item';
        newLangkahDiv.innerHTML = '<input type="text" class="form-control" name="langkah[]" placeholder="Tambahkan langkah lain">' +
            '<div class="step-image-placeholder" id="imagePlaceholder' + langkahCount + '">' +
            '<i class="fas fa-camera"></i>' +
            '</div>' +
            '<input type="file" id="stepImage' + langkahCount + '" name="langkah_image[]" accept="image/*">' +
            '<img id="stepPreview' + langkahCount + '" class="step-image">' +
            '<span class="remove-button">Hapus</span>'; // Add the remove button for each step
        document.getElementById('langkah-container').appendChild(newLangkahDiv);

        var imagePlaceholder = document.getElementById('imagePlaceholder' + langkahCount);
        var stepImage = document.getElementById('stepImage' + langkahCount);
        var stepPreview = document.getElementById('stepPreview' + langkahCount);

        imagePlaceholder.addEventListener('click', function() {
            stepImage.click();
        });

        stepImage.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const imageUrl = URL.createObjectURL(file);
                stepPreview.src = imageUrl;
                stepPreview.style.display = 'block';
                imagePlaceholder.style.display = 'none';
            }
        });

        // Add functionality to remove the new step
        newLangkahDiv.querySelector('.remove-button').addEventListener('click', function() {
            newLangkahDiv.remove();
        });
    });

    // Image upload and preview functionality for steps
    function handleImageUpload(imagePlaceholderId, inputId, previewId) {
        const imagePlaceholder = document.getElementById(imagePlaceholderId);
        const stepImage = document.getElementById(inputId);
        const stepPreview = document.getElementById(previewId);

        imagePlaceholder.addEventListener('click', function() {
            stepImage.click();
        });

        stepImage.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const imageUrl = URL.createObjectURL(file);
                stepPreview.src = imageUrl;
                stepPreview.style.display = 'block';
                imagePlaceholder.style.display = 'none';
            }
        });
    }

    handleImageUpload('imagePlaceholder1', 'stepImage1', 'stepPreview1');
    handleImageUpload('imagePlaceholder2', 'stepImage2', 'stepPreview2');
</script>

</body>

</html>

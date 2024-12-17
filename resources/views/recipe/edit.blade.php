<html>

<head>
    <title>Recipe Ripple</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        #videoPreview {
            display: visible;
            height: 100%;
            width: 100%;
            /* margin-top: 1rem; */
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
            width: 30%;
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
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .step-image {
            display: none;
            max-width: 30%;
            margin-top: 1rem;
        }
    </style>
</head>

<body>
    <div>
        <form action="{{ route('recipe.update', $data['recipe']['id']) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Gunakan PUT untuk pembaruan -->

            <nav class="navbar">
                <a class="navbar-brand" href="#">
                    <img src="{{ url('frontend/images/logo.png') }}" alt="Recipe Ripple" width="30" class="me-2"
                        style="border-radius: 50%;">
                    Recipe <span style="color: orange;">Ripple</span>
                </a>
                <div class="text-end">
                    <button type="submit" class="btn btn-custom">Perbarui</button>
                    <a href="{{ route('recipe.index') }}" class="btn btn-custom">Batal</a>
                </div>
            </nav>

            <div class="container">
                @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="video-placeholder" id="videoIconLabel">
                    @if ($data['recipe']['video_path'])
                        <video id="videoPreview" controls>
                            <source src="{{ asset('uploads/recipe/video/' . $data['recipe']['video_path']) }}"
                                type="video/mp4">
                        </video>
                    @else
                        <i class="fas fa-play-circle"></i>
                    @endif
                </div>
                <input type="file" id="videoInput" name="video" accept="video/*">
                <video id="videoPreview" controls style="display: none;"></video>

                <input type="text" class="form-control" id="name" name="name" placeholder="Judul: ..."
                    value="{{ $data['recipe']['name'] }}" required>
                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Deskripsi ..."
                    required>{{ $data['recipe']['description'] }}</textarea>

                <div class="form-group">
                    <label for="kategori_id">Kategori:</label>
                    <select class="form-control" id="kategori_id" name="kategori_id" required>
                        @foreach ($data['kategori'] as $kategori)
                            <option value="{{ $kategori['id'] }}" {{ $kategori['id'] == $data['recipe']['kategori_id'] ? 'selected' : '' }}>
                                {{ $kategori['nama'] }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <p class="section-title">Bahan-bahan</p>
                <div id="bahan-container">
                    <?php $var = explode(',', $data['recipe']['bahan']);?>
                    <?php for ($i = 0; $i < sizeof($var); $i++) {  ?>
                    <div class="bahan-item">
                        <input type="text" class="form-control" name="bahan[]" value="{{ $var[$i] }}"
                            placeholder="Bahan...">
                        <span class="remove-button">Hapus</span>
                    </div>
                    <?php } ?>
                </div>
                <div class="add-button" id="add-bahan">
                    <i class="fas fa-plus-circle"></i> Tambah Bahan
                </div>

                <p class="section-title">Langkah-langkah</p>
                <div id="langkah-container">
                    <?php $langkah = explode(',', $data['recipe']['langkah']);
$langkah_decode = json_decode($data['recipe']['langkah_image']);
$index = 0;
                    ?>
                    <?php for ($i = 0; $i < sizeof($langkah); $i++) { ?>
                    <div class="langkah-item">
                        <input type="text" class="form-control" name="langkah[]" value="{{ $langkah[$i] }}"
                            placeholder="Langkah...">
                        @if ($data['recipe']['langkah_image'])
                            <img src="{{ asset('uploads/recipe/image/' . $langkah_decode[$i]) }}" width="100" height="100"
                                alt="Step image">
                        @else
                            <div class="step-image-placeholder" id="imagePlaceholder{{ $index + 1 }}">
                                <i class="fas fa-camera"></i>
                            </div>
                        @endif
                        <input type="file" id="stepImage{{ $index + 1 }}" name="langkah_image[]" accept="image/*">

                        <span class="remove-button" onclick="removeLangkah(this)">Hapus</span>
                    </div>
                    <?php } ?>
                </div>

                <div class="add-button" id="add-langkah">
                    <i class="fas fa-plus-circle"></i> Tambah Langkah
                </div>
            </div>
        </form>

        <script>
            document.getElementById('add-bahan').addEventListener('click', function () {
                var newBahanDiv = document.createElement('div');
                newBahanDiv.className = 'bahan-item';
                newBahanDiv.innerHTML =
                    '<input type="text" class="form-control" id="bahan[]" name="bahan[]" placeholder="Tambahkan bahan lain">' +
                    '<span class="remove-button">Hapus</span>';
                document.getElementById('bahan-container').appendChild(newBahanDiv);

                newBahanDiv.querySelector('.remove-button').addEventListener('click', function () {
                    newBahanDiv.remove();
                });
            });

            document.getElementById('add-langkah').addEventListener('click', function () {
                langkahCount++;
                var newLangkahDiv = document.createElement('div');
                newLangkahDiv.className = 'langkah-item';
                newLangkahDiv.innerHTML = `
        <input type="text" class="form-control" id="langkah[]" name="langkah[]" placeholder="Langkah Baru">
        <div class="step-image-placeholder" id="imagePlaceholder${langkahCount}">
            <i class="fas fa-camera"></i>
        </div>
        <input type="file" id="stepImage${langkahCount}" name="langkah_image[]" accept="image/*" style="display: none;">
        <img id="stepPreview${langkahCount}" class="step-image" style="display: none; width: 100%; max-height: 200px;">
        <span class="remove-button" onclick="removeLangkah(this)">Hapus</span>
        <div id="imageControls${langkahCount}" style="display: none; margin-top: 10px;">
    <button type="button" class="replace-button" style="background-color: blue;color: white; border: white; border-radius: 5px;margin: 1px;">Ganti</button>
    <button type="button" class="remove-image-button" style="background-color: #9f0000; color: white; border: white; border-radius: 5px; margin: 2px;">Hapus</button>
        </div>
    `;
                document.getElementById('langkah-container').appendChild(newLangkahDiv);

                // Add event listener to the new image placeholder
                const newImagePlaceholder = newLangkahDiv.querySelector(`#imagePlaceholder${langkahCount}`);
                const newImageInput = newLangkahDiv.querySelector(`#stepImage${langkahCount}`);
                const newImagePreview = newLangkahDiv.querySelector(`#stepPreview${langkahCount}`);
                const newImageControls = newLangkahDiv.querySelector(`#imageControls${langkahCount}`);

                newImagePlaceholder.addEventListener('click', () => newImageInput.click());

                newImageInput.addEventListener('change', function () {
                    const file = this.files[0];
                    if (file) {
                        const imageUrl = URL.createObjectURL(file);
                        newImagePreview.src = imageUrl;
                        newImagePreview.style.display = 'block';
                        newImagePlaceholder.style.display = 'none';
                        newImageControls.style.display = 'block'; // Show controls
                    }
                });

                // Add functionality for the replace button
                newImageControls.querySelector('.replace-button').addEventListener('click', () => {
                    newImageInput.click(); // Trigger file input to select new image
                });

                // Add functionality for the remove button
                newImageControls.querySelector('.remove-image-button').addEventListener('click', () => {
                    newImagePreview.src = ''; // Clear image source
                    newImagePreview.style.display = 'none'; // Hide image preview
                    newImagePlaceholder.style.display = 'block'; // Show the placeholder again
                    newImageControls.style.display = 'none'; // Hide controls
                    newImageInput.value = ''; // Clear file input
                });
            });
        </script>
    </div>

    <script>
        // Video upload and preview functionality
        const videoInput = document.getElementById('videoInput');
        const videoPreview = document.getElementById('videoPreview');
        const videoIconLabel = document.getElementById('videoIconLabel');
        const removeVideoButton = document.createElement('button'); // Create remove button
        removeVideoButton.innerText = 'Hapus Video'; // Button text
        removeVideoButton.style.display = 'visible'; // Initially hidden
        removeVideoButton.style.borderColor = 'white'; // No border
        removeVideoButton.style.backgroundColor = ' #9f0000'; // Red color
        removeVideoButton.style.color = '#ffffff'; // White text color
        removeVideoButton.style.margin = '10px'; // Add some margin for spacing
        removeVideoButton.style.borderRadius = '5px';
        removeVideoButton.onclick = removeVideo; // Bind remove function
        videoPreview.parentNode.insertBefore(removeVideoButton, videoPreview.nextSibling); // Insert after preview

        let select;

        videoIconLabel.addEventListener('click', () => {
            if (!select) { // Only create the select if it doesn't exist
                // Create a select element
                select = document.createElement('select');
                select.innerHTML = `
            <option value="">Pilih sumber video</option>
            <option value="computer">Dari Komputer</option>
            <option value="youtube">Dari YouTube</option>
        `;
                select.style.padding = "0.5rem";
                select.style.borderRadius = "5px";
                select.style.border = "1px solid #ccc";
                select.style.margin = "5rem 183px";
                select.style.position = "absolute";
                select.style.zIndex = "10"; // Ensure it appears above other elements

                // Append the select to the video placeholder
                videoIconLabel.appendChild(select);

                // Handle selection change
                select.addEventListener('change', (event) => {
                    if (event.target.value === 'computer') {
                        videoInput.click(); // Trigger file input
                        removeSelect(); // Remove select after choice
                    } else if (event.target.value === 'youtube') {
                        const youtubeUrl = prompt("Masukkan link YouTube:");
                        if (youtubeUrl) {
                            embedYouTubeVideo(youtubeUrl); // Embed YouTube video
                        }
                        removeSelect(); // Remove select after choice
                    }
                });

                // Function to remove after clicking outside
                document.addEventListener('click', (event) => {
                    if (!videoIconLabel.contains(event.target) && select) {
                        removeSelect();
                    }
                });
            }
        });

        function removeSelect() {
            if (select) {
                videoIconLabel.removeChild(select);
                select = null; // Reset the select variable
            }
        }

        videoInput.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const videoUrl = URL.createObjectURL(file);
                videoPreview.src = videoUrl;
                videoPreview.style.display = 'block';
                videoIconLabel.style.display = 'visible';
                removeVideoButton.style.display = 'block'; // Show remove button
            }
        });

        // Function to remove the video
        function removeVideo() {
            videoPreview.src = ''; // Clear the video source
            videoPreview.style.display = 'none'; // Hide the video preview
            videoIconLabel.style.display = 'block'; // Show the video icon label again
            removeVideoButton.style.display = 'none'; // Hide the remove button
            videoInput.value = ''; // Clear the file input

            // Reset to show the video icon again
            const playIcon = document.createElement('i');
            playIcon.className = 'fas fa-play-circle';
            videoIconLabel.innerHTML = ''; // Clear previous content
            videoIconLabel.appendChild(playIcon); // Append the play icon
        }

        // Function to embed YouTube video
        function embedYouTubeVideo(url) {
            const videoId = extractYouTubeId(url);
            if (videoId) {
                videoPreview.src = `https://www.youtube.com/embed/${videoId}`;
                videoPreview.style.display = 'block';
                videoIconLabel.style.display = 'none';
                removeVideoButton.style.display = 'block'; // Show remove button
            } else {
                alert("Link YouTube tidak valid.");
            }
        }

        // Helper function to extract YouTube video ID
        function extractYouTubeId(url) {
            const regex =
                /(?:https?:\/\/)?(?:www\.)?youtube\.com\/(?:watch\?v=|embed\/|v\/|.+\?v=)?([^&]{11})|youtu\.be\/([^&]{11})/;
            const match = url.match(regex);
            return match ? match[1] || match[2] : null;
        }

        // Adding new ingredients and steps
        let langkahCount = 2;

        // Adding event listener for existing placeholders
        document.querySelectorAll('.step-image-placeholder').forEach((placeholder, index) => {
            const imageInput = document.querySelector(`#stepImage${index + 1}`);
            const imagePreview = document.querySelector(`#stepPreview${index + 1}`);

            // Create and style image controls
            const imageControls = document.createElement('div');
            imageControls.id = `imageControls${index + 1}`;
            imageControls.style.display = 'none';
            imageControls.style.border = 'none';
            imageControls.style.marginTop = '10px';
            imageControls.style.textAlign = 'left'; // Center align the buttons below the preview
            imageControls.innerHTML = `
    <button type="button" class="replace-button" style="background-color: blue;color: white; border: white; border-radius: 5px;margin: 1px;">Ganti</button>
    <button type="button" class="remove-image-button" style="background-color: #9f0000; color: white; border: white; border-radius: 5px; margin: 2px;">Hapus</button>
    `;

            // Insert imageControls after the image preview
            imagePreview.parentNode.insertBefore(imageControls, imagePreview.nextSibling);

            // Placeholder click event
            placeholder.addEventListener('click', () => imageInput.click());

            // Image input change event
            imageInput.addEventListener('change', function () {
                const file = this.files[0];
                if (file) {
                    const imageUrl = URL.createObjectURL(file);
                    imagePreview.src = imageUrl;
                    imagePreview.style.display = 'block';
                    placeholder.style.display = 'none';
                    imageControls.style.display = 'block'; // Show controls
                }
            });

            // Replace button functionality
            imageControls.querySelector('.replace-button').addEventListener('click', () => {
                imageInput.click(); // Trigger file input to select new image
            });

            // Remove button functionality
            imageControls.querySelector('.remove-image-button').addEventListener('click', () => {
                imagePreview.src = ''; // Clear image source
                imagePreview.style.display = 'none'; // Hide image preview
                placeholder.style.display = 'block'; // Show the placeholder again
                imageControls.style.display = 'none'; // Hide controls
                imageInput.value = ''; // Clear file input
            });
        });

        // Function to remove a step
        function removeLangkah(element) {
            element.parentElement.remove();
        }

        // Add langkah with image controls
    </script>

</body>

</html>

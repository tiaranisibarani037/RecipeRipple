<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Management</title>
    <link rel="shortcut icon" type="x-icon" href="{{url('frontend/images/Logo.png')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet"/>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Nunito', sans-serif;
        }

        body {
            display: flex;
            min-height: 100vh;
            background-color: #f5f5f5;
        }

        .sidebar {
            width: 250px;
            background-color: #603044;
            color: white;
            padding: 20px;
            display: flex;
            flex-direction: column;
            transition: width 0.3s ease;
            overflow: hidden;
        }

        .sidebar.collapsed {
            width: 0;
            padding: 0;
        }

        .logo-container {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .logo-container img {
            width: 40px;
            height: 40px;
            margin-right: 8px;
        }

        .sidebar h1 {
            font-size: 1.2em;
            font-weight: bold;
            color: white;
        }

        .sidebar h1 span {
            color: #F44708;
        }

        .sidebar a {
            text-decoration: none;
            color: white;
            font-size: 1em;
            margin: 6px 0;
            padding: 8px;
            display: flex;
            align-items: center;
            transition: background-color 0.3s;
        }

        .sidebar a i {
            margin-right: 8px;
            font-size: 1.1em;
        }

        .sidebar a.active, .sidebar a:hover {
            background-color: #3d1626;
            border-radius: 5px;
        }

        .content {
            flex: 1;
            padding: 20px;
            transition: margin-left 0.3s;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #ffffff;
            padding: 15px 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            position: relative;
        }

        .header .menu {
            font-size: 1.5em;
            cursor: pointer;
        }

        .header .profile {
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .header .profile img {
            border-radius: 50%;
            margin-right: 10px;
        }

        /* Profile Popup Styling */
        .profile-popup {
            display: none;
            position: absolute;
            top: 60px;
            right: 20px;
            background-color: white;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 1rem;
            min-width: 200px;
            z-index: 1000;
        }

        .profile-popup h5 {
            margin: 0;
            font-size: 14px;
            color: #333;
        }

        .profile-popup p {
            font-size: 12px;
            color: #666;
        }

        .profile-popup button {
            width: 100%;
            background-color: #f44708;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 0.5rem;
            cursor: pointer;
            margin-top: 10px;
        }

        .profile-popup button:hover {
            background-color: #ff6347;
        }

        .recipe-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .recipe-table th, .recipe-table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        .recipe-table th {
            background-color: #603044;
            color: white;
        }

        .recipe-table img {
            border-radius: 5px;
            width: 60px;
            height: 60px;
        }

        .btn-add-recipe {
            background-color: #F44708;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 20px;
        }

        .btn-add-recipe:hover {
            background-color: #ff6347;
        }

        .btn-delete, .btn-edit, .btn-view, .btn-approve {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
        }

        .btn-delete {
            background-color: #de302a;
        }

        .btn-delete:hover {
            background-color: #c0211b;
        }

        .btn-edit {
            background-color: #53da67;
        }

        .btn-edit:hover {
            background-color: #48bd59;
        }

        .btn-view {
            background-color: #3498db;
        }

        .btn-view:hover {
            background-color: #2980b9;
        }

        .btn-approve {
            background-color: #f44708;
        }

        .btn-approve:hover {
            background-color: #ff6347;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="logo-container">
            <img alt="Logo" src="{{ url('../frontend/images/Logo.png') }}"/>
            <h1>Recipe <span>Ripple</span></h1>
        </div>
        <a href="/admin"><i class="fas fa-home"></i>Dashboard</a>
        <a href="/admin/user"><i class="fas fa-user"></i>User</a>
        <a class="active" href="/admin/resep"><i class="fas fa-book"></i>Resep</a>
    </div>

    <!-- Main Content -->
    <div class="content" id="content">
        <div class="header">
            <div class="menu" onclick="toggleSidebar()"><i class="fas fa-bars"></i></div>
            <div class="profile" onclick="toggleProfilePopup()">
                <img alt="Profile Picture" src="{{ url('../frontend/images/profile1.jpg') }}" width="40" height="40"/>
                <span>Admin</span>
            </div>
        </div>

        <!-- Recipe Management Section -->
        <h2>Manage Recipes</h2>
        <button class="btn-add-recipe" onclick="addRecipe()">Tambah Resep</button>
        
        <table class="recipe-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Resep</th>
                    <th>Deskripsi</th>
                    <th>Komentar</th>
                    <th>Rating</th>
                    <th>Status</th>
                    <th>Approval</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Contoh Data Resep -->
                <tr>
                    <td>1</td>
                    <td>Nasi Goreng</td>
                    <td>Nasi goreng lezat dengan bumbu spesial</td>
                    <td>Enak sekali!</td>
                    <td>4.5</td>
                    <td>
                        <select class="form-select form-select-sm">
                            <option selected>Setujui</option>
                            <option>Belum</option>
                            <option>Tidak Setujui</option>
                        </select>
                    </td>
                    <td>
                        <button class="btn-approve">Approve</button>
                    </td>
                    <td>
                        <button class="btn-view" onclick="viewRecipe()">Lihat</button>
                        <button class="btn-edit" onclick="editRecipe()">Edit</button>
                        <button class="btn-delete" onclick="deleteRecipe()">Hapus</button>
                    </td>
                </tr>
                <!-- Data resep lainnya dapat ditampilkan di sini -->
            </tbody>
        </table>
    </div>

    <!-- Profile Popup for Logout -->
    <div class="profile-popup" id="profilePopup">
        <div class="d-flex align-items-center">
            <img src="{{ url('../frontend/images/profile1.jpg') }}" alt="User Profile" class="rounded-circle" width="40" height="40"/>
            <div style="margin-left: 10px;">
                <a href="/profil">
                    <h5>Admin</h5>
                </a>
                <p>admin@gmail.com</p>
            </div>
        </div>
        <form action="{{ route('logout') }}" method="POST" style="margin-top: 10px;">
            @csrf
            <button type="submit">Keluar</button>
        </form>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById("sidebar");
            const content = document.getElementById("content");
            sidebar.classList.toggle("collapsed");
            content.classList.toggle("shifted");
        }

        function toggleProfilePopup() {
            const popup = document.getElementById("profilePopup");
            popup.style.display = popup.style.display === 'block' ? 'none' : 'block';
        }

        window.onclick = function(event) {
            const popup = document.getElementById("profilePopup");
            if (!event.target.closest('.profile') && !event.target.closest('#profilePopup')) {
                popup.style.display = 'none';
            }
        };

        // Fungsi untuk menambah
        function addRecipe() {
            alert("Fungsi untuk menambah resep baru!");
            // Tambahkan logika untuk menampilkan form tambah resep atau membuka modal
        }

        // Fungsi untuk melihat resep
        function viewRecipe() {
            alert("Fungsi untuk melihat resep!");
            // Tambahkan logika untuk menampilkan detail resep atau membuka modal
        }

        // Fungsi untuk mengedit resep
        function editRecipe() {
            alert("Fungsi untuk mengedit resep!");
            // Tambahkan logika untuk membuka form edit resep atau membuka modal
        }

        // Fungsi untuk menghapus resep
        function deleteRecipe() {
            if (confirm("Apakah Anda yakin ingin menghapus resep ini?")) {
                alert("Resep berhasil dihapus!");
                // Tambahkan logika penghapusan resep di sini
            }
        }
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Saya - Navbar</title>
</head>

<body>

    <style>
        /* Styling untuk indikator notifikasi (titik merah) */
        .notification-badge {
            position: absolute;
            top: 0;
            right: 0;
            transform: translate(50%, -50%);
            background-color: red;
            color: white;
            font-size: 10px;
            padding: 5px;
            border-radius: 50%;
            display: none;
            animation: pulse 1s infinite;
            /* Menambahkan animasi pulse */
        }

        /* Menampilkan badge notifikasi jika ada notifikasi baru */
        .notification-badge.show {
            display: block;
        }

        /* Animasi pulse untuk efek berkedip */
        @keyframes pulse {
            0% {
                transform: translate(50%, -50%) scale(1);
                /* Skala normal */
            }
        }
    </style>

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
        <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
            <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
        </a>
        <a href="#" class="sidebar-toggler flex-shrink-0">
            <i class="fa fa-bars"></i>
        </a>
        <div class="row my-3">
            <div class="col-10 mx-auto">
                <form action="{{ route('home') }}" method="GET" class="d-flex gap-2">
                    <input type="text" class="form-control" name="query" placeholder="Cari tugas atau list..."
                        value="{{ request()->query('query') }}">
                    <button type="submit" class="btn btn-outline-primary"><i class="bi bi-search-heart"></i></button>
                </form>
            </div>
        </div>


        <div class="navbar-nav align-items-center ms-auto">
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" id="notificationToggle">
                    <i class="fa fa-bell me-lg-2 position-relative">
                        <!-- Indikator notifikasi baru (titik merah) -->
                        <span id="notificationBadge" class="notification-badge"></span>
                    </i>
                    <span class="d-none d-lg-inline-flex">Notifikasi</span>
                </a>
                <div id="notificationDropdown"
                    class="dropdown-menu dropdown-menu-end bg-secondary text-white border-primary border-7 border-color rounded-3 rounded-bottom m-0">
                    <!-- Notifikasi akan muncul di sini -->
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link">
                    <img class="rounded-circle me-lg-2" src="assets/img/admin.jpeg" alt=""
                        style="width: 40px; height: 40px" />
                    <span class="d-none d-lg-inline-flex">Ikhsan Aufa</span>
                </a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <script>
        window.addEventListener('load', function() {
            // Cek apakah ada pesan baru yang belum dibaca di session
            let successMessage = "{{ session('success') }}"; // Ambil pesan dari Laravel session

            // Cek apakah ada notifikasi baru yang disimpan di LocalStorage
            let savedNotification = localStorage.getItem('notification');
            if (savedNotification) {
                // Jika ada notifikasi yang disimpan, tampilkan di dropdown
                document.getElementById('notificationDropdown').innerHTML = `<p>${savedNotification}</p>`;
                // Tampilkan indikator titik merah
                document.getElementById('notificationBadge').classList.add('show');
            }

            // Jika ada pesan dari session, simpan di LocalStorage dan tampilkan
            if (successMessage) {
                // Simpan notifikasi ke LocalStorage
                localStorage.setItem('notification', successMessage);

                // Tampilkan pesan notifikasi pada dropdown
                document.getElementById('notificationDropdown').innerHTML = `<p>${successMessage}</p>`;

                // Tampilkan indikator titik merah
                document.getElementById('notificationBadge').classList.add('show');
            }

            // Menambahkan event listener untuk menghilangkan tanda notifikasi saat toggle notifikasi
            document.getElementById('notificationToggle').addEventListener('click', function() {
                // Menyembunyikan indikator setelah notifikasi dibaca
                document.getElementById('notificationBadge').classList.remove('show');
                // Menghapus notifikasi setelah diklik (menghapus dari localStorage)
                localStorage.removeItem('notification');
            });

            // Event listener untuk menghapus notifikasi
            document.getElementById('notificationDropdown').addEventListener('click', function() {
                // Menghapus notifikasi dari LocalStorage
                localStorage.removeItem('notification');
                // Mengosongkan dropdown dan menyembunyikan indikator titik merah
                document.getElementById('notificationDropdown').innerHTML = '';
                document.getElementById('notificationBadge').classList.remove('show');
            });
        });
    </script>

    <!-- Bootstrap JS dan dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
</body>

</html>

<!-- Bootstrap JS dan dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>

</body>

</html>

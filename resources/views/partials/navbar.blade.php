<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Saya - Navbar</title>
</head>

<body>

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


</body>

</html>

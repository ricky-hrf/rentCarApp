<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Register Page</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Sign Up Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">

                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.html" class="">
                                <h3 class="text-primary">Rent Car</h3>
                            </a>
                            <h3>Sign Up</h3>
                        </div>
                        @if (session()->has('success'))
                            <div>
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingText" name="name"
                                    placeholder="name" value="{{ @old('name') }}">
                                <label for="floatingText">Nama</label>
                            </div>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="form-floating mb-3">
                                <input type="text" name="email" class="form-control" id="floatingInput"
                                    placeholder="name@example.com" value="{{ @old('email') }}">
                                <label for="floatingInput">Email address</label>
                            </div>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="form-floating mb-4">
                                <input type="password" name="password" class="form-control" id="floatingPassword"
                                    placeholder="Password" value="{{ @old('password') }}">
                                <label for="floatingPassword">Password</label>
                            </div>

                            @error('profile_picture')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="mb-4">
                                <label class="form-label">Foto Profil</label>
                                <input type="file" name="profile_picture" class="form_control">
                            </div>

                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign Up</button>
                            <p class="text-center mb-0">Already have an Account? <a
                                    href="{{ route('login') }}">Login</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign Up End -->
        @if (session()->has('success'))
            <script>
                Swal.fire({
                    title: "Registrasi Berhasil!",
                    text: "{{ session('success') }}",
                    icon: "success",
                    confirmButtonText: "OK"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ route('login') }}";
                    }
                });
            </script>
        @endif


    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>

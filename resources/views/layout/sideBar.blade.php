<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary">rentCarApp</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                <div
                    class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                </div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{ auth()->user()->name }}</h6>
                <span>{{ auth()->user()->role }}</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="index.html" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <a href="widget.html" class="nav-item nav-link"><i class="fa fa-handshake me-2"></i>Transaksi</a>
            <a href="form.html" class="nav-item nav-link"><i class="fa fa-folder-open me-2"></i>Laporan
                Transaksi</a>
            <a href="{{ route('mobil') }}" class="nav-item nav-link"><i class="fa fa-car me-2"></i>Mobil</a>
            <a href="{{ route('users') }}" class="nav-item nav-link"><i class="fa fa-users me-2"></i>Users</a>
        </div>
    </nav>
</div>
<!-- Sidebar End -->

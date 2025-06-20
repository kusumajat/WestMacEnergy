@extends('layouts/template')

@section('styles')
    {{-- Font Awesome untuk ikon --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        :root {
            --primary-color: #FFC300;
            --success-color: #1D1D1D;
            --info-color: #1D1D1D;
            --warning-color: #f1f0f0;
            --light-gray: #f1f0f0;
            --dark-text: #1D1D1D;
            --light-text: #57606f;
            --card-shadow: 0 10px 30px rgba(0, 0, 0, 0.07);
            --border-color: #ffffff;
        }

        body {
            background-color: var(--light-gray);
            color: var(--dark-text);
            font-family: 'Poppins', sans-serif; /* Anda bisa menambahkan font Poppins dari Google Fonts di layout utama */
        }

        /* --- Header Utama --- */
        .page-header {
            text-align: center;
            margin-bottom: 4rem;
        }
        .page-header h1 {
            font-weight: 700;
            font-size: 2.8rem;
            color: var(--dark-text);
        }
        .page-header p {
            font-size: 1.1rem;
            color: var(--light-text);
            max-width: 600px;
            margin: 0.5rem auto 0;
        }

        /* --- Search Bar --- */
        .search-form .input-group {
            box-shadow: var(--card-shadow);
            border-radius: 50px;
            overflow: hidden;
        }
        .search-form .form-control {
            border: none;
            height: 50px;
            padding-left: 25px;
            font-size: 1rem;
        }
        .search-form .form-control:focus {
            box-shadow: none;
        }
        .search-form .btn {
            height: 50px;
            border: none;
            background-color: var(--primary-color);
            color: white;
            padding: 0 25px;
            transition: background-color 0.3s ease;
        }
        .search-form .btn:hover {
            background-color: #fff;
        }

        /* --- Card Styling --- */
        .card {
            border: none;
            border-radius: 1rem;
            box-shadow: var(--card-shadow);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            padding: 1.25rem 1.75rem;
            font-size: 1.2rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            border-bottom: 1px solid var(--border-color);
        }
        .card-header i {
            margin-right: 0.75rem;
            font-size: 1.3rem;
        }
        .card-header.bg-primary-soft { background-color: #FFC300; color: #1D1D1D; }
        .card-header.bg-success-soft { background-color: #FFC300; color: #1D1D1D; }
        .card-header.bg-info-soft { background-color: #FFC300; color: #1D1D1D; }

        /* --- Table Styling --- */
        .table-responsive {
            padding: 0;
        }
        .table {
            margin-bottom: 0;
        }
        .table thead th {
            background-color: #fff;
            border-bottom: 2px solid var(--border-color);
            color: var(--dark-text);
            font-weight: 600;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 1rem 1.75rem;
        }
        .table tbody td {
            padding: 1rem 1.75rem;
            vertical-align: middle;
            color: var(--light-text);
            border-top: 1px solid var(--border-color);
        }
        .table tbody tr:hover {
            background-color: #f8f9fa;
        }
        .table tbody tr:first-child td {
            border-top: none;
        }
        .img-thumbnail-table {
            width: 70px;
            height: 50px;
            object-fit: cover;
            border-radius: 0.5rem;
            border: 2px solid white;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
            cursor: pointer;
        }
        .img-thumbnail-table:hover {
            transform: scale(1.5);
            z-index: 10;
        }
        .badge {
            font-weight: 500;
            padding: 0.4em 0.8em;
            font-size: 0.85rem;
        }
        .empty-state {
            padding: 3rem 1.5rem;
            text-align: center;
        }
        .empty-state i {
            font-size: 3rem;
            color: #ced4da;
            margin-bottom: 1rem;
        }
        .empty-state p {
            color: var(--light-text);
            font-size: 1.1rem;
        }

        /* --- Pagination Styling --- */
        .pagination {
            justify-content: center;
            margin-top: 2rem;
        }
        .pagination .page-item .page-link {
            border-radius: 50px !important; /* Use !important to override Bootstrap */
            margin: 0 5px;
            border: none;
            color: var(--primary-color);
            font-weight: 500;
            transition: all 0.3s ease;
        }
        .pagination .page-item.active .page-link {
            background-color: var(--primary-color);
            color: white;
            box-shadow: 0 4px 10px rgba(74, 105, 189, 0.4);
        }
        .pagination .page-item:not(.active) .page-link:hover {
            background-color: #e8ecf8;
        }
        .pagination .page-item.disabled .page-link {
            color: #adb5bd;
        }
        .search-container {
    position: relative;
}
.search-container .form-control {
    height: 55px;
    border: 1px solid var(--border-color);
    border-radius: 50px;
    padding-left: 50px; /* Ruang untuk ikon search */
    padding-right: 50px; /* Ruang untuk tombol clear */
    transition: all 0.3s ease;
}
.search-container .form-control:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 4px rgba(74, 105, 189, 0.2);
}
.search-container .search-icon {
    position: absolute;
    left: 20px;
    top: 50%;
    transform: translateY(-50%);
    color: #aaa;
    font-size: 1.1rem;
}
.search-container .clear-icon {
    position: absolute;
    right: 120px; /* Sesuaikan posisi agar tidak tumpang tindih dengan tombol search */
    top: 50%;
    transform: translateY(-50%);
    color: #aaa;
    cursor: pointer;
    display: none; /* Sembunyikan secara default */
    font-size: 1.2rem;
}
.search-container .btn {
    position: absolute;
    right: 6px;
    top: 50%;
    transform: translateY(-50%);
    height: 43px;
    border-radius: 50px;
    padding: 0 25px;
    background: var(--primary-color);
    color: white;
    font-weight: 500;
}
.search-container .btn:hover {
    background: #1D1D1D;
}

/* --- Enhanced Pagination Container --- */
.pagination-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1rem 1.75rem;
    background-color: #fff;
    border-top: 1px solid var(--border-color);
}
.pagination-info {
    color: var(--light-text);
    font-size: 0.9rem;
}
.pagination-info strong {
    color: var(--dark-text);
}
.pagination .page-item .page-link {
    width: 40px;
    height: 40px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50% !important;
    margin: 0 3px;
    border: none;
    font-weight: 600;
    transition: all 0.3s ease;
}
.pagination .page-item:not(.active) .page-link:hover {
    transform: translateY(-3px);
    background-color: #e8ecf8;
}
.pagination .page-item.active .page-link {
    transform: translateY(-3px);
    box-shadow: 0 6px 12px rgba(74, 105, 189, 0.3);
}
/* Mengganti panah default dengan ikon Font Awesome */
.page-item:first-child .page-link, .page-item:last-child .page-link {
    font-size: 0.8rem;
}
    </style>
@endsection

@section('content')
    <div class="container py-5">
        <div class="page-header">
            <h1>Data Features Overview</h1>
            <p>A comprehensive view of all geographic data points, lines, and areas registered in the system.</p>
        </div>

        {{-- =================================== --}}
        {{-- BAGIAN SEARCH BAR YANG DIPERBARUI --}}
        {{-- =================================== --}}
        <div class="row mb-5 justify-content-center">
            <div class="col-md-8">
                <form action="{{ url()->current() }}" method="GET">
                    <div class="search-container">
                        <i class="fas fa-search search-icon"></i>
                        <input type="text" class="form-control" id="searchInput" name="search" placeholder="Search by name or description..." value="{{ request('search') }}">
                        <i class="fas fa-times-circle clear-icon" id="clearSearch"></i>
                        <button class="btn" type="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Table Point --}}
        <div class="card mb-5">
            <div class="card-header bg-primary-soft">
                <i class="fas fa-map-marker-alt"></i>
                <h2 class="h5 mb-0">Points Data</h2>
            </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    {{-- Thead dan Tbody tetap sama seperti sebelumnya --}}
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($points as $index => $p)
                            <tr>
                                <td><strong>{{ $points->firstItem() + $index }}</strong></td>
                                <td class="fw-bold text-dark">{{ $p->name }}</td>
                                <td>{{ Str::limit($p->description, 70) }}</td>
                                <td>
                                    @if ($p->image)
                                        <img src="{{ asset('storage/images/'.$p->image) }}" alt="{{ $p->name }}" class="img-thumbnail-table" data-bs-toggle="tooltip" title="{{ $p->image }}">
                                    @else
                                        <span class="text-muted fst-italic">No Image</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($p->created_at)
                                        <span class="badge rounded-pill bg-secondary bg-opacity-75">{{ $p->created_at->format('d M Y, H:i') }}</span>
                                    @else - @endif
                                </td>
                                <td>
                                    @if ($p->updated_at)
                                        <span class="badge rounded-pill" style="background-color: var(--warning-color); color: var(--dark-text);">{{ $p->updated_at->format('d M Y, H:i') }}</span>
                                    @else - @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">
                                    <div class="empty-state">
                                        <i class="fas fa-database"></i>
                                        <p>
                                            @if (request('search'))
                                                No point data found for: <strong>"{{ request('search') }}"</strong>
                                            @else
                                                No point data available.
                                            @endif
                                        </p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- ======================================= --}}
            {{-- BAGIAN PAGINASI YANG DIPERBARUI (POINTS) --}}
            {{-- ======================================= --}}
            @if ($points->hasPages())
                <div class="pagination-container">
                    <div class="pagination-info">
                        Showing <strong>{{ $points->firstItem() }}</strong> to <strong>{{ $points->lastItem() }}</strong> of <strong>{{ $points->total() }}</strong> results
                    </div>
                    <div>
                        {{ $points->links() }}
                    </div>
                </div>
            @endif
        </div>


        {{-- Table Polyline (Lakukan hal yang sama) --}}
        <div class="card mb-5">
            <div class="card-header bg-success-soft">
                <i class="fas fa-road"></i>
                <h2 class="h5 mb-0">Polylines Data</h2>
            </div>
            <div class="table-responsive">
                {{-- Table content for polylines --}}
                <table class="table table-hover align-middle">
                    {{-- ... Konten tabel polylines sama seperti sebelumnya ... --}}
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($polylines as $index => $p)
                             <tr>
                                <td><strong>{{ $polylines->firstItem() + $index }}</strong></td>
                                <td class="fw-bold text-dark">{{ $p->name }}</td>
                                <td>{{ Str::limit($p->description, 70) }}</td>
                                <td>
                                    @if ($p->image)
                                        <img src="{{ asset('storage/images/'.$p->image) }}" alt="{{ $p->name }}" class="img-thumbnail-table" data-bs-toggle="tooltip" title="Click to view image: {{ $p->image }}">
                                    @else
                                        <span class="text-muted fst-italic">No Image</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($p->created_at)
                                        <span class="badge rounded-pill bg-secondary bg-opacity-75">{{ $p->created_at->format('d M Y, H:i') }}</span>
                                    @else - @endif
                                </td>
                                <td>
                                    @if ($p->updated_at)
                                        <span class="badge rounded-pill" style="background-color: var(--warning-color); color: var(--dark-text);">{{ $p->updated_at->format('d M Y, H:i') }}</span>
                                    @else - @endif
                                </td>
                            </tr>
                        @empty
                           <tr>
                                <td colspan="6">
                                    <div class="empty-state">
                                        <i class="fas fa-database"></i>
                                        <p>
                                            @if (request('search'))
                                                No polyline data found for: <strong>"{{ request('search') }}"</strong>
                                            @else
                                                No polyline data available.
                                            @endif
                                        </p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{-- =========================================== --}}
            {{-- BAGIAN PAGINASI YANG DIPERBARUI (POLYLINES) --}}
            {{-- =========================================== --}}
            @if ($polylines->hasPages())
                <div class="pagination-container">
                    <div class="pagination-info">
                        Showing <strong>{{ $polylines->firstItem() }}</strong> to <strong>{{ $polylines->lastItem() }}</strong> of <strong>{{ $polylines->total() }}</strong> results
                    </div>
                    <div>
                        {{ $polylines->links() }}
                    </div>
                </div>
            @endif
        </div>


        {{-- Table Polygon (Lakukan hal yang sama) --}}
        <div class="card mb-4">
            <div class="card-header bg-info-soft">
                <i class="fas fa-draw-polygon"></i>
                <h2 class="h5 mb-0">Polygons Data</h2>
            </div>
            <div class="table-responsive">
                {{-- Table content for polygons --}}
                <table class="table table-hover align-middle">
                    {{-- ... Konten tabel polygons sama seperti sebelumnya ... --}}
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($polygons as $index => $p)
                            <tr>
                                <td><strong>{{ $polygons->firstItem() + $index }}</strong></td>
                                <td class="fw-bold text-dark">{{ $p->name }}</td>
                                <td>{{ Str::limit($p->description, 70) }}</td>
                                <td>
                                    @if ($p->image)
                                        <img src="{{ asset('storage/images/'.$p->image) }}" alt="{{ $p->name }}" class="img-thumbnail-table" data-bs-toggle="tooltip" title="Click to view image: {{ $p->image }}">
                                    @else
                                        <span class="text-muted fst-italic">No Image</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($p->created_at)
                                        <span class="badge rounded-pill bg-secondary bg-opacity-75">{{ $p->created_at->format('d M Y, H:i') }}</span>
                                    @else - @endif
                                </td>
                                <td>
                                    @if ($p->updated_at)
                                        <span class="badge rounded-pill" style="background-color: var(--warning-color); color: var(--dark-text);">{{ $p->updated_at->format('d M Y, H:i') }}</span>
                                    @else - @endif
                                </td>
                            </tr>
                        @empty
                           <tr>
                                <td colspan="6">
                                    <div class="empty-state">
                                        <i class="fas fa-database"></i>
                                        <p>
                                            @if (request('search'))
                                                No polygon data found for: <strong>"{{ request('search') }}"</strong>
                                            @else
                                                No polygon data available.
                                            @endif
                                        </p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{-- ========================================== --}}
            {{-- BAGIAN PAGINASI YANG DIPERBARUI (POLYGONS) --}}
            {{-- ========================================== --}}
            @if ($polygons->hasPages())
                 <div class="pagination-container">
                    <div class="pagination-info">
                        Showing <strong>{{ $polygons->firstItem() }}</strong> to <strong>{{ $polygons->lastItem() }}</strong> of <strong>{{ $polygons->total() }}</strong> results
                    </div>
                    <div>
                        {{ $polygons->links() }}
                    </div>
                </div>
            @endif
        </div>

    </div>
@endsection

@section('scripts')
    {{-- Inisialisasi Tooltip Bootstrap 5 --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        });
    </script>

    {{-- Script untuk Search Bar --}}
    <script>
        const searchInput = document.getElementById('searchInput');
        const clearSearchIcon = document.getElementById('clearSearch');

        // Fungsi untuk menampilkan/menyembunyikan tombol clear
        function toggleClearIcon() {
            if (searchInput.value.length > 0) {
                clearSearchIcon.style.display = 'block';
            } else {
                clearSearchIcon.style.display = 'none';
            }
        }

        // Tampilkan tombol saat halaman dimuat jika ada value
        toggleClearIcon();

        // Tambahkan event listener saat pengguna mengetik
        searchInput.addEventListener('input', toggleClearIcon);

        // Tambahkan event listener untuk membersihkan input saat ikon di-klik
        clearSearchIcon.addEventListener('click', function() {
            searchInput.value = '';
            toggleClearIcon();
            searchInput.focus();
            // Redirect ke halaman tanpa parameter search
            window.location.href = "{{ url()->current() }}";
        });
    </script>
@endsection

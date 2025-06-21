<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'My App')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flexslider.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css">

    <style>
        #map {
            width: 100%;
            height: calc(100vh - 56px);
        }

        .color-option {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            border: 2px solid #ccc;
            cursor: pointer;
            display: inline-block;
            margin: 2px;
            transition: all 0.3s ease;
        }

        .color-option:hover {
            transform: scale(1.1);
            border-color: #000;
        }

        .color-option.selected {
            border-color: #000;
            border-width: 3px;
            transform: scale(1.1);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        .color-selection {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
            margin-top: 10px;
        }

        .color-preview {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 10px;
            padding: 10px;
            background-color: #f8f9fa;
            border-radius: 5px;
        }

        .color-preview-circle {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            border: 2px solid #ccc;
        }

        .custom-leaflet-popup .leaflet-popup-content-wrapper {
            background: #ffffff;
            padding: 0;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .custom-leaflet-popup .leaflet-popup-content {
            margin: 0 !important;
            min-width: 280px;
            /* Lebar minimum popup */
        }

        .custom-leaflet-popup .leaflet-popup-tip {
            background: #ffffff;
        }

        .popup-card {
            width: 100%;
        }

        .popup-image {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .popup-image-placeholder {
            width: 100%;
            height: 150px;
            background-color: #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6c757d;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .popup-content-area {
            padding: 1rem;
        }

        .popup-title {
            font-weight: 700;
            font-size: 1.15rem;
            margin-bottom: 0.25rem;
            color: #212529;
        }

        .popup-description {
            font-size: 0.9rem;
            color: #6c757d;
            margin-bottom: 1rem;
        }

        .popup-footer {
            padding: 0.75rem 1rem;
            background-color: #f8f9fa;
            font-size: 0.8rem;
            color: #6c757d;
            border-top: 1px solid #e9ecef;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .popup-actions form {
            margin-bottom: 0;
        }

        .layer-control-card {
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 1000;
            width: 260px;
            background-color: rgba(29, 29, 29, 0.8);
            backdrop-filter: blur(1px);
            -webkit-backdrop-filter: blur(1px);
            border-radius: 12px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #f0f0f0;
            overflow: hidden;
        }

        .layer-control-header {
            font-weight: 600;
            font-size: 1rem;
            padding: 0.8rem 1.2rem;
            background-color: #1D1D1D;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .layer-control-body {
            padding: 0.5rem;
        }

        .layer-control-footer {
            padding: 0.5rem 0.75rem;
            background-color: #1D1D1D;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .footer-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.6rem 0.5rem;
            border-radius: 6px;
            transition: background-color 0.2s ease-in-out;
        }

        .footer-item:not(:last-child) {
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .footer-item:hover {
            background-color: rgba(255, 255, 255, 0.05);
        }

        .footer-label {
            font-weight: 500;
            color: #d0d0d0;
            margin: 0;
        }

        .btn-footer-icon {
            background-color: rgba(255, 255, 255, 0.1);
            color: #f0f0f0;
            border: 1px solid transparent;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: all 0.2s ease-in-out;
            cursor: pointer;
        }

        .btn-footer-icon:hover {
            background-color: #ffc107;
            color: #1a1a1a;
            transform: scale(1.1);
        }

        .footer-item form {
            margin: 0;
            padding: 0;
            line-height: 1;
        }

        .layer-control-footer form {
            margin: 0;
            padding: 0;
            display: inline;
        }

        .layer-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.75rem 0.7rem;
            border-radius: 8px;
            transition: background-color 0.2s ease-in-out;
        }

        .layer-item:hover {
            background-color: rgba(255, 255, 255, 0.05);
        }

        .layer-label {
            display: flex;
            align-items: center;
            gap: 1rem;
            font-weight: 500;
            cursor: pointer;
        }

        .layer-icon {
            font-size: 1.1rem;
            width: 20px;
            text-align: center;
        }

        .form-switch .form-check-input {
            width: 48px;
            height: 24px;
            cursor: pointer;
            background-color: rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 0.2);
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='3' fill='rgba(255,255,255,0.5)'/%3e%3c/svg%3e");
        }

        .form-switch .form-check-input:focus {
            border-color: rgba(255, 255, 255, 0.5);
            box-shadow: 0 0 0 0.25rem rgba(255, 255, 255, 0.25);
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='3' fill='rgba(255,255,255,0.5)'/%3e%3c/svg%3e");
        }

        .form-switch .form-check-input:checked {
            background-color: #ffc107;
            border-color: #ffc107;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='3' fill='%23fff'/%3e%3c/svg%3e");
        }

        .legend-card {
            position: absolute;
            bottom: 20px;
            /* <-- Posisi di bawah */
            right: 20px;
            /* <-- Posisi di kanan */
            z-index: 1000;
            width: 200px;
            /* <-- Lebar bisa disesuaikan */
            background-color: rgba(29, 29, 29, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-radius: 12px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #f0f0f0;
            overflow: hidden;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            /* Jarak antara warna dan teks */
            padding: 0.1rem 0.8rem;
            border-radius: 8px;
            transition: background-color 0.2s ease-in-out;
        }

        .legend-item:hover {
            background-color: rgba(255, 255, 255, 0.05);
        }

        .legend-color {
            width: 20px;
            height: 20px;
            display: inline-block;
            flex-shrink: 0;
        }

        .legend-color.is-point {
            border-radius: 50%;
            border: 3px solid rgba(255, 255, 255, 0.7);
        }

        .legend-color.is-line {
            height: 4px;
            align-self: center;
        }

        .legend-label {
            font-weight: 500;
            color: #d0d0d0;
        }
    </style>
    <script src="{{ asset('js/modernizr-2.6.2.min.js') }}"></script>
</head>


<body>
    <div id="colorlib-page">
        <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
        @include('components.navbar')

        <div id="colorlib-map">
            <div id="map"></div>

            <div class="layer-control-card">
                {{-- Bagian Header --}}
                <div class="layer-control-header">
                    <i class="fa-solid fa-layer-group"></i>
                    <span>Layer Control</span>
                </div>

                {{-- Bagian Body --}}
                <div class="layer-control-body">
                    <div class="layer-item">
                        <label for="togglePoints" class="layer-label">
                            <i class="layer-icon fa-solid fa-map-marker-alt" style="color: #FFC300;"></i>
                            <span>Points</span>
                        </label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="togglePoints" checked>
                        </div>
                    </div>
                    <div class="layer-item">
                        <label for="togglePolylines" class="layer-label">
                            <i class="layer-icon fa-solid fa-wave-square" style="color: #FFC300;"></i>
                            <span>Polylines</span>
                        </label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="togglePolylines" checked>
                        </div>
                    </div>
                    <div class="layer-item">
                        <label for="togglePolygons" class="layer-label">
                            <i class="layer-icon fa-solid fa-draw-polygon" style="color: #FFC300;"></i>
                            <span>Polygons</span>
                        </label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="togglePolygons" checked>
                        </div>
                    </div>
                </div>

                <div class="layer-control-footer">
                    <div class="footer-item">
                        <label class="footer-label">See Post Mining Model</label>
                        <a href="{{ route('post-mining') }}" class="btn-footer-icon" title="See Post Mining Model">
                            <i class="fa-solid fa-seedling"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="legend-card">
                <div class="layer-control-header">
                    <i class="fa-solid fa-list"></i>
                    <span>Legend</span>
                </div>
                <div class="layer-control-body">
                    <div class="legend-item">
                        <span class="legend-color is-point" style="background-color: #d9534f;"></span>
                        <span class="legend-label">Pos Pantau</span>
                    </div>
                    <div class="legend-item">
                        <span class="legend-color is-point" style="background-color: #5bc0de;"></span>
                        <span class="legend-label">Kantor Utama</span>
                    </div>
                    <div class="legend-item">
                        <span class="legend-color is-line" style="background-color: #E74C3C;"></span>
                        <span class="legend-label">Polylines</span>
                    </div>
                    <div class="legend-item">
                        <span class="legend-color" style="background-color: #E74C3C;"></span>
                        <span class="legend-label">Polygons</span>
                    </div>
                </div>
            </div>

            <!-- Modal Point-->
            <div class="modal fade" id="CreatePointModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Create Point</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form method="POST" action="{{ route('points.store') }}" enctype="multipart/form-data">
                            <div class="modal-body">
                                @csrf

                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="example point">
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="geom_point" class="form-label">Geometry</label>
                                    <textarea class="form-control" id="geom_point" name="geom_point" rows="3"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Color</label>
                                    <div class="color-selection">
                                        <div class="color-option" data-color="#FF0000"
                                            style="background-color: #FF0000;" title="Red"></div>
                                        <div class="color-option" data-color="#00FF00"
                                            style="background-color: #00FF00;" title="Green"></div>
                                        <div class="color-option" data-color="#0000FF"
                                            style="background-color: #0000FF;" title="Blue"></div>
                                        <div class="color-option" data-color="#FFFF00"
                                            style="background-color: #FFFF00;" title="Yellow"></div>
                                        <div class="color-option" data-color="#FF00FF"
                                            style="background-color: #FF00FF;" title="Magenta"></div>
                                        <div class="color-option" data-color="#00FFFF"
                                            style="background-color: #00FFFF;" title="Cyan"></div>
                                        <div class="color-option" data-color="#FFA500"
                                            style="background-color: #FFA500;" title="Orange"></div>
                                        <div class="color-option" data-color="#800080"
                                            style="background-color: #800080;" title="Purple"></div>
                                        <div class="color-option" data-color="#FFC0CB"
                                            style="background-color: #FFC0CB;" title="Pink"></div>
                                        <div class="color-option" data-color="#A52A2A"
                                            style="background-color: #A52A2A;" title="Brown"></div>
                                        <div class="color-option" data-color="#808080"
                                            style="background-color: #808080;" title="Gray"></div>
                                        <div class="color-option" data-color="#000000"
                                            style="background-color: #000000;" title="Black"></div>
                                    </div>
                                    <input type="hidden" id="color_point" name="color" value="#FF0000">
                                    <div class="color-preview">
                                        <span>Selected Color:</span>
                                        <div class="color-preview-circle" id="preview-color-point"
                                            style="background-color: #FF0000;"></div>
                                        <span id="color-name-point">Red</span>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="image" class="form-label">Photo</label>
                                    <input type="file" class="form-control" id="image_point" name="image"
                                        onchange="document.getElementById('preview-image-point').src = window.URL.createObjectURL(this.files[0])">
                                </div>
                                <img src="" alt="" id="preview-image-point" class="img-thumbnail"
                                    width="400">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal Polyline-->
            <div class="modal fade" id="CreatePolylineModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Create Polyline</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form method="POST" action="{{ route('polylines.store') }}" enctype="multipart/form-data">
                            <div class="modal-body">
                                @csrf

                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="example polylines">
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="geom_polyline" class="form-label">Geometry</label>
                                    <textarea class="form-control" id="geom_polyline" name="geom_polyline" rows="3"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Color</label>
                                    <div class="color-selection">
                                        <div class="color-option" data-color="#FF0000"
                                            style="background-color: #FF0000;" title="Red"></div>
                                        <div class="color-option" data-color="#00FF00"
                                            style="background-color: #00FF00;" title="Green"></div>
                                        <div class="color-option" data-color="#0000FF"
                                            style="background-color: #0000FF;" title="Blue"></div>
                                        <div class="color-option" data-color="#FFFF00"
                                            style="background-color: #FFFF00;" title="Yellow"></div>
                                        <div class="color-option" data-color="#FF00FF"
                                            style="background-color: #FF00FF;" title="Magenta"></div>
                                        <div class="color-option" data-color="#00FFFF"
                                            style="background-color: #00FFFF;" title="Cyan"></div>
                                        <div class="color-option" data-color="#FFA500"
                                            style="background-color: #FFA500;" title="Orange"></div>
                                        <div class="color-option" data-color="#800080"
                                            style="background-color: #800080;" title="Purple"></div>
                                        <div class="color-option" data-color="#FFC0CB"
                                            style="background-color: #FFC0CB;" title="Pink"></div>
                                        <div class="color-option" data-color="#A52A2A"
                                            style="background-color: #A52A2A;" title="Brown"></div>
                                        <div class="color-option" data-color="#808080"
                                            style="background-color: #808080;" title="Gray"></div>
                                        <div class="color-option" data-color="#000000"
                                            style="background-color: #000000;" title="Black"></div>
                                    </div>
                                    <input type="hidden" id="color_polyline" name="color" value="#FF0000">
                                    <div class="color-preview">
                                        <span>Selected Color:</span>
                                        <div class="color-preview-circle" id="preview-color-polyline"
                                            style="background-color: #FF0000;"></div>
                                        <span id="color-name-polyline">Red</span>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="image" class="form-label">Photo</label>
                                    <input type="file" class="form-control" id="image_polyline" name="image"
                                        onchange="document.getElementById('preview-image-polyline').src = window.URL.createObjectURL(this.files[0])">
                                </div>
                                <img src="" alt="" id="preview-image-polyline" class="img-thumbnail"
                                    width="400">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal Polygon-->
            <div class="modal fade" id="CreatePolygonModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Create Polygon</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form method="POST" action="{{ route('polygons.store') }}" enctype="multipart/form-data">
                            <div class="modal-body">
                                @csrf

                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="example polygon">
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="geom_polygon" class="form-label">Geometry</label>
                                    <textarea class="form-control" id="geom_polygon" name="geom_polygon" rows="3"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Color</label>
                                    <div class="color-selection">
                                        <div class="color-option" data-color="#FF0000"
                                            style="background-color: #FF0000;" title="Red"></div>
                                        <div class="color-option" data-color="#00FF00"
                                            style="background-color: #00FF00;" title="Green"></div>
                                        <div class="color-option" data-color="#0000FF"
                                            style="background-color: #0000FF;" title="Blue"></div>
                                        <div class="color-option" data-color="#FFFF00"
                                            style="background-color: #FFFF00;" title="Yellow"></div>
                                        <div class="color-option" data-color="#FF00FF"
                                            style="background-color: #FF00FF;" title="Magenta"></div>
                                        <div class="color-option" data-color="#00FFFF"
                                            style="background-color: #00FFFF;" title="Cyan"></div>
                                        <div class="color-option" data-color="#FFA500"
                                            style="background-color: #FFA500;" title="Orange"></div>
                                        <div class="color-option" data-color="#800080"
                                            style="background-color: #800080;" title="Purple"></div>
                                        <div class="color-option" data-color="#FFC0CB"
                                            style="background-color: #FFC0CB;" title="Pink"></div>
                                        <div class="color-option" data-color="#A52A2A"
                                            style="background-color: #A52A2A;" title="Brown"></div>
                                        <div class="color-option" data-color="#808080"
                                            style="background-color: #808080;" title="Gray"></div>
                                        <div class="color-option" data-color="#000000"
                                            style="background-color: #000000;" title="Black"></div>
                                    </div>
                                    <input type="hidden" id="color_polygon" name="color" value="#FF0000">
                                    <div class="color-preview">
                                        <span>Selected Color:</span>
                                        <div class="color-preview-circle" id="preview-color-polygon"
                                            style="background-color: #FF0000;"></div>
                                        <span id="color-name-polygon">Red</span>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="image" class="form-label">Photo</label>
                                    <input type="file" class="form-control" id="image_polygon" name="image"
                                        onchange="document.getElementById('preview-image-polygon').src = window.URL.createObjectURL(this.files[0])">
                                </div>
                                <img src="" alt="" id="preview-image-polygon" class="img-thumbnail"
                                    width="400">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            @include('components.toast')
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>
    <script src="https://unpkg.com/@terraformer/wkt"></script>

    {{-- Script Aplikasi Utama --}}
    <script>
        $(document).ready(function() {
            // =================================================================
            // 1. INISIALISASI PETA & KONTROL DRAW
            // =================================================================
            var map = L.map('map').setView([-5.29, 122.861], 13);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            /* Digitize Function */
            var drawnItems = new L.FeatureGroup();
            map.addLayer(drawnItems);

            var drawControl = new L.Control.Draw({
                draw: {
                    position: 'topleft',
                    polyline: true,
                    polygon: true,
                    rectangle: true,
                    circle: false,
                    marker: true,
                    circlemarker: false
                },
                edit: false
            });

            @if (auth()->user() && auth()->user()->role === 'admin')
                map.addControl(drawControl);
            @endif

            map.on('draw:created', function(e) {
                var type = e.layerType,
                    layer = e.layer;

                console.log(type);

                var drawnJSONObject = layer.toGeoJSON();
                var objectGeometry = Terraformer.geojsonToWKT(drawnJSONObject.geometry);

                console.log(drawnJSONObject);
                console.log(objectGeometry);

                if (type === 'polyline') {
                    console.log("Create " + type);
                    $('#geom_polyline').val(objectGeometry);
                    $('#CreatePolylineModal').modal('show');
                } else if (type === 'polygon' || type === 'rectangle') {
                    console.log("Create " + type);
                    $('#geom_polygon').val(objectGeometry);
                    $('#CreatePolygonModal').modal('show');
                } else if (type === 'marker') {
                    console.log("Create " + type);
                    $('#geom_point').val(objectGeometry);
                    $('#CreatePointModal').modal('show');
                } else {
                    console.log('__undefined__');
                }

                drawnItems.addLayer(layer);
            });

            // =================================================================
            // 2. LOGIKA MODAL CREATE (UNTUK SEMUA TIPE)
            // =================================================================
            const colorNames = {
                '#FF0000': 'Red',
                '#00FF00': 'Green',
                '#0000FF': 'Blue',
                '#FFFF00': 'Yellow',
                '#FF00FF': 'Magenta',
                '#00FFFF': 'Cyan',
                '#FFA500': 'Orange',
                '#800080': 'Purple',
                '#FFC0CB': 'Pink',
                '#A52A2A': 'Brown',
                '#808080': 'Gray',
                '#000000': 'Black'
            };

            function initModalInteractions(modalId) {
                const $modal = $(modalId);
                const $form = $modal.find('form');
                const $colorOptions = $modal.find('.color-option');
                const $colorInput = $modal.find('input[name="color"]');
                const $imageInput = $modal.find('input[name="image"]');
                const $imagePreview = $modal.find('img[id^="preview-image"]');

                $colorOptions.on('click', function() {
                    const selectedColor = $(this).data('color');
                    $colorOptions.removeClass('selected');
                    $(this).addClass('selected');
                    $colorInput.val(selectedColor);

                    const $previewCircle = $modal.find('.color-preview-circle');
                    const $colorNameSpan = $modal.find('span[id^="color-name"]');
                    if ($previewCircle.length) $previewCircle.css('background-color', selectedColor);
                    if ($colorNameSpan.length) $colorNameSpan.text(colorNames[selectedColor] || 'Custom');
                });

                $imageInput.on('change', function(event) {
                    const file = event.target.files[0];
                    if (file) {
                        $imagePreview.attr('src', URL.createObjectURL(file)).show();
                    }
                });

                $modal.on('hidden.bs.modal', function() {
                    $form[0].reset();
                    $imagePreview.attr('src', '').hide();
                    $colorOptions.removeClass('selected').first().addClass('selected');
                    const defaultColor = $colorOptions.first().data('color');
                    $colorInput.val(defaultColor);
                });

                $colorOptions.first().trigger('click');
            }

            initModalInteractions('#CreatePointModal');
            initModalInteractions('#CreatePolylineModal');
            initModalInteractions('#CreatePolygonModal');

            // =================================================================
            // 3. LOGIKA LEAFLET DRAW (SAAT MENGGAMBAR)
            // =================================================================
            map.on('draw:created', function(e) {
                var type = e.layerType,
                    layer = e.layer;
                var objectGeometry = Terraformer.geojsonToWKT(layer.toGeoJSON().geometry);

                let modalId, geomInputId;
                if (type === 'marker') {
                    modalId = '#CreatePointModal';
                    geomInputId = '#geom_point';
                } else if (type === 'polyline') {
                    modalId = '#CreatePolylineModal';
                    geomInputId = '#geom_polyline';
                } else if (type === 'polygon' || type === 'rectangle') {
                    modalId = '#CreatePolygonModal';
                    geomInputId = '#geom_polygon';
                }

                if (modalId && geomInputId) {
                    $(geomInputId).val(objectGeometry);
                    $(modalId).modal('show');
                }
            });

            // =================================================================
            // 4. DEKLARASI LAYER & LOGIKA MENAMPILKAN DATA DARI API
            // =================================================================
            var pointLayer, polylineLayer, polygonLayer;

            function createModernPopup(feature, layer) {
                const props = feature.properties;
                const geomType = feature.geometry.type.toLowerCase();
                let typePlural;

                // ====================================================================
                // PERBAIKAN UTAMA: Logika eksplisit untuk menentukan nama route/controller
                // Ini memastikan nama yang benar selalu digunakan.
                // ====================================================================
                if (geomType.includes('point')) {
                    typePlural = 'points';
                } else if (geomType.includes('linestring')) {
                    typePlural = 'polylines';
                } else if (geomType.includes('polygon')) {
                    typePlural = 'polygons';
                } else {
                    console.error("Tipe geometri tidak dikenali:", geomType);
                    return;
                }

                const imageSrc = props.image ? `{{ asset('storage/images') }}/${props.image}` : null;

                const editUrl = `{{ url('/') }}/${typePlural}/${props.id}/edit`;
                const deleteUrl = `{{ url('/') }}/${typePlural}/${props.id}`;

                let iconClass = 'fa-question-circle';
                if (typePlural === 'points') iconClass = 'fa-map-marker-alt';
                if (typePlural === 'polylines') iconClass = 'fa-road';
                if (typePlural === 'polygons') iconClass = 'fa-draw-polygon';

                let details = '';
                if (props.length_m) details =
                    `<div class="d-flex align-items-center text-muted small mb-3"><i class="fa-solid fa-ruler-horizontal fa-fw me-2"></i><strong>${Number(props.length_m).toFixed(2)} Meter</strong></div>`;
                if (props.luas_hektar) details =
                    `<div class="d-flex align-items-center text-muted small mb-1"><i class="fa-solid fa-vector-square fa-fw me-2"></i><strong>${Number(props.luas_hektar).toFixed(2)} Hectare</strong></div>`;

                const popupContent = `
        <div class="popup-card">
            ${imageSrc ? `<img src="${imageSrc}" alt="Foto" class="popup-image">` : `<div class="popup-image-placeholder"><i class="fa-solid ${iconClass} fa-2x"></i></div>`}
            <div class="popup-content-area">
                <div class="popup-title">${props.name || 'No Name'}</div>
                ${props.description ? `<p class="popup-description">${props.description}</p>` : ''}
                ${details}
            </div>
            <div class="popup-footer">
                <div><small>Oleh: <strong>${props.user_created || 'N/A'}</strong></small></div>
                @if (auth()->user() && auth()->user()->role === 'admin')
                <div class="popup-actions d-flex align-items-center">
                    <a href="${editUrl}" class="btn btn-sm btn-light me-2" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                    <form method="POST" action="${deleteUrl}" onsubmit="return confirm('Are you sure want to delete this data?');">
                        @csrf
                        @method('DELETE')
                        @yield('title')
                        <button type="submit" class="btn btn-sm btn-light text-danger" title="Delete"><i class="fa-regular fa-trash-can"></i></button>
                    </form>
                </div>
                @endif
            </div>
        </div>`;

                layer.bindPopup(popupContent, {
                    className: 'custom-leaflet-popup'
                });
                layer.bindTooltip(props.name);
            }

            pointLayer = L.geoJson(null, {
                pointToLayer: (f, l) => L.circleMarker(l, {
                    radius: 6,
                    fillColor: f.properties.color || '#E74C3C',
                    color: '#fff',
                    weight: 3,
                    opacity: 1,
                    fillOpacity: 1
                }),
                onEachFeature: createModernPopup
            });
            $.getJSON("{{ route('api.points') }}", data => pointLayer.addData(data).addTo(map));

            polylineLayer = L.geoJson(null, {
                style: f => ({
                    color: f.properties.color || '#E74C3C',
                    weight: 4,
                    opacity: 0.9
                }),
                onEachFeature: createModernPopup
            });
            $.getJSON("{{ route('api.polylines') }}", data => polylineLayer.addData(data).addTo(map));

            polygonLayer = L.geoJson(null, {
                style: f => ({
                    fillColor: f.properties.color || '#E74C3C',
                    color: f.properties.color || '#E74C3C',
                    weight: 3,
                    opacity: 1,
                    fillOpacity: 0.3
                }),
                onEachFeature: createModernPopup
            });
            $.getJSON("{{ route('api.polygons') }}", data => polygonLayer.addData(data).addTo(map));

            // =================================================================
            // 5. FUNGSIONALITAS CONTROL LAYER
            // =================================================================
            $('#togglePoints').on('change', function() {
                if ($(this).is(':checked')) map.addLayer(pointLayer);
                else map.removeLayer(pointLayer);
            });

            $('#togglePolylines').on('change', function() {
                if ($(this).is(':checked')) map.addLayer(polylineLayer);
                else map.removeLayer(polylineLayer);
            });

            $('#togglePolygons').on('change', function() {
                if ($(this).is(':checked')) map.addLayer(polygonLayer);
                else map.removeLayer(polygonLayer);
            });
        });
    </script>
</body>

</html>

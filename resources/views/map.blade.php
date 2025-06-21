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

        /* Style untuk kartu popup */
        .popup-card {
            width: 100%;
        }

        .popup-image {
            width: 100%;
            height: 150px;
            object-fit: cover;
            /* Memastikan gambar terpotong rapi */
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
            /* Menghilangkan margin bawah default dari form */
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
    <script src="https://unpkg.com/@terraformer/wkt"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script>
        var map = L.map('map').setView([-5.29, 122.861], 13);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Color selection functionality
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

        function initColorSelection(modalType) {
            const modal = document.querySelector(`#Create${modalType}Modal`);
            const colorOptions = modal.querySelectorAll('.color-option');
            const colorInput = modal.querySelector(`#color_${modalType.toLowerCase()}`);
            const previewColor = modal.querySelector(`#preview-color-${modalType.toLowerCase()}`);
            const colorName = modal.querySelector(`#color-name-${modalType.toLowerCase()}`);

            // Set default selection
            colorOptions[0].classList.add('selected');

            colorOptions.forEach(option => {
                option.addEventListener('click', function() {
                    // Remove selected class from all options
                    colorOptions.forEach(opt => opt.classList.remove('selected'));

                    // Add selected class to clicked option
                    this.classList.add('selected');

                    // Update hidden input value
                    const selectedColor = this.dataset.color;
                    colorInput.value = selectedColor;

                    // Update preview
                    previewColor.style.backgroundColor = selectedColor;
                    colorName.textContent = colorNames[selectedColor];
                });
            });
        }

        // Initialize color selection for all modals
        initColorSelection('Point');
        initColorSelection('Polyline');
        initColorSelection('Polygon');

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

        map.addControl(drawControl);

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
    </script>

    <script>
        /* GeoJSON Point */
        var point = L.geoJson(null, {
            pointToLayer: function(feature, latlng) {
                // Opsi visual untuk setiap titik (marker)
                return L.circleMarker(latlng, {
                    radius: 6,
                    fillColor: feature.properties.color || '#3498DB',
                    color: '#ffffff',
                    weight: 2,
                    opacity: 1,
                    fillOpacity: 1
                });
            },
            onEachFeature: function(feature, layer) {
                // === HTML BARU UNTUK TAMPILAN POPUP MINIMALIS ===
                const imageSrc = feature.properties.image ?
                    `{{ asset('storage/images') }}/${feature.properties.image}` : null;
                const routeedit = "{{ route('points.edit', ':id') }}".replace(':id', feature.properties.id);
                const routedelete = "{{ route('points.destroy', ':id') }}".replace(':id', feature.properties
                    .id);

                const popupContent = `
            <div class="popup-card">
                ${imageSrc ?
                    `<img src="${imageSrc}" alt="Foto Lokasi" class="popup-image">` :
                    `<div class="popup-image-placeholder"><i class="fa-solid fa-camera fa-2x"></i></div>`
                }

                <div class="popup-content-area">
                    <div class="popup-title">${feature.properties.name || 'Tanpa Nama'}</div>
                    ${feature.properties.description ?
                        `<p class="popup-description">${feature.properties.description}</p>` : ''
                    }
                </div>

                <div class="popup-footer">
                    <div>
                        <small>Oleh: <strong>${feature.properties.user_created || 'N/A'}</strong></small>
                    </div>
                    <div class="popup-actions d-flex align-items-center">
                        <a href="${routeedit}" class="btn btn-sm btn-light me-2" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                        <form method="POST" action="${routedelete}" onsubmit="return confirm('Anda yakin ingin menghapus titik ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-light text-danger" title="Hapus"><i class="fa-regular fa-trash-can"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        `;

                // Mengikat popup ke layer dengan class kustom
                layer.bindPopup(popupContent, {
                    className: 'custom-leaflet-popup' // Ini penting untuk menerapkan CSS kustom
                });

                // Tooltip saat mouse hover (tetap sama)
                layer.bindTooltip(feature.properties.name, {
                    permanent: false,
                    direction: 'top',
                    sticky: true
                });
            }
        });
        $.getJSON("{{ route('api.points') }}", function(data) {
            point.addData(data);
            map.addLayer(point);
        });

        /* GeoJSON Polyline */
        var polyline = L.geoJson(null, {
    style: function(feature) {
        return {
            color: feature.properties.color || '#3498DB',
            weight: 4,
            opacity: 0.9
        };
    },
    onEachFeature: function(feature, layer) {

        const imageSrc = feature.properties.image ? `{{ asset('storage/images') }}/${feature.properties.image}` : null;
        const routeedit = "{{ route('polylines.edit', ':id') }}".replace(':id', feature.properties.id);
        const routedelete = "{{ route('polylines.destroy', ':id') }}".replace(':id', feature.properties.id);

        const popupContent = `
            <div class="popup-card">
                ${imageSrc ?
                    `<img src="${imageSrc}" alt="Foto Lokasi" class="popup-image">` :
                    `<div class="popup-image-placeholder"><i class="fa-solid fa-road fa-2x"></i></div>`
                }

                <div class="popup-content-area">
                    <div class="popup-title">${feature.properties.name || 'Tanpa Nama'}</div>
                    ${feature.properties.description ?
                        `<p class="popup-description">${feature.properties.description}</p>` : ''
                    }

                    <div class="d-flex align-items-center text-muted small mb-3">
                        <i class="fa-solid fa-ruler-horizontal fa-fw me-2"></i>
                        Panjang: <strong>${Number(feature.properties.length_km || 0).toFixed(2)} km</strong>
                    </div>
                </div>

                <div class="popup-footer">
                    <div>
                        <small>Oleh: <strong>${feature.properties.user_created || 'N/A'}</strong></small>
                    </div>
                    <div class="popup-actions d-flex align-items-center">
                        <a href="${routeedit}" class="btn btn-sm btn-light me-2" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                        <form method="POST" action="${routedelete}" onsubmit="return confirm('Anda yakin ingin menghapus polyline ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-light text-danger" title="Hapus"><i class="fa-regular fa-trash-can"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        `;

        // Mengikat popup ke layer dengan class kustom
        layer.bindPopup(popupContent, {
            className: 'custom-leaflet-popup'
        });

        // Tooltip saat mouse hover
        layer.bindTooltip(feature.properties.name);
    }
});
        $.getJSON("{{ route('api.polylines') }}", function(data) {
            polyline.addData(data);
            map.addLayer(polyline);
        });

        /* GeoJSON Polygon */
        var polygon = L.geoJson(null, {
    style: function(feature) {
        // Style untuk area polygon
        return {
            fillColor: feature.properties.color || '#3498DB', // Warna isian, default ungu
            color: feature.properties.color || '#3498DB', // Warna garis tepi putih
            weight: 3,
            fillOpacity: 0.35
        };
    },
    onEachFeature: function(feature, layer) {
        // === HTML BARU UNTUK TAMPILAN POPUP MINIMALIS ===
        const imageSrc = feature.properties.image ? `{{ asset('storage/images') }}/${feature.properties.image}` : null;
        const routeedit = "{{ route('polygons.edit', ':id') }}".replace(':id', feature.properties.id);
        const routedelete = "{{ route('polygons.destroy', ':id') }}".replace(':id', feature.properties.id);

        const popupContent = `
            <div class="popup-card">
                ${imageSrc ?
                    `<img src="${imageSrc}" alt="Foto Lokasi" class="popup-image">` :
                    `<div class="popup-image-placeholder"><i class="fa-solid fa-draw-polygon fa-2x"></i></div>`
                }

                <div class="popup-content-area">
                    <div class="popup-title">${feature.properties.name || 'Tanpa Nama'}</div>
                    ${feature.properties.description ?
                        `<p class="popup-description">${feature.properties.description}</p>` : ''
                    }

                    <div class="d-flex align-items-center text-muted small mb-1">
                        <i class="fa-solid fa-vector-square fa-fw me-2"></i>
                        Luas: <strong>${Number(feature.properties.luas_km2 || 0).toFixed(2)} km²</strong>
                        / <strong>${Number(feature.properties.luas_hektar || 0).toFixed(2)} ha</strong>
                    </div>
                </div>

                <div class="popup-footer">
                    <div>
                        <small>Oleh: <strong>${feature.properties.user_created || 'N/A'}</strong></small>
                    </div>
                    <div class="popup-actions d-flex align-items-center">
                        <a href="${routeedit}" class="btn btn-sm btn-light me-2" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                        <form method="POST" action="${routedelete}" onsubmit="return confirm('Anda yakin ingin menghapus poligon ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-light text-danger" title="Hapus"><i class="fa-regular fa-trash-can"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        `;

        // Mengikat popup ke layer dengan class kustom
        layer.bindPopup(popupContent, {
            className: 'custom-leaflet-popup'
        });

        // Tooltip saat mouse hover
        layer.bindTooltip(feature.properties.name);
    }
});
        $.getJSON("{{ route('api.polygons') }}", function(data) {
            polygon.addData(data);
            map.addLayer(polygon);
        });

        /* control layer */
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('js/jquery.flexslider-min.js') }}"></script>
    <script src="{{ asset('js/jquery.countTo.js') }}"></script>

    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>

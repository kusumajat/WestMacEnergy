@extends('layouts/template')

@section('styles')
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
    </style>
@endsection

@section('content')
    <div id="map"></div>

    <!-- Modal Edit Point-->
    <div class="modal fade" id="editPointModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Point</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('points.update', $id) }}" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        @method('PATCH')

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
                            <input type="hidden" id="color_point" name="color" value="">
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
                        <img src="" alt="" id="preview-image-point" class="img-thumbnail" width="400">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
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

        function initColorSelection() {
            const colorOptions = document.querySelectorAll('.color-option');
            const colorInput = document.querySelector('#color_point');
            const previewColor = document.querySelector('#preview-color-point');
            const colorName = document.querySelector('#color-name-point');

            colorOptions.forEach(option => {
                option.addEventListener('click', function() {
                    // Remove selected class from all options
                    colorOptions.forEach(opt => opt.classList.remove('selected'));

                    // Add selected class to clicked option
                    this.classList.add('selected');

                    // Update form values
                    const selectedColor = this.dataset.color;
                    colorInput.value = selectedColor;

                    // Update preview
                    previewColor.style.backgroundColor = selectedColor;
                    colorName.textContent = colorNames[selectedColor];
                });
            });
        }

        // Initialize color selection
        initColorSelection();

        /* Digitize Function */
        var drawnItems = new L.FeatureGroup();
        map.addLayer(drawnItems);

        var drawControl = new L.Control.Draw({
            draw: false,
            edit: {
                featureGroup: drawnItems,
                edit: true,
                remove: false
            }
        });

        map.addControl(drawControl);

        map.on('draw:edited', function(e) {
            var layers = e.layers;

            layers.eachLayer(function(layer) {
                var drawnJSONObject = layer.toGeoJSON();
                console.log(drawnJSONObject);

                var objectGeometry = Terraformer.geojsonToWKT(drawnJSONObject.geometry);
                console.log(objectGeometry);

                // layer properties
                var properties = drawnJSONObject.properties;
                console.log(properties);

                drawnItems.addLayer(layer);

                // menampilkan data ke dalam form
                $('#name').val(properties.name);
                $('#description').val(properties.description);
                $('#geom_point').val(objectGeometry);
                $('#preview-image-point').attr('src', "{{ asset('storage/images') }}/"+ properties.image);

                // Set color if available
                if (properties.color) {
                    $('#color_point').val(properties.color);
                    $('#preview-color-point').css('background-color', properties.color);
                    $('#color-name-point').text(colorNames[properties.color] || 'Custom');

                    // Mark the color option as selected
                    $('.color-option').removeClass('selected');
                    $(`.color-option[data-color="${properties.color}"]`).addClass('selected');
                }

                // menampilkan modal edit
                $('#editPointModal').modal('show');
            });
        });
    </script>

    <script>
        /* GeoJSON Point */
        var point = L.geoJson(null, {
            pointToLayer: function(feature, latlng) {
                return L.circleMarker(latlng, {
                    radius: 6,
                    fillColor: feature.properties.color || '#3498DB',
                    color: '#ffffff',
                    weight: 3,
                    opacity: 1,
                    fillOpacity: 1
                });
            },
            onEachFeature: function(feature, layer) {
                // memasukkan layer point ke dalam drawnItems
                drawnItems.addLayer(layer);

                var properties = feature.properties;
                var objectGeometry = Terraformer.geojsonToWKT(feature.geometry);

                // Create popup content similar to map page
                const imageSrc = feature.properties.image ?
                    `{{ asset('storage/images') }}/${feature.properties.image}` : null;



                layer.bindTooltip(feature.properties.name, {
                    permanent: false,
                    direction: 'top',
                    sticky: true
                });

                layer.on({
                    click: function(e) {
                        // menampilkan data ke dalam form
                        $('#name').val(feature.properties.name);
                        $('#description').val(feature.properties.description);
                        $('#geom_point').val(objectGeometry);
                        $('#preview-image-point').attr('src', "{{ asset('storage/images') }}/"+ feature.properties.image);

                        // Set color if available
                        if (feature.properties.color) {
                            $('#color_point').val(feature.properties.color);
                            $('#preview-color-point').css('background-color', feature.properties.color);
                            $('#color-name-point').text(colorNames[feature.properties.color] || 'Custom');

                            // Mark the color option as selected
                            $('.color-option').removeClass('selected');
                            $(`.color-option[data-color="${feature.properties.color}"]`).addClass('selected');
                        } else {
                            // Default to first color if no color is set
                            $('.color-option').removeClass('selected');
                            $('.color-option').first().addClass('selected');
                            $('#color_point').val('#FF0000');
                            $('#preview-color-point').css('background-color', '#FF0000');
                            $('#color-name-point').text('Red');
                        }

                        // menampilkan modal edit
                        $('#editPointModal').modal('show');
                    },
                });
            },
        });

        // Function to edit point (called from popup)
        function editPoint(pointId) {
            // This function can be used if you want to handle edit differently
            // For now, it will use the same click functionality
        }

        $.getJSON("{{ route('api.point', $id) }}", function(data) {
            point.addData(data);
            map.addLayer(point);
            map.fitBounds(point.getBounds(), {
                padding: [100, 100]
            });
        });
    </script>
@endsection

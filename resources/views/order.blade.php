@extends('layouts.app')
@section('title', 'Order')

@section('style')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <style>
        .select2.select2-container {
            width: 100% !important;
        }

        .select2.select2-container .select2-selection {
            padding: 8px 12px 28px;
        }
    </style>
@endsection

@section('navigation')
	@parent
	@extends('components.navigation')
@endsection

@section('content')
    <div class="container">
        <h1 class="text-center text-2xl font-bold my-5">Order your catering now!</h1>
        <form action="">
            <div class="mb-3">
                <label class="block text-sm/6 font-medium text-gray-900" for="menu-category">Kategori menu</label>
                <select class="w-full appearance-none rounded-md py-1.5 pr-7 pl-3 text-base text-gray-500 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" name="menu-category" id="menu-category" onchange="getMenus()">
                    <option value="">Pilih kategori</option>
                    @foreach ($menu_categories as $menu_category)
                        <option value="{{ $menu_category->id }}">{{ $menu_category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="block text-sm/6 font-medium text-gray-900" for="menu">Menu</label>
                <select class="w-full appearance-none rounded-md py-1.5 pr-7 pl-3 text-base text-gray-500 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" name="menu" id="menu" onchange="getMenuChoices()">
                </select>
            </div>
            <div class="mb-3 w-full" id="menu-choices"></div>
            <div class="mb-3 w-full flex justify-stretch gap-3">
                <div class="w-full">
                    <label class="block text-sm/6 font-medium text-gray-900" for="outlet-position">Outlet kami</label>
                    <select name="outlet-position" id="outlet-position" class="w-full appearance-none rounded-md py-1.5 pr-7 pl-3 text-base text-gray-500 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        <option value="Pilih outlet"></option>
                    </select>
                </div>
                <div class="w-full">
                    <label class="block text-sm/6 font-medium text-gray-900" for="user-position">Alamat pengantaran</label>
                    <select name="user-position" id="user-position"></select>
                </div>
            </div>
            <button class="bg-blue-500 px-4 py-2 rounded text-white text-sm w-full" type="submit">Order</button>
        </form>

        <div class="h-[400px]" id="map"></div>
    </div>
@endsection

@section('script')
    <script>
        var map = L.map('map').setView([51.505, -0.09], 13);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        let markers = {
            'outlet': {},
            'user': {}
        }

        // L.Routing.control({
        //     waypoints: [
        //         L.latLng(57.74, 11.94),
        //         L.latLng(57.6792, 11.949)
        //     ]
        //     }).addTo(map);

        function getUserLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showUserPosition);
            }
        }

        const showUserPosition = (position) => {
            const user_location = [position.coords.latitude, position.coords.longitude];

            var marker = L.marker(user_location).addTo(map);
            map.removeLayer(markers.user);
            markers.user = marker;
            map.panTo(user_location);
        }

        getUserLocation();

        const getMenus = () => {
            const menu_category_selected_value = document.getElementById('menu-category').value;
            $.ajax({
                url: `{{ route('order.menus') }}`,
                type: 'GET',
                data: {
                    menu_category_id: menu_category_selected_value,
                },
                success: response => {
                    let menu_options = '<option value="">Pilih menu</option>';
                    response.menus.forEach(menu => {
                        menu_options += `<option value="${menu.id}">${menu.name}</option>`;
                    })
                    document.getElementById('menu').innerHTML = menu_options;
                }
            })
        }

        const getMenuChoices = () => {
            const menu_id = document.getElementById('menu').value;
            $.ajax({
                url: `{{ route('order.menu.choices') }}`,
                type: 'GET',
                data: {
                    menu_id: menu_id
                },
                success: response => {
                    let menu_choices = `
                        <p class="block text-sm/6 font-medium text-gray-900">Pilihan menu</p>
                        <div class="mb-3 flex justify-stretch gap-3">
                    `;
                    response.menu_choices_items.forEach(menu_choice => {
                        menu_choices += `
                                <div class="w-full">
                                    <label class="block text-sm/6 font-medium text-gray-900">${menu_choice.name}</label>
                                    <select class="w-full appearance-none rounded-md py-1.5 pr-7 pl-3 text-base text-gray-500 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        `
                        
                        menu_choice.items.forEach(item => {
                            menu_choices += `
                                <option value="${item.id}">${item.name}</option>
                            `;
                        })
                        
                        menu_choices += `
                                    </select>
                                </div>
                        `;
                    })
                    menu_choices += `</div>`;
                    document.getElementById('menu-choices').innerHTML = menu_choices;
                }
            })
        }

        $('#user-position').select2({
            width: '100%',
            ajax: {
                url: `https://nominatim.openstreetmap.org/search.php`,
                dataType: 'json',
                data: params => {
                    var query = {
                        q: params.term,
                        format: 'jsonv2'
                    }
                    return query;
                },
                delay: 250,
                processResults: data => {
                    return {
                        results: data.map(function(item) {
                            return {
                                id: item.place_id,
                                text: item.display_name || item.name,
                                location: {
                                    lat: item.lat,
                                    lon: item.lon
                                }
                            };
                        })
                    };
                }
            }
        });

        $('#user-position').on('select2:select', () => {
            const user_location = [$('#user-position').select2('data')[0].location.lat, $('#user-position').select2('data')[0].location.lon];
            const user_marker = L.marker(user_location).addTo(map);
            map.removeLayer(markers.user);
            markers.user = user_marker;

            map.flyTo(user_location, 10);
        })
    </script>
    
@endsection
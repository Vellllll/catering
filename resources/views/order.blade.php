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

        .leaflet-control-container .leaflet-routing-container-hide {
            display: none;
        }
    </style>
@endsection

@section('navigation')
	@parent
	@extends('components.navigation')
@endsection

@section('content')
    <div class="container">
        @if (session('error'))
            <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 text-red-400" role="alert">
                <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">{{ session('error') }}</span>
                </div>
            </div>
        @endif
        <h1 class="text-center text-2xl font-bold my-5">Order menu keinginan kamu disini!</h1>
        <form action="{{ route('order.order') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="block text-sm/6 font-medium text-gray-900" for="menu-category">Kategori menu</label>
                <select class="w-full appearance-none rounded-md py-1.5 pr-7 pl-3 text-base text-gray-500 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" name="menu-category" id="menu-category" onchange="getMenus()">
                    <option value="">Pilih kategori</option>
                    @foreach ($menu_categories as $menu_category)
                        <option value="{{ $menu_category->id }}">{{ $menu_category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 hidden" id="menu-input">
                <label class="block text-sm/6 font-medium text-gray-900" for="menu">Menu</label>
                <select class="w-full appearance-none rounded-md py-1.5 pr-7 pl-3 text-base text-gray-500 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" name="menu" id="menu" onchange="getMenuChoices()">
                </select>
            </div>
            <div class="mb-3 w-full" id="menu-choices"></div>
            <div class="mb-3 w-full flex justify-stretch gap-3">
                <div class="w-full">
                    <label class="block text-sm/6 font-medium text-gray-900" for="outlet-position">Outlet kami</label>
                    <select name="outlet-position" id="outlet-position" class="w-full appearance-none rounded-md py-1.5 pr-7 pl-3 text-base text-gray-500 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        <option value="">Pilih outlet</option>
                        @foreach ($outlets as $outlet)
                            <option value="{{ $outlet->id }}">{{ $outlet->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-full">
                    <label class="block text-sm/6 font-medium text-gray-900" for="user-position">Alamat pengantaran</label>
                    <select name="user-position" id="user-position"></select>
                </div>
            </div>
            <div class="w-1/2 py-12 mx-auto">
                <table class="table-auto w-full">
                    <thead>
                        <tr class="border-b-2 border-gray-100">
                            <th colspan="2" class="p-3">Detail Order</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b-2 border-gray-100">
                            <td class="p-3">Harga menu</td>
                            <td id="menu-price" class="text-end"></td>
                            <input type="hidden" name="menu-price">
                        </tr>
                        <tr class="border-b-2 border-gray-100">
                            <td class="p-3">Biaya pengantaran</td>
                            <td id="delivery-price" class="text-end"></td>
                            <input type="hidden" name="delivery-price">
                        </tr>
                        <tr>
                            <td class="p-3 font-bold">Total biaya</td>
                            <td id="total-price" class="text-end font-bold"></td>
                            <input type="hidden" name="total-price">
                        </tr>
                    </tbody>
                </table>
            </div>
            <button class="bg-yellow-500 px-4 py-2 rounded text-white text-sm w-full" type="submit">Order</button>
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

        function getUserLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showUserPosition);
            }
        }

        const showUserPosition = (position) => {
            const user_location = [position.coords.latitude, position.coords.longitude];

            let marker = L.marker(user_location).addTo(map);
            map.removeLayer(markers.user);
            markers.user = marker;
            map.panTo(user_location);
        }

        getUserLocation();

        const showOutletPosition = (latitude, longitude) => {
            let outlet_marker = L.marker([latitude, longitude]).addTo(map);
        }

        const getMenus = () => {
            const menu_category_selected_value = document.getElementById('menu-category').value;
            const menu_input = $('#menu-input');
            menu_input.show();
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
            const menu_price = document.getElementById('menu-price');
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
                                    <select name="menu-choice-${menu_choice.id}" id="menu-choice-${menu_choice.id}" class="w-full appearance-none rounded-md py-1.5 pr-7 pl-3 text-base text-gray-500 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
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
                    menu_price.innerHTML = formatRupiah(response.menu.price.toString(), 'Rp');
                    prices.menu_price = response.menu.price;

                    getTotalPrice();
                }
            })
        }

        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, "").toString(),
                split = number_string.split(","),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? "." : "";
                rupiah += separator + ribuan.join(".");
            }

            rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
            return prefix == undefined ? rupiah : rupiah ? "Rp " + rupiah : "";
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
                                id: `${item.lat},${item.lon}`,
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

        var routing_control = null;
        const showRoute = (user_marker, outlet_marker) => {
            if (routing_control) {
                routing_control.spliceWaypoints(0, 2);
            }

            routing_control = L.Routing.control({
                waypoints: [
                    user_marker.getLatLng(),
                    outlet_marker.getLatLng()
                ],
                lineOptions: {
                    styles: [{color: 'blue', opacity: 1, weight: 2}],
                    addWaypoints: false
                }
            }).addTo(map);

            routing_control.hide();

            let shortest_distance = null;
            routing_control.on('routesfound', event => {
                event.routes.forEach(route => {
                    if (!shortest_distance) {
                        shortest_distance = route.summary.totalDistance;
                    } else {
                        if (shortest_distance > route.summary.totalDistance) {
                            shortest_distance = route.summary.totalDistance;
                        }
                    }
                })
                const delivery_price = document.getElementById('delivery-price');
                delivery_price.innerHTML = formatRupiah(Math.floor((shortest_distance / 1000) * 7500).toString(), 'Rp');
                prices.delivery_price = (shortest_distance / 1000) * 7500;

                getTotalPrice();
            })

            map.fitBounds([user_marker.getLatLng(), outlet_marker.getLatLng()]);
        }

        let prices = {
            menu_price: 0,
            delivery_price: 0
        };
        const getTotalPrice = () => {
            $("input[name='menu-price']").val(prices.menu_price);
            $("input[name='delivery-price']").val(prices.delivery_price);
            $("input[name='total-price']").val(prices.menu_price + prices.delivery_price);
            document.getElementById('total-price').innerHTML = formatRupiah((Math.floor(prices.menu_price + prices.delivery_price)).toString(), 'Rp');
        }

        $('#user-position').on('select2:select', () => {
            const user_location = [$('#user-position').select2('data')[0].location.lat, $('#user-position').select2('data')[0].location.lon];
            const user_marker = L.marker(user_location).addTo(map);
            map.removeLayer(markers.user);
            markers.user = user_marker;

            showRoute(markers.user, markers.outlet);
        })

        $('#outlet-position').on('change', event => {
            const outlet_id = $('#outlet-position').val();
            
            $.ajax({
                url: `{{ route('get.outlet.location') }}`,
                type: 'GET',
                data: {
                    outlet_id: outlet_id
                },
                success: response => {
                    const latitude = parseFloat(response.outlet.latitude);
                    const longitude = parseFloat(response.outlet.longitude);

                    let outlet_marker = L.marker([latitude, longitude]).addTo(map);
                    markers.outlet = outlet_marker;
                    
                    showRoute(markers.user, markers.outlet);
                    

                }
            })
        })
        
    </script>
    
@endsection
@extends('layouts.app')
@section('title', 'Dashboard')

@section('navigation')
	@parent
	@extends('components.navigation')
@endsection

@section('content')
    <div class="flex flex-col lg:flex-row min-h-screen">
        <div class="w-full lg:w-3/4 p-8 bg-white">
            <div class="mb-6">
                <h1 class="text-3xl font-bold text-gray-800">Meal Box Standard</h1>
                <p class="text-sm text-red-600">*Minimal Order 50 pax / Menu</p>
            </div>
            <div class="flex flex-col lg:flex-row items-start gap-8">
                <div class="w-full lg:w-1/2">
                    <img src="https://via.placeholder.com/400x300" alt="Meal Box Image" class="rounded-lg shadow-md">
                </div>

                <div class="w-full lg:w-1/2">
                    <ul class="space-y-3 text-gray-700">
                        <li>
                            <h2 class="font-semibold text-md">- NASI PUTIH</h2>
                        </li>
                        <li>
                            <h2 class="font-semibold text-md">- PILIH SATU MENU</h2>
                            <p class="text-sm">+ Ayam Goreng Tepung</p>
                            <p class="text-sm">+ Ayam Bakar Kecap</p>
                            <p class="text-sm">+ Ayam Panggang Bumbu Rujak</p>
                            <p class="text-sm">+ Ayam Panggan Klaten</p>
                            <p class="text-sm">+ Terik Ayam</p>
                            <p class="text-sm">+ Ayam Rica-Rica</p>
                        </li>

                        <li>
                            <h2 class="font-semibold text-md">- PILIH SATU MENU</h2>
                            <p class="text-sm">+ Semur Galantin</p>
                            <p class="text-sm">+ Cap Cay Goreng</p>
                            <p class="text-sm">+ Sambal Goreng Ati Kentang</p>
                            <p class="text-sm">+ Oseng Buncis Telur Puyuh</p>
                            <p class="text-sm">+ Sambal Goreng Printil</p>
                            <p class="text-sm">+ Semur Bola Daging</p>
                        </li>

                        <li>
                            <h2 class="font-semibold text-md">- PILIH SATU MENU</h2>
                            <p class="text-sm">+ Mie Goreng Bakso</p>
                            <p class="text-sm">+ Soun Goreng Ayam Jamur</p>
                            <p class="text-sm">+ Bihun Goreng Bakso</p>
                            <p class="text-sm">+ Kering Teri Kacang</p>
                            <p class="text-sm">+ Oseng Bakso Sapi Jagung</p>
                            <p class="text-sm">+ Oseng Sosis Bakso Ayam</p>
                        </li>

                        <li>
                            <h2 class="font-semibold text-md">- PISANG</h2>
                        </li>
                        <li>
                            <h2 class="font-semibold text-md">- KERUPUK</h2>
                        </li>
                        <li>
                            <h2 class="font-semibold text-md">- AIR MINERAL CUP</h2>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <aside class="w-full lg:w-1/4 bg-gray-100 p-8 border-l">
            <h2 class="text-lg font-bold mb-4 text-gray-800">OUR MENU</h2>
            <ul class="space-y-4 text-gray-700">
                <li>
                    <button type="button" onclick="openDropdown(this)" id="dropdown-button" class="flex items-center w-full p-2 text-base group" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                        <span class="flex-1 text-left rtl:text-right whitespace-nowrap text-sm">E-commerce</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>
                    <ul id="dropdown-items" class="hidden py-1 space-y-1">
                        <li>
                            <a href="#" class="flex items-center w-full p-1 pl-4 group text-sm">Products</a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center w-full p-1 pl-4 group text-sm">Billing</a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center w-full p-1 pl-4 group text-sm">Invoice</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <button type="button" onclick="openDropdown(this)" id="dropdown-button" class="flex items-center w-full p-2 text-base group" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                        <span class="flex-1 text-left rtl:text-right whitespace-nowrap text-sm">E-commerce</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>
                    <ul id="dropdown-items" class="hidden py-1 space-y-1">
                        <li>
                            <a href="#" class="flex items-center w-full p-1 pl-4 group text-sm">Products</a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center w-full p-1 pl-4 group text-sm">Billing</a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center w-full p-1 pl-4 group text-sm">Invoice</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <button type="button" onclick="openDropdown(this)" id="dropdown-button" class="flex items-center w-full p-2 text-base group" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                        <span class="flex-1 text-left rtl:text-right whitespace-nowrap text-sm">E-commerce</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>
                    <ul id="dropdown-items" class="hidden py-1 space-y-1">
                        <li>
                            <a href="#" class="flex items-center w-full p-1 pl-4 group text-sm">Products</a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center w-full p-1 pl-4 group text-sm">Billing</a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center w-full p-1 pl-4 group text-sm">Invoice</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </aside>
    </div>
    <script>
        function openDropdown(element) {
            let items = document.getElementById('dropdown-items');

            if (items.classList.contains('hidden')) {
                items.classList.remove('hidden');
            } else {
                items.classList.add('hidden');
            }

            
        }
    </script>
@endsection

   
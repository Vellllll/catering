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
                <h1 class="text-3xl font-bold text-gray-800">{{ $menu->name }}</h1>
                <p class="text-sm text-red-600">{{ $menu->notes }}</p>
            </div>
            <div class="flex flex-col lg:flex-row items-start gap-8">
                <div class="w-full lg:w-1/2">
                    <img src="{{ asset('/storage/' . $menu->picture_url) }}" alt="Meal Box Image" class="rounded-lg shadow-md">
                </div>

                <div class="w-full lg:w-1/2">
                    <ul class="space-y-3 text-gray-700">
                        @foreach ($menu->menuChoices as $menu_choice)
                            <li>
                                <h2 class="font-semibold text-md mb-3">- Pilihan {{ $menu_choice->name }}</h2>
                            @foreach ($menu_choice->menuItems as $menu_item)
                                <p class="text-sm ml-3">+ {{ $menu_item->name }}</p>
                            @endforeach
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <aside class="w-full lg:w-1/4 bg-gray-100 p-8 border-l">
            <h2 class="text-lg font-bold mb-4 text-gray-800">OUR MENU</h2>
            <ul class="space-y-4 text-gray-700">
                @foreach ($menu_categories as $menu_category)
                <li>
                    <button type="button" onclick="openDropdown({{ $menu_category->id }})" id="dropdown-button" class="flex items-center w-full p-2 text-base group" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                        <span class="flex-1 text-left rtl:text-right whitespace-nowrap text-sm">{{ $menu_category->name }}</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>
                    <ul id="dropdown-items-{{ $menu_category->id }}" class="hidden space-y-1">
                        @foreach ($menu_category->menus as $menu)
                        <li>
                            <a href="{{ route('ourmenu.main', $menu->id) }}" class="flex items-center w-full p-1 pl-4 group text-sm">{{ $menu->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                @endforeach
            </ul>
        </aside>
    </div>
    <script>
        function openDropdown(menu_category_id) {
            let items = document.getElementById(`dropdown-items-${menu_category_id}`);

            if (items.classList.contains('hidden')) {
                items.classList.remove('hidden');
            } else {
                items.classList.add('hidden');
            }

            
        }
    </script>
@endsection

   
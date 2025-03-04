@extends('layouts.app')
@section('title', 'Payment Order')

@section('navigation')
    @parent
    @extends('components.navigation')
@endsection

@section('content')
<div class="container flex justify-center">
    <div class="w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-8">
        <div class="flex items-center justify-between mb-4">
            <h5 class="text-xl font-bold leading-none text-gray-900">Detil order</h5>
        </div>
        <div class="flow-root">
                <ul role="list" class="divide-y divide-gray-200">
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center">
                            <div class="flex-1 min-w-0 ms-4">
                                <p class="text-sm font-medium text-gray-900 truncate">
                                    Kategori
                                </p>
                                <p class="text-sm text-gray-500 truncate">
                                    {{ $order->menu_category_id }}
                                </p>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900">
                                $320
                            </div>
                        </div>
                    </li>
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center">
                            <div class="flex-1 min-w-0 ms-4">
                                <p class="text-sm font-medium text-gray-900 truncate">
                                    Bonnie Green
                                </p>
                                <p class="text-sm text-gray-500 truncate">
                                    email@windster.com
                                </p>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900">
                                $3467
                            </div>
                        </div>
                    </li>
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center">
                            <div class="flex-1 min-w-0 ms-4">
                                <p class="text-sm font-medium text-gray-900 truncate">
                                    Michael Gough
                                </p>
                                <p class="text-sm text-gray-500 truncate">
                                    email@windster.com
                                </p>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900">
                                $67
                            </div>
                        </div>
                    </li>
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center ">
                            <div class="flex-1 min-w-0 ms-4">
                                <p class="text-sm font-medium text-gray-900 truncate">
                                    Lana Byrd
                                </p>
                                <p class="text-sm text-gray-500 truncate">
                                    email@windster.com
                                </p>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900">
                                $367
                            </div>
                        </div>
                    </li>
                    <li class="pt-3 pb-0 sm:pt-4">
                        <div class="flex items-center ">
                            <div class="flex-1 min-w-0 ms-4">
                                <p class="text-sm font-medium text-gray-900 truncate">
                                    Thomes Lean
                                </p>
                                <p class="text-sm text-gray-500 truncate">
                                    email@windster.com
                                </p>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900">
                                $2367
                            </div>
                        </div>
                    </li>
                </ul>
        </div>
    </div>
</div>
@endsection
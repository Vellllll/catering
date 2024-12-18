@extends('layouts.app')
@section('title', 'Dashboard')

@section('navigation')
	@parent
	@extends('components.navigation')
@endsection

@section('content')
	<div class="h-1/2 mb-3">
		<img src="https://www.lalamove.com/hubfs/catering%20harian%20%281%29.jpg" alt="" class="w-full h-full object-cover rounded-lg">
	</div>

	<div class="grid mb-8 rounded-lg md:mb-12 md:grid-cols-2">
			<figure class="flex flex-col items-center justify-center p-20 text-center bg-white border-b border-gray-200 rounded-t-lg md:rounded-t-none md:rounded-ss-lg md:border-e cursor-pointer hover:bg-gray-100">
					<blockquote class="max-w-2xl mb-3 text-center">
						<h3 class="text-2xl font-bold mb-3">Our menu</h3>
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-20 mx-auto">
							<path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
						</svg>
					</blockquote>
					<figcaption class="flex items-center justify-center text-gray-500">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, esse!
					</figcaption>
			</figure>
			<figure class="flex flex-col items-center justify-center p-20 text-center bg-white border-b border-gray-200 rounded-tr-lg cursor-pointer hover:bg-gray-100">
					<blockquote class="max-w-2xl mb-3 text-center">
						<h3 class="text-2xl font-bold mb-3">Order catering</h3>
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-20 mx-auto">
							<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5m.75-9 3-3 2.148 2.148A12.061 12.061 0 0 1 16.5 7.605" />
						</svg>
					</blockquote>
					<figcaption class="flex items-center justify-center text-gray-500">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, esse! Lorem ipsum dolor sit amet.
					</figcaption>
			</figure>
			<figure class="flex flex-col items-center justify-center p-20 text-center bg-white rounded-bl-lg md:border-e cursor-pointer hover:bg-gray-100">
					<blockquote class="max-w-2xl mb-3 text-center">
						<h3 class="text-2xl font-bold mb-3">Store locations</h3>
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-20 mx-auto">
							<path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
							<path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
						</svg>
					</blockquote>
					<figcaption class="flex items-center justify-center text-gray-500">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, esse! Lorem, ipsum.
					</figcaption>
			</figure>
			<figure class="flex flex-col items-center justify-center p-20 text-center bg-white rounded-br-lg cursor-pointer hover:bg-gray-100">
					<blockquote class="max-w-2xl mb-3 text-center">
						<h3 class="text-2xl font-bold mb-3">About us</h3>
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-20">
							<path stroke-linecap="round" stroke-linejoin="round" d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205 3 1m1.5.5-1.5-.5M6.75 7.364V3h-3v18m3-13.636 10.5-3.819" />
						</svg>
					</blockquote>
					<figcaption class="flex items-center justify-center text-gray-500">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, esse! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptates.
					</figcaption>
			</figure>
	</div>

	
	<div class="flex gap-3">
		<div class="w-full bg-white border border-gray-200 rounded-lg shadow">
				<div class="flex flex-col items-center pb-20 pt-20 px-8">
						<img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcTSLfKF1KlJMfw-awd5Dkxnnk_4etgh9cMf_QKAQYut6thoyLmfj3e7EAu_AgGsMXO5d1kkNpYeySR1z03Nw6TIOw" alt="Bonnie image"/>
						<h5 class="mb-1 text-xl font-medium text-gray-900">Bae Suzy</h5>
						<span class="text-sm text-gray-500 dark:text-gray-400 mb-3">Catering baeee</span>
						<p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus dolorem fugit ex!</p>
				</div>
		</div>
		<div class="w-full bg-white border border-gray-200 rounded-lg shadow">
				<div class="flex flex-col items-center pb-20 pt-20 px-8">
						<img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcTOgywO3sIkGy_W9VWNF6v4m9Xv2vnpJQW0Tv_QFt09oXd_7409MVRBEPktoQ9L39vZvtc4KMxKswR_vhXBnD481Q" alt="Bonnie image"/>
						<h5 class="mb-1 text-xl font-medium text-gray-900">Jieun</h5>
						<span class="text-sm text-gray-500 dark:text-gray-400">Catering iu</span>
						<p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis, vitae. Fugiat, ipsa! Odit, ducimus maiores!</p>
				</div>
		</div>
		<div class="w-full bg-white border border-gray-200 rounded-lg shadow">
				<div class="flex flex-col items-center pb-20 pt-20 px-8">
						<img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcT7zhoRo_McR_u_pYB-uJIQ0Id1m1SK4qEAoyEu54tGlP-0C0Cj3vW8Uks9PUH5m5uK5K9xpanu2E82mn6QHrbyHQ" alt="Bonnie image"/>
						<h5 class="mb-1 text-xl font-medium text-gray-900">Jung somin</h5>
						<span class="text-sm text-gray-500 dark:text-gray-400">Catering jung so</span>
						<p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam dolor modi delectus nostrum!</p>
				</div>
		</div>
		<div class="w-full bg-white border border-gray-200 rounded-lg shadow">
				<div class="flex flex-col items-center pb-20 pt-20 px-8">
						<img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcQ4FlxfFz_IH2qoLXly7aFrz6RDh3xUt-XIGIfuDzlmytMQvZRHnuUDSu56RKOysqzZCmmU9fH1uV2Glo28Ne9yug" alt="Bonnie image"/>
						<h5 class="mb-1 text-xl font-medium text-gray-900">Bona</h5>
						<span class="text-sm text-gray-500 dark:text-gray-400">Catering boo</span>
						<p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos magni, commodi nulla error blanditiis perspiciatis sint ad doloremque asperiores!</p>
				</div>
		</div>
	</div>

@endsection
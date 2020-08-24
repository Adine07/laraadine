<?php

$siswa = [
	'title' => 'Siswa',
	'url' => '#',
	'icon' => 'fa-users',
	'model' => App\Model\Student::class,
	'childerns' => [
		[
			'title' => 'Daftar Siswa',
			'url' => '/students',
		],
		[
			'title' => 'Tambah Siswa',
			'url' => '/students/create',
		],
	]
];

$wali = [
	'title' => 'Wali',
	'url' => '#',
	'icon' => 'fa-cog',
	'model' => App\Model\Guardian::class,
	'childerns' => [
		[
			'title' => 'Daftar Wali',
			'url' => '/guardians',
		],
		[
			'title' => 'Tambah Wali',
			'url' => '/guardians/create',
		],
	]
];

$menus = [$siswa, $wali];

$currentPath = '/' . request()->path();

?>

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
		<div class="sidebar-brand-icon rotate-n-15">
			<i class="fas fa-laugh-wink"></i>
		</div>
		<div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider my-0">

	@foreach($menus as $index => $menu)

		@can('viewAny', $menu['model'])

			@if(isset($menu['childerns']))

				@php
				$isActive = false;

				foreach ($menu['childerns'] as $childern) {
					if ($childern['url'] == $currentPath) {
						$isActive = true;
					}
				}
				@endphp

				<li class="nav-item {{ $isActive ? 'active' : '' }}">
					<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menu{{ $index }}">
						<i class="fas fa-fw {{ $menu['icon'] }}"></i>
						<span>{{ $menu['title'] }}</span>
					</a>
					<div id="menu{{ $index }}" class="collapse {{ $isActive ? 'show' : '' }}" data-parent="#accordionSidebar">
						<div class="bg-white py-2 collapse-inner rounded">
							<h6 class="collapse-header">{{ $menu['title'] }}:</h6>
							@foreach($menu['childerns'] as $childern)
							<a class="collapse-item {{ $childern['url'] == $currentPath ? 'active' : '' }}" href="{{ $childern['url'] }}">{{ $childern['title'] }}</a>
							@endforeach
						</div>
					</div>
				</li>
			@else
				<li class="nav-item">
					<a class="nav-link" href="{{$menu['url']}}">
						<i class="fas fa-fw {{$menu['icon']}}"></i>
						<span>{{ $menu['title'] }}</span>
					</a>
				</li>
			@endif

		@endcan

	@endforeach



	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>

</ul>
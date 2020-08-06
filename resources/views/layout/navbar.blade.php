<nav>
	<span>{{ auth()->check() ? auth()->user()->name : '--' }}</span>
	||
	<a href="/guardians">Guardians</a> |
	<a href="/students">Students</a>
	||
	<form action="/logout" method="post">
		@csrf
		<button>Logout</button>
	</form>
</nav>
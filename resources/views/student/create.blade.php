@extends('layout.app')

@section('title', 'Students')

@section('content')
<form action="/students/store" method="post">
	@csrf

	<label>
		guardian
		<select name="guardian_id" id="">
			@foreach($guardians as $guardian)
			<option value="{{ $guardian->id }}">{{ $guardian->name }}</option>
			@endforeach
		</select>
	</label>
	<br>

	<label>
		name
		<input type="text" name="name">
	</label>
	<br>

	<label>
		nis
		<input type="text" name="nis">
	</label>
	<br>

	<label>
		gender

		<label for="l">
			<input id="l" type="radio" name="gender" value="l">
			Laki-laki
		</label>

		<label for="p">
			<input id="p" type="radio" name="gender" value="p">
			Perempuan
		</label>

	</label>
	<br>

	<label>
		birth date
		<input type="date" name="birth_date">
	</label>
	<br>

	<label>
		address
		<textarea type="text" name="address"></textarea>
	</label>
	<br>

	<label>
		class
		<select name="class">
			<option value="10">Kelas 10</option>
			<option value="11">Kelas 11</option>
			<option value="12">Kelas 12</option>
		</select>
	</label>
	<br>

	<label>
		majors
		<select name="majors">
			<option value="IPA">IPA</option>
			<option value="IPS">IPS</option>
			<option value="AGAMA">AGAMA</option>
			<option value="BAHASA">BAHASA</option>
		</select>
	</label>
	<br>

	<label>
		height
		<input type="number" name="height">
	</label>
	<br>

	<label>
		weight
		<input type="number" name="weight">
	</label>
	<br>

	<button>SUBMIT</button>

</form>
@endsection
@extends('layout.app')

@section('title', 'Students')

@section('content')

<form action="/students/update/{{ $student->id }}" method="post">
	@csrf
	@method('PUT')

	<label>
		guardian id
		<input type="text" name="guardian_id" value="{{ $student->guardian_id }}">
	</label>
	<br>

	<label>
		name
		<input type="text" name="name" value="{{ $student->name }}">
	</label>
	<br>

	<label>
		nis
		<input type="text" name="nis" value="{{ $student->nis }}">
	</label>
	<br>

	<label>
		gender

		<label for="l">
			<input id="l" type="radio" name="gender" {{ $student->gender == 'l' ? 'checked' : '' }} value="l">
			Laki-laki
		</label>

		<label for="p">
			<input id="p" type="radio" name="gender" {{ $student->gender == 'p' ? 'checked' : '' }} value="p">
			Perempuan
		</label>

	</label>
	<br>

	<label>
		birth date
		<input type="date" name="birth_date" value="{{ $student->birth_date }}">
	</label>
	<br>

	<label>
		address
		<textarea type="text" name="address">
		{{ $student->address }}
		</textarea>
	</label>
	<br>

	<label>
		class
		<select name="class">
			<option value="10" {{ $student->class == '10' ? 'selected' : '' }}>class 10</option>
			<option value="11" {{ $student->class == '11' ? 'selected' : '' }}>class 11</option>
			<option value="12" {{ $student->class == '12' ? 'selected' : '' }}>class 12</option>
		</select>
	</label>
	<br>

	<label>
		majors
		<select name="majors">
			<option value="IPA " {{ $student->majors == 'IPA' ? 'selected' : '' }}>IPA</option>
			<option value="IPS " {{ $student->majors == 'IPS' ? 'selected' : '' }}>IPS</option>
			<option value="AGAMA " {{ $student->majors == 'AGAMA' ? 'selected' : '' }}>AGAMA</option>
			<option value="BAHASA " {{ $student->majors == 'BAHASA' ? 'selected' : '' }}>BAHASA</option>
		</select>
	</label>
	<br>

	<label>
		height
		<input type="number" name="height" value="{{ $student->height }}">
	</label>
	<br>

	<label>
		weight
		<input type="number" name="weight" value="{{ $student->weight }}">
	</label>
	<br>

	<button>SUBMIT</button>

</form>
@endsection
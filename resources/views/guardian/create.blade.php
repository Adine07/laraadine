@extends('layout.app')

@section('title', 'Guardians')

@section('content')

<h1>Input Guardian data</h1>

@if($errors->any())
<hr>
<ul>
	@foreach($errors->all() as $error)
	<li>{{ $error }}</li>
	@endforeach
</ul>
<hr>
@endif


<table border="0">
	<form action="/guardians/store" method="post">
		@csrf
		<tr>
			<td>Name:</td>
			<td colspan="2"><input type="text" name="name" value="{{ old('name') }}"></td>
		</tr>
		<tr>
			<td>NIK:</td>
			<td colspan="2"><input type="number" name="nik" value="{{ old('nik') }}"></td>
		</tr>
		<tr>
			<td>Gender:</td>
			<td><input type="radio" value="l" name="gender" {{ old('gender') == 'l' ? 'checked' : '' }}> Laki-laki <input type="radio" value="p" name="gender" {{ old('gender') == 'p' ? 'checked' : '' }}> Perempuan</td>
		</tr>
		<tr>
			<td>Phone:</td>
			<td><input type="number" name="phone" value="{{ old('phone') }}"></td>
		</tr>
		<tr>
			<td>Birth Date</td>
			<td><input type="date" name="birth_date" value="{{ old('birth_date') }}"></td>
		</tr>
		<tr>
			<td>Address</td>
			<td><textarea name="address" id="" cols="30" rows="10">{{ old('address') }}</textarea></td>
		</tr>
		<tr>
			<td>Biological Parent?</td>
			<td>
				<input type="radio" value="1" name="is_parent" {{ old('is_parent') === '1' ? 'checked' : '' }}>Yes
				<input type="radio" value="0" name="is_parent" {{ old('is_parent') === '0' ? 'checked' : '' }}>No
			</td>
		</tr>
		<tr>
			<td colspan="3"><input type="submit" value="Input Data"></td>
		</tr>
	</form>
</table>
@endsection
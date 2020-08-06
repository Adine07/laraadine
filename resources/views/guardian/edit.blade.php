@extends('layout.app')

@section('title', 'Guardians')

@section('content')

<h1>Edit Guardian data</h1>

@if($errors->any())
<hr>
<ul>
	@foreach($errors->all() as $error)
	<li>{{ $error }}</li>
	@endforeach
</ul>
<hr>
@endif


<table>
	<form action="/guardians/update/{{ $guardian->id }}" method="post">
		@csrf
		@method('PUT')
		<tr>
			<td>Name:</td>
			<td><input type="text" name="name" value="{{ old('name', $guardian->name) }}"></td>
		</tr>
		<tr>
			<td>NIK:</td>
			<td><input type="number" name="nik" value="{{ old('nik', $guardian->nik) }}"></td>
		</tr>
		<tr>
			<td>Gender:</td>
			<td>
				<input type="radio" value="l" name="gender" {{ old('gender', $guardian->gender) == 'l' ? 'checked' : null }}> Laki-laki
				<input type="radio" value="p" name="gender" {{ old('gender', $guardian->gender) == 'p' ? 'checked' : null }}> Perempuan
			</td>
		</tr>
		<tr>
			<td>Phone:</td>
			<td><input type="text" name="phone" value="{{ old('phone',$guardian->phone) }}"></td>
		</tr>
		<tr>
			<td>Birth Date</td>
			<td><input type="date" name="birth_date" value="{{ old('birth_date', $guardian->birth_date) }}"></td>
		</tr>
		<tr>
			<td>Address</td>
			<td><textarea name="address" id="" cols="30" rows="10">
				{{ old('address', $guardian->address) }}
				</textarea></td>
		</tr>
		<tr>
			<td>Biological Parent?</td>
			<td>
				<input type="radio" value="1" name="is_parent" {{ old('is_parent', "$guardian->is_parent") === '1' ? 'checked' : '' }}>Yes
				<input type="radio" value="0" name="is_parent" {{ old('is_parent', "$guardian->is_parent") === '0' ? 'checked' : '' }}>No
			</td>
		</tr>
		<tr>
			<td style="text-align: center;"><input type="submit" value="Update Data"></td>
		</tr>
	</form>
</table>
@endsection
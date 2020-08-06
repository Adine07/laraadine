@extends('layout.app')

@section('title', 'Guardians')

@section('content')
<h1>Data Wali</h1>

<a href="/guardians/create">Tambah Data</a><br><br>

<table border="1" style="width: 100%;">
	<thead>
		<tr>
			<th>Name</th>
			<th>NIK</th>
			<th>gender</th>
			<th>Phone</th>
			<th>Tanggal Lahir</th>
			<th>Alamat</th>
			<th>Kandung</th>
			<th>Students</th>
			<th>Created_at</th>
			<th>Action</th>
		</tr>
	</thead>

	<tbody>
		@foreach($guardians as $guardian)
		<tr>
			<td>{{ $guardian->name }}</td>
			<td>{{ $guardian->nik }}</td>
			<td>{{ ($guardian->gender == 'l') ? 'laki-laki' : 'perempuan' }}</td>
			<td>{{ $guardian->phone }}</td>
			<td>{{ $guardian->birth_date }}</td>
			<td>{{ $guardian->address }}</td>
			<td>{{ $guardian->is_parent ? 'Ya' : 'Tidak' }}</td>
			<td>{{ $guardian->students()->count() }}</td>
			<td>{{ $guardian->created_at }}</td>
			<td>
				<a href="/guardians/edit/{{$guardian->id}}">Edit </a>
				<form action="/guardians/delete/{{$guardian->id}}" method="post">
					@csrf
					@method('DELETE')
					<button>Hapus</button>
				</form>
			</td>
		</tr>
		@endforeach
	</tbody>

</table>
@endsection
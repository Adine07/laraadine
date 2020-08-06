@php
    $id = 12; 
@endphp

<div class="">
    <a href="{{ route('admin.users.create') }}">User Create</a>
</div>
<div class="">
    <form action="{{ route('admin.users.store') }}" method="post">
        @csrf
        <button>User Store</button>
    </form>
</div>
<div class=""><a href="{{ route('admin.users.edit', ['user' => $id]) }}">User Edit</a></div>
<div class=""><form method="post" action="{{ route('admin.users.update', $id) }}">
    @csrf
    @method('PUT')
    <button>User Update</button>
</form></div>
<div class=""><form method="post" action="{{ route('admin.users.destroy', $id) }}">
    @csrf
    @method('DELETE')
    <button>User Delete</button>
</form></div>
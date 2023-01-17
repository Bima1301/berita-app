@extends('dashboard.layout.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Users</h1>
    </div>

    <div class="col-lg-8">
        <form action="/dashboard/users/{{ $users->id }}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    required autofocus value="{{ old('name', $users->name) }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="username" class="form-label"></label>Username</label>
                <input type="username" class="form-control @error('username') is-invalid @enderror" id="username"
                    name="username"  required value="{{ old('username', $users->username) }}">
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="permission" class="form-label">Permission</label>
                <select class="form-select" aria-label="Default select example" name="permission" id="permission">
                    @if ($users->permission == 'admin')
                        <option selected value="admin">Admin</option>
                        <option value="user">User</option>
                    @else
                        <option value="admin">Admin</option>
                        <option selected value="user">User</option>
                    @endif

                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update User</button>
        </form>
    </div>
@endsection

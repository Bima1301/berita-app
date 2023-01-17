@extends('dashboard.layout.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">List Of Users</h1>
    </div>
    @if (session()->has('success'))
        <div class="alert alert-success col-lg-10" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="table-responsive col-lg-10">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Permission</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->permission }}</td>
                        <td>
                            <a href="/dashboard/users/{{ $user->id }}/edit" class="badge bg-warning">
                                <span data-feather="edit"></span>
                            </a>
                            <form action="/dashboard/users/{{ $user->id }}" method="post" class="d-inline">
                              @method("delete")
                              @csrf
                              <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span></button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection

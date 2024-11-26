@extends('layout.app')
@section('content')
    <div class="card shadow">
        <div class="card-header">
            <h2>User Data</h2>
        </div>
        <div class="card-body">
            <div class="mb-3" align="right">
                <a href="{{ route('user.create') }}" class="btn btn-primary shadow">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-plus-lg" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
                    </svg>
                </a>
            </div>
            <table class="table table-bordered table-responsive table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key => $val)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $val->name }}</td>
                            <td>{{ $val->email }}</td>
                            <td class="d-flex gap-2">
                                <a href="{{ route('user.edit', $val->id) }}" class="btn btn-icon btn-secondary">
                                    <i class="tf-icon bx bx-pencil bx-22px"></i>
                                </a>
                                {{-- <a href="" class="btn btn-icon btn-danger">
                                    <i class="tf-icon bx bx-trash bx-22px"></i>
                                </a> --}}
                                <form action="{{ route('user.destroy', $val->id) }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-icon btn-danger">
                                        <i class="tf-icon bx bx-trash bx-22px"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

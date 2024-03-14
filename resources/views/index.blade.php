@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div>
            <h3 class="mb-4">Create Task</h3>
            <div class="row">
                <div class="col-md-6">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 1%" class="text-center" scope="col">No</th>
                                <th scope="col" class="text-center">Name</th>
                                <th scope="col" class="text-center">Status</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $index => $item)
                                <tr>
                                    <th class="text-center" scope="row">{{ $loop->iteration }}</th>
                                    <td class="text-center">{{ $item->name }}</td>
                                    <td class="text-center">
                                        @if ($item->completed == 0)
                                            <i class="bi bi-x-circle-fill text-danger"></i>
                                        @else
                                            <i class="bi bi-check-circle-fill text-success"></i>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('apakah anda yakin?')"
                                            action="{{ route('tasks.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <form action="{{ route('tasks.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        id="exampleFormControlInput1" placeholder="tulis task harianmu">
                                    @error('name')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Add Task</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

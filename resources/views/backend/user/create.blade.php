@extends('backend.layout.admin')

@section('title', 'Add new user')

@section('main')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Add new user</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <!-- card -->
                <div class="card card-h-100">
                    <!-- card body -->
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <form action="{{ route('backend.users.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="vstack gap-3">
                                        <div class="">
                                            <label for="input-name" class="form-label">Name:</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                name="name" value="{{ old('name') }}" id="input-name" required />
                                            @error('name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="">
                                            <label for="input-email" class="form-label">Email:</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" id="input-email" required />
                                            @error('email')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="">
                                            <label for="input-role" class="form-label">Role:</label>
                                            <select name="role" class="form-control @error('role') is-invalid @enderror"
                                                id="input-role" required>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('role')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="">
                                            <label for="input-password" class="form-label">Password:</label>
                                            <input type="text"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                value="{{ old('password') }}" id="input-password" required />
                                            @error('password')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-primary px-5">Create</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- container-fluid -->
@endsection

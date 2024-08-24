@extends('backend.layout.admin')

@section('title', 'Edit permission')

@section('main')

    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Edit permission</h4>
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
                                <form action="{{ route('backend.permissions.update', $permission->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf @method('put')
                                    <div class="vstack gap-3">
                                        <div class="">
                                            <label for="input-group_name" class="form-label">Group Name:</label>
                                            <input type="text"
                                                class="form-control @error('group_name') is-invalid @enderror"
                                                name="group_name" value="{{ old('group_name', $permission->group_name) }}"
                                                id="input-group_name" placeholder="Permission Group Name" required />
                                            @error('group_name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="">
                                            <label for="input-name" class="form-label">Permission Name:</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                name="name" value="{{ old('name', $permission->name) }}" id="input-name"
                                                placeholder="Permission Name" required />
                                            @error('name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-primary px-5">Update</button>
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
@endsection

@extends('backend.layout.admin')

@section('title', 'Add new role')

@section('main')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Add new role</h4>
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
                                <form action="{{ route('backend.roles.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="vstack gap-3">
                                        <div class="">
                                            <label for="input-name" class="form-label">Name:</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                name="name" value="{{ old('name') }}" id="input-name"
                                                placeholder="Role Name" required />
                                            @error('name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="">
                                            <div class="position-relative form-group">
                                                <label for="input-email" class="">Permissions <small
                                                        class="text-danger">*</small></label>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="checkAll">
                                                    <label class="custom-control-label" for="checkAll">
                                                        <h4 class="text-capitalize">All</h4>
                                                    </label>
                                                </div>
                                                <div class="row">
                                                    @foreach ($permissions as $key => $values)
                                                        <div class="col-sm-4 mt-3">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox"
                                                                    class="permission-group-name permission-checkbox custom-control-input"
                                                                    id="checkAll-{{ $key }}"
                                                                    onchange="checkPermissionByGroupName('group-name-{{ $key }}', this)">
                                                                <label class="custom-control-label"
                                                                    for="checkAll-{{ $key }}">
                                                                    <h4 class="text-capitalize">{{ $key }}</h3>
                                                                </label>
                                                            </div>
                                                            <div class="group-name-{{ $key }}">
                                                                @foreach ($values as $item)
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox"
                                                                            class="permission-name permission-checkbox custom-control-input"
                                                                            id="permission-{{ $item->id }}"
                                                                            name="permissions[]" value="{{ $item->name }}"
                                                                            onchange="checkPermission(this)">
                                                                        <label class="custom-control-label"
                                                                            for="permission-{{ $item->id }}">{{ $item->name }}</label>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
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
@endsection

@push('scripts')
    <script src="{{ asset('/assets/backend/js/multyCheckbox.js') }}"></script>
@endpush

@extends('backend.layout.admin')
@section('title', 'Update Role')
@section('main')
    <!-- container -->
    <div class="main-container container-fluid">

        <!-- main-content-body -->
        <div class="main-content-body">

            <div class="row row-sm justify-content-center">
                <div class="col-12 col-md-12">
                    <div class="card overflow-hidden">
                        <div class="card-header bg-transparent pd-b-0 pd-t-20 bd-b-0">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title mg-b-10">Update Role</h4>
                                <i class="mdi mdi-dots-horizontal text-gray"></i>
                            </div>
                        </div>
                        <div class="card-body pd-y-7">
                            <form action="{{ route('backend.roles.update', $role->id) }}" method="post"
                                enctype="multipart/form-data" class="col-md-8 mx-auto">
                                @csrf @method('put')

                                <div class="">
                                    <label for="input-name" class="form-label">Name:</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name', $role->name) }}" id="input-name"
                                        placeholder="Role Name" required />
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="position-relative form-group">
                                    <label for="input-email" class="">Permissions <small
                                            class="text-danger">*</small></label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkAll"
                                            {{ roleHasPermissions($role) ? 'checked' : '' }}>
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
                                                        onchange="checkPermissionByGroupName('group-name-{{ $key }}', this)"
                                                        {{ roleHasPermissions($role, $values) ? 'checked' : '' }}>
                                                    <label class="custom-control-label" for="checkAll-{{ $key }}">
                                                        <h4 class="text-capitalize">{{ $key }}</h3>
                                                    </label>
                                                </div>
                                                <div class="group-name-{{ $key }}">
                                                    @foreach ($values as $item)
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox"
                                                                class="permission-name permission-checkbox custom-control-input"
                                                                id="permission-{{ $item->id }}" name="permissions[]"
                                                                value="{{ $item->name }}"
                                                                onchange="checkPermission(this)"
                                                                {{ $role->hasPermissionTo($item->name) ? 'checked' : '' }}>
                                                            <label class="custom-control-label"
                                                                for="permission-{{ $item->id }}">{{ $item->name }}</label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <button type="submit" class="mt-1 btn btn-primary px-5">Update</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
@endsection

@push('scripts')
    <script src="{{ asset('assets/backend/js/multyCheckbox.js') }}"></script>
@endpush

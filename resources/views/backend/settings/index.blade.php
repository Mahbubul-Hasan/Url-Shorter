@extends('backend.layout.admin')

@section('title', 'Settings')

@section('main')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Settings</h4>
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
                                <form action="{{ route('backend.settings.update', $settings->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf @method('put')
                                    <div class="vstack gap-3">
                                        <div class="">
                                            <label for="input-site_name" class="form-label">Site Name:</label>
                                            <input type="text"
                                                class="form-control @error('site_name') is-invalid @enderror"
                                                name="site_name" value="{{ old('site_name', $settings->site_name) }}"
                                                id="input-site_name" required />
                                            @error('site_name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label for="input-favicon" class="form-label">Favicon:</label>
                                            <input type="file"
                                                class="form-control @error('favicon') is-invalid @enderror" name="favicon"
                                                value="{{ old('favicon') }}" id="input-favicon" />

                                            @if ($settings?->favicon)
                                                <img class="mt-2" src="{{ asset($settings->faviconLink) }}"
                                                    alt="{{ $settings->site_name }}" width="100">
                                            @endif
                                            <small class="text-info d-block">The image must have a maximum size of 100KB.
                                                width: 32px & height: 32px</small>
                                            @error('favicon')
                                                <small class="text-danger d-block">{{ $message }}</small>
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
    <!-- container-fluid -->
@endsection

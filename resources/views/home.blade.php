@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row p-5">
            <div class="col">
                <!-- card -->
                <div class="card card-h-100 bg-light">
                    <!-- card body -->
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="">URL Shorter Form</h3>

                            @if (session()->has('shortUrl'))
                                <a href="{{ session('shortUrl') }}" target="_blank"
                                    class="fw-bolder fs-4">{{ session('shortUrl') }}</a>
                            @endif
                        </div>
                        <div>
                            <form action="{{ route('url-short.create') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <label for="input-original-url" class="form-label">URL <sup
                                                class="text-danger">*</sup>:</label>
                                        <input type="text"
                                            class="form-control @error('original_url') is-invalid @enderror"
                                            name="original_url" value="{{ old('original_url') }}"
                                            placeholder="https://exemple.com" id="input-original-url" required />
                                        @error('original_url')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="text-end mt-3">
                                    <button type="submit" class="btn btn-primary px-5">Create Link</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

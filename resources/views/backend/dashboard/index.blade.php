@extends('backend.layout.admin')

@section('title', 'Dashboard')

@section('main')


    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Dashboard</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-3 col-md-6">
                <!-- card -->
                <div class="card card-h-100">
                    <!-- card body -->
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <span class="text-muted mb-3 lh-1 d-block text-truncate">My Wallet</span>
                                <h4 class="mb-3">
                                    $<span class="counter-value" data-target="865.2">0</span>k
                                </h4>
                            </div>

                            <div class="col-6">
                                <div id="mini-chart1" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                            </div>
                        </div>
                        <div class="text-nowrap">
                            <span class="badge bg-success-subtle text-success">+$20.9k</span>
                            <span class="ms-1 text-muted font-size-13">Since last week</span>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->

            <div class="col-xl-3 col-md-6">
                <!-- card -->
                <div class="card card-h-100">
                    <!-- card body -->
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <span class="text-muted mb-3 lh-1 d-block text-truncate">Number of Trades</span>
                                <h4 class="mb-3">
                                    <span class="counter-value" data-target="6258">0</span>
                                </h4>
                            </div>
                            <div class="col-6">
                                <div id="mini-chart2" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                            </div>
                        </div>
                        <div class="text-nowrap">
                            <span class="badge bg-danger-subtle text-danger">-29 Trades</span>
                            <span class="ms-1 text-muted font-size-13">Since last week</span>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col-->

            <div class="col-xl-3 col-md-6">
                <!-- card -->
                <div class="card card-h-100">
                    <!-- card body -->
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <span class="text-muted mb-3 lh-1 d-block text-truncate">Invested Amount</span>
                                <h4 class="mb-3">
                                    $<span class="counter-value" data-target="4.32">0</span>M
                                </h4>
                            </div>
                            <div class="col-6">
                                <div id="mini-chart3" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                            </div>
                        </div>
                        <div class="text-nowrap">
                            <span class="badge bg-success-subtle text-success">+ $2.8k</span>
                            <span class="ms-1 text-muted font-size-13">Since last week</span>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->

            <div class="col-xl-3 col-md-6">
                <!-- card -->
                <div class="card card-h-100">
                    <!-- card body -->
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <span class="text-muted mb-3 lh-1 d-block text-truncate">Profit Ration</span>
                                <h4 class="mb-3">
                                    <span class="counter-value" data-target="12.57">0</span>%
                                </h4>
                            </div>
                            <div class="col-6">
                                <div id="mini-chart4" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                            </div>
                        </div>
                        <div class="text-nowrap">
                            <span class="badge bg-success-subtle text-success">+2.95%</span>
                            <span class="ms-1 text-muted font-size-13">Since last week</span>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->
        </div><!-- end row-->

        <div class="row">
            <div class="col">
                <!-- card -->
                <div class="card card-h-100">
                    <!-- card body -->
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="">URL Shorter Form</h3>

                            @if (session()->has('url'))
                                <a href="{{ session('url') }}" target="_blank"
                                    class="fw-bolder fs-4">{{ session('url') }}</a>
                            @endif
                        </div>
                        <div>
                            <form action="{{ route('backend.url-short.create') }}" method="post"
                                enctype="multipart/form-data">
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
                                    <div class="col">
                                        <label for="input-custom-code" class="form-label">Custom code:</label>
                                        <input type="text" class="form-control @error('url_code') is-invalid @enderror"
                                            name="url_code" value="{{ old('url_code') }}" placeholder="Xyz123"
                                            id="input-custom-code" />
                                        <small class="text-info d-block">
                                            Minimum 6 character, max 10 character & should not any space
                                        </small>
                                        @error('url_code')
                                            <small class="text-danger d-block">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="input-expire" class="form-label">Expire after (Hours):</label>
                                        <input type="number" class="form-control @error('expire') is-invalid @enderror"
                                            name="expire" value="{{ old('expire') }}" placeholder="48"
                                            id="input-expire" />
                                        @error('expire')
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
    <!-- container-fluid -->
@endsection

@push('scripts')
@endpush

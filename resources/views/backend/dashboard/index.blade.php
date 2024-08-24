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
        @if (isAdmin())
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-h-100">
                        <!-- card body -->
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Shortern Url</span>
                                    <h4 class="mb-3">
                                        <span class="counter-value"
                                            data-target="{{ $total }}">{{ $total }}</span>
                                    </h4>
                                </div>
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
                                    <span class="text-muted mb-3 lh-1 d-block text-truncate">Active Url</span>
                                    <h4 class="mb-3">
                                        <span class="counter-value"
                                            data-target="{{ $active }}">{{ $active }}</span>
                                    </h4>
                                </div>
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
                                    <span class="text-muted mb-3 lh-1 d-block text-truncate">Expired Url</span>
                                    <h4 class="mb-3">
                                        <span class="counter-value"
                                            data-target="{{ $expired }}">{{ $expired }}</span>
                                    </h4>
                                </div>
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
                                    <span class="text-muted mb-3 lh-1 d-block text-truncate">User</span>
                                    <h4 class="mb-3">
                                        <span class="counter-value"
                                            data-target="{{ $users }}">{{ $expired }}</span>
                                    </h4>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end row-->
        @endif

        <div class="row">
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

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="">URL Shorter List</h3>
                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Original Url</th>
                                    <th>Short Url</th>
                                    <th>Expired At</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- container-fluid -->
@endsection

@if (!isAdmin())
    <x-backend.scripts.datatable />
    @push('scripts')
        <script>
            $(document).ready(function() {

                let oTable = $('#datatable').DataTable({
                    stateSave: true,
                    processing: true,
                    serverSide: true,
                    bDestroy: true,
                    ordering: false,
                    "lengthMenu": [
                        [25, 50, 100, 200, 300, 500, 1000, -1],
                        [25, 50, 100, 200, 300, 500, 1000, "All"],
                    ],
                    ajax: {
                        url: "{{ route('backend.dashboard') }}",
                        data: function(d) {
                            d.lang = $('select[name=lang]').val();
                        },
                        // success: function(d) {
                        //     console.log(d, 'success');
                        // }
                    },
                    columns: [{
                            data: 'serial_number',
                            name: 'serial_number',
                        },
                        {
                            data: 'original_url',
                            name: 'original_url',
                        },
                        {
                            data: 'url_code',
                            name: 'url_code',
                            render: function(data) {
                                const url = window.location.origin + '/' + data
                                return `<a href="${url}" target="_blank">${url}</a>`;
                            }
                        },
                        {
                            data: 'expired_at',
                            name: 'expired_at',
                        },
                        {
                            data: 'created_at',
                            name: 'created_at',
                        },
                    ],
                    drawCallback: function(settings) {
                        var api = this.api();
                        var startIndex = api.context[0]._iDisplayStart;
                        api.column(0, {
                            search: 'applied',
                            order: 'applied'
                        }).nodes().each(function(cell, i) {
                            cell.innerHTML = startIndex + i + 1;
                        });
                    }
                });
            });
        </script>
    @endpush
@endif

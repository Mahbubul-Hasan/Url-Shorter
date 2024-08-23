@extends('backend.layout.admin')

@section('title', 'URL Shorter List')

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="">URL Shorter List</h3>
                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>User</th>
                                    <th>Email</th>
                                    <th>Original Url</th>
                                    <th>Short Url</th>
                                    <th>Created At</th>
                                    <th>Expired At</th>
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
                    url: "{{ route('backend.url-short') }}",
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
                        data: 'user',
                        name: 'user.name',
                        render: function(data, type, row) {
                            return data ? data.name : '';
                        }
                    },
                    {
                        data: 'user',
                        name: 'user.email',
                        render: function(data, type, row) {
                            return data ? data.email : '';
                        }
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
                        data: 'created_at',
                        name: 'created_at',
                    },
                    {
                        data: 'expired_at',
                        name: 'expired_at',
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

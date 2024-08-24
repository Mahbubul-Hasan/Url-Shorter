@extends('backend.layout.admin')

@section('title', 'User List')

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h3 class="">User List</h3>
                            @can('Create user')
                                <a href="{{ route('backend.users.create') }}" class="btn btn-primary">Add New</a>
                            @endcan
                        </div>
                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>User</th>
                                    <th>Email</th>
                                    <th>Short Url Count</th>
                                    <th>Role</th>
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
                    url: "{{ route('backend.users.index') }}",
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
                        data: 'name',
                        name: 'name',
                    },
                    {
                        data: 'email',
                        name: 'email',
                    },
                    {
                        data: 'urls_with_trashed_count',
                        name: 'urls_with_trashed_count',
                    },
                    {
                        data: 'role',
                        name: 'role',
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

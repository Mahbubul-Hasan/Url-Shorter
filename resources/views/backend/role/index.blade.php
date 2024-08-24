@extends('backend.layout.admin')

@section('title', 'Role')

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="">Role</h3>
                            @can('Create role')
                                <a href="{{ route('backend.roles.create') }}" class="btn btn-primary">Add New</a>
                            @endcan
                        </div>
                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">S/N</th>
                                    <th class="border-bottom-0">Role</th>
                                    <th class="border-bottom-0">Permissions</th>
                                    <th class="border-bottom-0">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                    url: "{{ route('backend.roles.index') }}",
                    data: function(d) {
                        d.lang = $('select[name=lang]').val();
                        d.start_date = $('input[name=start_date]').val();
                        d.end_date = $('input[name=end_date]').val();
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
                        data: 'permissions',
                        name: 'permissions',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'action',
                        orderable: false,
                        searchable: false,
                        render: function(data) {

                            let output = `<div class="hstack gap-2 align-items-center">`;
                            if ("{{ auth()->user()->can('Edit role') }}") {
                                output += `<a href="${data.edit}" class="edit text-info border px-2 py-1 rounded" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>`;
                            }

                            output += `</div>`;
                            return output;
                        }
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

            $('select[name=lang]').change(function() {
                oTable.draw();
            });

            $('#filter-form').on('submit', function(e) {
                oTable.draw();
                e.preventDefault();
            });

            $("#filter-form #reset-form").click(function() {
                $("#filter-form .select2").val(0).trigger("change");
                $('#filter-form').trigger("reset");
                oTable.clear().draw();
            });
        })
    </script>
@endpush

@push('styles')
    <style>
        .form-switch-input:checked~.form-switch-indicator {
            background: var(--success-gradient);
        }
    </style>
@endpush

@extends('backend.layouts.app')

@section('page.name', 'Manage Course CMS')

@section('page.content')
<div class="card">
    <div class="card-body">
        <div class="row mb-2">
           <div class="col-sm-5">
              {{--<h3>List</h3>--}}
           </div>
           <div class="col-sm-7">
              <div class="text-sm-end">
                  <a href="javascript:void(0);" class="btn btn-danger mb-2" onclick="largeModal('{{ url(route('cms.add')) }}', 'Add PAGE')"><i class="mdi mdi-plus-circle me-2"></i> Add PAGE</a>
              </div>
           </div>
           <!-- end col-->
        </div>

        <div class="table-responsive-1">

            <form id="search-form">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group mb-3">
                            <label for="title" class="form-label">Title:</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group mb-3">
                            <label for="slug" class="form-label">Slug:</label>
                            <input type="text" class="form-control" id="slug" name="slug">
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group mb-3">
                            <label for="zone" class="form-label">Zone:</label>
                            <select class="form-select" id="zone" name="zone">
                                <option value="">--- Select ---</option>
                                <option value="0">Main</option>
                                <option value="1">City</option>
                                <option value="2">Country</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group mb-3">
                            <label for="status" class="form-label">Status:</label>
                            <select class="form-select" id="status1" name="status">
                                <option value="">All</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group d-grid mt-3" style="padding-top:5px;">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>

                </div>
            </form>

            <hr>
            <br>

            <table id="basic-datatable1" class="table dt-responsive nowrap w-100">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Zone</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Action</th> 
                    </tr>
                </thead>
            </table>
        </div>

   </div>
   <!-- end card-body-->
</div>
@endsection

@section("page.scripts")
<script>
    var responseHandler = function(response) {
        location.reload();
    }

    $(document).ready(function() {
        var dataTable;

        function initializeDataTable() {
            dataTable = $('#basic-datatable1').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('cms.data') }}",
                    data: function (d) {
                        d.title = $('#title').val();
                        d.zone = $('#zone').val();
                        d.slug = $('#slug').val();
                        d.status = $('#status1').val();
                    }
                },
                columns: [
                    { data: 'id' },
                    { data: 'title'},
                    { data: 'slug'},
                    { data: 'zone'},
                    { data: 'status'},
                    { data: 'created_at'},
                    { data: 'action', name: 'action', orderable: false, searchable: false },
                ],
                dom: '<"row"<"col-md-6"l><"col-md-6"f>><"row"<"col-md-12"i>>tip',
            });
        }

        $('#search-form').submit(function(e) {
            e.preventDefault();
            if ($.fn.DataTable.isDataTable('#basic-datatable1')) {
                dataTable.destroy();
            }
            initializeDataTable();
        });

        initializeDataTable();
    });

</script>
@endsection
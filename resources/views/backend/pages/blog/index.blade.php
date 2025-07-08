@extends('backend.layouts.app')

@section('page.name', 'Posts')

@section('page.content')
<div class="card">
   <div class="card-body">
      <div class="row mb-2">
         <div class="col-sm-5">
            <!--<h3>List</h3>-->
         </div>
         <div class="col-sm-7">
            <div class="text-sm-end">
                <a href="javascript:void(0);" class="btn btn-danger mb-2" onclick="largeModal('{{ url(route('blogs.add')) }}', 'Add Post')"><i class="mdi mdi-plus-circle me-2"></i> Add Post</a>
            </div>
         </div>
         <!-- end col-->
      </div>
            
      <!-- Search Form -->
      <form method="GET" action="{{ url(route('blogs.index')) }}">
         <div class="row mb-4">
            <div class="col-md-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" placeholder="Title" value="{{ request('name') }}">
            </div>
            <div class="col-md-3">
                <label>Course</label>
               <select name="course" class="form-control">
                  <option value="">-- Select --</option>
                  @foreach($courses as $course)
                      <option value="{{ $course->id }}" {{ request('course') == $course->id ? 'selected' : '' }}>{{ $course->name }}</option>
                  @endforeach
               </select>
            </div>
            <div class="col-md-2">
                <label>Status</label>
               <select name="status" class="form-control">
                  <option value="">-- Select --</option>
                  <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Active</option>
                  <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Inactive</option>
               </select>
            </div>
            <div class="col-md-2">
                <label>Invisible</label>
               <select name="invisible" class="form-control">
                  <option value="">-- Select --</option>
                  <option value="1" {{ request('invisible') == '1' ? 'selected' : '' }}>Yes</option>
                  <option value="0" {{ request('invisible') == '0' ? 'selected' : '' }}>No</option>
               </select>
            </div>
            <div class="col-md-2">
                <label>Featured</label>
               <select name="featured" class="form-control">
                  <option value="">-- Select --</option>
                  <option value="1" {{ request('featured') == '1' ? 'selected' : '' }}>Yes</option>
                  <option value="0" {{ request('featured') == '0' ? 'selected' : '' }}>No</option>
               </select>
            </div>
            <div class="col-md-4 mt-2">
                <label>Date Type</label>
               <select name="date_field" class="form-control">
                  <option value="updated_at" {{ request('date_field') == 'updated_at' ? 'selected' : '' }}>Updated At</option>
                  <option value="created_at" {{ request('date_field') == 'created_at' ? 'selected' : '' }}>Published At</option>
               </select>
            </div>
            <div class="col-md-3 mt-2">
                <label>From</label>
               <input type="date" name="from_date" class="form-control" value="{{ request('from_date') }}">
            </div>
            <div class="col-md-3 mt-2">
                <label>To</label>
               <input type="date" name="to_date" class="form-control" value="{{ request('to_date') }}">
            </div>

            <div class="col-md-2 d-flex justify-content-start align-items-end">
                <div class="float-end d-flex gap-3">
                    <button type="submit" class="btn btn-primary">Filter</button>
                    <a href="{{ url(route('blogs.index')) }}" class="text-center btn btn-danger" title="Reset"><i class="mdi mdi-reload"></i></a>
                </div>
            </div>
         </div>
      </form>
      <!-- End Search Form -->
      <div class="table-responsive">
      <table id="basic-datatable2" class="table dt-responsive nowrap w-100">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Status</th>
                <th>Invisible</th>
                <th>Published Date</th>
                <th>Updated Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
             @php
                $currentPage = $blog->currentPage();
                $perPage = $blog->perPage();
                $start = ($currentPage - 1) * $perPage + 1;
            @endphp
            @foreach($blog as $row)
            <tr>
                <td>{{ $start++ }}</td>
                <td>{{$row->title}}</td>
                <td>
                    @if($row->status)
                    <span class="badge bg-success">Active</span>
                    @else
                    <span class="badge bg-danger">Inctive</span>
                    @endif
                </td>
                <td>
                    @if($row->invisible)
                    <span class="badge bg-success">Yes</span>
                    @else
                    <span class="badge bg-danger">No</span>
                    @endif
                </td>
                <td data-order="{{strtotime($row->created_at)}}">{{datetimeFormatter($row->created_at)}}</td>
                <td data-order="{{strtotime($row->updated_at)}}">{{datetimeFormatter($row->updated_at)}}</td>
                <td>
                    <a href="{{ url(route('blogs.status', ['id' => $row->id, 'status' => ($row->status == '1') ? '0' : '1'])) }}" class="action-icon">
                        @if ($row->status == '1')
                            <!--<i class="ri-eye-off-fill" title="Inactive"></i>-->
                            <span class="badge bg-danger" title="Inactive" style="font-size:11px;">Inctive</span>
                        @else
                            <!--<i class="ri-eye-fill" title="Active"></i>-->
                            <span class="badge bg-success" title="Active" style="font-size:11px;">Active</span>
                        @endif
                    </a>

                    <a href="javascript:void(0);" class="action-icon" onclick="largeModal('{{ url(route('blogs.view',['id' => $row->id])) }}', 'View Post')"> <i class="mdi mdi-account-eye" title="View"></i></a>

                    <a href="javascript:void(0);" class="action-icon" onclick="largeModal('{{ url(route('blogs.edit',['id' => $row->id])) }}', 'Edit Post')"> <i class="mdi mdi-square-edit-outline" title="Edit"></i></a>

                    @if(auth()->user()->designation == 'SuperAdmin')
                    <a href="javascript:void(0);" class="action-icon" onclick="confirmModalWithTextConfirmation('{{ url(route('blogs.delete', $row->id)) }}', responseHandler, '{{ extractWords($row->title, 3) }}')"><i class="mdi mdi-delete" title="Delete"></i></a>
                    @endif
                    
                    @if(auth()->user()->designation == 'SuperAdmin' || auth()->user()->designation == 'seo')
                    <a target="_blank" href="{{ url(route('blog.detail', ['category' =>'blog', 'slug' => $row->slug, 'preview' => 'true'])) }}" class="action-icon" title="Preview"> <i class="mdi mdi-eye"></i></a>
                    @endif
                </td>
            </tr>
            @endforeach
    </table>
            <!-- Pagination Links -->
        <div class="mt-3">
            {{ $blog->appends(request()->query())->links('pagination::bootstrap-5') }}
        </div>
      </div>
   </div>
   <!-- end card-body-->
</div>
@endsection

@section("page.scripts")
<script>
$(document).ready(function() {
    $('#basic-datatable2').DataTable({
        paging: false,
        info: false,
        searching: false // This will hide the search box
    });
});
    var responseHandler = function(response) {
        location.reload();
    }
</script>
@endsection
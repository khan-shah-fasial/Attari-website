@extends('backend.layouts.app')

@section('page.name', 'contact')

@section('page.content')

@include('backend.pages.contact.manage_email')

<style>
    .leads-contact1 .justify-content-sm-between {
    display: block !important;
}

.leads-contact1 .mt-4 {
    margin-top: 15px !important;
}

.leads-contact1 .col-md-8 ul {
    float: right !important;
}

.leads-contact1 .col-md-8 ul a.page-link {
    border-radius: 100px;
    margin-right: 4px;
    text-align: center;
}
.leads-contact1 .col-md-8 ul span {
    border-radius: 100px;
    margin-right: 4px;
    text-align: center;
}

@media(max-width:767px)
{
    body .leads-contact1 .justify-content-sm-between {
    display: none !important;
}
.leads-contact1 .justify-content-sm-between {
    display: flex !important;
}
}
</style>

<div class="card">
    <div class="card-body">
        <div class="row mb-2">
            <div class="col-md-12">
      <form method="GET" action="{{ url(route('contact.index')) }}">
         <div class="row mb-2">
            <div class="col-md-4">
                <label>Course</label>
                <select name="course" class="form-control select2">
                    <option value="">-- Select --</option>
                    @foreach($uniqueCourses as $alias)
                        <option value="{{ $alias }}" @if(request('course') == $alias) selected @endif>{{ $alias }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label>From</label>
               <input type="date" name="from_date" class="form-control" value="{{ request('from_date') }}">
            </div>
            <div class="col-md-3">
                <label>To</label>
               <input type="date" name="to_date" class="form-control" value="{{ request('to_date') }}">
            </div>
            <div class="col-md-2 d-flex justify-content-start align-items-end">
                <div class="float-end d-flex gap-3">
                    <button type="submit" class="btn btn-primary">Filter</button>
                    <a href="{{ url(route('contact.index')) }}" class="text-center btn btn-danger" title="Reset"><i class="mdi mdi-reload"></i></a>
                </div>
            </div>
         </div>
      </form>                

            </div>

        </div>

        <div class="table-responsive">
            <table id="basic-datatable-with-laravel-pagination" class="table dt-responsive nowrap w-100">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>IP</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone No</th>
                        <th>Course</th>
                        {{--<th>Description</th>
                        <th>Other Info</th>
                        <th>Qualification</th>
                        <th>CV</th>--}}
                        <th>Page</th>
                        <th>Section</th>
                        <th>Country Code</th>
                        <th>Country Phone</th>
                        <th>Syllabus Status</th>
                        <th>Email Status</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $start = ($contacts->currentPage() - 1) * $contacts->perPage() + 1;
                    @endphp
                    @foreach($contacts as $row)
                    <tr>
                        <td>{{ $start++ }}</td>
                        <td>{{ $row->ip }}</td>
                        <td>{{$row->name}}</td>
                        <td>{{$row->email}}</td>
                        <td>{{$row->phone}}</td>
                        <td>{{$row->services}}</td>
                        {{--<td>{{$row->description}}</td>
                        <td>{{$row->other_info}}</td>
                        <td>{{$row->qualification}}</td>
                        <td>
                            @if($row->cv)
                            <a target="_blank" href="{{ asset('storage/' . $row->cv) }}">
                                View
                            </a>
                            @endif
                        </td>--}}
                        <td>
                            <a target="_blank" href="{{$row->url}}">
                                {{$row->url}}
                            </a>
                        </td>
                        <td>{{$row->section}}</td>
                        <td>{{$row->w_countrycode}}</td>
                        <td>{{$row->w_phone}}</td>
                        <td>
                            @if ($row->w_syllabus == '1')
                            <span class="badge bg-success">SENT</span>
                            @else
                            <span class="badge bg-danger">FAILED</span>
                            @endif
                        </td>
                        <td>
                            @if ($row->email_sent == 1)
                            <span class="badge bg-success">SENT</span>
                            @else
                            <span class="badge bg-danger">PENDING</span>
                            @endif
                        </td>
                        <td>{{datetimeFormatter($row->created_at)}}</td>
                        <td>
                            <a href="javascript:void(0);" class="action-icon" onclick="largeModal('{{ url(route('contact.view',['id' => $row->id])) }}', 'View')"> <i class="mdi mdi-account-eye"></i></a>
                            {{--<a href="javascript:void(0);" class="action-icon" onclick="confirmModal('{{ url(route('contact.delete', $row->id)) }}', responseHandler)"><i class="mdi mdi-delete"></i></a>--}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination links -->
        <div class="leads-contact1">
            {{-- $contacts->links('pagination.custom') --}}
            {{ $contacts->appends(request()->query())->links('pagination.custom') }}
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
</script>
@endsection
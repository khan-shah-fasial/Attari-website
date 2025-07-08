@extends('backend.layouts.app') 

@section('page.name', 'contact')

@section('page.content')
<div class="card">
   <div class="card-body">
      <div class="row mb-2">
         <div class="col-sm-5">
            {{--<h3>List</h3>--}}
         </div>

      </div>
      <div class="table-responsive">
      <table id="basic-datatable" class="table dt-responsive nowrap w-100">
        <thead>
            <tr>
                <th>#</th>
                <th>Email</th>
                <th>Interested Course</th>
                <th>Date</th>
                {{--<th>Action</th> --}}
            </tr>
        </thead>
        <tbody>
            @php $i = 1; @endphp
            @foreach($newsletter as $row)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$row->email}}</td>

                <td>{{$row->services}}</td>
                <td>{{datetimeFormatter($row->created_at)}}</td>
                {{--<td>

                    <a href="{{ url(route('contact.status', ['id' => $row->id, 'status' => ($row->status == '1') ? '0' : '1'])) }}" class="action-icon">
                        @if ($row->status == '1')
                            <i class="ri-eye-off-fill"></i>
                        @else
                            <i class="ri-eye-fill"></i>
                        @endif
                    </a>
                    
                    <a href="javascript:void(0);" class="action-icon" onclick="largeModal('{{ url(route('contact.view',['id' => $row->id])) }}', 'View')"> <i class="mdi mdi-account-eye"></i></a>

                    <a href="javascript:void(0);" class="action-icon" onclick="largeModal('{{ url(route('contact.edit',['id' => $row->id])) }}', 'Edit contact')"> <i class="mdi mdi-square-edit-outline"></i></a>

                    <a href="javascript:void(0);" class="action-icon" onclick="confirmModal('{{ url(route('contact.delete', $row->id)) }}', responseHandler)"><i class="mdi mdi-delete"></i></a>
                </td> --}}
            </tr>
            @endforeach
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
</script>
@endsection
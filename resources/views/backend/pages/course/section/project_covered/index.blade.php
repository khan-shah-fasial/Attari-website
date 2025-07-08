<!-----==================== Project covered Course ==========----------------------->
<div class="card">
    <div class="card-body">
        <div class="col-md-12">
            <h4 class="header-title"><b>Project covered</b></h4>
            <hr>
        </div>

        <!--============== Project covered ==============---------->
        @include('backend.pages.course.section.project_covered.add')
        <!--============== Project covered ==============---------->

    </div>
    <!-- end card-body-->
</div>
<!---==================================== project_covered table ==============------------------->
@php 
    $project_covered = DB::table('project_covered')->where('course_id',$course->id)->orderBy('title_no', 'ASC')->get();
@endphp
<div class="card">
    <div class="card-body">
       <div class="table-responsive">
       <table id="basic-datatable" class="table dt-responsive nowrap w-100">
         <thead>
             <tr>
                {{-- <th>#</th> --}}
                 <th>Title No</th>
                 <th>Name</th>
                 <th>Description</th>
                 <th>Icon</th>
                 <th>Status</th>
                 <th>Action</th>
             </tr>
         </thead>
         <tbody>
             @php $i = 1; @endphp
             @foreach($project_covered as $row)
             <tr>
                {{-- <td>{{$i++}}</td> --}}
                 <td>{{ $row->title_no }}</td>
                 <td>{{$row->title}}</td>
                 <td>
                     @php echo html_entity_decode($row->description) @endphp
                 </td>
                 <td>
                     <a target="_blank" href="{{ asset('storage/' . $row->icon) }}">
                         View
                     </a>
                 </td>              
                 <td>
                     @if($row->status)
                     <span class="badge bg-success">Active</span>
                     @else
                     <span class="badge bg-danger">Inctive</span>
                     @endif
                 </td>
                 <td>
                     <a href="{{ url(route('project_covered.status', ['id' => $row->id, 'status' => ($row->status == '1') ? '0' : '1'])) }}" class="action-icon">
                         @if ($row->status == '1')
                             <i class="ri-eye-off-fill" title="Inactive"></i>
                         @else
                             <i class="ri-eye-fill" title="Active"></i>
                         @endif
                     </a>
 
                     <a href="javascript:void(0);" class="action-icon" onclick="largeModal('{{ url(route('project_covered.edit',['id' => $row->id])) }}', 'Edit Project covered')"> <i class="mdi mdi-square-edit-outline" title="Edit"></i></a>
 
                     <a href="javascript:void(0);" class="action-icon" onclick="confirmModal('{{ url(route('project_covered.delete', $row->id)) }}', responseHandler)"><i class="mdi mdi-delete" title="Delete"></i></a>
                 </td>
             </tr>
             @endforeach
     </table>
       </div>
    </div>
    <!-- end card-body-->
 </div>
 
 <!---==================================== project_covered table ==============------------------->


<!-----==================== project_covered ==========----------------------->
<!-----==================== Text Review Course ==========----------------------->
<div class="card">
    <div class="card-body">
        <div class="col-md-12">
            <h4 class="header-title"><b>Text Review</b></h4>
            <hr>
        </div>

        <!--============== Text Review ==============---------->
        @include('backend.pages.course.section.textreview.add')
        <!--============== Text Review ==============---------->

    </div>
    <!-- end card-body-->
</div>
<!---==================================== text review table ==============------------------->
@php 
    $textreviews = DB::table('text_reviews')->where('course_id',$course->id)->orderBy('id', 'DESC')->get();
@endphp
<div class="card">
    <div class="card-body">
       <div class="table-responsive">
       <table id="basic-datatable" class="table dt-responsive nowrap w-100">
         <thead>
             <tr>
                 <th>#</th>
                 <th>Name</th>
                 <th>Description</th>
                 <th>Type</th>
                 <th>Image</th>
                 <th>Status</th>
                 <th>Action</th>
             </tr>
         </thead>
         <tbody>
             @php $i = 1; @endphp
             @foreach($textreviews as $row)
             <tr>
                 <td>{{$i++}}</td>
                 <td>{{$row->name}}</td>
                 <td>
                     @php echo html_entity_decode($row->description) @endphp
                 </td>
                 <td>
                     {{$row->type}}
                 </td>
                 <td>
                     <a target="_blank" href="{{ asset('storage/' . $row->thumbnail) }}">
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
                     <a href="{{ url(route('text.status', ['id' => $row->id, 'status' => ($row->status == '1') ? '0' : '1'])) }}" class="action-icon">
                         @if ($row->status == '1')
                             <i class="ri-eye-off-fill" title="Inactive"></i>
                         @else
                             <i class="ri-eye-fill" title="Active"></i>
                         @endif
                     </a>
 
                     <a href="javascript:void(0);" class="action-icon" onclick="largeModal('{{ url(route('text.edit',['id' => $row->id])) }}', 'Edit Text Review')"> <i class="mdi mdi-square-edit-outline" title="Edit"></i></a>
 
                     <a href="javascript:void(0);" class="action-icon" onclick="confirmModal('{{ url(route('text.delete', $row->id)) }}', responseHandler)"><i class="mdi mdi-delete" title="Delete"></i></a>
                 </td>
             </tr>
             @endforeach
     </table>
       </div>
    </div>
    <!-- end card-body-->
 </div>
 
 <!---==================================== text review table ==============------------------->


<!-----==================== Batch schedule ==========----------------------->
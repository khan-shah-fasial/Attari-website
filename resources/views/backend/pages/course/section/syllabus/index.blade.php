<!-----==================== syllabus Course ==========----------------------->
<div class="card">
    <div class="card-body">
        <div class="col-md-12">
            <h4 class="header-title"><b>Course Content</b></h4>
            <hr>
        </div>

        <!--============== syllabus ==============---------->
        @include('backend.pages.course.section.syllabus.add')
        <!--============== syllabus ==============---------->

    </div>
    <!-- end card-body-->
</div>
<!---==================================== syllabus table ==============------------------->
@php
    $syllabus = DB::table('syllabus')
        ->where('course_id', $course->id)->orderBy('title_no', 'ASC')
        ->get();
@endphp
<div class="card">
    <div class="card-body">
        <div class="text-end">
            <a target="_blank" href="{{ url(route('syllabus.pdf', ['courseId' => $course->id])) . '?display=true' }}" class="btn btn-danger mb-2">Preview Syllabus PDF</a>
        </div>
        
        <div class="table-responsive">
            <table id="basic-datatable" class="table dt-responsive nowrap1 w-100">
                <thead>
                    <tr>
                        {{--<th>#</th>--}}
                        <th>Title No</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 1; @endphp
                    @foreach ($syllabus as $row)
                        <tr>
                            {{--<td>{{ $i++ }}</td>---}}
                            <td>{{ $row->title_no }}</td>
                            <td>{{ $row->title }}</td>
                            <td>@php echo html_entity_decode($row->description) @endphp</td>
                            <td>
                                @if ($row->status)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inctive</span>
                                @endif
                            </td>
                            <td>{{ datetimeFormatter($row->created_at) }}</td>
                            <td>
                                <a href="{{ url(route('syllabus.status', ['id' => $row->id, 'status' => $row->status == '1' ? '0' : '1'])) }}"
                                    class="action-icon">
                                    @if ($row->status == '1')
                                        <i class="ri-eye-off-fill" title="Inactive"></i>
                                    @else
                                        <i class="ri-eye-fill" title="Active"></i>
                                    @endif
                                </a>

                                <a href="javascript:void(0);" class="action-icon"
                                    onclick="smallModal('{{ url(route('syllabus.edit', ['id' => $row->id])) }}', 'Edit Faq')">
                                    <i class="mdi mdi-square-edit-outline" title="Edit"></i></a>

                                <a href="javascript:void(0);" class="action-icon"
                                    onclick="confirmModal('{{ url(route('syllabus.delete', $row->id)) }}', responseHandler)"><i
                                        class="mdi mdi-delete" title="Delete"></i></a>
                            </td>
                        </tr>
                    @endforeach
            </table>
        </div>
        <!-- end card-body-->
    </div>
</div>
    <!---==================================== syllabus table ==============------------------->


    <!-----==================== syllabus ==========----------------------->

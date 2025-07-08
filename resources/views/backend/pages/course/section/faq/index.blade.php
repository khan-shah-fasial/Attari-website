<!-----==================== Text Review Course ==========----------------------->
<div class="card">
    <div class="card-body">
        <div class="col-md-12">
            <h4 class="header-title"><b>FAQs</b></h4>
            <hr>
        </div>

        <!--============== Text Review ==============---------->
        @include('backend.pages.course.section.faq.add')
        <!--============== Text Review ==============---------->

    </div>
    <!-- end card-body-->
</div>
<!---==================================== text review table ==============------------------->
@php
    $faq = DB::table('faqs')
        ->where('course_id', $course->id)->orderBy('title_no', 'ASC')
        ->get();
@endphp
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="basic-datatable" class="table dt-responsive nowrap1 w-100">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Status</th>
                        <th>Zone</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 1; @endphp
                    @foreach ($faq as $row)
                        <tr>
                            <td>{{ $row->title_no }}</td>
                            <td>{{ $row->question }}</td>
                            <td>@php echo html_entity_decode($row->answer) @endphp</td>
                            <td>
                                @if ($row->status)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inctive</span>
                                @endif
                            </td>
                            <td>
                                @if ($row->zone == 1)
                                    <span class="badge bg-secondary">City/Country</span>
                                @else
                                    <span class="badge bg-success">Main</span>
                                @endif
                            </td>

                            <td>{{ datetimeFormatter($row->created_at) }}</td>
                            <td>
                                <a href="{{ url(route('faq.status', ['id' => $row->id, 'status' => $row->status == '1' ? '0' : '1'])) }}"
                                    class="action-icon">
                                    @if ($row->status == '1')
                                        <i class="ri-eye-off-fill" title="Inactive"></i>
                                    @else
                                        <i class="ri-eye-fill" title="Active"></i>
                                    @endif
                                </a>

                                <a href="javascript:void(0);" class="action-icon"
                                    onclick="smallModal('{{ url(route('faq.edit', ['id' => $row->id])) }}', 'Edit Faq')">
                                    <i class="mdi mdi-square-edit-outline" title="Edit"></i></a>

                                <a href="javascript:void(0);" class="action-icon"
                                    onclick="confirmModal('{{ url(route('faq.delete', $row->id)) }}', responseHandler)"><i
                                        class="mdi mdi-delete" title="Delete"></i></a>
                            </td>
                        </tr>
                    @endforeach
            </table>
        </div>
        <!-- end card-body-->
    </div>
</div>
    <!---==================================== text review table ==============------------------->




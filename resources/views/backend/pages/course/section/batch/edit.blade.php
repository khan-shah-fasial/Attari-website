<!---------------------------------- edit form --------------------------------------->
<style>
    .mrgtop23
    {
        margin-top:-23px;
    }
    html[data-layout-mode=detached]:not([data-layout=topnav]) .wrapper {
    max-width: 98% !important;
    margin: 0 auto;
}
#batch_detail_add_more1 .col-md-3, .col-md-2, .col-6{padding-right:0px;}
</style>
<section>
    <form id="edit_batch_form" action="{{ url(route('batch.update')) }}" method="post"
        enctype="multipart/form-data">
        @csrf
        <div class="row">
                <div class="card">
                    <div class="card-body">

                        <input type="hidden" class="form-control" name="id" value="{{ $batch->id }}">

                        <input type="hidden" class="form-control" name="course_id" value="{{ $course->id }}">

                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="header-title"><b>Paced Training</b></h4>
                                <hr>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group mb-3">
                                    <label>Title <span class="red">*</span></label>
                                    <input type="text" class="form-control" name="paced_title" value="{{ $batch->paced_title }}" required>
                                </div>
                            </div>
                                    
                            <div class="col-sm-8">
                                <div class="form-group mb-3">
                                    <label>Pointer <span class="red">*</span></label>
                                    <div id="pointer_list_add_more1" style=""> @php $i = 1; $paced_pointer_list = json_decode($batch->paced_pointer_list); 
                                    if(!empty($paced_pointer_list)) { foreach ($paced_pointer_list as $row){  @endphp
                                        <div class="pointer_list">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-11">
                                                        <div class="row">
                                                            <input type="text" style="margin-bottom: 3px;" class="form-control" name="paced_pointer_list[]" placeholder="Enter pointer List here..." value="{{ $row }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1"> @if($i == 1) <i style="font-size: 25px; color: #0b0; cursor: pointer; margin-left: 5px;" class="ri-add-circle-fill" id="add_pointer_list1"></i> @else <i style="font-size: 25px; color: red; cursor: pointer; margin-left: 5px;" class="ri-delete-bin-2-fill" onclick="remove_pointer_list1($(this));"></i> @endif </div>
                                                </div>
                                            </div>
                                            </br>
                                        </div> @php $i++; } @endphp  @php } else { @endphp
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-11">
                                                        <div class="row">
                                                            <input type="text" style="margin-bottom: 5px;" class="form-control" name="paced_pointer_list[]" placeholder="Enter pointer List here..." required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1"><i style="font-size: 25px; color: #0b0; cursor: pointer; margin-left: 5px;" class="ri-add-circle-fill" id="add_pointer_list1"></i>
                                                    </div>
                                            </div>
                                            </br>
                                        </div> @php } @endphp </div>
                                </div>
                            </div>


                        </div>

<!-------==========================================================-------------------->

                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="header-title"><b>Online / Classroom</b></h4>
                                <hr>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group mb-3">
                                    <label>Title <span class="red">*</span></label>
                                    <input type="text" class="form-control" name="oc_title" value="{{ $batch->oc_title }}" required>
                                </div>
                            </div>
                                    
                            <div class="col-sm-8">
                                <div class="form-group mb-3">
                                    <label>Pointer <span class="red">*</span></label>
                                    <div id="oc_pointer_list_add_more1" style=""> 
                                    @php $i = 1; $oc_pointer_list = json_decode($batch->oc_pointer_list); 
                                    if(!empty($oc_pointer_list)) { foreach ($oc_pointer_list as $row){  @endphp
                                        <div class="oc_pointer_list">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-11">
                                                        <div class="row">
                                                            <input type="text" style="margin-bottom: 3px;" class="form-control" name="oc_pointer_list[]" placeholder="Enter pointer List here..." value="{{ $row }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1"> @if($i == 1) <i style="font-size: 25px; color: #0b0; cursor: pointer; margin-left: 5px;" class="ri-add-circle-fill" id="add_oc_pointer_list1"></i> @else <i style="font-size: 25px; color: red; cursor: pointer; margin-left: 5px;" class="ri-delete-bin-2-fill" onclick="remove_oc_pointer_list1($(this));"></i> @endif </div>
                                                </div>
                                            </div>
                                            </br>
                                        </div> @php $i++; } @endphp  @php } else { @endphp
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-11">
                                                        <div class="row">
                                                            <input type="text" style="margin-bottom: 5px;" class="form-control" name="oc_pointer_list[]" placeholder="Enter pointer List here..." required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1"><i style="font-size: 25px; color: #0b0; cursor: pointer; margin-left: 5px;" class="ri-add-circle-fill" id="add_oc_pointer_list1"></i>
                                                    </div>
                                            </div>
                                            </br>
                                        </div> @php } @endphp </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group mb-3">
                                    <label>Date / Schedule / Time <span class="red">*</span></label>
                                    <div id="batch_detail_add_more1" style=""> 
                                    @php $i = 1; $batch_detail = json_decode($batch->batch_detail, true); 
                                    if(!empty($batch_detail)) { foreach ($batch_detail as $row){  @endphp
                                        <div class="batch_detail">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-11">
                                                        <div class="row">

                                                            <div class="col col-md-2">
                                                                <input type="date" style="margin-bottom: 5px;" class="form-control" name="batch_detail_date[]" placeholder="Enter Date here..." 
                                                                value="{{ date('Y-m-d', strtotime($row['date'])) }}" required>
                                                            </div>

                                                            <div class="col col-md-3">
                                                                <input class="form-control" name="batch_detail_sch[]" placeholder="Enter Schedule here..." 
                                                                value="{{ $row['schedule'] }}" required>
                                                            </div>

                                                            <div class="col col-md-3">
                                                                <input class="form-control" name="batch_detail_remark[]" placeholder="Enter Remark here..." value="{{ $row['remark'] }}" required>
                                                            </div>

                                                            <div class="col col-md-4">
                                                                <div class="row">
                                                                    <div class="col-6 mrgtop23">From<input class="form-control" type="time" required value="{{ isset($row['start_time']) ? $row['start_time'] : '' }}" name="batch_detail_start_time[]">  </div>
                                                                    <div class="col-6 mrgtop23">To<input class="form-control" type="time" required value="{{ isset($row['end_time']) ? $row['end_time'] : '' }}" name="batch_detail_end_time[]"></div>
                                                                </div>
                                                                
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-1"> @if($i == 1) <i style="font-size: 25px; color: #0b0; cursor: pointer; margin-left: 5px;" class="ri-add-circle-fill" id="add_batch_detail1"></i> @else <i style="font-size: 25px; color: red; cursor: pointer; margin-left: 5px;" class="ri-delete-bin-2-fill" onclick="remove_batch_detail1($(this));"></i> @endif </div>
                                                </div>
                                            </div>
                                            </br>
                                        </div> @php $i++; } @endphp  @php } else { @endphp
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-11">
                                                        <div class="row">

                                                            <div class="col col-md-3">
                                                                <input type="date" style="margin-bottom: 5px;" class="form-control" name="batch_detail_date[]" placeholder="Enter Date here..." required>
                                                            </div>

                                                            <div class="col col-md-3">
                                                                <input class="form-control" name="batch_detail_sch[]" placeholder="Enter Schedule here..." required>
                                                            </div>

                                                            <div class="col col-md-3">
                                                                <input class="form-control" name="batch_detail_remark[]" placeholder="Enter Remark here..." required>
                                                            </div>

                                                            <div class="col col-md-3">
                                                                 <div class="row">
                                                                    <div class="col-6"><input type="time" required name="batch_detail_start_time[]"> From </div>
                                                                    <div class="col-6"><input type="time" required name="batch_detail_end_time[]"> To</div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-1"><i style="font-size: 25px; color: #0b0; cursor: pointer; margin-left: 5px;" class="ri-add-circle-fill" id="add_batch_detail1"></i>
                                                    </div>
                                                </div>
                                            </br>
                                        </div> @php } @endphp </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group mb-3">
                                    <label>OFF Percentage <span class="red">*</span></label>
                                    <input type="text" class="form-control" name="off_percentage" value="{{ $batch->off_percentage }}" required>
                                </div>
                            </div>

                        </div>
<!-------==========================================================-------------------->

                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="header-title"><b>Corporate Training</b></h4>
                                <hr>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group mb-3">
                                    <label>Title <span class="red">*</span></label>
                                    <input type="text" class="form-control" name="corp_title" value="{{ $batch->corp_title }}" required>
                                </div>
                            </div>
                                    
                            <div class="col-sm-8">
                                <div class="form-group mb-3">
                                    <label>Pointer <span class="red">*</span></label>
                                    <div id="corp_pointer_list_add_more1" style=""> 
                                    @php $i = 1; $corp_pointer_list = json_decode($batch->corp_pointer_list); 
                                    if(!empty($corp_pointer_list)) { foreach ($corp_pointer_list as $row){  @endphp
                                        <div class="corp_pointer_list">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-11">
                                                        <div class="row">
                                                            <input type="text" style="margin-bottom: 3px;" class="form-control" name="corp_pointer_list[]" placeholder="Enter pointer List here..." value="{{ $row }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1"> @if($i == 1) <i style="font-size: 25px; color: #0b0; cursor: pointer; margin-left: 5px;" class="ri-add-circle-fill" id="add_corp_pointer_list1"></i> @else <i style="font-size: 25px; color: red; cursor: pointer; margin-left: 5px;" class="ri-delete-bin-2-fill" onclick="remove_corp_pointer_list1($(this));"></i> @endif </div>
                                                </div>
                                            </div>
                                            </br>
                                        </div> @php $i++; } @endphp  @php } else { @endphp
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-11">
                                                        <div class="row">
                                                            <input type="text" style="margin-bottom: 5px;" class="form-control" name="corp_pointer_list[]" placeholder="Enter pointer List here..." required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1"><i style="font-size: 25px; color: #0b0; cursor: pointer; margin-left: 5px;" class="ri-add-circle-fill" id="add_corp_pointer_list1"></i>
                                                    </div>
                                            </div>
                                            </br>
                                        </div> @php } @endphp </div>
                                </div>
                            </div>


                        </div>

<!------===========================================================------------------>
                        
                        <div class="col-sm-12">
                            <div class="d-flex justify-content-start">
                                <div class="form-check form-switch d-none">

                                    <input id="batch_check" class="form-check-input" type="checkbox"
                                    name="batch_check" value="0" @if($batch->status == '0') checked @endif>

                                    <label class="form-check-label" for="batch_check">Hide Batch Schedule
                                    </label>

                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <div class="form-group d-grid mb-3 text-end">
                                    <button type="submit" class="btn btn-block btn-primary">Update</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


        </div>
    </form>
</section>

<!---------------------------------- edit form --------------------------------------->

@section('component.scripts')
    <script>
        function remove_pointer_list1(_this) {
            _this.closest(".pointer_list").remove();
        }

        function remove_oc_pointer_list1(_this) {
            _this.closest(".oc_pointer_list").remove();
        }

        function remove_batch_detail1(_this) {
            _this.closest(".batch_detail").remove();
        }

        function remove_corp_pointer_list1(_this) {
            _this.closest(".corp_pointer_list").remove();
        }


        $(document).ready(function() {
            initValidate('#edit_batch_form');
            initValidate('#updating_batch_schema_form');
            initValidate('#updating_heading_form');
            initSelect2('.select2');
            initTrumbowyg('.trumbowyg');
        });

        $("#edit_batch_form").submit(function(e) {
            var form = $(this);
            ajaxSubmit(e, form, responseHandler);
        });

        $("#updating_batch_schema_form").submit(function(e) {
            var form = $(this);
            ajaxSubmit(e, form, responseHandler);
        });

        $("#updating_heading_form").submit(function(e) {
            var form = $(this);
            ajaxSubmit(e, form, responseHandler);
        });

        var responseHandler = function(response) {
            location.reload();
        }

        $("#add_pointer_list1").on("click", function() {

        var new_pointer_list1 = `
            <div class="pointer_list form-group">
                <div class="row">
                    <div class="col-md-11">
                        <div class="row">
                            <input type="text" style="margin-bottom: 3px;" class="form-control" name="paced_pointer_list[]" placeholder="Enter pointer List here...">
                        </div>
                    </div>
                    <div class="col-md-1"><i style="font-size: 25px; color: red; cursor: pointer; margin-left: 5px;" class="ri-delete-bin-2-fill" onclick="remove_pointer_list1($(this));"></i></div>
                </div>
                </br>
            </div>
        `;

        $("#pointer_list_add_more1").append(new_pointer_list1);
        });


        $("#add_oc_pointer_list1").on("click", function() {

        var new_oc_pointer_list1 = `
            <div class="oc_pointer_list form-group">
                <div class="row">
                    <div class="col-md-11">
                        <div class="row">
                            <input type="text" style="margin-bottom: 3px;" class="form-control" name="oc_pointer_list[]" placeholder="Enter pointer List here...">
                        </div>
                    </div>
                    <div class="col-md-1"><i style="font-size: 25px; color: red; cursor: pointer; margin-left: 5px;" class="ri-delete-bin-2-fill" onclick="remove_oc_pointer_list1($(this));"></i></div>
                </div>
                </br>
            </div>
        `;

        $("#oc_pointer_list_add_more1").append(new_oc_pointer_list1);
        });

        $("#add_batch_detail1").on("click", function() {

        var new_batch_detail1 = `
            <div class="batch_detail form-group">
                <div class="row">
                    <div class="col-md-11">
                        <div class="row">

                            <div class="col col-md-2">
                                <input type="date" style="margin-bottom: 5px;" class="form-control" name="batch_detail_date[]" placeholder="Enter Date here...">
                            </div>

                            <div class="col col-md-3">
                                <input class="form-control" name="batch_detail_sch[]" placeholder="Enter Schedule here...">
                            </div>

                            <div class="col col-md-3">
                                <input class="form-control" name="batch_detail_remark[]" placeholder="Enter Remark here...">
                            </div>

                            <div class="col col-md-4">
                                <div class="row">
                                    <div class="col-6 mrgtop23">From<input class="form-control" type="time" required name="batch_detail_start_time[]">  </div>
                                    <div class="col-6 mrgtop23">To<input class="form-control"  type="time" required name="batch_detail_end_time[]"> </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-1"><i style="font-size: 25px; color: red; cursor: pointer; margin-left: 5px;" class="ri-delete-bin-2-fill" onclick="remove_batch_detail1($(this));"></i></div>
                </div>
                </br>
            </div>
        `;

        $("#batch_detail_add_more1").append(new_batch_detail1);
        });

        $("#add_corp_pointer_list1").on("click", function() {

        var new_corp_pointer_list1 = `
            <div class="corp_pointer_list form-group">
                <div class="row">
                    <div class="col-md-11">
                        <div class="row">
                            <input type="text" style="margin-bottom: 3px;" class="form-control" name="corp_pointer_list[]" placeholder="Enter pointer List here...">
                        </div>
                    </div>
                    <div class="col-md-1"><i style="font-size: 25px; color: red; cursor: pointer; margin-left: 5px;" class="ri-delete-bin-2-fill" onclick="remove_corp_pointer_list1($(this));"></i></div>
                </div>
                </br>
            </div>
        `;

        $("#corp_pointer_list_add_more1").append(new_corp_pointer_list1);
        });


    </script>
@endsection
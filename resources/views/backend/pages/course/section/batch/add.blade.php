<!------------------------- Add Form ------------------------------------>

<section>
    <form id="add_batch_form" action="{{ url(route('batch.create')) }}" method="post"
        enctype="multipart/form-data">
        @csrf
        <div class="row">
                <div class="card">
                    <div class="card-body">

                        <input type="hidden" class="form-control" name="course_id" value="{{ $course->id }}">

                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="header-title"><b>Paced Training</b></h4>
                                <hr>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group mb-3">
                                    <label>Title <span class="red">*</span></label>
                                    <input type="text" class="form-control" name="paced_title" value="" required>
                                </div>
                            </div>
                                    
                            <div class="col-sm-8">
                                <div class="form-group mb-3">
                                    <label>Pointer <span class="red">*</span></label>
                                    <div id="pointer_list_add_more" style="">
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-11">
                                                <div class="row">
                                                    <input type="text" style="margin-bottom: 5px;" class="form-control" name="paced_pointer_list[]" placeholder="Enter pointer List here..." required>
                                                </div>
                                            </div>
                                            <div class="col-md-1"><i style="font-size: 25px; color: #0b0; cursor: pointer; margin-left: 5px;" class="ri-add-circle-fill" id="add_pointer_list"></i></div>
                                            </div>
                                            </br>
                                        </div>
                                    </div>
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
                                    <input type="text" class="form-control" name="oc_title" value="" required>
                                </div>
                            </div>
                                    
                            <div class="col-sm-8">
                                <div class="form-group mb-3">
                                    <label>Pointer <span class="red">*</span></label>
                                    <div id="oc_pointer_list_add_more" style="">
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-11">
                                                <div class="row">
                                                    <input type="text" style="margin-bottom: 5px;" class="form-control" name="oc_pointer_list[]" placeholder="Enter pointer List here..." required>
                                                </div>
                                            </div>
                                            <div class="col-md-1"><i style="font-size: 25px; color: #0b0; cursor: pointer; margin-left: 5px;" class="ri-add-circle-fill" id="add_oc_pointer_list"></i></div>
                                            </div>
                                            </br>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-12">
                                <div class="form-group mb-3">
                                    <label>Date / Schedule / Time</label>
                                    <div id="batch_detail_add_more" style="">
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
                                                            <div class="col-6"><input type="time" id="timeInput" name="batch_detail_start_time[]"> From </div>
                                                            <div class="col-6"><input type="time" id="timeInput" name="batch_detail_end_time[]"> To</div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-1"><i style="font-size: 25px; color: #0b0; cursor: pointer; margin-left: 5px;" class="ri-add-circle-fill" id="add_batch_detail"></i></div>
                                            </div>
                                            </br>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group mb-3">
                                    <label>OFF Percentage <span class="red">*</span></label>
                                    <input type="text" class="form-control" name="off_percentage" value="" required>
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
                                    <input type="text" class="form-control" name="corp_title" value="" required>
                                </div>
                            </div>
                                    
                            <div class="col-sm-8">
                                <div class="form-group mb-3">
                                    <label>Pointer</label>
                                    <div id="corp_pointer_list_add_more" style="">
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-11">
                                                <div class="row">
                                                    <input type="text" style="margin-bottom: 5px;" class="form-control" name="corp_pointer_list[]" placeholder="Enter pointer List here..." required>
                                                </div>
                                            </div>
                                            <div class="col-md-1"><i style="font-size: 25px; color: #0b0; cursor: pointer; margin-left: 5px;" class="ri-add-circle-fill" id="add_corp_pointer_list"></i></div>
                                            </div>
                                            </br>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

<!------===========================================================------------------>
                        
                        <div class="col-sm-12">
                            <div class="d-flex justify-content-start">
                                <div class="form-check form-switch">

                                    <input id="batch_check" class="form-check-input" type="checkbox"
                                        name="batch_check" value="0">

                                    <label class="form-check-label" for="batch_check">Hide Batch Schedule
                                    </label>

                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <div class="form-group d-grid mb-3 text-end">
                                    <button type="submit" class="btn btn-block btn-primary">Create</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


        </div>
    </form>
</section>

<!------------------------- Add Form ------------------------------------>
@section('component.scripts')
    <script>
        $(document).ready(function() {
            initValidate('#add_batch_form');
            initValidate('#updating_batch_schema_form');
            initValidate('#updating_heading_form');
            initSelect2('.select2');
            initTrumbowyg('.trumbowyg');
        });

        $("#add_batch_form").submit(function(e) {
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

        function remove_pointer_list(_this) {
            _this.closest(".pointer_list").remove();
        }

        function remove_oc_pointer_list(_this) {
            _this.closest(".oc_pointer_list").remove();
        }

        function remove_batch_detail(_this) {
            _this.closest(".batch_detail").remove();
        }

        function remove_corp_pointer_list(_this) {
            _this.closest(".corp_pointer_list").remove();
        }

        $("#add_pointer_list").on("click", function() {

        var new_pointer_list = `
            <div class="pointer_list form-group">
                <div class="row">
                    <div class="col-md-11">
                        <div class="row">
                            <input type="text" style="margin-bottom: 3px;" class="form-control" name="paced_pointer_list[]" placeholder="Enter pointer List here...">
                        </div>
                    </div>
                    <div class="col-md-1"><i style="font-size: 25px; color: red; cursor: pointer; margin-left: 5px;" class="ri-delete-bin-2-fill" onclick="remove_pointer_list($(this));"></i></div>
                </div>
                </br>
            </div>
        `;

        $("#pointer_list_add_more").append(new_pointer_list);
        });


        $("#add_oc_pointer_list").on("click", function() {

        var new_oc_pointer_list = `
            <div class="oc_pointer_list form-group">
                <div class="row">
                    <div class="col-md-11">
                        <div class="row">
                            <input type="text" style="margin-bottom: 3px;" class="form-control" name="oc_pointer_list[]" placeholder="Enter pointer List here...">
                        </div>
                    </div>
                    <div class="col-md-1"><i style="font-size: 25px; color: red; cursor: pointer; margin-left: 5px;" class="ri-delete-bin-2-fill" onclick="remove_oc_pointer_list($(this));"></i></div>
                </div>
                </br>
            </div>
        `;

        $("#oc_pointer_list_add_more").append(new_oc_pointer_list);
        });

        $("#add_batch_detail").on("click", function() {

        var new_batch_detail = `
            <div class="batch_detail form-group">
                <div class="row">
                    <div class="col-md-11">
                        <div class="row">

                            <div class="col col-md-3">
                                <input type="date" style="margin-bottom: 5px;" class="form-control" name="batch_detail_date[]" placeholder="Enter Date here...">
                            </div>

                            <div class="col col-md-3">
                                <input class="form-control" name="batch_detail_sch[]" placeholder="Enter Schedule here...">
                            </div>

                            <div class="col col-md-3">
                                <input class="form-control" name="batch_detail_remark[]" placeholder="Enter Remark here...">
                            </div>

                            <div class="col col-md-3">
                                <div class="row">
                                    <div class="col-6"><input type="time" id="timeInput" name="batch_detail_start_time[]"> From </div>
                                    <div class="col-6"><input type="time" id="timeInput" name="batch_detail_end_time[]"> To</div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-1"><i style="font-size: 25px; color: red; cursor: pointer; margin-left: 5px;" class="ri-delete-bin-2-fill" onclick="remove_batch_detail($(this));"></i></div>
                </div>
                </br>
            </div>
        `;

        $("#batch_detail_add_more").append(new_batch_detail);
        });

        $("#add_corp_pointer_list").on("click", function() {

        var new_corp_pointer_list = `
            <div class="corp_pointer_list form-group">
                <div class="row">
                    <div class="col-md-11">
                        <div class="row">
                            <input type="text" style="margin-bottom: 3px;" class="form-control" name="corp_pointer_list[]" placeholder="Enter pointer List here...">
                        </div>
                    </div>
                    <div class="col-md-1"><i style="font-size: 25px; color: red; cursor: pointer; margin-left: 5px;" class="ri-delete-bin-2-fill" onclick="remove_corp_pointer_list($(this));"></i></div>
                </div>
                </br>
            </div>
        `;

        $("#corp_pointer_list_add_more").append(new_corp_pointer_list);
        });


    </script>
@endsection
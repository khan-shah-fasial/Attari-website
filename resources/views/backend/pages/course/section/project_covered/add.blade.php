<!---================================ SECTION heading =======================--->
<section>
    @php 
        $heading = DB::table('courses')->where('id', $course->id)->value('project_section_heading');
    @endphp
    <form id="updating_heading_form" action="{{ url(route('course.update_heading')) }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" class="form-control" name="course_id" value="{{ $course->id }}">
        <input type="hidden" class="form-control" name="section" value="project">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group mb-3">
                    <label>Project Section Title <span class="red">*</span></label>
                    <input maxlength="255" type="text" class="form-control" name="heading" value="{{ $heading }}" required>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group mb-3 text-end">
                    <button type="submit" class="btn btn-block btn-primary">Update</button>
                </div>
            </div>
        </div>
    </form>
</section>

<!---================================ SECTION heading =======================--->

<!----------======================Text Add Form =============================----------------->
<section>
    <form id="add_project_covered_form" action="{{url(route('project_covered.create'))}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            
            <input type="hidden" class="form-control" name="course_id" value="{{ $course->id }}">

            <div class="col-sm-2">
                <div class="form-group mb-3">
                    <label>Title No</label>
                    <input type="text" class="form-control" name="title_no" value="" required>
                </div>
            </div>

            <div class="col-sm-5">
                <div class="form-group mb-3">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" value="" required>
                </div>
            </div>

            <div class="col-sm-5">
                <div class="form-group mb-3">
                    <label>Icon  <span class="font-size11">(Max file size 80kb - 1125*196)</span></label>
                    <input class="form-control" type="file" id="icon" name="icon" required>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group mb-3">
                    <label>Description</label>
                    <textarea class="form-control trumbowyg" name="description" rows="2" required></textarea>
                </div>
            </div>
    
            <div class="col-sm-12 d-flex justify-content-end">
                <div class="form-group d-grid mb-3 text-end">
                    <button type="submit" class="btn btn-block btn-primary">Create</button>
                </div>
            </div>
  
            
        </div>
    </form>
</section>

@section('component.scripts')
<script>
    $(document).ready(function() {
        initValidate('#add_project_covered_form');
        initValidate('updating_heading_form');
        initSelect2('.select2');
        initTrumbowyg('.trumbowyg');
    });

    $("#add_project_covered_form").submit(function(e) {
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

</script>
@endsection
<!----------======================Text Add Form =============================----------------->
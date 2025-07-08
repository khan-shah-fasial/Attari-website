
<!---================================ SECTION schema =======================--->

<div class="col-md-12">
    <h4 class="header-title"><b>Video Review Schema</b></h4>
</div>

<section>
    @php 
        $section_schema = DB::table('courses')->where('id', $course->id)->value('video_section_schema');
    @endphp
    <form id="updating_schema_form" action="{{ url(route('course.update_schema')) }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" class="form-control" name="course_id" value="{{ $course->id }}">
        <input type="hidden" class="form-control" name="section" value="video">


        <div class="row">
            <div class="col-sm-12">
                <div class="form-group mb-3">
                    <label>Video Schema <span class="red">*</span></label>
                <textarea class="form-control" name="section_schema" id="section_schema" rows="5" required>
                    @php echo html_entity_decode($section_schema) @endphp</textarea>
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

<!---================================ SECTION schema =======================--->

<hr>
<br>

<!----------======================Text Add Form =============================----------------->
<section>
    <form id="add_video_form" action="{{url(route('videos.create'))}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            
            <input type="hidden" class="form-control" name="course_id" value="{{ $course->id }}">
            <div class="col-sm-8">
                <div class="form-group mb-3">
                    <label>Youtube URL  <span class="font-size11">*</span></label>
                    <input class="form-control" type="url" id="image" name="url" required>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <label>Youtube Thumbnail <span class="font-size11">*</span></label>
                    <input class="form-control" type="file" id="image" name="image" required>
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
        initValidate('#add_video_form');
        initValidate('#updating_schema_form');
        initSelect2('.select2');
        initTrumbowyg('.trumbowyg');
    });

    $("#add_video_form").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, responseHandler);
    });

    $("#updating_schema_form").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, responseHandler);
    });

    var responseHandler = function(response) {
        location.reload();
    }

</script>
@endsection
<!----------======================Text Add Form =============================----------------->
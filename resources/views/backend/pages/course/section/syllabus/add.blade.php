<!---================================ SECTION heading =======================--->
<section>
    @php 
        $heading = DB::table('courses')->where('id', $course->id)->select('syllabus_section_heading', 'curriculum_pdf')->first();
    @endphp
    <form id="updating_heading_form" action="{{ url(route('course.update_heading')) }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" class="form-control" name="course_id" value="{{ $course->id }}">
        <input type="hidden" class="form-control" name="section" value="syllabus">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group mb-3">
                    <label>Syllabus Section Title <span class="red">*</span></label>
                    <input maxlength="255" type="text" class="form-control" name="heading" value="{{ $heading->syllabus_section_heading }}" required>
                </div>
            </div>
            <div class="col-sm-6 d-none">
                <div class="form-group mb-3">
                    <label>Curriculum <span class="red">*</span></label>
                    <input type="file" class="form-control" name="curriculum_pdf" >
                    @if ($heading->curriculum_pdf)
                        <div class="form-check form-switch">

                            <input id="pdf_check" class="form-check-input" type="checkbox"
                                name="pdf_check" value="1">

                            <label class="form-check-label" for="pdf_check">Remove Curriculum
                            </label>

                        </div>
                    @endif
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
    <form id="add_syllabus_form" action="{{ url(route('syllabus.create')) }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" class="form-control" name="course_id" value="{{ $course->id }}">
        <div class="row">
            <div class="col-sm-2">
                <div class="form-group mb-3">
                    <label>Title No <span class="red">*</span></label>
                    <input maxlength="255" type="text" class="form-control" name="title_no" value="" required>
                </div>
            </div>
            <div class="col-sm-10">
                <div class="form-group mb-3">
                    <label>Title <span class="red">*</span></label>
                    <input maxlength="255" type="text" class="form-control" name="title" value="" required>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group mb-3">
                    <label>Description <span class="red">*</span></label>
                    <textarea class="trumbowyg form-control" name="description" rows="5" required></textarea>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group mb-3 text-end">
                    <button type="submit" class="btn btn-block btn-primary">Create</button>
                </div>
            </div>
        </div>
    </form>
</section>

@section('component.scripts')
    <script>
        $(document).ready(function() {
            initValidate('#add_syllabus_form');
            initValidate('updating_heading_form');
            initTrumbowyg('.trumbowyg');
        });

        $("#add_syllabus_form").submit(function(e) {
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

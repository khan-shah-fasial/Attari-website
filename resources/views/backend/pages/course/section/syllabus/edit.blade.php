<!----------======================Text edit Form =============================----------------->
<section>
    <form id="edit_syllabus_form" action="{{ url(route('syllabus.update')) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-sm-6">
                <input type="hidden" name="id" value="{{ $syllabus->id }}">
                <input type="hidden" class="form-control" name="course_id" value="{{ $syllabus->course_id }}">
                <div class="form-group mb-3">
                    <label>Title No<span class="red">*</span></label>
                    <input maxlength="255" type="text" class="form-control" name="title_no"
                        value="{{ $syllabus->title_no }}" required>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group mb-3">
                    <label>Title <span class="red">*</span></label>
                    <input maxlength="255" type="text" class="form-control" name="title"
                        value="{{ $syllabus->title }}" required>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group mb-3">
                    <label>Description <span class="red">*</span></label>
                    <textarea class="trumbowyg form-control" id="trumbowyg" name="description" rows="5" required>{{ $syllabus->description }}</textarea>
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


    <script>
        $(document).ready(function() {
            initValidate('#edit_syllabus_form');
            initTrumbowyg('#trumbowyg');
        });

        $("#edit_syllabus_form").submit(function(e) {
            var form = $(this);
            ajaxSubmit(e, form, responseHandler);
        });

        var responseHandler = function(response) {
            location.reload();
        }
    </script>

<!----------======================Text edit Form =============================----------------->

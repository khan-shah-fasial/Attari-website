<!----------======================Text Edit Form =============================----------------->
<section>
    <form id="edit_video_form" action="{{url(route('videos.update'))}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <input type="hidden" class="form-control" name="id" value="{{ $videoreview->id }}">
            <input type="hidden" class="form-control" name="course_id" value="{{ $videoreview->course_id }}">

            <div class="col-sm-8">
                <div class="form-group mb-3">
                    <label>Youtube URL  <span class="font-size11">*</span></label>
                    <input class="form-control" type="url" id="image" name="url" value="{{ $videoreview->url }}" required>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group mb-3">
                            <label>Youtube Thumbnail</label>
                            <input class="form-control" type="file" id="image" name="image">
                        </div>
                    </div>
                    <div class="col-md-3">
                        @if ($videoreview->image)
                            <img src="{{ asset('storage/' . $videoreview->image) }}" class="img-thumbnail">
                        @endif
                    </div>
                </div>
            </div>
   
            <div class="col-sm-12 d-flex justify-content-end">
                <div class="form-group d-grid mb-3 text-end">
                    <button type="submit" class="btn btn-block btn-primary">Update</button>
                </div>
            </div>
  
            
        </div>
    </form>
</section>


<script>
    $(document).ready(function() {
        initValidate('#edit_video_form');
        initSelect2('.select2');
        initTrumbowyg('.trumbowyg0');
    });

    $("#edit_video_form").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, responseHandler);
    });

    var responseHandler = function(response) {
        location.reload();
    }

</script>

<!----------======================Text Add Form =============================----------------->
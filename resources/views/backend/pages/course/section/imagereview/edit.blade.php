<!----------======================Text Edit Form =============================----------------->
<section>
    <form id="edit_images_form" action="{{url(route('images.update'))}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <input type="hidden" class="form-control" name="id" value="{{ $imagereview->id }}">
            <input type="hidden" class="form-control" name="course_id" value="{{ $imagereview->course_id }}">

            <div class="col-sm-6">
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group mb-3">
                            <label>Image <span class="font-size11">(Max file size 80kb -
                                    1125*196)</span></label>
                            <input class="form-control" type="file" id="image" accept="image/*" name="image">
                            <input class="form-control" type="hidden" name="image_old" value="{{$imagereview->image}}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        @if ($imagereview->image)
                            <img src="{{ asset('storage/' . $imagereview->image) }}" class="img-thumbnail">
                        @endif
                    </div>
                </div>
            </div>
            
            <div class="col-sm-6">
                <div class="form-group mb-3">
                    <label>Date</label>
                    <input class="form-control" type="date" id="date" name="date" value="{{$imagereview->date}}" required>
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
        initValidate('#edit_images_form');
        initSelect2('.select2');
        initTrumbowyg('.trumbowyg0');
    });

    $("#edit_images_form").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, responseHandler);
    });

    var responseHandler = function(response) {
        location.reload();
    }

</script>

<!----------======================Text Add Form =============================----------------->
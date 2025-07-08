<!----------======================Text Edit Form =============================----------------->
<section>
    <form id="edit_certificate_form" action="{{url(route('certificate.update'))}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <input type="hidden" class="form-control" name="id" value="{{ $certificate->id }}">
            <input type="hidden" class="form-control" name="course_id" value="{{ $certificate->course_id }}">

            <div class="col-sm-6">
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group mb-3">
                            <label>Image <span class="font-size11">(Max file size 80kb -
                                    1125*196)</span></label>
                            <input class="form-control" type="file" id="image" name="image">
                            @if ($certificate->image)
                                <div class="form-check form-switch">

                                    <input id="image_check" class="form-check-input" type="checkbox"
                                        name="image_check" value="1">

                                    <label class="form-check-label" for="image_check">Remove certificate Image
                                    </label>

                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3">
                        @if ($certificate->image)
                            <img src="{{ asset('storage/' . $certificate->image) }}" class="img-thumbnail">
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group mb-3">
                    <label>Alt Image </label>
                    <input class="form-control" type="text" name="alt_image" value="{{ $certificate->alt_image }}">
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
        initValidate('#edit_certificate_form');
        initSelect2('.select2');
        initTrumbowyg('.trumbowyg0');
    });

    $("#edit_certificate_form").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, responseHandler);
    });

    var responseHandler = function(response) {
        location.reload();
    }

</script>

<!----------======================Text Add Form =============================----------------->
<!----------======================Text Add Form =============================----------------->
<section>
    <form id="add_image_form" action="{{url(route('images.create'))}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            
            <input type="hidden" class="form-control" name="course_id" value="0">
            <div class="col-sm-6">
                <div class="form-group mb-3">
                    <label>Image  <span class="font-size11">(Max file size 80kb - 1125*196)</span></label>
                    <input class="form-control" type="file" id="image" name="image" accept="image/*" required>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group mb-3">
                    <label>Date</label>
                    <input class="form-control" type="date" id="date" name="date" required>
                </div>
            </div>

            <div class="col-sm-12 d-flex justify-content-end">
                <div class="form-group d-grid mb-3 text-end">
                    <button type="submit" class="btn btn-block btn-primary">Add</button>
                </div>
            </div>
  
            
        </div>
    </form>
</section>

@section('component.scripts')
<script>
    $(document).ready(function() {
        initValidate('#add_image_form');
        initSelect2('.select2');
        initTrumbowyg('.trumbowyg');
    });

    $("#add_image_form").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, responseHandler);
    });

    var responseHandler = function(response) {
        location.reload();
    }

</script>
@endsection
<!----------======================Text Add Form =============================----------------->
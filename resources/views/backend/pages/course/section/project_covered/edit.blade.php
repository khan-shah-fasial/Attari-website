<!----------======================Text Edit Form =============================----------------->
<section>
    <form id="edit_project_covered_form" action="{{url(route('project_covered.update'))}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <input type="hidden" class="form-control" name="id" value="{{ $project_covered->id }}">
            <input type="hidden" class="form-control" name="course_id" value="{{ $project_covered->course_id }}">

            <div class="col-sm-2">
                <div class="form-group mb-3">
                    <label>Title No</label>
                    <input type="text" class="form-control" name="title_no" value="{{ $project_covered->title_no }}" required>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" value="{{ $project_covered->title }}" required>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group mb-3">
                            <label> Icon <span class="font-size11">(Max file size 80kb -
                                    1125*196)</span></label>
                            <input class="form-control" type="file" id="icon" name="icon">
                            @if ($project_covered->icon)
                                <div class="form-check form-switch">

                                    <input id="icon_check" class="form-check-input" type="checkbox"
                                        name="icon_check" value="1">

                                    <label class="form-check-label" for="icon_check">Remove 
                                        icon</label>

                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3">
                        @if ($project_covered->icon)
                            <img src="{{ asset('storage/' . $project_covered->icon) }}" class="img-icon">
                        @endif
                    </div>
                </div>
            </div>
   
            <div class="col-sm-12">
                <div class="form-group mb-3">
                    <label>Description</label>
                    <textarea class="form-control trumbowyg0" name="description" rows="2" required>{{ $project_covered->description }}</textarea>
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
        initValidate('#edit_project_covered_form');
        initSelect2('.select2');
        initTrumbowyg('.trumbowyg0');
    });

    $("#edit_project_covered_form").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, responseHandler);
    });

    var responseHandler = function(response) {
        location.reload();
    }

</script>

<!----------======================Text Add Form =============================----------------->
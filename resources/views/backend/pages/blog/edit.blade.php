<form id="edit_blog_form" action="{{url(route('blogs.update'))}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
	
	<div class="col-md-6">
		<div class="row">
		   <input type="hidden" name="id" value="{{ $blog->id }}">
			<div class="col-sm-6">
				<div class="form-group mb-3">
					<label>Blog Title <span class="red">*</span></label>
					<input maxlength="191" type="text" class="form-control" name="title" value="{{ $blog->title }}" required>
				</div>
			</div>
    		<div class="col-sm-6">
                <div class="form-group row mb-3">
            		<div class="col-sm-9">
                        <label>Image <span id="image-red" class="display-red red">*</span> <span class="font-size11">(Max file size 100kb -
                                1120*630)</span></label>
                        <input accept="image/*" class="form-control" type="file" id="image" name="image">
                    </div>
                    <div class="col-md-3">
                         @if ($blog->main_image)
                            <img src="{{ asset('storage/' . $blog->main_image) }}" class="img-thumbnail">
                            <input type="hidden" id="existing-image" value="1">
                        @else
                            <input type="hidden" id="existing-image" value="0">
                        @endif
                    </div>
                </div>
            </div>
			 
		
		<div class="col-sm-6">
            <div class="form-group mb-3">
                <label>Slug <span class="red">*</span></label>
                <input maxlength="191" type="text" class="form-control" name="slug" value="{{ $blog->slug }}" required>
            </div>
        </div>
       
        <div class="col-sm-6">
            <div class="form-group mb-3">
                <label>Short Description <span class="display-red red">*</span></label>
                <input type="text" class="form-control required-field" name="short_description"  minlength="10" value="{{ $blog->short_description }}" required>
            </div>
        </div>
        <div class="col-sm-12 d-none">
            <div class="form-group mb-3">
                <label>Category <span class="red">*</span></label>
                <select class="form-select select2 required-field" name="blog_category_ids[]" multiple required>
                    <option value="" disabled>Select blog Category</option>
                    @foreach($blogcategory as $row)
                        <option value="{{ $row->id }}" @if(in_array($row->id, json_decode($blog->blog_category_ids, true))) selected @endif>
                            {{ $row->name }}
                        </option>
                    @endforeach
                </select> 
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group mb-3">
                <label>Course <span class="red">*</span></label>
                <select class="form-select select2" name="course_id" required>
                    <option value="">--Select--</option>
                    @foreach ($course as $row)
                        <option value="{{ $row->id }}" {{ $row->id == $blog->course_id ? 'selected' : '' }}>
                            {{ $row->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="row">
                <div class="form-group col-4 mb-3">
                    <label>Text Testimonial</label><br>
                    <input type="checkbox" name="text_testimonial" value="1" {{ $blog->text_testimonial == '1' ? 'checked' : '' }}>
                </div>

                <div class="form-group col-4 mb-3">
                    <label>Video Testimonial</label><br>
                    <input type="checkbox" name="video_testimonial" value="1" {{ $blog->video_testimonial == '1' ? 'checked' : '' }}>
                </div>

                <div class="form-group col-4 mb-3">
                    <label>Batch Schedule</label><br>
                    <input type="checkbox" name="batch_schedule" value="1" {{ $blog->batch_schedule == '1' ? 'checked' : '' }}>
                </div>
            </div>
        </div>


        <div class="col-sm-12">
            <div class="form-group mb-3">
                <label>Meta Title <span class="display-red red">*</span></label>
                <input type="text" class="form-control required-field" name="meta_title"  maxlength="250" value="{{ $blog->meta_title }}" required>
            </div>
        </div> 
        <div class="col-sm-12">
            <div class="form-group mb-3">
                <label>Meta Description <span class="display-red red">*</span></label>
                <textarea class="form-control required-field" name="meta_description" rows="3" required>{{ $blog->meta_description }}</textarea>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group mb-3">
                <label>Author <span class="display-red red">*</span></label>
                <select class="select2 form-select required-field" name="user_id" required>
                    <option value="" disabled>Select Author</option>
                    @foreach($users as $row)
                        <option value="{{ $row->id }}" @if($blog->user_id == $row->id) selected @endif>{{ $row->name }}</option>
                    @endforeach
                </select> 
            </div>
        </div> 
        {{--
        <div class="col-sm-6">
            <div class="form-group mb-3">
                <label>Updated Date <span class="display-red red">*</span></label>
                <input type="datetime-local" class="form-control required-field" name="updated_at" value="{{ date('Y-m-d H:i:s', strtotime($blog->updated_at)) }}" required>
            </div>
        </div>  		
		--}}
		
	</div>
	</div>
	<div class="col-md-6">
            <div class="form-group mb-3">
                <label>Alt Image</label>
                <input type="text" class="form-control" name="alt_main_image"  maxlength="250" value="{{ $blog->alt_main_image }}">
            </div>
	        <div class="form-group mb-3">
                <label>Content <span class="display-red red">*</span></label>
                <textarea class="form-control trumbowyg required-field" name="content" rows="5" required>{{ $blog->content }}</textarea>
            </div>
            <div class="form-group row">
                <div class="col-4 form-group mb-3">
                    <div class="toggle-container">
                        <label>Status :</label>
                        <input type="checkbox" id="toggle" {{ $blog->status == 1 ? 'checked' : '' }} class="toggle-checkbox" onclick="toggleValue()">
                        <label for="toggle" class="toggle-label">
                            <span class="toggle-inner">
                                <span class="inactive-text">Inactive</span>
                                <span class="active-text">Active</span>
                            </span>
                            <span class="toggle-switch"></span>
                        </label>
                        <input type="hidden" id="toggle-value" name="status" value="{{ $blog->status }}">
                    </div>
                </div>
                <div class="col-4 form-group mb-3">
                    <div id="toggle-container-visible" class="toggle-container">
                        <label>Make invisible :</label>
                        <input type="checkbox" id="toggle2" {{ $blog->invisible == 1 ? 'checked' : '' }} class="toggle-checkbox" onclick="toggle2Value()">
                        <label for="toggle2" class="toggle-label">
                            <span class="toggle-inner">
                                <span class="inactive-text">No</span>
                                <span class="active-text">Yes</span>
                            </span>
                            <span class="toggle-switch"></span>
                        </label>
                        <input type="hidden" id="toggle2-value" name="invisible" value="{{ $blog->invisible }}">
                    </div>
                </div>
                <div class="col-4 form-group mb-3">
                    <div class="toggle-container">
                        <label>Make Featured :</label>
                        <input type="checkbox" id="toggle3" {{ $blog->featured == 1 ? 'checked' : '' }} class="toggle-checkbox" onclick="toggle3Value()">
                        <label for="toggle3" class="toggle-label">
                            <span class="toggle-inner">
                                <span class="inactive-text">No</span>
                                <span class="active-text">Yes</span>
                            </span>
                            <span class="toggle-switch"></span>
                        </label>
                        <input type="hidden" id="toggle3-value" name="featured" value="{{ $blog->featured }}">
                    </div>
                </div>
            </div>
			<div class="form-group mb-3 text-end">
                <button type="submit" class="btn btn-block btn-primary">Update</button>
            </div>
	</div>
	
    </div>
</form>

<script>
    
    function toggleValue() {
        const checkbox = document.getElementById('toggle');
        const hiddenInput = document.getElementById('toggle-value');
        const visibilityContainer = document.getElementById('toggle-container-visible');
        const requiredFields = document.querySelectorAll('.required-field');
        const redMarks = document.querySelectorAll('.display-red');
        
        hiddenInput.value = checkbox.checked ? '1' : '0';

        if (checkbox.checked) {
            visibilityContainer.style.display = 'block';
            redMarks.forEach(redMark => redMark.style.display = 'inline');
            requiredFields.forEach(field => field.setAttribute('required', 'required'));
        } else {
            visibilityContainer.style.display = 'none';
            redMarks.forEach(redMark => redMark.style.display = 'none');
            requiredFields.forEach(field => field.removeAttribute('required'));
        }
    
        // requiredFields.forEach(field => {
        //     if (checkbox.checked) {
        //         field.setAttribute('required', 'required');
        //     } else {
        //         field.removeAttribute('required');
        //     }
        // });
    }
    
    document.addEventListener('DOMContentLoaded', function() {
        checkbox.addEventListener('change', toggleValue);
    });

function toggle2Value() {
    const checkbox2 = document.getElementById('toggle2');
    const hiddenInput2 = document.getElementById('toggle2-value');
    const imageInput = document.getElementById('image');
    const redMark2 = document.getElementById('image-red');
    const existingImage = document.getElementById('existing-image').value === '1';

        hiddenInput2.value = checkbox2.checked ? '1' : '0';
        if (checkbox2.checked) {
            imageInput.removeAttribute('required');
            redMark2.style.display = 'none';
        } else if (!existingImage) {
            imageInput.setAttribute('required', 'required');
            redMark2.style.display = 'inline';
        }
    }
    
    document.addEventListener('DOMContentLoaded', function() {
        checkbox.addEventListener('change', toggle2Value);
    });
    
    function toggle3Value() {
        const checkbox2 = document.getElementById('toggle3');
        const hiddenInput2 = document.getElementById('toggle3-value');
            hiddenInput2.value = checkbox2.checked ? '1' : '0';
    }
    document.addEventListener('DOMContentLoaded', function() {
        checkbox.addEventListener('change', toggle2Value);
    });
    
$(document).ready(function() {
    toggleValue();
    toggle2Value();
    toggle3Value();
    
    initValidate('#edit_blog_form');
    initTrumbowyg('.trumbowyg');
    initSelect2('.select2');
});

$("#edit_blog_form").submit(function(e) {
    var form = $(this);
    ajaxSubmit(e, form, responseHandler);
});

var responseHandler = function(response) {
    location.reload();
}
</script>
<form id="add_blogs_form" action="{{url(route('blogs.create'))}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group mb-3">
                        <label>Title <span class="red">*</span></label>
                        <input maxlength="191" type="text" class="form-control" name="title" value="" required>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group mb-3">
                        <label>Image <span id="image-red" class="display-red red">*</span> <span class="font-size11">(Max file size 100kb -
                                1120*630)</span></label>
                        <input accept="image/*" class="form-control required-field" type="file" id="image" name="image" required>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group mb-3">
                        <label>Slug <span class="red">*</span></label>
                        <input maxlength="191" type="text" class="form-control" name="slug" value="" required>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group mb-3">
                        <label>Short Description <span class="display-red red">*</span></label>
                        <input type="text" class="form-control required-field" name="short_description" minlength="10" value="" required>
                    </div>
                </div>

                <div class="col-sm-12 d-none">
                    <div class="form-group mb-3">
                        <label>Category <span class="display-red red">*</span></label>
                        <select class="select2 form-select required-field" name="blog_category_ids[]" multiple required>
                            <option value="" disabled>Select blog Category</option>
                            @foreach($blogcategory as $row)
                            <option value="{{ $row->id }}" {{ $loop->first ? 'selected' : '' }}>{{ $row->name }}
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
                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-sm-8">
                    <div class="row">

                        <div class="form-group col-4 mb-3">
                            <label>Text Testimonial</label><br>
                            <input type="checkbox" name="text_testimonial" value="1" checked>
                        </div>

                        <div class="form-group col-4 mb-3">
                            <label>Video Testimonial</label><br>
                            <input type="checkbox" name="video_testimonial" value="1" checked>
                        </div>

                        <div class="form-group col-4 mb-3">
                            <label>Batch Schedule</label><br>
                            <input type="checkbox" name="batch_schedule" value="1" checked>
                        </div>

                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group mb-3">
                        <label>Meta Title <span class="display-red red">*</span></label>
                        <input type="text" class="form-control required-field" name="meta_title"  maxlength="250" value="" required>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group mb-3">
                        <label>Meta Description <span class="display-red red">*</span></label>
                        <textarea class="form-control required-field" name="meta_description" rows="3" required></textarea>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group mb-3">
                        <label>Author</label>
                        <select class="select2 form-select required-field" name="user_id" required>
                            <option value="" disabled>Select Author</option>
                            @foreach($users as $row)
                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                {{--
                <div class="col-sm-6">
                    <div class="form-group mb-3">
                        <label>Updated Date <span class="display-red red">*</span></label>
                        <input type="datetime-local" class="form-control required-field" name="updated_at" value="" required>
                    </div>
                </div>
                --}}
            </div>
        </div>


        <div class="col-md-6">
            <div class="form-group mb-3">
                <label>Alt Image</label>
                <input type="text" class="form-control" name="alt_main_image" maxlength="250" value="">
            </div>
            <div class="form-group mb-3">
                <label>Content <span class="display-red red">*</span></label>
                <textarea class="form-control trumbowyg required-field" name="content" rows="5" required></textarea>
            </div>
            <div class="form-group row">
                <div class="col-4 form-group mb-3">
                    <div class="toggle-container">
                        <label>Status :</label>
                        <input type="checkbox" id="toggle" class="toggle-checkbox" onclick="toggleValue()">
                        <label for="toggle" class="toggle-label">
                            <span class="toggle-inner">
                                <span class="inactive-text">Inactive</span>
                                <span class="active-text">Active</span>
                            </span>
                            <span class="toggle-switch"></span>
                        </label>
                        <input type="hidden" id="toggle-value" name="status" value="0">
                    </div>
                </div>
                <div class="col-4 form-group mb-3">
                    <div id="toggle-container-visible" class="toggle-container">
                        <label>Make invisible :</label>
                        <input type="checkbox" id="toggle2" class="toggle-checkbox" onclick="toggle2Value()">
                        <label for="toggle2" class="toggle-label">
                            <span class="toggle-inner">
                                <span class="inactive-text">No</span>
                                <span class="active-text">Yes</span>
                            </span>
                            <span class="toggle-switch"></span>
                        </label>
                        <input type="hidden" id="toggle2-value" name="invisible" value="0">
                    </div>
                </div>
                <div class="col-4 form-group mb-3">
                    <div class="toggle-container">
                        <label>Make Featured :</label>
                        <input type="checkbox" id="toggle3" class="toggle-checkbox" onclick="toggle3Value()">
                        <label for="toggle3" class="toggle-label">
                            <span class="toggle-inner">
                                <span class="inactive-text">No</span>
                                <span class="active-text">Yes</span>
                            </span>
                            <span class="toggle-switch"></span>
                        </label>
                        <input type="hidden" id="toggle3-value" name="featured" value="0">
                    </div>
                </div>
            </div>
            <!--<div class="form-group mb-3">-->
            <!--    <div class="toggle-container">-->
            <!--        <label>Status :</label>-->
            <!--        <input type="checkbox" id="toggle" class="toggle-checkbox" onclick="toggleValue()">-->
            <!--        <label for="toggle" class="toggle-label">-->
            <!--            <span class="toggle-inner">-->
            <!--                <span class="inactive-text">Inactive</span>-->
            <!--                <span class="active-text">Active</span>-->
            <!--            </span>-->
            <!--            <span class="toggle-switch"></span>-->
            <!--        </label>-->
            <!--        <input type="hidden" id="toggle-value" name="status" value="0">-->
            <!--    </div>-->
            <!--</div>-->
            <div class="form-group mb-3 text-end">
                <button type="submit" class="btn btn-block btn-primary">Create</button>
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
}
// Call toggleValue when the script runs to set the initial state
toggleValue();
// Add event listener to checkbox to toggle value when it changes
document.getElementById('toggle').addEventListener('change', toggleValue);


function toggle2Value() {
    const checkbox = document.getElementById('toggle2');
    const hiddenInput = document.getElementById('toggle2-value');
    const imageInput = document.getElementById('image');
    const redMark = document.getElementById('image-red');

    hiddenInput.value = checkbox.checked ? '1' : '0';
    if (checkbox.checked) {
        imageInput.removeAttribute('required');
        redMark.style.display = 'none';
    } else {
        imageInput.setAttribute('required', 'required');
        redMark.style.display = 'inline';
    }
}
// Call toggleValue when the script runs to set the initial state
toggle2Value();
// Add event listener to checkbox to toggle value when it changes
document.getElementById('toggle2').addEventListener('change', toggle2Value);

function toggle3Value() {
    const checkbox = document.getElementById('toggle3');
    const hiddenInput = document.getElementById('toggle3-value');
    hiddenInput.value = checkbox.checked ? '1' : '0';
}
// Call toggleValue when the script runs to set the initial state
toggle3Value();
// Add event listener to checkbox to toggle value when it changes
document.getElementById('toggle3').addEventListener('change', toggle3Value);

$(document).ready(function() {
    initValidate('#add_blogs_form');
    initTrumbowyg('.trumbowyg');
    initSelect2('.select2');
});

$("#add_blogs_form").submit(function(e) {
    var form = $(this);
    ajaxSubmit(e, form, responseHandler);
});

var responseHandler = function(response) {
    location.reload();
}
</script>

<section>
    <form id="add_cms_form" action="{{url(route('cms.create'))}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="row">

                        {{--<div class="form-check form-switch d-flex justify-content-end mb-2">

                            <input id="zone_check" class="form-check-input mx-2" type="checkbox"
                                name="zone_check" value="1">
            
                            <label class="form-check-label" for="thumbnail_check">City wise / Country wise Course</label>
            
                        </div> ---}}

                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label>Course</label>
                                <select class="form-select" name="course_id" onchange="toggleCourse();" id="course_id" required>
                                    <option data-slug="" data-title="" data-descrip="" data-zone="" value="">--Select--</option>
                                    @foreach ($course as $row)
                                        @php $zone_count = DB::table('cms')->where('course_id', $row->id)->where('zone', 0)->count(); @endphp
                                        <option data-slug="{{ $row->slug_url }}" data-title="{{ $row->meta_title }}" data-descrip="{{ $row->meta_description }}" data-zone="{{$zone_count}}" value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select> 
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label>Course Title <span class="red">*</span></label>
                                <input type="text" class="form-control" name="title" value="" required>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label>Slug</label>
                                <input type="text" class="form-control opacity-50" value="" id="slug_url" name="slug"  readonly>
                            </div>
                        </div>

                        <div class="col-sm-4" id="menu-title">
                            <div class="form-group mb-3">
                                <label>Course Name in the menu <span class="red">*</span></label>
                                <input type="text" class="form-control" name="menu_title" value="" required>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label>Breadcrumb Title <span class="red">*</span></label>
                                <input type="text" class="form-control" name="breadcrumb_title" value="" required>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label>Zone</label>
                                <select class="form-select" name="zone" id="typeSelect" onclick="toggleInput();" required>
                                    <option value="">--Select--</option>
                                    <option id="main_zone" value="0">Main</option>
                                    <option value="1">City</option>
                                    <option value="2">Country</option>
                                </select> 
                            </div>
                        </div>

                        <div class="col-sm-4" id="alisa-select">
                            <div class="form-group mb-3">
                                <label>Course Alias (bottom section)</label>
                                <input type="text" class="form-control" id="alias" name="alias" value="" required>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label>Course Meta Title <span class="red">*</span></label>
                                <input type="text" class="form-control opacity-50" value="" id="meta_title" readonly>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label>Course Meta Description <span class="red">*</span></label>
                                <textarea class="form-control opacity-50" rows="2" id="meta_description" readonly></textarea>
                            </div>
                        </div>



                        <div class="col-sm-8">

                            <div class="form-group mb-3">
                                <label>Replace Keyword</label>
                                <div id="replace_key_add_more" style="">
                                    <div class="form-group">
                                        <div class="row">
                                        <div class="col-md-11">
                                            <div class="row">

                                                <div class="col col-sm-6">
                                                <input type="text" style="margin-bottom: 5px;" class="form-control" name="replace_key[]" placeholder="Enter Keyword here...">
                                                </div>

                                                <div class="col col-sm-6">
                                                <input class="form-control" name="replace_key_word[]" placeholder="Enter Replace Keyword here...">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-1"><i style="font-size: 25px; color: #0b0; cursor: pointer; margin-left: 10px;" class="ri-add-circle-fill" id="add_replace_key"></i></div>
                                        </div>
                                        </br>
                                    </div>
                                </div>
                            </div>


                        </div>



                        <div class="col-sm-12">
                            <div class="form-group mb-3">
                                <label>Description</label>
                                <textarea class="form-control trumbowyg" name="description" rows="2" ></textarea>
                            </div>
                        </div>

                        <!--<h4 class="text-danger">Under Maintainanace - Button Disabled</h4>-->  
                        <div class="col-sm-12">
                            <div class="form-group d-flex mb-3 justify-content-end">
                                <button type="submit" class="btn btn-block btn-primary">Create</button>
                            </div>
                        </div>         

                    </div>
                </div>
            </div>
            
        



                
                            
        </div>
    </form>
</section>


<script>
$(document).ready(function() {
    initValidate('#add_cms_form');
    initSelect2('.select2');
    initTrumbowyg('.trumbowyg');
    initTrumbowyg('#trumbowyg_0');
});

$("#add_cms_form").submit(function(e) {
    var form = $(this);
    ajaxSubmit(e, form, responseHandler);
});

var responseHandler = function(response) {
    location.reload();
}

function remove_replace_key(_this) {
    _this.closest(".replace_key").remove();
}


$("#add_replace_key").on("click", function() {

var new_replace_key = `
    <div class="replace_key form-group">
        <div class="row">
            <div class="col-md-11">
                <div class="row">

                    <div class="col col-sm-6">
                    <input type="text" style="margin-bottom: 5px;" class="form-control" name="replace_key[]" placeholder="Enter Keyword here...">
                    </div>

                    <div class="col col-sm-6">
                    <input class="form-control" name="replace_key_word[]" placeholder="Enter Replace Keyword here...">
                    </div>

                </div>
            </div>
            <div class="col-md-1"><i style="font-size: 25px; color: red; cursor: pointer; margin-left: 10px;" class="ri-delete-bin-2-fill" onclick="remove_replace_key($(this));"></i></div>
        </div>
        </br>
    </div>
`;

$("#replace_key_add_more").append(new_replace_key);
});




var menuTitle = document.getElementById('menu-title');
var aliasSelect = document.getElementById('alisa-select');

// Initial check
toggleMenuTitle();

// Function to toggle menu title visibility and required attribute
function toggleInput() {
    /*// Get the value of the selected option
    const selectedOption = document.getElementById('typeSelect').value;

    // Call the toggleMenuTitle function with the selected option value
    toggleMenuTitle(selectedOption);*/
}

// Function to toggle menu title visibility and required attribute based on the selected option
function toggleMenuTitle(selectedOption) {
    /*if (selectedOption == 1 || selectedOption == 2) {
        menuTitle.style.display = 'none';
        aliasSelect.style.display = 'block';

        document.getElementsByName('menu_title')[0].removeAttribute('required');
        document.getElementsByName('alias')[0].setAttribute('required', 'required');
    } else {
        menuTitle.style.display = 'block';
        aliasSelect.style.display = 'none';

        document.getElementsByName('menu_title')[0].setAttribute('required', 'required');
        document.getElementsByName('alias')[0].removeAttribute('required');
    }*/
}



/*------============================== auto slug and meta title and description ================----------*/ 


    var slug_field = document.getElementById('slug_url');
    var meta_title_field = document.getElementById('meta_title');
    var meta_description_field = document.getElementById('meta_description');

    var main = document.getElementById('main_zone');

    var old_slug;


    function toggleCourse() {
        /*var selected_course_Option = document.getElementById('course_id').querySelector('option:checked');
        var course_slug = selected_course_Option.getAttribute('data-slug');
        var course_title = selected_course_Option.getAttribute('data-title');
        var course_decrip = selected_course_Option.getAttribute('data-descrip');

        var course_zone = selected_course_Option.getAttribute('data-zone');

        if (course_zone !== "0") {
            main.style.display = "none";
        } else {
            main.style.display = "block";
        }

        old_slug = course_slug;

        if (selected_course_Option.value === '') {
            slug_field.value = '';
            meta_title_field.value = '';
            meta_description_field.value = '';
        } else {
            slug_field.value = course_slug;
            meta_title_field.value = course_title;
            meta_description_field.value = course_decrip;
        }*/
    }

    toggleCourse();


    var alias_name = document.getElementById('alias');

    alias_name.addEventListener('keyup', function() {
        /*if (alias_name.value === "") {
            slug_field.value = old_slug;
        } else {
            var new_slug = old_slug + '-' + alias_name.value;
            slug_field.value = new_slug;
        }*/
    });



    function slugGenerator(){
    
        const $course = $('#course_id option:selected');
        const courseSlugPrefix = $course.data('slug');
        const courseTitle = $course.data('title');
        const courseDesc = $course.data('descrip');
        const alias = $('#alias').val(); // use .val() to get input field value
        const zone = $('#typeSelect').val(); // use .val() to get selected value

        // Set meta title and description
        $('#meta_title').val(courseTitle || '');
        $('#meta_description').val(courseDesc || '');    
    
        // Generate slug based on zone value
        if($course != ''){
            if (zone === "0") {
                $('#slug_url').val(courseSlugPrefix + '-online');
            } else {
                $('#slug_url').val(courseSlugPrefix + (alias ? '-' + alias.split(" ").join("-").toLowerCase() : ''));
            }            
        }else{
            $('#slug_url').val('');
        }

        
        //diplay menu
        if (zone === '1' || zone === '2') {
            $('#menu-title').hide();
            $('#alisa-select').show();
        
            $('[name="menu_title"]').removeAttr('required');
            $('[name="alias"]').attr('required', 'required');
        } else if(zone === '0') {
            $('#menu-title').show();
            $('#alisa-select').hide();
        
            $('[name="menu_title"]').attr('required', 'required');
            $('[name="alias"]').removeAttr('required');
        }else{
            $('#menu-title').hide();
            $('#alisa-select').hide(); 
        
            $('[name="menu_title"]').removeAttr('required');
            $('[name="alias"]').removeAttr('required');        
        }       
    }

    slugGenerator();
    $('#course_id').on('change', slugGenerator);
    $('#alias').on('keyup', slugGenerator);
    $('#typeSelect').on('change', slugGenerator);    

</script>

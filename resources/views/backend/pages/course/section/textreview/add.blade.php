
<div class="row">

    <div class="col-sm-6">

    <div class="col-md-12">
        <h4 class="header-title"><b>Text Heading</b></h4>
    </div>    

    <!---================================ SECTION heading =======================--->
    <section>
        @php 
            $heading = DB::table('courses')->where('id', $course->id)->value('testimonials_section_heading');
        @endphp
        <form id="updating_heading_form" action="{{ url(route('course.update_heading')) }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" class="form-control" name="course_id" value="{{ $course->id }}">
            <input type="hidden" class="form-control" name="section" value="testimonials">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group mb-3">
                        <label>Testimonials Section Title <span class="red">*</span></label>
                        <input maxlength="255" type="text" class="form-control" name="heading" value="{{ $heading }}" required>
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
    </div>


    <div class="col-sm-6" >
    <!---================================ SECTION schema =======================--->

    <div class="col-md-12">
        <h4 class="header-title"><b>Text Schema</b></h4>
    </div>

    <section>
        @php 
            $section_schema = DB::table('courses')->where('id', $course->id)->value('testimonials_section_schema');
        @endphp
        <form id="updating_schema_form" action="{{ url(route('course.update_schema')) }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" class="form-control" name="course_id" value="{{ $course->id }}">
            <input type="hidden" class="form-control" name="section" value="testimonials">
    

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group mb-3">
                        <label>Testimonials Schema <span class="red">*</span></label>
                    <textarea class="form-control" name="section_schema" id="section_schema" rows="5" required>
                        @php echo html_entity_decode($section_schema) @endphp</textarea>
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

    <!---================================ SECTION schema =======================--->
    </div>

</div>

<hr>
<br>

<!----------======================Text Add Form =============================----------------->
<section>
    <form id="add_text_form" action="{{url(route('text.create'))}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            
            <input type="hidden" class="form-control" name="course_id" value="{{ $course->id }}">
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" value="" required>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <label>Thumbnail  <span class="font-size11">(Max file size 80kb - 1125*196)</span></label>
                    <input class="form-control" type="file" id="thumbnail" name="thumbnail" required>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <label>Type</label>
                    <select class="form-select" name="type" id="typeSelect" onclick="check();">
                        <option value="">-- Select --</option>
                        <option value="google">Google - VMware / AWS</option>
                        <option value="google_mcse">Google - AZURA / MCSC / CCNA</option>
                        <option value="facebook">Facebook</option>
                    </select> 
                </div>
            </div>  

            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <label>Profile</label>
                    <input type="text" class="form-control" name="profile" value="">
                </div>
            </div>

            <div class="col-sm-8">
                <div class="form-group mb-3">
                    <label id="url-heading">Google VMware Link</label>
                    <input id="url" type="text" class="form-control" name="url" value="">
                </div>
            </div>

            
            <div class="col-sm-12">
                <div class="form-group mb-3">
                    <label>Description</label>
                    <textarea class="form-control trumbowyg" name="description" rows="2" required></textarea>
                </div>
            </div>
    
            <div class="col-sm-12 d-flex justify-content-end">
                <div class="form-group d-grid mb-3 text-end">
                    <button type="submit" class="btn btn-block btn-primary">Create</button>
                </div>
            </div>
  
            
        </div>
    </form>
</section>

@section('component.scripts')
<script>
    $(document).ready(function() {
        initValidate('#add_text_form');
        initValidate('updating_heading_form');
        initValidate('updating_schema_form');
        initSelect2('.select2');
        initTrumbowyg('.trumbowyg');
    });

    $("#add_text_form").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, responseHandler);
    });

    $("#updating_heading_form").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, responseHandler);
    });

    $("#updating_schema_form").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, responseHandler);
    });

    var responseHandler = function(response) {
        location.reload();
    }

    function check() {
        const typeSelect = document.getElementById('typeSelect');
        const urlHeading = document.getElementById('url-heading');
        const urlInput = document.getElementById('url');

            const selectedOption =  typeSelect.value;

            // Reset the input field and heading
            urlInput.style.display = 'none';
            urlInput.value = '';
            urlHeading.textContent = '';

            // Show the input field and change heading based on the selected option
            if (selectedOption === 'google') {
                urlInput.style.display = 'block';
                urlHeading.textContent = 'Google VMware / AWS Review';
                urlInput.value = 'https://www.google.com/search?q=attari+classes&sca_esv=cc28994e032c69f9&biw=1366&bih=599&ei=9hvGZd7-LcqGnesPj9O2wA4&gs_ssp=eJzj4tZP1zcsybK0TM8qNGC0UjWoME5KNU-2sEixNDVLNk4ysLQyqEhLtkwyMTVKtjRINUhJMkj04kssKUksylRIzkksLk4tBgCmfRTH&oq=attari&gs_lp=Egxnd3Mtd2l6LXNlcnAiBmF0dGFyaSoCCAAyEBAuGIAEGIoFGEMYxwEYrwEyChAAGIAEGIoFGEMyChAAGIAEGIoFGEMyDRAAGIAEGIoFGEMYsQMyDRAuGIAEGIoFGEMYsQMyBRAAGIAEMgsQLhiABBixAxiDATIOEC4YgAQYsQMYxwEYrwEyBRAAGIAEMgUQABiABDIfEC4YgAQYigUYQxjHARivARiXBRjcBBjeBBjgBNgBAUj7F1AAWIcHcAB4AZABAJgBvgGgAe0HqgEDMC42uAEDyAEA-AEBwgIREC4YgAQYigUYkQIYxwEYrwHCAgoQLhiABBiKBRhDwgILEAAYgAQYigUYkQLCAhEQLhiABBixAxiDARjHARjRA8ICDhAAGIAEGIoFGLEDGIMBwgIFEC4YgATCAgsQABiABBixAxiDAcICIBAuGIAEGIoFGJECGMcBGK8BGJcFGNwEGN4EGOAE2AEBwgIXEC4YgAQYigUYkQIYsQMYgwEYxwEY0QPCAg0QLhiABBiKBRhDGNQCwgIIEAAYgAQYsQPCAgsQLhiABBixAxjUAsICExAuGIAEGIoFGEMYsQMYxwEYrwHCAgsQLhiABBjHARivAeIDBBgAIEG6BgYIARABGBQ&sclient=gws-wiz-serp#lrd=0x3be7c88d956c3b09:0xfc9b452c90e0db0a,1,,,'; // Change URL value

            } else if (selectedOption === 'google_mcse') {
                urlInput.style.display = 'block';
                urlHeading.textContent = 'Google MCSE / CCNA Review';
                urlInput.value = 'https://www.google.com/search?si=AKbGX_rcuucMgom2rba1cdwsvM2SVoIkP2btyqGMV4t0GuHIs4sGV_1tpuqR0YHG4Rzd9SdUzGYNXCd_p0w1TuZUrMXlT2SAkp-Jc9tsM9nTTR1BZF7c2vEmOkFeHP1cFq8rt5pDX17mkCg5iaqsZzUfZ0cYi3OZZM_Kedfa9b4JRCMH1evrzpqLz1BGe1KHGKMzaI9AGovZLdTBy21m9ob0vX4kRdLF-Q%3D%3D&q=Attari%20IT%20Trainings%20%7C%20MCSE%20%7C%20CCNA%20%7C%20MCSA%20%7C%20Azure%20%7C%20VMwareAWS%20Reviews&sa=X&ved=0CCcQ7JgMahcKEwjA9tivop6EAxUAAAAAHQAAAAAQBg&biw=1366&bih=599&dpr=1'; // Change URL value
            }
        
    };

    check();

</script>
@endsection
<!----------======================Text Add Form =============================----------------->
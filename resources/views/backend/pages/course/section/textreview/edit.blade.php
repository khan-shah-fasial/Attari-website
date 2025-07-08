<!----------======================Text Edit Form =============================----------------->
<section>
    <form id="edit_text_form" action="{{url(route('text.update'))}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <input type="hidden" class="form-control" name="id" value="{{ $textreview->id }}">
            <input type="hidden" class="form-control" name="course_id" value="{{ $textreview->course_id }}">
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $textreview->name }}" required>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group mb-3">
                            <label>Thumbnail <span class="font-size11">(Max file size 80kb -
                                    1125*196)</span></label>
                            <input class="form-control" type="file" id="thumbnail" name="thumbnail">
                            @if ($textreview->thumbnail)
                                <div class="form-check form-switch">

                                    <input id="thumbnail_check" class="form-check-input" type="checkbox"
                                        name="thumbnail_check" value="1">

                                    <label class="form-check-label" for="thumbnail_check">Remove thumnail
                                        icon</label>

                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3">
                        @if ($textreview->thumbnail)
                            <img src="{{ asset('storage/' . $textreview->thumbnail) }}" class="img-thumbnail">
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <label>Type</label>
                    <select class="form-select" name="type" id="typeSelect1" onclick="check1();">
                        <option value="" @if($textreview->type == " ") selected @endif>--Select--</option>
                        <option value="google" @if($textreview->type == "google") selected @endif>Google - VMware / AWS</option>
                        <option value="google_mcse" @if($textreview->type == "google_mcse") selected @endif>Google - AZURA / MCSC / CCNA</option>
                        <option value="facebook" @if($textreview->type == "facebook") selected @endif>Facebook</option>
                    </select> 
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <label>Profile</label>
                    <input type="text" class="form-control" name="profile" value="{{ $textreview->profile }}">
                </div>
            </div>

            <div class="col-sm-8">
                <div class="form-group mb-3">
                    <label id="url-heading1">Google VMware Link</label>
                    <input id="url1" type="text" class="form-control" name="url" value="{{ $textreview->url }}">
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group mb-3">
                    <label>Description</label>
                    <textarea class="form-control trumbowyg0" name="description" rows="2" required>{{ $textreview->description }}</textarea>
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
        initValidate('#edit_text_form');
        initSelect2('.select2');
        initTrumbowyg('.trumbowyg0');
    });

    $("#edit_text_form").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, responseHandler);
    });

    var responseHandler = function(response) {
        location.reload();
    }

    function check1() {
        const typeSelect1 = document.getElementById('typeSelect1');
        const urlHeading1 = document.getElementById('url-heading1');
        const urlInput1 = document.getElementById('url1');

            const selectedOption =  typeSelect1.value;

            // Reset the input field and heading
            urlInput1.style.display = 'none';
            urlInput1.value = '';
            urlHeading1.textContent = '';

            // Show the input field and change heading based on the selected option
            if (selectedOption === 'google') {
                console.log('1');
                urlInput1.style.display = 'block';
                urlHeading1.textContent = 'Google VMware / AWS Review';
                urlInput1.value = 'https://www.google.com/search?q=attari+classes&sca_esv=cc28994e032c69f9&biw=1366&bih=599&ei=9hvGZd7-LcqGnesPj9O2wA4&gs_ssp=eJzj4tZP1zcsybK0TM8qNGC0UjWoME5KNU-2sEixNDVLNk4ysLQyqEhLtkwyMTVKtjRINUhJMkj04kssKUksylRIzkksLk4tBgCmfRTH&oq=attari&gs_lp=Egxnd3Mtd2l6LXNlcnAiBmF0dGFyaSoCCAAyEBAuGIAEGIoFGEMYxwEYrwEyChAAGIAEGIoFGEMyChAAGIAEGIoFGEMyDRAAGIAEGIoFGEMYsQMyDRAuGIAEGIoFGEMYsQMyBRAAGIAEMgsQLhiABBixAxiDATIOEC4YgAQYsQMYxwEYrwEyBRAAGIAEMgUQABiABDIfEC4YgAQYigUYQxjHARivARiXBRjcBBjeBBjgBNgBAUj7F1AAWIcHcAB4AZABAJgBvgGgAe0HqgEDMC42uAEDyAEA-AEBwgIREC4YgAQYigUYkQIYxwEYrwHCAgoQLhiABBiKBRhDwgILEAAYgAQYigUYkQLCAhEQLhiABBixAxiDARjHARjRA8ICDhAAGIAEGIoFGLEDGIMBwgIFEC4YgATCAgsQABiABBixAxiDAcICIBAuGIAEGIoFGJECGMcBGK8BGJcFGNwEGN4EGOAE2AEBwgIXEC4YgAQYigUYkQIYsQMYgwEYxwEY0QPCAg0QLhiABBiKBRhDGNQCwgIIEAAYgAQYsQPCAgsQLhiABBixAxjUAsICExAuGIAEGIoFGEMYsQMYxwEYrwHCAgsQLhiABBjHARivAeIDBBgAIEG6BgYIARABGBQ&sclient=gws-wiz-serp#lrd=0x3be7c88d956c3b09:0xfc9b452c90e0db0a,1,,,'; // Change URL value

            } else if (selectedOption === 'google_mcse') {
                console.log('2');
                urlInput1.style.display = 'block';
                urlHeading1.textContent = 'Google MCSE / CCNA Review';
                urlInput1.value = 'https://www.google.com/search?si=AKbGX_rcuucMgom2rba1cdwsvM2SVoIkP2btyqGMV4t0GuHIs4sGV_1tpuqR0YHG4Rzd9SdUzGYNXCd_p0w1TuZUrMXlT2SAkp-Jc9tsM9nTTR1BZF7c2vEmOkFeHP1cFq8rt5pDX17mkCg5iaqsZzUfZ0cYi3OZZM_Kedfa9b4JRCMH1evrzpqLz1BGe1KHGKMzaI9AGovZLdTBy21m9ob0vX4kRdLF-Q%3D%3D&q=Attari%20IT%20Trainings%20%7C%20MCSE%20%7C%20CCNA%20%7C%20MCSA%20%7C%20Azure%20%7C%20VMwareAWS%20Reviews&sa=X&ved=0CCcQ7JgMahcKEwjA9tivop6EAxUAAAAAHQAAAAAQBg&biw=1366&bih=599&dpr=1'; // Change URL value
            }
        
    };

    check1();

</script>

<!----------======================Text Add Form =============================----------------->
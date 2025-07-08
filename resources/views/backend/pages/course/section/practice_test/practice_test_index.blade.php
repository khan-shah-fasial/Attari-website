<!-----==================== Batch schedule Course ==========----------------------->
@php 
    $learning = DB::table('learnings')->where('course_id',$course->id)->where('page','practice')->get()->first();
@endphp
<div class="card">
    <div class="card-body">
        <div class="col-md-12">
            <h4 class="header-title"><b>Practice Test</b></h4>
            <hr>
        </div>
        <!-----========================== Dection Heading ==================------------------------->
        
        {{---
        <section>
            @php 
                $heading = DB::table('courses')->where('id', $course->id)->value('batch_section_heading');
            @endphp
            <form id="updating_heading_form" action="{{ url(route('course.update_heading')) }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" class="form-control" name="course_id" value="{{ $course->id }}">
                <input type="hidden" class="form-control" name="section" value="batch">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group mb-3">
                            <label>Batch Section Title <span class="red">*</span></label>
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
        </section> ---}}

        <!-----========================== Dection Heading ==================------------------------->

        @if(empty($learning))
<!----================================= Add Form ========================-------------------->
            @include('backend.pages.course.section.practice_test.add')
<!----================================== Add Form end ======================-------------------->
        @else
<!----================================== Edit Form ========================-------------------->
            @include('backend.pages.course.section.practice_test.edit')
<!----================================== Edit Form end ======================-------------------->

        @endif


    </div>
    <!-- end card-body-->
</div>

<!-----==================== Batch schedule ==========----------------------->
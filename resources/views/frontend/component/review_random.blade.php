@php

    $text_rev = DB::table('text_reviews as c1')
        ->whereIn('c1.course_id', [5, 7, 8, 9, 10])
        ->where('c1.status', '1')
        ->select('c1.course_id', 'c1.thumbnail', 'c1.name', 'c1.description','c1.url','c1.type', 'c1.created_at as latest_created_at')
        ->join(DB::raw('(SELECT course_id, MAX(created_at) as max_created_at
                        FROM text_reviews
                        WHERE course_id IN (5, 7, 8, 9, 10) AND status = \'1\' AND type IN (\'google\', \'google_mcse\')
                        GROUP BY course_id) as c2'), function ($join) {
                            $join->on('c1.course_id', '=', 'c2.course_id')
                                ->on('c1.created_at', '=', 'c2.max_created_at');
                        })
        ->inRandomOrder()
        ->get();

        
@endphp


<div class="large-12 columns mt-4 slider_content_dots">
    <div class="owl-carousel owl-theme">

        @foreach ($text_rev as $row)
            <div class="item">
                <div class="testimonial_box">
                    <div class="testimonial__header">
                        <div class="row">
                            <div class="col-lg-9 col-10">
                                <div class="testimonial__image"> <img
                                        data-src="{{ asset('storage/' . $row->thumbnail) }}"
                                        class="lazyload d-block w-100" alt="unnamed"> <span
                                        class="testimonial__name">{{ $row->name }}</span> </div>
                            </div>
                            <div class="col-lg-3 col-2">
                                <div class="testimonial__icon"> 
                                    @if($row->type == 'google' || $row->type == 'google_mcse')
                                        <a href="{{ $row->url }}">
                                            <i aria-hidden="true" class="fab fa-google-plus"></i>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial__content">
                        <div class="testimonial__text">
                            @php echo html_entity_decode($row->description) @endphp
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>

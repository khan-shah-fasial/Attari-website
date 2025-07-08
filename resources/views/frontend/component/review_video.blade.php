@php
    
    /*
    $video_rev = DB::table('video_reviews as c1')
        ->whereIn('c1.course_id', [5, 7, 8, 9, 10])
        ->where('c1.status', '1')
        ->select('c1.id', 'c1.course_id', 'c1.image', 'c1.url', 'c1.created_at')
        ->whereIn('c1.id', function ($query) {
            $query->select(DB::raw('MAX(id)'))
                ->from('video_reviews as c2')
                ->whereColumn('c1.course_id', 'c2.course_id')
                ->groupBy('c2.course_id');
        })
        ->get();
    */
        
        
    $video_rev = DB::table('video_reviews as c1')
        ->whereIn('c1.course_id', [5, 7, 8, 9, 10])
        ->where('c1.status', '1')
        ->select('c1.id', 'c1.course_id', 'c1.image', 'c1.url', 'c1.created_at')
        ->where(function ($query) {
            $query->whereRaw('(SELECT COUNT(*) FROM video_reviews as c2 WHERE c2.course_id = c1.course_id AND c2.created_at >= c1.created_at) <= 2');
        })
        ->orderBy('c1.course_id')
        ->orderByDesc('c1.created_at')
        ->get();
    
    


@endphp


<div class="large-12 columns">
    <div class="owl-carousel owl-theme video_testiminials">

        @foreach ($video_rev as $row)
            <div class="item">
                <div class="testimonial_video">
        
                @php
                    // Assuming $row->url contains the YouTube URL
                    if (strpos($row->url, 'embed/') === false) {
                        $videoID = basename($row->url);
                        $youtube_url = 'https://youtu.be/embed/' . $videoID; // Corrected the concatenation
                    } else {
                        $youtube_url = $row->url; // URL already in the correct format
                    }
                @endphp
        
                    <a href="{{ $youtube_url }}" aria-label="Testimonial Video Link"
                        data-fancybox="gallery">
                        <div class="pulse-button"></div>
                        <img data-src="{{ asset('storage/' . $row->image) }}" width="352" height="198"
                            class="lazyload d-block w-100" alt="">
                    </a>
        
                </div>
            </div>
        @endforeach


    </div>
</div>


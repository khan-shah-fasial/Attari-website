<?php

namespace App\Http\Middleware;

use App\Models\Blog;
use Closure;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TrackPostViews
{
    public function handle(Request $request, Closure $next)
    {
        $slug = $request->route('slug');
        $post = Blog::where('slug', $slug)->first();

        if ($post) {
            $key = 'post_viewed_' . $post->id;

            if (!$request->session()->has($key)) {
                // Increment view count using raw SQL to avoid updating timestamps
                \DB::table('blogs')
                ->where('id', $post->id)
                ->increment('views');
                
                // Increment post view count
                // $post->increment('views');

                // Mark post as viewed in session
                $request->session()->put($key, true);
            }
        }

        return $next($request);
    }

}

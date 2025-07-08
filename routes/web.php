<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\IndexController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\backend\RoleController;
use App\Http\Controllers\Frontend\MarketingController;
use App\Http\Controllers\Frontend\CronjobController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Cache;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/learn', function () {
    return null;
});*/

Route::get('/phpinfo-for-me', function () {
    // Display PHP info
    return phpinfo();
});

Route::get('/flush-cache/', function () {
    $cmscacheKey = 'cms_courses';
    Cache::forget($cmscacheKey);
    
    $coursecacheKey = 'courses';
    Cache::forget($coursecacheKey);
    return ' cache cleared!';
    
})->name('flush-cache');

// Route::get('/flush-cache-course', function () {
//     $coursecacheKey = 'courses';
//     Cache::forget($coursecacheKey);
//     return 'Courses cache cleared!';
// })->name('flush-cache-course');

Route::get('/pdfsample/{course}', [SiteMapController::class, 'generate_curriculum_pdf'])->name('generate_curriculum_pdf');

Route::get('/sitemap-generator/{page}', [SiteMapController::class, 'newSitemap'])->name('sitemap');
Route::get('/cmsonlineclean/', [SiteMapController::class, 'cmsonlineclean'])->name('cmsonlineclean');

Route::get('/maintenance/on', function () {
    Artisan::call('down', ['--secret' => 'your-secret-key']);
    return response()->json(['message' => 'Application is now in maintenance mode.']);
});

Route::get('/maintenance/off', function () {
    Artisan::call('up');
    return response()->json(['message' => 'Application is now live.']);
});

Route::post('/getRoleId', [RoleController::class, 'getRoleId'])->name('getRoleId');
Route::post('/getSyllabus', [MarketingController::class, 'getsyllabusonwhatsapp'])->name('getsyllabusonwhatsapp');

Route::any('/get_unsent_email_enquiry', [CronjobController::class, 'get_unsent_email_enquiry'])->name('get_unsent_email_enquiry');

Route::get('/phpinfo-for-self', function() {
    phpinfo();
});

// Home START
Route::get('/', [IndexController::class, 'index'])->name('index');
/*
Route::get('/area-of-practices', [IndexController::class, 'practice_area'])->name('practicearea');
Route::get('/area-of-practice/{slug}', [IndexController::class, 'practice_area_detail'])->name('practicearea-detail');
*/

Route::get('/blog', [IndexController::class, 'blog'])->name('blog');
Route::get('/blogs-data', [IndexController::class, 'blog_data'])->name('blog-data');

Route::get('/category/{course}', [IndexController::class, 'blog_course'])->name('blog-course-view');
$postCategories = DB::table('blog_categories')->pluck('slug')->toArray();

Route::get('/{category}/{slug}', [IndexController::class, 'blog_detail'])
    ->middleware('track.views')
    ->where('category', implode('|', $postCategories))
    ->name('blog.detail');

Route::get('/contact-us', [IndexController::class, 'contact_us'])->name('contact');
Route::any('/about-us', [IndexController::class, 'about_us'])->name('about');
Route::get('/privacy-policy', [IndexController::class, 'privacy_policy'])->name('privacy-policy');

Route::get('/terms-of-service', [IndexController::class, 'terms_page'])->name('terms');
Route::get('/refunds-cancellations', [IndexController::class, 'refund_policy'])->name('refund-policy');

Route::get('/404', [IndexController::class, 'not_found'])->name('error_page');
Route::get('/thank-you', [IndexController::class, 'thank_you'])->name('thank_you');
Route::post('/contact-save', [IndexController::class, 'contact_save'])->name('contact.create');
Route::post('/comment-save', [IndexController::class, 'comment_save'])->name('comment.create');

Route::post('/newsletter-save', [IndexController::class, 'newsletter_save'])->name('newsletter.create');

Route::get('/search', [IndexController::class, 'search'])->name('search');
// Home END

// ------------------------- new url ---------------------------------------------------------------


Route::get('/success-stories', [IndexController::class, 'success_stories'])->name('success-stories');
Route::get('/load-success-stories', [IndexController::class, 'loadSuccessStories']);

Route::get('/learning', [IndexController::class, 'learning'])->name('learning');

Route::get('/reviews', [IndexController::class, 'reviews'])->name('reviews');
Route::get('/batch', [IndexController::class, 'batch'])->name('batch');
Route::get('/training-option-attari-classes', [IndexController::class, 'training_option'])->name('training-option');

//course
$course = DB::table('cms')->pluck('slug')->toArray();
Route::get('/{slug}', [IndexController::class, 'course_detail'])
    ->where('slug', implode('|', $course))
    ->name('course.detail');


Route::get('/photo-gallery', [IndexController::class, 'photo_gallery'])->name('photo-gallery');

Route::get('/form-modal', [IndexController::class, 'form'])->name('component.form');



Route::get('learning/{slug}', [IndexController::class, 'learning_detail'])->name('learning.detail');

Route::get('/clear-course-data', function () {
    session()->forget('enquiry_id');
    session()->forget('course_name');
})->name('clear-course-data');


Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('view:clear');
    //$exitCode = Artisan::call('route:cache');
    //$exitCode = Artisan::call('key:generate');
});

Route::get('/key-generate', function () {
    Artisan::call('key:generate', ['--show' => true]);
    return 'Application key generated successfully!';
});

Route::get('/create-storage-link', function () {
    $exitCode = Artisan::call('storage:link');
    
    if ($exitCode === 0) {
        return 'Storage link created successfully.';
    } else {
        return 'Error creating storage link.';
    }
});

Route::get('/send-test-email', function () {
    Mail::raw('Test email content', function ($message) {
        $message->to('khanfaisal.makent@gmail.com')
                ->subject('Test Email');
    });

    return 'Test email sent!';
});

/*Route::get('/test-otp', function () {
    $sessionData = Session()->all();

    // Print session data
    dd($sessionData);
});*/
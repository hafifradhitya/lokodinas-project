<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AlamatkontakController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\BannerhomeController;
use App\Http\Controllers\BannersliderController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DownloadareaController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HalamanbaruController;
use App\Http\Controllers\IdentitaswebsiteController;
use App\Http\Controllers\IklanatasController;
use App\Http\Controllers\IklansidebarController;
use App\Http\Controllers\JejakpendapatController;
use App\Http\Controllers\KategoriberitaController;
use App\Http\Controllers\KomentarberitaController;
use App\Http\Controllers\KomentarvideoController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\LogowebsiteController;
use App\Http\Controllers\Main2Controller;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ManajemenmodulController;
use App\Http\Controllers\ManajemenuserController;
use App\Http\Controllers\MenuwebsiteController;
use App\Http\Controllers\PlaylistvideoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SekilasinfoController;
use App\Http\Controllers\SensorkomentarController;
use App\Http\Controllers\TagberitaController;
use App\Http\Controllers\TagvideoController;
use App\Http\Controllers\TestingController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\YmController;
use App\Models\Agenda;
use App\Models\Berita;
use App\Models\Halamanbaru;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard'); // Mengarahkan ke halaman register Laravel Breeze

Route::get('/login', function () {
    return view('auth.login'); // Mengarahkan ke halaman login Laravel Breeze
})->name('login');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// Route::get('administrator/dashboard', [DashboardController::class, "dashboard"]);

Route::prefix('administrator')->name('administrator.')->group(function () {
    // Route::resource('halamanbaru', HalamanbaruController::class);
    Route::resource('halamanbaru', HalamanbaruController::class)
    ->middleware('checkModul:halamanbaru');
    // Route::get('identitaswebsite', [IdentitaswebsiteController::class, 'edit'])->name('identitaswebsite.edit');
    // Route::put('identitaswebsite', [IdentitaswebsiteController::class, 'update'])->name('identitaswebsite.update');
    Route::get('identitaswebsite', [IdentitaswebsiteController::class, 'edit'])
    ->middleware('checkModul:identitaswebsite')
    ->name('identitaswebsite.edit');
    Route::resource('berita', BeritaController::class)
    ->middleware('checkModul:berita');
    Route::get('berita/publish/{id_berita}', [BeritaController::class, 'publish'])
        ->name('berita.publish')
        ->middleware('checkModul:berita.publish');
    Route::resource('kategoriberita', KategoriberitaController::class)
        ->middleware('checkModul:kategoriberita');
    Route::resource('tagberita', TagberitaController::class)
        ->middleware('checkModul:tagberita');
    Route::resource('playlistvideo', PlaylistvideoController::class)
        ->middleware('checkModul:playlistvideo');
    Route::resource('video', VideoController::class)
        ->middleware('checkModul:video');
    Route::resource('tagvideo', TagvideoController::class)
        ->middleware('checkModul:tagvideo');


    Route::resource('manajemenuser', ManajemenuserController::class)
        ->middleware('checkModul:manajemenuser');
    Route::get('manajemenuser/delete_akses/{id_umod}/{user_id}', [ManajemenuserController::class, 'delete_akses'])
        ->name('manajemenuser.delete_akses')
        ->middleware('checkModul:manajemenuser.delete_akses');
    Route::resource('manajemenmodul', ManajemenmodulController::class)
        ->middleware('checkModul:manajemenmodul');
    Route::resource('sekilasinfo', SekilasinfoController::class)
        ->middleware('checkModul:sekilasinfo');
    Route::resource('jejakpendapat', JejakpendapatController::class)
        ->middleware('checkModul:jejakpendapat');
    Route::resource('downloadarea', DownloadareaController::class)
        ->middleware('checkModul:downloadarea');
    
    // Route::resource('menuwebsite', MenuwebsiteController::class);
    Route::resource('menuwebsite', MenuwebsiteController::class)
    ->middleware('checkModul:menuwebsite');
    Route::resource('bannerslider', BannersliderController::class)
    ->middleware('checkModul:bannerslider');
    Route::resource('bannerhome', BannerhomeController::class)
        ->middleware('checkModul:bannerhome');
    Route::resource('iklansidebar', IklansidebarController::class)
        ->middleware('checkModul:iklansidebar');
    Route::resource('agenda', AgendaController::class)
        ->middleware('checkModul:agenda');
    Route::resource('alamatkontak', AlamatkontakController::class)
        ->middleware('checkModul:alamatkontak');
    Route::resource('logowebsite', LogowebsiteController::class)
        ->middleware('checkModul:logowebsite');
    Route::resource('album', AlbumController::class)
        ->middleware('checkModul:album');
    Route::resource('iklanatas', IklanatasController::class)
        ->middleware('checkModul:iklanatas');
    Route::resource('sensorkomentar', SensorkomentarController::class)
        ->middleware('checkModul:sensorkomentar');
    Route::resource('komentarberita', KomentarberitaController::class)
        ->middleware('checkModul:komentarberita');
    Route::resource('komentarvideo', KomentarvideoController::class)
        ->middleware('checkModul:komentarvideo');
    Route::resource('gallery', GalleryController::class)
        ->middleware('checkModul:gallery');
    Route::resource('ym', YmController::class)
        ->middleware('checkModul:ym');
});

// Route::prefix('dinas-1')->name('dinas-1.')->group(function () {
//     Route::resource('dashboard',MainController::class );
// });

Route::get('/', [MainController::class, 'index']);
Route::get('sliderlogo', [MainController::class, 'create']);

// Route::get('administrator/layout', [TestingController::class, 'layout']);

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
use App\Http\Controllers\GrafikController;
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
use App\Http\Controllers\PesanmasukController;
use App\Http\Controllers\PlaylistvideoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SekilasinfoController;
use App\Http\Controllers\SensorkomentarController;
use App\Http\Controllers\TagberitaController;
use App\Http\Controllers\TagvideoController;
use App\Http\Controllers\TestingController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\YmController;
use App\Http\Controllers\DatabaseController;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\KategoriprogramController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\TemplatewebsiteController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\TrainerController;
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
    // Route::get('grafik/data', [GrafikController::class, 'fetchGrafikData'])
    //     ->name('grafik.data')
    //     ->middleware('checkModul:grafik');

    // Route::resource('grafik', GrafikController::class)
    //     ->middleware('checkModul:grafik');

    Route::get('grafik/data', [GrafikController::class, 'fetchGrafikData'])->name('grafik.data'); // Correctly named route

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
    Route::resource('pesanmasuk', PesanmasukController::class)
        ->middleware('checkModul:pesanmasuk');

    Route::get('detailpesanmasuk/{id}', [PesanmasukController::class, 'show'])->name('detailpesanmasuk.show');

    // Tambahkan rute untuk sendReply
    Route::post('pesanmasuk/{id}/sendReply', [PesanmasukController::class, 'sendReply'])->name('pesanmasuk.sendReply');

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
    Route::resource('templatewebsite', TemplatewebsiteController::class);
    Route::get('templatewebsite/active/{id_templates}', [TemplatewebsiteController::class, 'active'])
        ->name('templatewebsite.active')
        ->middleware('checkModul:templatewebsite.active');
    Route::resource('testimoni', TestimoniController::class)
        ->middleware('checkModul:testimoni');
    Route::resource('trainer', TrainerController::class)
        ->middleware('checkModul:trainer');
    Route::resource('program', ProgramController::class)
        ->middleware('checkModul:program');
    Route::resource('kategoriprogram', KategoriprogramController::class)
        ->middleware('checkModul:kategoriprogram');

    // Rute untuk backup database
     // Rute untuk backup database
    Route::get('database', [DatabaseController::class, 'index'])
        ->middleware('checkModul:database')
        ->name('database.index');
    Route::get('database/backup', [DatabaseController::class, 'database_backup'])
        ->middleware('checkModul:database.backup')
        ->name('database.backup');
    Route::get('database/backup/{file}/download', [DatabaseController::class, 'database_backup_download'])
        ->middleware('checkModul:database.backup.download')
        ->name('database.backup.download');
    Route::get('database/backup/{file}/remove', [DatabaseController::class, 'database_backup_remove'])
        ->middleware('checkModul:database.backup.remove')
        ->name('database.backup.remove');
});

// Route::prefix('dinas-1')->name('dinas-1.')->group(function () {
//     Route::resource('dashboard',MainController::class );
// });

Route::get('/', [MainController::class, 'index']);
Route::get('sejarah-instansi', [HalamanController::class, 'sejarah_instansi']);
Route::get('struktur-organisasi', [HalamanController::class, 'struktur_organisasi']);
Route::get('visi-dan-misi', [HalamanController::class, 'visi_dan_misi']);
Route::get('berita', [HalamanController::class, 'berita']);
Route::get('detailberita/{judul_seo}', [HalamanController::class, 'detailBerita'])->name('detailberita');
Route::get('detailagenda/{tema_seo}', [HalamanController::class, 'detailAgenda'])->name('detailagenda');
Route::get('detailalbum/{album_seo}', [HalamanController::class, 'detailalbum'])->name('detailalbum');
Route::get('albums', [HalamanController::class, 'album']);
Route::get('video', [HalamanController::class, 'video']);
Route::get('agenda', [HalamanController::class, 'agenda']);
Route::get('sliderlogo', [MainController::class, 'create']);

// Route::get('administrator/layout', [TestingController::class, 'layout']);

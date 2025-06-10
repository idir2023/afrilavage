 <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\HomeController;
    use App\Http\Controllers\OrderController;
    use App\Http\Controllers\AdminController;
    use App\Http\Controllers\NotificationController;
    use App\Http\Controllers\ProfileController;
    use App\Http\Controllers\ServiceController;


    /*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
|
*/

    // Pages publiques
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
    Route::get('/about', [HomeController::class, 'about'])->name('about');
    Route::get('/service', [HomeController::class, 'service'])->name('service');
    Route::get('/order', [HomeController::class, 'order'])->name('order');
    Route::get('/tracking', [HomeController::class, 'tracking'])->name('tracking');
    Route::post('/order/save', [HomeController::class, 'store'])->name('order-store');

    use App\Http\Controllers\MessageController;

// Afficher le formulaire
Route::post('/contact', [App\Http\Controllers\MessageController::class, 'store'])
     ->name('contact.store');




    // Gestion des commandes (CRUD)

    // Tableau de bord (admin)
    Route::middleware(['auth', 'verified', 'is_admin'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
        Route::resource('orders', OrderController::class);
        Route::post('/notifications/{id}/read', [OrderController::class, 'markAsRead'])->name('notifications.read');
        Route::resource('notifications', NotificationController::class);
        Route::resource('services', ServiceController::class);


        // Tu peux ajouter d'autres routes admin ici, par exemple :
        // Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    });

    // Profil utilisateur (authentifié)
    Route::middleware(['auth'])->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // Auth routes (login, register, etc.)
    require __DIR__ . '/auth.php';

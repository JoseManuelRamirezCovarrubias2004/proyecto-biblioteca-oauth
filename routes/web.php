# Google OAuth enabled
<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use GuzzleHttp\Client; // 👈 IMPORTANTE

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| Login con Google
|--------------------------------------------------------------------------
*/

Route::get('/auth/google', function () {
    return Socialite::driver('google')->redirect();
})->name('google.redirect');

Route::get('/auth/google/callback', function () {

    $googleUser = Socialite::driver('google')
        ->setHttpClient(new Client([
            'verify' => false, // 👈 WORKAROUND SSL EN WINDOWS (LOCAL)
        ]))
        ->user();

    $user = User::updateOrCreate(
        ['email' => $googleUser->getEmail()],
        [
            'name' => $googleUser->getName()
                ?? $googleUser->getNickname()
                ?? 'Usuario Google',
            'password' => bcrypt(Str::random(24)), // password dummy
        ]
    );

    Auth::login($user);

    return redirect('/dashboard');
})->name('google.callback');

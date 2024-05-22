<?php
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VacationSpotController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishListController;
use Illuminate\Support\Facades\Hash;


    // Vacation Spots
Route::get('/vacation-spots', [VacationSpotController::class, 'index']);
Route::post('/vacation-spots', [VacationSpotController::class, 'store']);

    // Users
Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/users/{user}', [UserController::class, 'show']);

    // Wish Lists
Route::post('/users/{user}/wish-lists', [WishListController::class, 'store']);
Route::get('/users/{user}/wish-lists', [WishListController::class, 'show']);

Route::post('/admin/login', function (Request $request) {
    $user = User::where('login', $request->login)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    if (!$user->is_admin) {
        return response()->json(['message' => 'Access denied'], 403);
    }

    return $user->createToken('admin_token')->plainTextToken;
});


<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('index');
});

Route::get('/dashboard', function () {

    //sql
    $data['data'] = DB::table('bp_readings')
                    ->select('systolic','diastolic','pulse')
                    ->where('user_id','=',Auth::id())
                    ->limit(7)
                    ->latest()
                    ->get();

    if (count($data) > 0){
        return view('pressure_chart', $data);
    } else {
        return view('pressure_chart');
    }
})->middleware(['auth'])->name('dashboard');

Route::get('/new', function () {
    // DB::table('bp_readings')->insert([
    //     'systolic' => 70,
    //     'diastolic' => 69,
    //     'pulse' => 45,
    //     'user_id' => 2
    // ]);
    return view('pressure_check');
})->middleware(['auth'])->name('pressure_check');

Route::post('/new', function (Request $request) {
    DB::table('bp_readings')->insert([
        'systolic' => $request->systolic,
        'diastolic' => $request->diastolic,
        'pulse' => $request->pulse,
        'user_id' => Auth::id()
    ]);
    return redirect('/dashboard');
})->middleware(['auth'])->name('new');

require __DIR__.'/auth.php';

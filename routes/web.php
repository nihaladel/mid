<?php
use App\Http\Controllers\AmountController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('show', [AmountController::class,'index'])->name('amounts');
Route::delete('delete/{id}',[AmountController::class,'destroy'] )->name('amount.delete');


Route::post('edit/{id}', function ($id) {
    $taskss = DB::table('amounts')->where('id',$id)->get();
    $tasks = DB::table('amounts')->get();
    return view('index',compact(['amounts','amountss']))
    ->with('val',1)
    ->with('btn_val','Edit')
    ->with('tbl_val','Edit');
});

Route::post('up/{id}', function ($id){
    
    DB::table('amounts')->where('id', $id)
    ->update(['name'=>$_POST['name']]);
    return redirect('/');   
    
});

Route::get('/index', function () {
     $tasks = DB::table('amounts')->get();
     return view('index',compact('amounts'))
     ->with('val',0)
     ->with('btn_val','Add Task')
     ->with('tbl_val','Table Task');
     return view('index');
 });


Route::get('front', function () {
    
    return view('layout.front');
});

Route::get('app', function () {
    
    return view('layout.app');
});
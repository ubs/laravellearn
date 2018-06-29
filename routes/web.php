<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Task;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view(
        'welcome',
        ['name' => 'Laraverity Eugenestar']
    );
});

Auth::routes();
    
Route::get('/home', 'HomeController@index')->name('home');

Route::get('about', function(){    
    return view ('about.about')->with('copyright', '&copy;2018 All rights reversed.');
});

Route::get('tasks', function() {
    $tasks = [
        'Brush my teeth',
        'Clean up the house',
        'Write some boring code',
        'Go to sleep'
    ];
    
    //$tasksFromDB = DB::table('tasks')->get(); //Change to below because DB::table loads StdClass
    $tasksFromDB = Task::all();
    
    return view(
        'tasks.index', 
        [
            'tasks' => $tasks, 
            'tasksFromDB' => $tasksFromDB,
            'infoBarMessage' => request()->getSession()->get('infoBarMessage')
        ]
    );
});

Route::get('tasks/create', 'TasksController@create');
Route::post('tasks', 'TasksController@store');
Route::post('tasks/{task}/comments', 'TaskCommentsController@store');

Route::get('tasks/{id}', function ($id){
    //$task = DB::table('tasks')->find($id); //Change to below because DB::table loads StdClass
    $task = Task::find($id);
   
    return view('tasks.show',
        [
            'task' => $task,
            'infoBarMessage' => request()->getSession()->get('infoBarMessage')
        ]);
})->name('tasks.show');

Route::get('tasks-stats', 'TasksStatsController@index');
Route::get('tasksfiltered', 'TasksFilteredController@index');


Route::get('keys', 'KeysController@index');
Route::get('keys/{key}', 'KeysController@show')->name('keys.show');

Route::get('settings', 'AppsettingsController@index');
Route::post('settings', 'AppsettingsController@store');
Route::get('settings/create', 'AppsettingsController@create');
Route::get('settings/{setting}', 'AppsettingsController@show')->name('settings.show');

//https://laracasts.com/series/laravel-from-scratch-2017/episodes/21?autoplay=true
//10 Minutes


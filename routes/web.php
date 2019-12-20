<?php

use App\Models\Site\SiteTree;

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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');


$admin_routes_group = [
    'prefix' => 'admin',
    'middleware' => ['auth'],
];
Route::group($admin_routes_group, function () {
    Route::any('/', Site\PageController::class);
    Route::resource('pages', Site\PageController::class);
});

$SiteTrees = SiteTree::all();
foreach ($SiteTrees as $tree) {
    dump($tree->url);
    Route::any($tree->url, $tree->class_name);
}

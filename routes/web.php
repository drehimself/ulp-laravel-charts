<?php

use App\Charts\SampleChart;

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
    $chart = new SampleChart;
    $chart->labels(['One', 'Two', 'Three', 'Four']);
    $chart->dataset('My dataset', 'bar', [1, 2, 3, 4])->backgroundColor(['green', 'blue', 'red', 'orange']);
    // $chart->dataset('My dataset', 'bar', [4, 3, 2, 1]);
    $chart->minimalist(true);

    return view('welcome', [
        'chart' => $chart,
    ]);
});

Route::get('/test', function () {
    $chart = new SampleChart;

    $api = url('/test_data');

    $chart->labels(['test1', 'test2', 'test3'])
        ->load($api);

    return view('welcome', [
        'chart' => $chart,
    ]);
});

Route::get('/test_data', function () {
    sleep(2);

    $chart = new SampleChart;

    $chart->dataset('Sample Test', 'bar', [3,4,1]);
    $chart->dataset('Sample Test', 'line', [1,4,3]);

    return $chart->api();
});

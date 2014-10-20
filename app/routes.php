<?php


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*Add all the packages that will be needed...*/
use Badcow\LoremIpsum;
use fzaninotto\Faker\src;

Route::get('/', function()
{
	//return View::make('hello');
	return View::make('index');
});


Route::get('/user-generator', function () {
	//return 'This is where the user generator will live for GET'; //TODO replace with VIEW. Will I need a POST?
	$faker = Faker\Factory::create();
   return View::make('user-generator')
   -> with('faker',$faker);
});


Route::get('/lorem-ipsum', function () {
	$count=3;//Hardcode for now TODO get count proply
	$generator = new Badcow\LoremIpsum\Generator();    ;
	$paragraphs = $generator->getParagraphs($count);
	return View::make('lorem-ipsum')
	-> with('paragraphs',$paragraphs);
});
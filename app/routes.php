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
use Fzaninotto\Faker;

Route::get('/', function()
{
	//return View::make('hello');
	//return 'This is the landing page';// TODO replace with a view
	return View::make('index');
});


Route::get('/user-generator', function () {
	//return 'This is where the user generator will live for GET'; //TODO replace with VIEW. Will I need a POST?
   return View::make('user-generator');
});


Route::get('/lorem-ipsum', function () {
	$count=3;//Hardcode for now TODO get count proply
	$generator = new Badcow\LoremIpsum\Generator();    ;
	$paragraphs = $generator->getParagraphs($count);
	//$paragraphs="Boo";//TODO testing ...
	return View::make('lorem-ipsum')
	-> with('paragraphs',$paragraphs);
});
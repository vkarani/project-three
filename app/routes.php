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
	$num_users = Input::get('num_users');
	//make sure input is between 1 and 99
	if($num_users <1||$num_users>99) {
		$num_users=2;//Default of 2 users
	}
	//return 'This is where the user generator will live for GET'; //TODO replace with VIEW. Will I need a POST?
	$faker = Faker\Factory::create();
   return View::make('user-generator')
   -> with('faker',$faker)
   -> with('num_users',$num_users);
});


Route::get('/lorem-ipsum', function () {
   $num_paragraphs = Input::get('num_paragraphs');
	//make sure input is between 1 and 99
	if($num_paragraphs <1||$num_paragraphs>99) {
		$num_paragraphs=2;//Default of 2 paragraphs
	}   	
	$generator = new Badcow\LoremIpsum\Generator();    ;
	$paragraphs = $generator->getParagraphs($num_paragraphs);
	return View::make('lorem-ipsum')
	-> with('paragraphs',$paragraphs)
	-> with('num_paragraphs',$num_paragraphs);
});
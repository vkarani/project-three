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
	$num_users     = Input::get('num_users');
	$date_of_birth = Input::get('date_of_birth');
	$city_of_birth = Input::get('city_of_birth');
	$address = Input::get('address');
	//var_dump($address);
	//make sure input is between 1 and 99
	if($num_users <1||$num_users>99) {
		$num_users=2;//Default of 2 users
	}
	$faker = Faker\Factory::create();
   return View::make('user-generator')
   -> with('faker',$faker)
   -> with('num_users',$num_users)
   -> with('date_of_birth',$date_of_birth)
   -> with('city_of_birth',$city_of_birth)
   -> with('address',$address);
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
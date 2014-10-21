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
	$city_of_birth = Input::get('city_of_birth');
	$date_of_birth = Input::get('date_of_birth');
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


Route::get('/xkcd', function() {
	$number_of_words=Input::get('number_of_words');
	//only 1-9 words in the password, else 5
	if(($number_of_words < 1) ||( $number_of_words > 10)) {
        $number_of_words=5;
   }

	//Add numbers
	if(is_null(Input::get('add_number'))) {
		 $use_number=false;
	}

	else {
		$use_number=true;
	}
	
	//Add symbols
   if(is_null(Input::get('add_symbol'))) {
   	$use_symbol=false;
   }
   else {
   	$use_symbol=true;
   }	
	
   //Word list processing
   $symbols="!@#$%^*()_-+="; // a set of random characters to use in the password
   $re = "/\\<li\\>[\\n, ,\\t,\\r]*[a-z]*[\\n, ,\\t,\\r]*\\<\\/li\\>/"; //regular expression, get all between the <li></li> 
   $testfile = file_get_contents('http://www.paulnoll.com/Books/Clear-English/words-29-30-hundred.html');
   preg_match_all($re, $testfile, $match);
   $word_list=$match[0];
   foreach($word_list as &$value){
     /*Remove unneeded characters*/
     $value=str_replace("<li>", "",$value);
     $value=str_replace("</li>", "", $value);
     $value=str_replace("\n", "", $value);
     $value=str_replace("\t", "", $value);
     $value=str_replace("\r", "", $value);

     /*Pick a random member of the string and replace it 
     with a random member of the test string*/
     if($use_symbol==true){
       $display_symbol="checked";//keep the checkbox checked
       $value_index=rand(0,(strlen($value))-1);//pick a random member of the string
       $random_string_index=rand(0,(strlen($symbols))-1);//pick a random member of the random character string
       $value[$value_index]=$symbols[$random_string_index];//insert random character into string
     }

     /*Pick a random member of the string and
     Replace it with a random num from 0-9*/
     if($use_number==true){
       $display_number="checked";//keep checkbox checked
       $value_index=rand(0,strlen($value));//pick a random member of the string
       $value[$value_index]=rand(0,9);//and replace it with a random integer from 0-9
     }
   }
	
	//var_dump($word_list);
	
	return View::make('xkcd')
	-> with('word_list',$word_list)
	-> with('number_of_words',$number_of_words)
	-> with('use_number',$use_number)
	-> with('use_symbol',$use_symbol);
});
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

Route::get('/', function()
{
	return View::make('homepage')
        ->with('path','homepage');
});

Route::get('/loremgen', function()
{
	return View::make('lorem-form')
		->with('error','')
		->with('content','')
		->with('paragraphs','5')
		->with('path','loremgen');
});

Route::post('/loremgen', function()
{
	
	$paragraphs = Input::get('paragraphs');
	$error = '';
	$content = '';

	
	{
		$generator = new Badcow\LoremIpsum\Generator();
		$paragraph_array = $generator->getParagraphs($paragraphs);
		$content = '';

		foreach ($paragraph_array as $p)
		{
			$content .= '<p>' . $p . '</p>';            
		}
  //      die($content);
        //comment
	}
	

	
	return View::make('lorem-form')
		->with('content',$content)
		->with('paragraphs',$paragraphs)
		->with('path','loremgen');
});

Route::get('/usergen', function()
{
	return View::make('user')
		->with('users','')
		->with('birthday','')
		->with('profile','')
		->with('content','')
		->with('path','user');
});

Route::post('/usergen', function()
{
	
	$users = Input::get('users');
	$birthday = Input::get('birthday');
	$profile = Input::get('profile');
	$content = '';
	$error = '';

	
	$faker = new Faker\Generator();
	$faker->addProvider(new Faker\Provider\en_US\Person($faker));
	$faker->addProvider(new Faker\Provider\DateTime($faker));
	$faker->addProvider(new Faker\Provider\Lorem($faker));

	
	
	{
		for ($i = 0; $i < $users; $i++)
		{
			$sex = '';

			if(rand(0,1)) $sex = 'male'; else $sex = 'female';

			$content .= '<h3>' . $faker->name($sex) . '</h3>';

			if ($birthday)
				$content .= $faker->dateTimeThisCentury->format('F d, Y') . '</br>' ;
                        

            if ($profile)
				$content .= '<br>' . $faker->paragraphs(1)[0] . '</br>' ;

			
		}
	}
	

	
	return View::make('user')
		->with('users',$users)
        ->with('profile',$profile)
		->with('birthday',$birthday)
		->with('content',$content)
		->with('path','usergen');
});

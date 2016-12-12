
<?php



use App\User;
use App\Album;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'username' => $faker->unique()->userName,
        'bio' => $faker->sentence,
        'user_type' => $faker->randomElement($array = array('Photographer', 'Shopper')),
        'profile_pic' => $faker->image($dir = 'd:\wamp64\www\photoShare\public\profile', $width = 250, $height = 250, null, false),
        'password' => $password ?: $password = 'secret',
        'remember_token' => str_random(10),

    ];
});

$factory->define(App\Album::class, function (Faker\Generator $faker) {

$users = User::select('id')->where('user_type', 'Photographer')->get();
   $ids = array ();
    foreach ($users as $user)
    {
        array_push($ids, $user->id);
    }

    return [
        'user_id' => $faker->randomElement($array = $ids),
        'name' => $faker->word,
        'description' => $faker->sentence,
        'cover_image' => $faker->image($dir = 'd:\wamp64\www\photoShare\public\albums', $width = 250, $height = 250, null, false),

    ];
});

$factory->define(App\Photo::class, function (Faker\Generator $faker) {

    $albums = Album::select('id')->get();
    $ids = array ();
    foreach ($albums as $album)
    {
        array_push($ids, $album->id);
    }

    return [
        'album_id' => $faker->randomElement($array = $ids),
        'title' => $faker->word,
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 200),
        'description' => $faker->sentence,
        'photo' => $faker->image($dir = 'd:\wamp64\www\photoShare\public\photos', $width = 640, $height = 480, null, false),

    ];
});
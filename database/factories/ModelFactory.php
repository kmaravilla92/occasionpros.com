<?php

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
    $roles = [
        '{"client":true}',
        '{"professional":true}'
    ];
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'name' => $faker->firstName .' '. $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('password'),
        'permissions' => $roles[rand(0,1)]
    ];
});

$factory->define(App\Models\Entities\ProfessionalInformation::class, function (Faker\Generator $faker) {
    return [
        "first_name" => $faker->firstName,
        "last_name" => $faker->lastName,
        "profile_pic" => "/storage/uploads/blog-posts/d9415ec3703c4084a5e276d7f684603a.jpeg",
        "countries_served" => ['Canada','Philippines','USA'][rand(0,2)],
        "biography" => $faker->text,
        "location" => $faker->city,
        "contact_number" => $faker->phoneNumber,
        "business_name" => $faker->company,
        "city_based" => $faker->city,
        "willing_distance_to_travel" => 'Up to ' . $faker->randomDigit . ' miles',
        "years_of_experience" => $faker->randomDigit . ' years',
        "has_liability_insurance" => 'Yes',
        "separation_from_other_pros" => $faker->sentence,
        "reference_upon_request" => 'Yes',
        "require_deposit" => 'Yes',
        "advance_booking_amount" => $faker->randomDigit. ' week before',
        "languages_can_speak" => 'English',
        "can_provide_cultural_services" => 'N/A',
        "media" => json_encode([
            "images" => [
                "/storage/uploads/blog-posts/d9415ec3703c4084a5e276d7f684603a.jpeg",
                "/storage/uploads/blog-posts/d9415ec3703c4084a5e276d7f684603a.jpeg",
                "/storage/uploads/blog-posts/d9415ec3703c4084a5e276d7f684603a.jpeg",
                "/storage/uploads/blog-posts/d9415ec3703c4084a5e276d7f684603a.jpeg",
                "/storage/uploads/blog-posts/d9415ec3703c4084a5e276d7f684603a.jpeg"
            ],
            "videos" => [
                $faker->url
            ],
            "music" => [
                $faker->url
            ],
            "social_links" => [
                "website" => $faker->url,
                "facebook" => $faker->url,
                "twitter" => $faker->url,
                "pinterest" => $faker->url,
                "instagram" => $faker->url,
            ]
        ])
    ];
});

$factory->define(App\Models\Entities\EventBid::class, function (Faker\Generator $faker) {
    return [
        "details" => $faker->text,
        "event_id" => 1,
        "created_by" => rand(1,10)
    ];
});

$factory->define(App\Models\Entities\EventPost::class, function (Faker\Generator $faker) {
    return [
        "title" => $faker->realText(75),
        "slug" => $faker->slug,
        "description" => $faker->text,
        "event_type_id" => 1,
        "email" => $faker->safeEmail,
        "contact_number" => $faker->phoneNumber,
        "date" => $faker->dateTime,
        "location" => $faker->city,
        "budget" => $faker->numberBetween(500, 10000),
        "status" => '1',
        "created_by" => rand(1,10)
    ];
});

$factory->define(App\Models\Entities\BlogPost::class, function (Faker\Generator $faker) {
    return [
        'uuid' => $faker->uuid,
        'title' => $faker->realText(75),
        'slug' => $faker->slug,
        'featured_image' => '/storage/uploads/blog-posts/2.jpg',
        'content' => $faker->text,
        'status' => '1',
        'created_by' => 1
    ];
});

$factory->define(App\Models\Entities\SkillCategory::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'parent' => 0,
        'status' => '1'
    ];
});

$factory->define(App\Models\Entities\ProfessionalSelectedCategory::class, function (Faker\Generator $faker) {
    return [
        'professional_information_id' => 0,
        'professional_category_id' => 0,
    ];
});

$factory->define(App\Models\Entities\ProfessionalBidEvent::class, function (Faker\Generator $faker) {
    return [
        'professional_id' => 0,
        'event_id' => 0,
        'application_status' => '1',
        'status' => '1'
    ];
});

$factory->define(App\Models\Entities\Testimonial::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->realText(75),
        'feedback' => $faker->text,
        'created_by' => '1',
        'created_for' => '1',
        'event_id' => '1',
        'rating' => '1',
        'status' => '1'
    ];
});

$factory->define(App\Models\Entities\PaymentTransaction::class, function (Faker\Generator $faker) {
    return [
        'code' => strtoupper($faker->isbn10),
        'paid_for' => 1,
        'paid_by' => 1,
        'event_id' => 1,
        'amount' => $faker->numberBetween(500, 10000),
        'feed_amount' => $faker->numberBetween(500, 10000),
        'status' => ['0','1','2'][rand(0,2)]
    ];
});

<?php

use Faker\Generator as Faker;

/*
$factory->define(App\User::class, function (Faker $faker) {
    return [
        'id' => rand(5,1000),
        'name' => 'Владислав',
        'email' => 'vlad0s74chel@gmail.com',
        'lastname' => 'Черкасов',
        'patronymic' => 'Андреевич',
        'regnumber' => '123321',
        'phone' => str_random(11),
        'IDversion' => 'a:1:{s:2:"id";a:1:{i:0;s:2:"75";}}',
        'organisation' => 'a:1:{s:4:"regs";a:1:{i:0;s:1:"1";}}',
        'password' => Hash::make('vxGqyGD9LB'), // secret
        'remember_token' => str_random(10),
    ];
});
*/

$factory->define(App\Orders::class, function (Faker $faker) {
    return [
        'userid' => rand(5,1000),
        'versionid' => rand(1,100),
        'qty' => rand(1,10),
        'status' => 'Принят',
        'order' => 'Новый заказ',
        'created_at' => $faker->dateTimeBetween('this month', '+12 month'),
        'updated_at' => $faker->dateTimeBetween('this month', '+12 month'),
    ];
});




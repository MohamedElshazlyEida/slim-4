<?php

/**
 * Use $faker to add dummy attributes to model's factory
 * Example:
 * fn ($faker) => [
 *   'first_name' => $faker->firstName,
 *   'user_id' => 1, // Hard Code/Override User Id
 * ]
 */
Factory::define(\App\Location::class, fn ($faker) => [
    'name' => $faker->city,
    'created_at' => date('Y-m-d H:i:s'),
    'updated_at' => date('Y-m-d H:i:s'),
]);

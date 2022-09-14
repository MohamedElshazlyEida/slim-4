<?php


use App\User;
use App\Location;
use Phinx\Seed\AbstractSeed;

class TransactionSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run()
    {
        $locations = Location::get();

        $locations->each(fn ($location) => factory(\App\Transaction::class, 100)->create([
            'location_id' => $location->id,
            'user_id' => User::pluck('id')->random(),
        ]));

    }
}

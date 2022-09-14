<?php


use Phinx\Seed\AbstractSeed;

class LocationSeeder extends AbstractSeed
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
        factory(App\Location::class, 1000)->create();
    }
}

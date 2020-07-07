<?php

use App\Models\Client;
use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 10001)->create();
        $companies = factory(Company::class, 10001)->create();
        $clients = factory(Client::class, 10001)->create();

        // Seed client_company pivot
        $clients = $clients->random(2000);
        $clients->each(function (Client $client) use ($companies) {
            $client->companies()->attach(
                $companies
                    ->random(rand(10, 50))
                    ->pluck('id')
                    ->toArray(),
                [
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        });
    }
}

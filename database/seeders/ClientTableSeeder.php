<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\Client;


class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = Storage::disk('local')->get('/json/clients.json');
        $clients = json_decode($json, true);

        foreach($clients as $client){
            Client::query()->updateOrCreate([
                'id' => $client['id'],
                'name' => $client['name'],
                'email' => $client['email'],
                'job' => $client['job'],
            ]);
        }
    }
}

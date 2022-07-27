<?php

namespace App\Console\Commands;

use App\Models\Character;
use App\Models\Movie;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Console\Command;

class StarWarsImport extends Command
{
    const FILMS_API = 'https://swapi.dev/api/films/';
    const PEOPLE_API = 'https://swapi.dev/api/people/';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'starwars:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Download 30 characters and all movies to seed the database';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Fetch charactes, looping till 30 items in array (page 3)
        $people = [];

        while (count($people) < 30)
        {
            $page = sprintf('%s?page=%d', self::PEOPLE_API, count($people) / 10 + 1);

            try
            {
                $result = $this->fetchUrl($page);
            } catch (GuzzleException $e)
            {
                $this->error(sprintf('Failed to fetch people page: %s', $page));
            }

            $people = array_merge($people, $result->results);
        }

        // Fetch films data
        try
        {
            $films = $this->fetchUrl(self::FILMS_API)->results;
        } catch (GuzzleException $e)
        {
            $this->error('Failed to fetch film page');
        }

        // Create film entities
        foreach ($films as $film)
        {
            [, , , , , $id] = explode('/', $film->url);

            $movie = Movie::firstOrNew([
                'id' => $id,
                'name' => $film->title,
            ]);

            if (!$movie->save())
            {
                $this->error('Failed to create movie.');
            }
        }

        // Create film entities
        foreach ($people as $person)
        {
            $character = Character::firstOrNew([
                'name' => $person->name,
                'mass' => $person->mass,
                'height' => $person->height,
                'gender' => $person->gender,
            ]);

            // Attempt entity save
            if (!$character->save())
            {
                $this->error('Failed to create character.');
            }

            // Attempt relationship creation
            foreach ($person->films as $role)
            {
                // Explode URL to get ID
                [, , , , , $id] = explode('/', $role);

                // Attempt lookup by id
                $acting_movie = Movie::find($id);

                // Create relationship
                $character->movies()->save($acting_movie);
            }
        }

        return 0;
    }

    /**
     * Fetch API data
     *
     * @param $url
     * @return object
     * @throws GuzzleException
     */
    protected function fetchUrl($url): object
    {
        $client = new GuzzleClient();

        $request = $client->request('GET', $url, [
            'headers' => [
                'Accept' => 'application/json',
            ],
        ]);

        $data = $request->getBody()->getContents();

        return json_decode($data);
    }
}

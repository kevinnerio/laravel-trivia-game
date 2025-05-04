<?php

namespace App\Services;

use GuzzleHttp\Client;

class TriviaApiService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function fetchQuestions($amount = 10, $category = 9, $difficulty = 'easy')
    {
        $response = $this->client->get('https://opentdb.com/api.php', [
            'query' => [
                'amount' => $amount,
                'category' => $category,
                'difficulty' => $difficulty,
                'type' => 'multiple', // or 'boolean' based on what type of questions you need
            ],
        ]);

        return json_decode($response->getBody(), true);
    }
}

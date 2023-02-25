<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

// API JOKES

class CallApiService
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function fetchRandomJokes(): array
    {
        $response = $this->client->request(
            'GET',
            'https://chuckn.neant.be/api/rand'
        );

        $statusCode = $response->getStatusCode();
        // $statusCode = 200
        $contentType = $response->getHeaders()['content-type'][0];
        // $contentType = 'application/json'
        $content = $response->getContent();
        // $content = '{"id":706, "joke":""}'
        $content = $response->toArray();
        // $content = ['id' => 706, 'joke' => '']
        dd($content);
        return $content;
    }
}

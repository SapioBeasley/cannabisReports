<?php

namespace App\Libraries;

class CannabisProducers
{
    public function __construct()
    {
        $this->apiUrl = env('CANNABIS_REPORTS_API_URL');

        $this->apiKey = env('CANNABIS_REPORTS_API_KEY');

        $this->client = new \GuzzleHttp\Client();
    }

    public function getAll()
    {
        return $this->request('GET', $this->apiUrl . '/producers');
    }

    public function getByUcpc($ucpc)
    {
        return $this->request('GET', $this->apiUrl . '/producers/' . $ucpc);
    }

    public function getExtracts($ucpc)
    {
        return $this->request('GET', $this->apiUrl . '/producers/' . $ucpc . '/extracts');
    }

    public function getEdibles($ucpc)
    {
        return $this->request('GET', $this->apiUrl . '/producers/' . $ucpc . '/edibles');
    }

    public function getProducts($ucpc)
    {
        return $this->request('GET', $this->apiUrl . '/producers/' . $ucpc . '/products');
    }

    public function getAvailability($ucpc, $lat, $lng, $radius)
    {
        // Use angular position on front end to get lat lng
        return $this->request('GET', $this->apiUrl . '/producers/' . $ucpc . '/availability/geo/' . $lat . '/' . $lng . '/' . $radius);
    }

    public function request($method, $url)
    {
        $res = $this->client->request($method, $url, [
            'headers' => [
                'X-API-Key' => $this->apiKey,
            ]
        ]);

        return response()->json(json_decode($res->getBody()));
    }
}

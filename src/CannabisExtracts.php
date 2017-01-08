<?php

namespace App\Libraries;

class CannabisExtracts
{
    public function __construct()
    {
        $this->apiUrl = env('CANNABIS_REPORTS_API_URL');

        $this->apiKey = env('CANNABIS_REPORTS_API_KEY');

        $this->client = new \GuzzleHttp\Client();
    }

    public function getAll()
    {
        return $this->request('GET', $this->apiUrl . '/extracts');
    }

    public function getByUcpc($ucpc)
    {
        return $this->request('GET', $this->apiUrl . '/extracts/' . $ucpc);
    }

    public function getUser($ucpc)
    {
        return $this->request('GET', $this->apiUrl . '/extracts/' . $ucpc . '/user');
    }

    public function getReviews($ucpc)
    {
        return $this->request('GET', $this->apiUrl . '/extracts/' . $ucpc . '/reviews');
    }

    public function getEffectsFlavors($ucpc)
    {
        return $this->request('GET', $this->apiUrl . '/extracts/' . $ucpc . '/effectsFlavors');
    }

    public function getProducer($ucpc)
    {
        return $this->request('GET', $this->apiUrl . '/extracts/' . $ucpc . '/producer');
    }

    public function getStrain($ucpc)
    {
        return $this->request('GET', $this->apiUrl . '/extracts/' . $ucpc . '/strain');
    }

    public function getByType($type)
    {
        return $this->request('GET', $this->apiUrl . '/extracts/type/' . $type);
    }

    public function getAvailability($ucpc, $lat, $lng, $radius)
    {
        // Use angular position on front end to get lat lng
        return $this->request('GET', $this->apiUrl . '/extracts/' . $ucpc . '/availability/geo/' . $lat . '/' . $lng . '/' . $radius);
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

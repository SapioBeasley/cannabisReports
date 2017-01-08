<?php

namespace Sapioweb\CannabisReports;

class CannabisProducts
{
    public function __construct()
    {
        $this->apiUrl = env('CANNABIS_REPORTS_API_URL');

        $this->apiKey = env('CANNABIS_REPORTS_API_KEY');

        $this->client = new \GuzzleHttp\Client();
    }

    public function getAll()
    {
        return $this->request('GET', $this->apiUrl . '/products');
    }

    public function getByUcpc($ucpc)
    {
        return $this->request('GET', $this->apiUrl . '/products/' . $ucpc);
    }

    public function getUser($ucpc)
    {
        return $this->request('GET', $this->apiUrl . '/products/' . $ucpc . '/user');
    }

    public function getByType($type)
    {
        return $this->request('GET', $this->apiUrl . '/products/type/' . $type);
    }

    public function getReviews($ucpc)
    {
        return $this->request('GET', $this->apiUrl . '/products/' . $ucpc . '/reviews');
    }

    public function getEffectsFlavors($ucpc)
    {
        return $this->request('GET', $this->apiUrl . '/products/' . $ucpc . '/effectsFlavors');
    }

    public function getProducer($ucpc)
    {
        return $this->request('GET', $this->apiUrl . '/products/' . $ucpc . '/producer');
    }

    public function getStrain($ucpc)
    {
        return $this->request('GET', $this->apiUrl . '/products/' . $ucpc . '/strain');
    }

    public function getAvailability($ucpc, $lat, $lng, $radius)
    {
        // Use angular position on front end to get lat lng
        return $this->request('GET', $this->apiUrl . '/products/' . $ucpc . '/availability/geo/' . $lat . '/' . $lng . '/' . $radius);
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

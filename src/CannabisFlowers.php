<?php

namespace Sapioweb\CannabisReports;

class CannabisFlowers
{
    public function __construct()
    {
        $this->apiUrl = env('CANNABIS_REPORTS_API_URL');

        $this->apiKey = env('CANNABIS_REPORTS_API_KEY');

        $this->client = new \GuzzleHttp\Client();
    }

    public function getAll()
    {
        return $this->request('GET', $this->apiUrl . '/flowers');
    }

    public function getByType($type)
    {
        return $this->request('GET', $this->apiUrl . '/flowers/type/' . $type);
    }

    public function getByUcpc($ucpc)
    {
        return $this->request('GET', $this->apiUrl . '/flowers/' . $ucpc);
    }

    public function getReviews($ucpc)
    {
        return $this->request('GET', $this->apiUrl . '/flowers/' . $ucpc . '/reviews');
    }

    public function getUser($ucpc)
    {
        return $this->request('GET', $this->apiUrl . '/flowers/' . $ucpc . '/user');
    }

    public function getProducer($ucpc)
    {
        return $this->request('GET', $this->apiUrl . '/flowers/' . $ucpc . '/producer');
    }

    public function getEffectsFlavors($ucpc)
    {
        return $this->request('GET', $this->apiUrl . '/flowers/' . $ucpc . '/effectsFlavors');
    }

    public function getStrain($ucpc)
    {
        return $this->request('GET', $this->apiUrl . '/flowers/' . $ucpc . '/strain');
    }

    public function getAvailability($ucpc, $lat, $lng, $radius)
    {
        // Use angular position on front end to get lat lng
        return $this->request('GET', $this->apiUrl . '/flowers/' . $ucpc . '/availability/geo/' . $lat . '/' . $lng . '/' . $radius);
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

<?php

namespace Sapioweb\CannabisReports;

class CannabisEdibles
{
    public function __construct()
    {
        $this->apiUrl = env('CANNABIS_REPORTS_API_URL');

        $this->apiKey = env('CANNABIS_REPORTS_API_KEY');

        $this->client = new \GuzzleHttp\Client();
    }

    public function getAll()
    {
        return $this->request('GET', $this->apiUrl . '/edibles');
    }

    public function getByType($type)
    {
        return $this->request('GET', $this->apiUrl . '/edibles/type/' . $type);
    }

    public function getByUcpc($ucpc)
    {
        return $this->request('GET', $this->apiUrl . '/edibles/' . $ucpc);
    }

    public function getUser($ucpc)
    {
        return $this->request('GET', $this->apiUrl . '/edibles/' . $ucpc . '/user');
    }

    public function getReviews($ucpc)
    {
        return $this->request('GET', $this->apiUrl . '/edibles/' . $ucpc . '/reviews');
    }

    public function getEffectsFlavors($ucpc)
    {
        return $this->request('GET', $this->apiUrl . 'edibles/' . $ucpc . '/effectsFlavors');
    }

    public function getProducer($ucpc)
    {
        return $this->request('GET', $this->apiUrl . 'edibles/' . $ucpc . '/producer');
    }

    public function getStrain($ucpc)
    {
        return $this->request('GET', $this->apiUrl . 'edibles/' . $ucpc . '/strain');
    }

    public function getAvailability($ucpc, $lat, $lng, $radius)
    {
        return $this->request('GET', $this->apiUrl . 'edibles/' . $ucpc . '/availability/geo/' . $lat . '/' . $lng . '/' . $radius);
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

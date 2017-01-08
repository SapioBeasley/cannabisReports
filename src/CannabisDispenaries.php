<?php

namespace Sapioweb\CannabisReports;

class CannabisDispensaries
{
    public function __construct()
    {
        $this->apiUrl = env('CANNABIS_REPORTS_API_URL');

        $this->apiKey = env('CANNABIS_REPORTS_API_KEY');

        $this->client = new \GuzzleHttp\Client();
    }

    public function getAll()
    {
        return $this->request('GET', $this->apiUrl . '/dispensaries');
    }

    public function show($state, $city, $slug)
    {
        return $this->request('GET', $this->apiUrl . '/dispensaries/' . $state . '/' . $city . '/' . $slug);
    }

    public function getStrains($state, $city, $slug)
    {
        return $this->request('GET', $this->apiUrl . '/dispensaries/' . $state . '/' . $city . '/' . $slug . '/strains');
    }

    public function getExtracts($state, $city, $slug)
    {
        return $this->request('GET', $this->apiUrl . '/dispensaries/' . $state . '/' . $city . '/' . $slug . '/extracts');
    }

    public function getEdibles($state, $city, $slug)
    {
        return $this->request('GET', $this->apiUrl . '/dispensaries/' . $state . '/' . $city . '/' . $slug . '/edibles');
    }

    public function getProducts($state, $city, $slug)
    {
        return $this->request('GET', $this->apiUrl . '/dispensaries/' . $state . '/' . $city . '/' . $slug . '/products');
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

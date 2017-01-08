<?php

namespace Sapioweb\CannabisReports;

class CannabisSeedCompanies
{
    public function __construct()
    {
        $this->apiUrl = env('CANNABIS_REPORTS_API_URL');

        $this->apiKey = env('CANNABIS_REPORTS_API_KEY');

        $this->client = new \GuzzleHttp\Client();
    }

    public function getByUcpc($ucpc)
    {
        return $this->request('GET', $this->apiUrl . '/seed-companies/' . $ucpc);
    }

    public function getStrains($ucpc)
    {
        return $this->request('GET', $this->apiUrl . '/flowers/' . $ucpc . '/strains');
    }

    public function getReviews($ucpc)
    {
        return $this->request('GET', $this->apiUrl . '/flowers/' . $ucpc . '/reviews');
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

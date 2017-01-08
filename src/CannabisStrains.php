<?php

namespace Sapioweb\CannabisReports;

class CannabisStrains
{
    public function __construct()
    {
        $this->apiUrl = env('CANNABIS_REPORTS_API_URL');

        $this->apiKey = env('CANNABIS_REPORTS_API_KEY');

        $this->client = new \GuzzleHttp\Client();
    }

    public function getAll()
    {
        return $this->request('GET', $this->apiUrl . '/strains');
    }

    public function getByUcpc($ucpc)
    {
        return $this->request('GET', $this->apiUrl . '/strains/' . $ucpc);
    }

    public function getUser($ucpc)
    {
        return $this->request('GET', $this->apiUrl . '/strains/' . $ucpc . '/user');
    }

    public function getReviews($ucpc)
    {
        return $this->request('GET', $this->apiUrl . '/strains/' . $ucpc . '/reviews');
    }

    public function getEffectsFlavors($ucpc)
    {
        return $this->request('GET', $this->apiUrl . '/strains/' . $ucpc . '/effectsFlavors');
    }

    public function getSeedCompany($ucpc)
    {
        return $this->request('GET', $this->apiUrl . '/strains/' . $ucpc . '/seedCompany');
    }

    public function getGenetics($ucpc)
    {
        return $this->request('GET', $this->apiUrl . '/strains/' . $ucpc . '/genetics');
    }

    public function getChildren($ucpc)
    {
        return $this->request('GET', $this->apiUrl . '/strains/' . $ucpc . '/children');
    }

    public function getAvailability($ucpc, $lat, $lng, $radius)
    {
        // Use angular position on front end to get lat lng
        return $this->request('GET', $this->apiUrl . '/strains/' . $ucpc . '/availability/geo/' . $lat . '/' . $lng . '/' . $radius);
    }

    public function query($query)
    {
        return $this->request('GET', $this->apiUrl . '/strains/search/' . $query);
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

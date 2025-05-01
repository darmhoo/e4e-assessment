<?php

namespace App\Http\Services;


use Illuminate\Support\Facades\Http;

class NewsApiService
{




    public function fetchNews()
    {
        $url = config('services.news_api.url');
        $apiKey = config('services.news_api.key');
        return Http::get($url, [
            'country' => 'us',
            'apiKey' => $apiKey,
        ]);
    }


}
<?php

namespace App\Http\Controllers;

use App\Models\ApiRequestLog;
use App\Http\Services\NewsApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ApiRequestLogController extends Controller
{
    private $apiService;
    public function __construct(NewsApiService $newsApiService)
    {
        $this->apiService = $newsApiService;
    }


    public function getNews(ApiRequestLog $apiRequestLog)
    {
        $data = null;
        if (Cache::has('news_api')) {
            $data = Cache::get('news_api');
        } else {
            $data = $this->apiService->fetchNews();
            $apiRequestLog->request_url = config('services.news_api.url');
            $apiRequestLog->status = $data['status'];
            $apiRequestLog->response = $data;
            $apiRequestLog->save();
            Cache::put('news_api', $data, 3600); // Cache for 1 hour

        }

        return response()->json([
            'status' => $data['status'],
            'articles' => $data['articles'],
        ])->setStatusCode(200);
    }



}

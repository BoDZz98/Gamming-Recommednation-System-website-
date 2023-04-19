<?php

namespace app\Services;
use App\Models\recommended_games;
use GuzzleHttp\Client;

class RecommendationService
{
    public function getRecommendations($userId)
    {
        $client = new Client();
        $url = 'http://127.0.0.1:5000/';

        $response = $client->get($url, [
            'query' => [
                'user_id' => $userId,
            ],
        ]);

        return json_decode($response->getBody(), true);
    }

    public function storeRecommendations($userId, $recommendations)
    {
        foreach ($recommendations['recommendations'] as $game_id => $rating) {
            recommended_games::create([
                'user_id' => $userId,
                'game_id' => $game_id,
                'rating' => $rating,
            ]);
        }
    }
}

<?php
#npm run dev
namespace App\Http\Controllers;

use App\Models\recommended_games;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


use GuzzleHttp\Client;

class ModelGameController extends Controller
{
    public function recommendations()
      {  
        $id= Auth::user()->id;
        $client = new Client();
        dump($id);
            
        $retrainUrl = 'http://127.0.0.1:5000/retrain';
        $retrainResponse = $client->post($retrainUrl);

        // Check if retrain was successful
        dump(json_decode($retrainResponse->getBody(), true));
        if (json_decode($retrainResponse->getBody(), true)['message'] !== "Model retrained successfully") {
            // Handle retrain error
            return response('Error: Retraining model failed.', 500);
        }

        $url = 'http://127.0.0.1:5000/recommend';


        $response = $client->get($url, [
            'query' => [
                'user_id' => $id,
            ],
        ]);

 $recommendations = json_decode($response->getBody(), true);
foreach ($recommendations as $game_id => $rating) {
    // Check if the record exists in the table
    $existingRecord = DB::table('recommended_games')
                        ->where('user_id', $id)
                        ->where('game_id', $game_id)
                        ->first();

    if ($existingRecord) {
        // Update the existing record
        DB::table('recommended_games')
            ->where('user_id', $id)
            ->where('game_id', $game_id)
            ->update(['rating' => $rating]);
    } else {
        // Create a new record
        DB::table('recommended_games')->insert([
            'user_id' => $id,
            'game_id' => $game_id,
            'rating' => $rating,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
      }}

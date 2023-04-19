<?php
#npm run dev
namespace App\Http\Controllers;

use App\Models\recommended_games;
use Illuminate\Support\Facades\Auth;

use GuzzleHttp\Client;

class ModelGameController extends Controller
{
    public function recommendations()
      {  
        $id=5;
        //  $id= Auth::user()->id;
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
         foreach ($recommendations['recommendations'] as $game_id => $rating) {
                 recommended_games::create([
                    'user_id' => $id,
                    'game_id' => $game_id,
                    'rating' => $rating,
                ]);
            }
    }
}
// $temp=user_preference::where('user_id', Auth::user()->id)
//              ->where('game_id', $this->gameInput)->first();
//              //if he didn't rate this game yet
//              if($temp==null){
//                 user_preference::create([
//                     'user_id'=>Auth::user()->id,
//                     'game_id'=>$this->gameInput,
//                     'rating'=>$this->rating1,
//                 ]);
//                 return redirect()->route('comments.index',$this->gameId )->with('sucMessage','Successfully rated this game'); 

//             }
//             //updating the old rating
//             else{
//                 user_preference::where('user_id', Auth::user()->id)
//                 ->where('game_id', $this->gameInput)
//                 ->update(['rating' => $this->rating1]);
                
//                 return redirect()->route('comments.index',$this->gameId )->with('sucMessage','Rating updated successfully'); 
//             }
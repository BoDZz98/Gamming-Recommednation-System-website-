<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SendDataController extends Controller
{
    public function processData()
    {
        // Retrieve data from database
        $data = DB::table('user_preferences')->get(['user_id']);/* , 'game_id','rating' */
        dump($data);

        $data2 = DB::table('user_preferences')->get(['game_id']);/* , 'game_id','rating' */
        dump($data2);

        // Convert data to JSON
        $json_data = json_encode($data);
        dump($json_data);

        // Execute Python script and pass JSON data as argument
        $command = 'C:\xampp\htdocs\grad_project\Grad_project\bodz.py ' . escapeshellarg($json_data);
        $output = shell_exec($command);
        //dump($output);

        // Handle the output from your Python script as needed

        return response()->json(['message' => 'Data processed successfully']);
    }
}

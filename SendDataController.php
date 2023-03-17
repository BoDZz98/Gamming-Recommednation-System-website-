<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SendDataController extends Controller
{
    public function processData()
    {
        // Retrieve data from database
        $data = DB::table('user_preferences')->get(['user_id', 'game_id','rating']);

        // Convert data to JSON
        $json_data = json_encode($data);

        // Execute Python script and pass JSON data as argument
        $command = 'python /path/to/your/script.py ' . escapeshellarg($json_data);
        $output = shell_exec($command);

        // Handle the output from your Python script as needed

        return response()->json(['message' => 'Data processed successfully']);
    }
}





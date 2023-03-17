<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SendDataController extends Controller
{
    // public function processData()
    // {
    //     // Retrieve data from database
    //     $data = DB::table('user_preferences')->get(['user_id', 'game_id','rating']);

    //     // Convert data to JSON
    //     $json_data = json_encode($data);

    //     // Execute Python script and pass JSON data as argument
    //     $command = 'C:\xampp\htdocs\Grad_project-main\Grad_project-main\john.py ' . escapeshellarg($json_data);
    //     $output = shell_exec($command);

    //     // Handle the output from your Python script as needed

    //     return response()->json(['message' => 'Data processed successfully']);
    // }
    
   


public function getData()
{
//     $data = DB::table('user_preferences')->get(['user_id', 'game_id','rating']);
//     return response()->json($data);
// Query the database to retrieve integer data

$data = DB::table('user_preferences')->select('my_integer_column')->get(['user_id', 'game_id','rating']);

// Transform the data into an array of integers
$integers = array_map(function($item) {
    return $item->my_integer_column;
}, $data->toArray());

// Create a new Python script file and write the integer data to it
$file = fopen('my_python_script.py', 'w');
fwrite($file, 'my_integers = ' . json_encode($integers));
fclose($file);

}


}





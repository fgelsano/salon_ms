<?php

namespace App\Http\Controllers\Admin;

use GuzzleHttp\Client;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SMSController extends Controller
{
    public function index()
    {
        if (request()->isMethod("post")) {
            $to = request("phone");
            $from = config("app.semaphore_from");
            $message = request("message");

            $client = new Client();

            $response = $client->request('POST', 'https://semaphore.co/api/v4/messages', [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . env('SEM_API_KEY'),
                ],
                'json' => [
                    'number' => $to, // Include the 'number' field with the phone number
                    'apikey' => env('SEM_API_KEY'), // Include the 'apikey' field
                    'from' => $from,
                    'message' => $message,
                ],
            ]);
            //dd($response);
            $statusCode = $response->getStatusCode();
            $responseData = json_decode($response->getBody(), true);
		
	    //dd($response, $statusCode, $responseData);
            if ($statusCode === 200 && isset($responseData['result']) && $responseData['result'] === 'success') {
                return redirect()->route('send-sms.index')->with('success', 'Message sent successfully!');
            } elseif (isset($responseData['error'])) {
                return back()->withInput()->with('error', 'Error sending message: ' . $responseData['error']);
            } else {
                return back()->withInput()->with('success', 'Message sent Successfully!');
            }
        }

        return view('admin.settings.send-sms.index');
    }

}

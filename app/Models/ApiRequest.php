<?php

namespace App\Models;

use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ApiRequest
{
    use HasFactory;

    protected $api_key;

    public function __construct(){
        $this->api_key = env('G_API_KEY');
    }

    public function validate_Address($address, $postal_code, $city){
        $data['addressLines'] = $address;
        $data['postalCode'] = $postal_code;
        $data['locality'] = $city;

        $response = Http::post('https://addressvalidation.googleapis.com/v1:validateAddress?key=' . $this->api_key, [
            'address' => $data,
            "enableUspsCass" => true
        ]);

        return $response;
    }

    public function get_distance($from, $to){
        $request_dis = Http::get('https://maps.googleapis.com/maps/api/distancematrix/json', [
            'destinations' => $to,
            'origins' => $from,
            'key' => $this->api_key
        ]);

        return $request_dis;
    }
}

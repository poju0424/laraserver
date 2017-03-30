<?php namespace testAPP\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use testAPP\Http\Requests;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;


class GeoController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo "create";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        echo "store";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($input)
    {

        $API_key = getenv('GOOGLE_GEO_API_KEY');
		$Geo_url = "https://maps.googleapis.com/maps/api/geocode/json?address=".$input."&key=".$API_key."&region=tw&language=zh-TW";
		$client = new Client(); //GuzzleHttp\Client
		$response = $client->get($Geo_url);
		$result = json_decode($response->getBody(), true);
		$address = $result["results"][0]["formatted_address"];
		$lat = $result["results"][0]["geometry"]["location"]["lat"];
		$lng = $result["results"][0]["geometry"]["location"]["lng"];


		return [
            "title" => $input,
			"address" => $address,
			"latitude" => $lat,
			"longitude" => $lng,
        ];


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        echo "edit";
    }
	
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

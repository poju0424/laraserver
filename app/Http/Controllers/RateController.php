<?php

namespace testAPP\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use testAPP\Http\Requests;

class RateController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "index";
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
        $find = str_replace(" ","", strtolower($input));
		$output = 0;
		$searchList = array(
			array("日", "JPY"),
			array("jp", "JPY"),
			array("美", "USD"),
			array("us", "USD"),
			array("人民", "CNY"),
			array("rmb", "CNY"),
			array("cn", "CNY"),
			array("歐", "EUR"),
			array("eu", "EUR"),
			array("港", "HKD"),
			array("hk", "HKD"),
		);
		
		for ($i=0, $max=count($searchList); $i<$max; $i++) {
			$pos = strpos($find, $searchList[$i][0]);
			if ($pos !== false){
				$output = $searchList[$i][1];
				break;
			}
		}
		if($output !==0){
			echo $tableName = "bot_".$output;
		}else{
			echo "not found!";
		}
		// $tableName = "bot_".$currency;
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

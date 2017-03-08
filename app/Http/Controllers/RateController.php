<?php

namespace testAPP\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use testAPP\Http\Requests;
use DB;

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
		$output = -1;
		$searchList = array(
			array("日", "jpy", "日圓"),
			array("jp", "jpy", "日圓"),
			array("美", "usd", "美金"),
			array("us", "usd", "美金"),
			array("人民", "cny", "人民幣"),
			array("rmb", "cny", "人民幣"),
			array("cn", "cny", "人民幣"),
			array("歐", "eur", "歐元"),
			array("eu", "eur", "歐元"),
			array("港", "hkd", "港幣"),
			array("hk", "hkd", "港幣")
		);
		
		for ($i=0, $max=count($searchList); $i<$max; $i++) {
			$pos = strpos($find, $searchList[$i][0]);
			if ($pos !== false){
				$output = $i;
				break;
			}
		}
		if($output !==0){
			$tableName = "bot_".$searchList[$output][1];
			$data = (array)DB::table($tableName)->orderBy('datetime', 'desc')->first();
			return "台銀"+$searchList[$output][2]+"即時匯率:".
					"\n 現金買入:".$data["cashbuy"].
					"\n 現金賣出:".$data["cashsell"].
					"\n 即期買入:".$data["ratebuy"].
					"\n 即期賣出:".$data["ratesell"].
					"\n 更新時間(".$data["datetime"].")";
		}else{
			return "(黑人問號 .jpg)";
		}
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
	
	public function history($id)
    {
        echo "history";
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

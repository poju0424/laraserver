<?php namespace testAPP\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use testAPP\Http\Requests;

class ApiController extends BaseController
{
    public function index()
    {
        echo "good";
    }
}

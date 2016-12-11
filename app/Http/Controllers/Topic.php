<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Topic extends Controller
{
    public function addNewTopic(){
        return view('new_topic');
    }
}

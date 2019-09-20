<?php

namespace App\Http\Controllers;

use App\Testimonial;
use App\State;
use App\City;
use App\Unit;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$client = new \GuzzleHttp\Client();
        $testimonials = Testimonial::approved()->with('unit.city.state', 'unit.city', 'unit')->orderBy('id','DESC')->limit(10)->get();
    
       // $response = $client->request('GET', "https://www.googleapis.com/youtube/v3/videos?id=$video_id_list&key=AIzaSyDqU4sMwxgXHxE5nvTW8xHByfhdBjUZmnA&part=snippet,statistics");
       // $youtube_api_response = json_decode($response->getBody(), true);

        return view('home');
    }

}

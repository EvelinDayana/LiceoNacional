<?php

namespace App\Http\Controllers;

use App\Event;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\UploadedFile;
use DateTime;
use Image;

class EventController extends Controller
{

    public function showEvent()
    {
        return view('/createEvent');
    }

    public function createShortEvent()
    {
        return view('shortEvent'); 
    }

    public function createLargeEvent()
    {
        return view('largeEvent'); 
    }


    public function create_large_event(request $request)
    {

            $iduser = Auth::id();

            $nameEvent = $request['nameEvent'];
            $descriptionEvent = $request['descriptionEvent'];
            $optionSelectPrice = $request['priceEvent'];

            if ($optionSelectPrice == "si") 
            {
                $priceEvent = 0;
            }

            if ($optionSelectPrice == "no") {
                
                $priceEvent = $request['price'];

            }

            $startDate = $request['startDateEvent'];  
            $startTime = $request['startTimeEvent'];
            $placeEvent = $request['placeEvent'];
            $finishDate = $request['finishDateEvent'];
            $finishTime = $request['finishTimeEvent'];


            $file = Input::file('photoEvent');

            $fileExtension = time() . '.' . $file->getClientOriginalExtension();

            $photoEvent = $fileExtension;
            
            Image::make($file)->resize(140, 140)->save(public_path('/image/photo-event/'.$fileExtension));


            $event = new Event();
    
            $event->iduser = $iduser;
            $event->nameEvent = $nameEvent;
            $event->descriptionEvent = $descriptionEvent;
            $event->priceEvent = $priceEvent;
            $event->photoEvent = $photoEvent;
            $event->startDate = $startDate;
            $event->finishDate = $finishDate;
            $event->startTime = $startTime;
            $event->finishTime = $finishTime;
            $event->place = $placeEvent;

            $event->save();

            return response()->json(['response'=>true]);

    }

     public function create_short_event(request $request)
    {

            $iduser = Auth::id();

            $nameEvent = $request['nameEvent'];
            $descriptionEvent = $request['descriptionEvent'];
            $optionSelectPrice = $request['priceEvent'];

            if ($optionSelectPrice == "si") 
            {
                $priceEvent = 0;
            }

            if ($optionSelectPrice == "no") {
                
                $priceEvent = $request['price'];

            }

            $startDate = $request['startDateEvent'];  
            $startTime = $request['startTimeEvent'];
            $placeEvent = $request['placeEvent'];
            $finishDate = Null;
            $finishTime = Null;


            $file = Input::file('photoEvent');

            $fileExtension = time() . '.' . $file->getClientOriginalExtension();

            $photoEvent = $fileExtension;
            
            Image::make($file)->resize(140, 140)->save(public_path('/image/photo-event/'.$fileExtension));


            $event = new Event();
    
            $event->iduser = $iduser;
            $event->nameEvent = $nameEvent;
            $event->descriptionEvent = $descriptionEvent;
            $event->priceEvent = $priceEvent;
            $event->photoEvent = $photoEvent;
            $event->startDate = $startDate;
            $event->finishDate = $finishDate;
            $event->startTime = $startTime;
            $event->finishTime = $finishTime;
            $event->place = $placeEvent;

            $event->save();

            return response()->json(['response'=>true]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}

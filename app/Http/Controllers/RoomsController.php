<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::latest()->paginate(5);
        return view('rooms.index', compact('rooms'))->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate form
        $request->validate([
            'building' => 'required',
            'room_number' => 'required',
            'number_of_beds' => 'required'
        ]);
        
        if($request->has('ac')){
            $request->merge([
                'ac' => '1',
            ]);
        }
        else{
            $request->merge([
                'ac' => '0',
            ]);
        }
        if($request->has('balcony')){
            $request->merge([
                'balcony' => '1',
            ]);
        }
        else{
            $request->merge([
                'balcony' => '0',
            ]);
        }
        if($request->has('fridge')){
            $request->merge([
                'fridge' => '1',
            ]);
        }
        else{
            $request->merge([
                'fridge' => '0',
            ]);
        }

        Room::create($request->all());

        return redirect()->route('rooms.index')->with('success', 'Soba uspješno kreirana');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        return view('rooms.show', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        return view('rooms.edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        //Validate form
        $request->validate([
            'building' => 'required',
            'room_number' => 'required',
            'number_of_beds' => 'required'
        ]);
        
        if($request->has('ac')){
            $request->merge([
                'ac' => '1',
            ]);
        }
        else{
            $request->merge([
                'ac' => '0',
            ]);
        }
        if($request->has('balcony')){
            $request->merge([
                'balcony' => '1',
            ]);
        }
        else{
            $request->merge([
                'balcony' => '0',
            ]);
        }
        if($request->has('fridge')){
            $request->merge([
                'fridge' => '1',
            ]);
        }
        else{
            $request->merge([
                'fridge' => '0',
            ]);
        }

        $room->update($request->all());

        return redirect()->route('rooms.index')->with('success', 'Soba uspješno uređena');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('rooms.index')->with('success', 'Soba uspješno izbrisana');
    }
}

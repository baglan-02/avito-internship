<?php

namespace App\Http\Controllers;

use App\Http\Resources\RoomResource;
use App\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function list(Request $request)
    {
        $orderBy = $request->input('order_by');
        $orderType = $request->input('type');

        $rooms = Room::orderBy($orderBy)->get();

        if ($orderType == 'desc') {
            $rooms = Room::orderBy($orderBy, 'desc')->get();
        }

        return RoomResource::collection($rooms);
    }

    public function create(Request $request)
    {
        $description = $request->input('description');
        $price = $request->input('price');

        $room = new Room();
        $room->description = $description;
        $room->price = $price;
        $room->save();

        return response()->json(['room_id' => $room->id]);
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');

        $room = Room::find($id);

        foreach ($room->bookings as $booking) {
            $booking->delete();
        }

        $room->delete();
    }
}

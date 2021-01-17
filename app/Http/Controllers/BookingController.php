<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Http\Resources\BookingResource;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function list(Request $request)
    {
        $roomId = $request->input('room_id');

        $bookings = Booking::where('room_id', $roomId)->orderBy('date_start')->get();

        return BookingResource::collection($bookings);

    }

    public function create(Request $request)
    {
        $roomId = $request->input('room_id');
        $dateStart = $request->input('date_start');
        $dateEnd = $request->input('date_end');

        $booking = new Booking();
        $booking->room_id = $roomId;
        $booking->date_start = $dateStart;
        $booking->date_end = $dateEnd;
        $booking->save();

        return response()->json(['booking_id' => $booking->id]);
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');

        $booking = Booking::find($id);

        $booking->delete();
    }
}

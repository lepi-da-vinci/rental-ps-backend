<?php

namespace App\Http/Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::orderBy('date', 'desc')->orderBy('time', 'asc')->get();
        return response()->json([
            'status' => 'success',
            'data' => $bookings
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|string',
            'customer_name' => 'required|string',
            'phone' => 'nullable|string',
            'ps_type' => 'required|string',
            'date' => 'required|date',
            'time' => 'required|string',
            'duration_hours' => 'required|integer',
            'assigned_unit' => 'required|string',
        ]);

        $booking = Booking::create([
            'id' => $validated['id'],
            'customer_name' => $validated['customer_name'],
            'phone' => $validated['phone'] ?? '-',
            'ps_type' => $validated['ps_type'],
            'date' => $validated['date'],
            'time' => $validated['time'],
            'duration_hours' => $validated['duration_hours'],
            'assigned_unit' => $validated['assigned_unit'],
            'is_walk_in' => false,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Booking berhasil disimpan ke database.',
            'data' => $booking
        ], 201);
    }

    public function storeWalkIn(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string',
            'ps_type' => 'required|string',
            'unit_label' => 'required|string',
            'duration_hours' => 'required|integer',
            'start_time' => 'required|string',
        ]);

        $booking = Booking::create([
            'id' => 'WI-' . time(),
            'customer_name' => $validated['customer_name'],
            'phone' => 'Walk-in',
            'ps_type' => $validated['ps_type'],
            'date' => Carbon::today()->format('Y-m-d'),
            'time' => $validated['start_time'],
            'duration_hours' => $validated['duration_hours'],
            'assigned_unit' => strtoupper($validated['ps_type']) . ' ' . $validated['unit_label'],
            'is_walk_in' => true,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Sesi walk-in berhasil didaftarkan.',
            'data' => $booking
        ], 201);
    }

    public function destroy($id)
    {
        $booking = Booking::find($id);
        if ($booking) {
            $booking->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Booking berhasil dihapus.'
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Data booking tidak ditemukan.'
        ], 404);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Booking;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UnitController extends Controller
{
    public function index()
    {
        $units = Unit::all();
        return response()->json([
            'status' => 'success',
            'data' => $units
        ]);
    }

    public function status()
    {
        $today = Carbon::today();
        $now = Carbon::now();
        $nowMins = $now->hour * 60 + $now->minute;

        $units = Unit::all();
        $todayBookings = Booking::whereDate('date', $today)->get();

        $statuses = $units->map(function ($unit) use ($todayBookings, $nowMins) {
            $activeBooking = $todayBookings->first(function ($b) use ($unit, $nowMins) {
                if ($b->ps_type !== $unit->ps_type) return false;
                
                // Extract numbers for accurate matching
                preg_match('/\d+/', $b->assigned_unit, $m1);
                preg_match('/\d+/', $unit->label, $m2);
                
                $num1 = isset($m1[0]) ? (int) $m1[0] : null;
                $num2 = isset($m2[0]) ? (int) $m2[0] : null;
                
                if ($num1 !== null && $num2 !== null && $num1 !== $num2) {
                    return false;
                }

                $p = explode(':', $b->time);
                $startMins = (int) $p[0] * 60 + (int) $p[1];
                $endMins = $startMins + $b->duration_hours * 60;

                return $nowMins >= $startMins && $nowMins < $endMins;
            });

            return [
                'unit_id' => $unit->unit_id,
                'ps_type' => $unit->ps_type,
                'label' => $unit->label,
                'is_available' => $activeBooking === null,
                'player_name' => $activeBooking ? $activeBooking->customer_name : null,
                'start_time' => $activeBooking ? $activeBooking->time : null,
                'end_time' => $activeBooking ? Carbon::parse($activeBooking->time)->addHours($activeBooking->duration_hours)->format('H:i') : null,
                'is_walk_in' => $activeBooking ? $activeBooking->is_walk_in : false,
            ];
        });

        return response()->json([
            'status' => 'success',
            'data' => $statuses
        ]);
    }
}

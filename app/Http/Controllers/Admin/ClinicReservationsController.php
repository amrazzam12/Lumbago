<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClinicReservation;
use Illuminate\Http\Request;

class ClinicReservationsController extends Controller
{
    public function index(){
        return view('admin.reservations.index' , [
            'reservations' => ClinicReservation::with(['clinic' , 'user'])->paginate(25)
        ]);
    }

    public function changeStatus(Request $request){
        try {
            ClinicReservation::select('id' , 'status')->find($request['resId'])
                ->update([
                    'status' => $request['status'],
            ]);
            return true;
        }catch (\Exception $e){
            return false;
        }
    }

    public function delete($id){
        try {
            ClinicReservation::find($id)->delete();
            return to_route('reservations.index')->with('message' , "Reservation Deleted !");
        }catch (\Exception $e){
            return back()->with('error' , "Something Went Wrong");

        }
    }
}

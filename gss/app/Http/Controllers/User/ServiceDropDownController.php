<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\ServiceInfo;
use App\LocationInfo;

class ServiceDropdownController extends Controller
{
    public function subcategories(Request $request){
        if (!$request->category) {
            $html = '<option value="">Select SubCategory</option>';
        } 
        
        else {
            $html = '';
            $subcategories = ServiceInfo::where('category', $request->category)->distinct()->pluck('subcategory');
            foreach ($subcategories as $subcategory) {
                $html .= '<option value="'.$subcategory.'">'.$subcategory.'</option>';
            }
        }
    
        return response()->json(['html' => $html]);
    }

    public function departments(Request $request){
        if (!$request->block) {
            $html = '<option value="">Select Department</option>';
        } 
        
        else {
            $html = '<option value="">Select Department</option>';
            $departments = LocationInfo::where('block', $request->block)->distinct()->pluck('department');
            foreach ($departments as $department) {
                $html .= '<option value="'.$department.'">'.$department.'</option>';
            }
        }
    
        return response()->json(['html' => $html]);
    }

    public function floors(Request $request){

        if (!$request->department) {
            $html = '<option value="">Select Floor</option>';
        } 
        
        else {
            $html = '<option value="">Select Floor</option>';
            $floors = LocationInfo::where('department', $request->department)->distinct()->pluck('floor');
            foreach ($floors as $floor) {
                $html .= '<option value="'.$floor.'">'.$floor.'</option>';
            }
        }
    
        return response()->json(['html' => $html]);
    }

    public function rooms(Request $request){

        if (!($request->floor && $request->block && $request->department)) {
            $html = '<option value="">Select Room</option>';
        } 
      
        else {
            $html = '<option value="">Select Room</option>';
            $rooms = LocationInfo::where('block', $request->block)
                                    ->where('department', $request->department)
                                    ->where('floor', $request->floor)
                                    ->distinct()
                                    ->pluck('room');

            foreach ($rooms as $room) {
                $html .= '<option value="'.$room.'">'.$room.'</option>';
            }
        }
    
        return response()->json(['html' => $html]);
    }
}

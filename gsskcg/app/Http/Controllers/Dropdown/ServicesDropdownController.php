<?php

namespace App\Http\Controllers\Dropdown;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\ServiceInfo;

class ServicesDropdownController extends Controller
{
    public function subcategories(Request $request){
        if (!$request->category) {
            $html = '<option value="">Select SubCategory</option>';
        } 
        
        else {
            $html = '';
            $subcategories = ServiceInfo::where('category', $request->category)->pluck('subcategory');
            foreach ($subcategories as $subcategory) {
                $html .= '<option value="'.$subcategory.'">'.$subcategory.'</option>';
            }
        }
    
        return response()->json(['html' => $html]);
    }
}

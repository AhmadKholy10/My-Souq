<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\SettingsUpdateRequest;
use App\Models\Setting;
use App\utils\ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;

class SettingsController extends Controller
{
    public function index(){
        return view('dashboard.settings.settings');
    }

    public function update(SettingsUpdateRequest $request,Setting $setting){
       
       $setting->update($request-> validated());
       if($request->has('logo')){
        $logo = ImageUpload::uploadImage($request->logo, 200, 100, 'logo/');
        $setting->update(['logo'=> $logo]);
       }
       if($request->has('favicon')){
        $favicon = ImageUpload::uploadImage($request->favicon, 32, 32, 'logo/');
        $setting->update(['favicon'=> $favicon]);
       }
    
       return redirect()->route('dashboard.settings.view')->with('success', 'Updated Successfully');
    }
}

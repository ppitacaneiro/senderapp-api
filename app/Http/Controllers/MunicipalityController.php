<?php

namespace App\Http\Controllers;

use App\Models\Municipality;
use Illuminate\Http\Request;

class MunicipalityController extends Controller
{
    public function getMunicipalitiesByProvinceId($idProvince)  
    {
        return Municipality::where('province_id',$idProvince)->get();
    }
}

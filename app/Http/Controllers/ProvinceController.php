<?php

namespace App\Http\Controllers;

use App\Models\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    public function getProvincesByCommunityId($idCommunity)
    {
        return Province::where('community_id',$idCommunity)->get();
    }
}

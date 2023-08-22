<?
namespace App\Services;
use App\Models\HickingTrail;

class HickingTrailService 
{
    public function create(array $data) : HickingTrail
    {
        return HickingTrail::create($data);
    }
}
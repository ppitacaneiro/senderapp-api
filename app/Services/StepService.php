<?
namespace App\Services;

use App\Models\Step;

class StepService 
{
    public function storeSteps(array $steps, $hickingTrailId)
    {
        foreach ($steps as $step) {
            $this->create($hickingTrailId, $step['lat'], $step['lng']);
        }
    }

    public function create($hickingTrailId, $lat, $lng)
    {
        $step = new Step();
        $step->hicking_trail_id = $hickingTrailId;
        $step->lat = $lat;
        $step->lng = $lng;
        $step->save();
        
        return $step;
    }
}

?>
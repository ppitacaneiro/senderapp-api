<?
namespace App\Services;
use App\Models\HickingTrail;

class HickingTrailService 
{
    public function create(array $data) : HickingTrail
    {
        return HickingTrail::create($data);
    }

    public function getHickingTrail(int $id) : HickingTrail
    {
        return HickingTrail::findOrFail($id);
    }

    public function search(array $data)
    {
        $query = HickingTrail::query();

        if (isset($data['community_id'])) {
            $query->where('community_id', $data['community_id']);
        }

        if (isset($data['province_id'])) {
            $query->where('province_id', $data['province_id']);
        }

        if (isset($data['municipality_id'])) {
            $query->where('municipality_id', $data['municipality_id']);
        }

        if (isset($data['difficulty_level'])) {
            $query->where('difficulty_level', $data['difficulty_level']);
        }

        return $query->get();
    }
}
<?

namespace App\Services;

use App\Models\Photo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PhotoService
{
    private function create(array $data)
    {
        return Photo::create($data);
    }

    private function convertToUrl(string $path)
    {
        return Storage::url($path);
    }

    private function convertFromBase64ToImage(string $base64)
    {
        $base64 = str_replace('data:image/jpeg;base64,', '', $base64);
        $image = base64_decode($base64);
        $imageName = Str::random(10) . '.jpeg';
        Storage::disk('public')->put($imageName, $image);

        return $imageName;
    }

    public function storePhoto(string $base64, int $hickingTrailId)
    {
        $imageName = $this->convertFromBase64ToImage($base64);
        $url = $this->convertToUrl($imageName);
        $this->create([
            'hicking_trail_id' => $hickingTrailId,
            'url' => $url
        ]);
    }

    public function storePhotos(array $photos, int $hickingTrailId)
    {
        foreach ($photos as $photo) {
            $this->storePhoto($photo, $hickingTrailId);
        }
    }




}
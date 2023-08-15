<?
namespace App\Http\Responsables;
use Illuminate\Contracts\Support\Responsable;

class JsonApiResponse implements Responsable
{
    protected string $message;
    protected array $data;
    protected bool $success;
    protected int $status;

    public function __construct(bool $success = true,string $message = '',array $data = [], int $status = 200)
    {
        $this->success = $success;
        $this->data = $data;
        $this->message = $message;
        $this->status = $status;
    }

    public function toResponse($request) 
    {
        return response()->json([
            'success' => $this->success,
            'message' => $this->message,
            'data' => $this->data,
        ], $this->status);
    }   
}
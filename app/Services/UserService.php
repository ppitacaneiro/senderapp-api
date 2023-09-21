<?

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserService 
{

    public function create(array $data) : User
    {
        $data['password'] = Hash::make($data['password']);
        return User::create($data);
    }

    public function isUserRegistered(Request $request) : bool
    {
        return Auth::attempt($request->only(['email', 'password']));
    }

    public function getUserByEmail(string $email) : User
    {
        return User::where('email', $email)->first();
    }

    public function createToken(User $user) : string
    {
        return $user->createToken("API_TOKEN")->plainTextToken;
    }
}
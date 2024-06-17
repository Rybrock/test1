
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function checkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $emailExists = User::where('email', $request->email)->exists();

        if ($emailExists) {
            return response()->json(['message' => 'Email already exists'], 409);
        } else {
            return response()->json(['message' => 'Email available'], 200);
        }
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuari;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {

        //recuperar usuari
        $usuari = Usuari::where('login', $request->login)->first();

        if(!$usuari ||
        !Hash::check($request->password, $usuari->password)) {

            return response()->json(["error"=>"Credenciales no válidas"], 401);

        } else {

            $token = $usuari->createToken($usuari->login)->plainTextToken;
            return response()->json(["token" => $token], 200);
            
        }

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }
    
    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProfile()
    {   
        return response()->json(auth()->user());
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        //Si no cambió el email, no se valida.
        if($user->email == $request->email)
        {
            $validated_data = $request->validate(
                [
                    'name' => 'required|string|min:2|max:100',
                    'old_password' => 'required|string',
                    'password' => 'required|confirmed|string|min:8|different:old',
                ]
            );
        }
        else//caso contrario, si valido el email.
        {
            $validated_data = $request->validate(
                [
                    'name' => 'required|string|min:2|max:100',
                    'email' => 'required|email|unique:users',
                    'old_password' => 'required|string',
                    'password' => 'required|confirmed|string|min:8|different:old',
                ]
            );
        }
        //corroborar que contraseña antigua, coincida con la ingresada, para poder modificarla.
        if(Hash::check($request->old_password,$user->password))
        {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            return response()->json(['message' => '¡Usuario Actualizado con éxito!','user' => $user]);
        }
        else
        {   
            return response()->json(['error' => '¡Contrasena Antigua erronea!'],422);
        }
        

    }
}

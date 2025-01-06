<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    /* public function __construct() */
    /* { */
    /*     $this->middleware('auth:api', ['except' => ['login','register']]); */
    /* } */

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $credentials = $request->only('email', 'password');

        $token = Auth::attempt($credentials);
        if (!$token) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 401);
        }

        $user = Auth::user();

        return response()->json([
                'status' => 'success',
                'user' => $user,
                'authorization' => [
                    'token' => $token,
                    'type' => 'bearer',
                ]
            ]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
                'status' => 'success',
                'user' => $user,
            ]);
    }

    public function register_vulnerable(Request $request)
    {

        /* $request->validate([ */
        /*     'name' => 'required|string|max:255', */
        /*     'email' => 'required|string|email|max:255|unique:users', */
        /*     'password' => 'required|string|min:6', */
        /* ]); */

        $mysqli = new \mysqli(env('DB_HOST'), env('DB_USERNAME'), env('DB_PASSWORD'), env('DB_DATABASE'));
        if ($mysqli->connect_error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Database connection failed: ' . $mysqli->connect_error,
            ], 500);
        }

        $name = $mysqli->real_escape_string($request->input('name'));
        $email = $mysqli->real_escape_string($request->input('email'));
        $password = $mysqli->real_escape_string($request->input('password'));
        $hashedPassword = bcrypt($request->input('password'));

        Log::info($email);
        echo "\n";
        $query = "INSERT INTO users(name, password, email) values (\"";
        $query .= $name;
        $query .= "\", \"";
        $query .= $hashedPassword;
        $query .= "\", \"";
        $query .= $email;
        $query .= "\")";

        Log::info($query);
        echo "\n";

        DB::unprepared($query);

        return response()->json([
                'status' => 'success',
                'user' => $name,
            ]);
    }

    public function logout()
    {
        Auth::logout();
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);
    }

    public function refresh()
    {
        return response()->json([
            'status' => 'success',
            'user' => Auth::user(),
            'authorisation' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ]);
    }

}

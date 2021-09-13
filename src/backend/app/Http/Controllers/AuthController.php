<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * @param Request $request
     * @return array|\Illuminate\Http\JsonResponse
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        //valid credential
        $validator = Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required|string|min:6|max:50'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 400);
        }

        //Request is validated
        //Crean token
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'error' => ['Login' => ['Login credentials are invalid.']]
                ], 400);
            }
        } catch (JWTException $e) {
            return $credentials;
            return response()->json([
                'error' => ['Login' => ['Could not create token.']]
            ], 500);
        }

        //Token created, return with success response and jwt token
        return response()->json([
            'success' => true,
            'token' => $token,
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function get_user()
    {
        return response()->json(auth()->user());
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        //Validate data
        $data = $request->only('name', 'email', 'password');
        $validator = Validator::make($data, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|max:50'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 400);
        }

        //Request is valid, create new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        Mail::to(env('ADMIN_EMAIL', 'tasks@example.com'))
            ->send(new \App\Mail\RegisterUser($user));

        //User created, return success response
        return response()->json([
            'success' => true,
            'message' => 'User created successfully',
            'data' => $user
        ], Response::HTTP_OK);
    }

    const FIELDS = ['email', 'name'];
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update_user(Request $request)
    {
        $user = auth()->user();
        foreach (self::FIELDS as $field) {
            if ($request->$field) {
                $user->$field = $request->$field;
                $user->save();
            }
        }
        if($request->password !== '') {
            $user->password = bcrypt($request->password);
            $user->save();
        }
        Mail::to(env('ADMIN_EMAIL', 'tasks@example.com'))
            ->send(new \App\Mail\UserUpdate($user));
        return response()->json(auth()->user());
    }

    /**
     * Delete user
     * @param Request $request
     * @return mixed
     */
    public function delete_user(Request $request)
    {
        $user = auth()->user();
        Mail::to(env('ADMIN_EMAIL', 'tasks@example.com'))
            ->send(new \App\Mail\DeleteUser($user));
        return $user->delete();

    }

}

<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Constants;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    use HasFactory;

    /**
     * Fazer login com e-mail e senha do usuário
     * @OA\Post (
     *     path="/login",
     *     tags={"Auth"},
     *     @OA\RequestBody(
     *         required=true,
     *         description="Preencher com e-mail e senhas",
     *         @OA\JsonContent(
     *             required={"email","password"},
     *             @OA\Property(property="email", type="string", format="email", example="rh@liberfly.com.br"),
     *             @OA\Property(property="password", type="string", format="password", example="123456789")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *              @OA\Property(property="access_token", type="string", example="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNjgwMDU0MjgyLCJleHAiOjE2ODAwNTc4ODIsIm5iZiI6MTY4MDA1NDI4MiwianRpIjoiY0ZVaFpyamdiWWk0ZWhwdyIsInN1YiI6IjUiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.p9i2mhNNBUPkvbunTO83xUKzrcVBEtCt3jsMZvglyzY"),
     *              @OA\Property(property="token_type", type="string", example="bearer"),
     *              @OA\Property(property="expires_in", type="number", example="3600")
     *         )
     *     ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthorized",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Não foi possível verificar sua conta com o token fornecido."),
     *          )
     *      )
     * )
     */
    public function login(Request $request)
    {
        $credentials    = $request->only(['email', 'password']);

        $token          = JWTAuth::attempt($credentials);

        // auth está configurado dentro config\auth.php
        if (!$token) {
            return response()->json(['menssage' => Constants::ERROR_LOGIN], 401);
        }

        return response()->json([
            "menssage"      => Constants::STATUS_SUCCESS,
            'access_token'  => $token,
            'token_type'    => 'bearer',
            'expires_in'    => JWTAuth::factory()->getTTL() * 60
        ]);
    }

    /**
     * Fazer o usuário deslogar
     * @OAS\SecurityScheme(
     *      securityScheme="API Key Auth",
     *      type="apiKey",
     *      in="header",
     *      name="Authorization",
     * ),
     * @OA\Post (
     *     path="/logout",
     *     tags={"Auth"},
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="nombres", type="string", example="Aderson Felix"),
     *              @OA\Property(property="apellidos", type="string", example="Jara Lazaro"),
     *              @OA\Property(property="created_at", type="string", example="2023-02-23T00:09:16.000000Z"),
     *              @OA\Property(property="updated_at", type="string", example="2023-02-23T12:33:45.000000Z")
     *         )
     *     ),
     *      @OA\Response(
     *          response=404,
     *          description="NOT FOUND",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Não foi possível verificar sua conta com o token fornecido."),
     *          )
     *      )
     * )
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => Constants::SUCCESS_LOGOUT]);
    }
}

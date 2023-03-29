<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Constants;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * @OA\Info(
 *  title="API RESTful com PHP e Laravel", 
 *  version="1.0",
 *  description="O objetivo deste desenvolvimento de API RESTful com PHP e Laravel que é fornecer e receber informações de um banco de dados MySQL."
 * )
 *
 * @OA\Server(url="http://127.0.0.1:8000/api")
 */

class UserController extends Controller
{
    /**
     * Função para listar todos usuários
     * @OAS\SecurityScheme(
     *      securityScheme="API Key Auth",
     *      type="apiKey",
     *      in="header",
     *      name="Authorization",
     * ),
     * @OA\Get (
     *     path="/users",
     *     tags={"Users"},
     *      @OA\RequestBody(
     *         required=true,
     *         description="Preencher com token fornecido no login",
     *         @OA\JsonContent(
     *             required={"token"},
     *             @OA\Property(property="token", type="string", format="token", example="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNjgwMDU0MjgyLCJleHAiOjE2ODAwNTc4ODIsIm5iZiI6MTY4MDA1NDI4MiwianRpIjoiY0ZVaFpyamdiWWk0ZWhwdyIsInN1YiI6IjUiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.p9i2mhNNBUPkvbunTO83xUKzrcVBEtCt3jsMZvglyzY")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 type="array",
     *                 property="rows",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(
     *                         property="id",
     *                         type="number",
     *                         example="1"
     *                     ),
     *                     @OA\Property(
     *                         property="name",
     *                         type="string",
     *                         example="Marcos Daniel"
     *                     ),
     *                     @OA\Property(
     *                         property="email",
     *                         type="string",
     *                         example="marcosdaniel.developer@hotmail.com"
     *                     ),
     *                     @OA\Property(
     *                         property="created_at",
     *                         type="timestamp",
     *                         example="2023-03-28T22:49:46.000000Z"
     *                     ),    
     *                      @OA\Property(
     *                         property="email_verified_at",
     *                         type="timestamp",
     *                         example="2023-03-28T22:49:46.000000Z"
     *                     ),
     *                      @OA\Property(
     *                         property="password",
     *                         type="string",
     *                         example="$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi"
     *                     ),
     *                      @OA\Property(
     *                         property="remember_token",
     *                         type="string",
     *                         example="8WgJPwXDSz"
     *                     ),
     *                     @OA\Property(
     *                         property="updated_at",
     *                         type="timestamp",
     *                         example="2023-03-28T22:49:46.000000Z"
     *                     )
     *                 )
     *             )
     *         )
     *     )
     * )
     */
    public function index()
    {
        $users = User::orderBy("name", 'ASC')->paginate(Constants::PAGE_NUMBER);

        if ($users->items() == []) {

            return response()->json([
                "status"    => Constants::STATUS_ERROR,
                "menssage"  => Constants::ERROR_SEARCH,
                "page_1"    => $users->url(1),
            ], 404);
        }

        return response()->json([
            "status"            => Constants::STATUS_SUCCESS,
            "currentPage"       => $users->currentPage(),
            "lastPage"          => $users->lastPage(),
            "total"             => $users->total(),
            "nextPage"          => $users->nextPageUrl(),
            "previousPage"      => $users->previousPageUrl(),
            "items"             => $users->items()
        ], 200);
    }

    /**
     * Mostrar as informações de um usuário
     * @OA\Get (
     *     path="/users/{id}",
     *     tags={"Users"},
     *     @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         example="1",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="name", type="string", example="Marcos Daniel"),
     *              @OA\Property(property="email", type="string", example="marcosdaniel.developer@hotmail.com"),
     *              @OA\Property(property="email_verified_at", type="timestamp", example="2023-03-28T22:49:46.000000Z"),
     *              @OA\Property(property="created_at", type="timestamp", example="2023-03-28T22:49:46.000000Z"),
     *              @OA\Property(property="updated_at", type="timestamp", example="2023-03-28T22:49:46.000000Z")
     *         )
     *     ),
     *      @OA\Response(
     *          response=404,
     *          description="Not found",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Item de busca não encontrado."),
     *          )
     *      ),
     *      security={{ "api_key":{} }}
     * )
     */
    public function show(Request $request, $id)
    {
        try {

            $request->validate([
                'id' => 'required|integer',
            ]);

            if (!$user = User::find($id)) {
                return response()->json([
                    "status"    => Constants::STATUS_NOT_FOUND,
                    "menssage"  => Constants::ERROR_SEARCH
                ], 404);
            }

            return response()->json([
                "status"    => Constants::STATUS_SUCCESS,
                "items"     => $user
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                "status"    => Constants::STATUS_ERROR,
                "menssage"  => $th
            ], 500);
        }
    }
}

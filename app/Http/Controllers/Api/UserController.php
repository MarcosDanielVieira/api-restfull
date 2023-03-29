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
     * @OA\Get (
     *     path="/users",
     *     tags={"Users"},
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
            "items"             => $users->items(),
            "nextPage"          => $users->nextPageUrl(),
            "previousPage"      => $users->previousPageUrl()
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

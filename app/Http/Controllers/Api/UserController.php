<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Constants;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
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

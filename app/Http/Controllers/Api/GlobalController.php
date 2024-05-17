<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Resources\UsersCollection;
use Illuminate\Http\Request;

class GlobalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getRandomUsers()
    {
        try {
            $suggested = User::inRandomOrder()->limits(5)->get();
            $following = User::inRandomOrder()->limits(10)->get();

            return response()->json([
                'suggested' => new UsersCollection($suggested),
                'following' => new UsersCollection($following)
            ], 200);
        }
        catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
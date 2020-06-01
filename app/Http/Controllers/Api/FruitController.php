<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class FruitController extends Controller
{
    public function getFruits()
    {
        $user = auth()->user();
        return response()->json([
            [
                'name' => 'Apple',
                'price' => $user->tokenCan('fruit-price:view') ? 500 : null,
            ],
            [
                'name' => 'Orange',
                'price' => $user->tokenCan('fruit-price:view') ? 400 : null,
            ],
            [
                'name' => 'Banana',
                'price' => $user->tokenCan('fruit-price:view') ? 350 : null,
            ],
        ]);
    }
}

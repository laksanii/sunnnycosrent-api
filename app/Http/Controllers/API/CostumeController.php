<?php

namespace App\Http\Controllers\API;

use App\Models\Costume;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class CostumeController extends Controller
{
    // FETCH
    public function fetch(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $category = $request->input('category');
        $limit = $request->input('limit', 10);

        $costumeQuery = Costume::query();

        if ($category) {
            $costumeQuery = Costume::whereHas('category', function ($query) use ($category) {
                $query->where('name', 'like', '%' . $category . '%');
            });
        }

        // Get single data
        if ($id) {
            $costume = $costumeQuery->find($id);

            if ($costume) {
                return ResponseFormatter::success($costume, 'Costume found');
            }

            return ResponseFormatter::error('Costume not found', 404);
        }

        // Get multiple data
        $costume = $costumeQuery;

        if ($name) {
            if ($costume->where('name', 'like', '%' . $name . '%')->count()) {
                return ResponseFormatter::success(
                    $costume->paginate($limit),
                    'Costume found'
                );
            }

            return ResponseFormatter::error('Costume not found', 404);
        }

        return ResponseFormatter::success(
            $costume->paginate($limit),
            'Companies found'
        );
    }
    // STORE

    // UPDATE

    // DELETE
}
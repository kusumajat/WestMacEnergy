<?php

namespace App\Http\Controllers;

use App\Models\PointsModel;
use App\Models\PolygonsModel;
use App\Models\PolylinesModel;
use Illuminate\Http\Request; // Import Request

class TableController extends Controller
{
    public function index(Request $request) // Tambahkan Request $request
    {
        $perPage = 10;

        // 1. Ambil kata kunci pencarian dari request
        $search = $request->input('search');

        // 2. Buat query dasar untuk setiap model
        $pointsQuery = PointsModel::query();
        $polylinesQuery = PolylinesModel::query();
        $polygonsQuery = PolygonsModel::query();

        // 3. Jika ada input pencarian, tambahkan kondisi WHERE
        if ($search) {
            $pointsQuery->where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%");
            });

            $polylinesQuery->where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%");
            });

            $polygonsQuery->where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // 4. Lakukan paginasi SETELAH query difilter
        // Gunakan appends() untuk memastikan paginasi membawa serta parameter pencarian
        $points = $pointsQuery->latest()->paginate($perPage, ['*'], 'points_page')->appends($request->all());
        $polylines = $polylinesQuery->latest()->paginate($perPage, ['*'], 'polylines_page')->appends($request->all());
        $polygons = $polygonsQuery->latest()->paginate($perPage, ['*'], 'polygons_page')->appends($request->all());

        $data = [
            'title' => 'Table',
            'points' => $points,
            'polylines' => $polylines,
            'polygons' => $polygons,
        ];

        return view('table', $data);
    }
}

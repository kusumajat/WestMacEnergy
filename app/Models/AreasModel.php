<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class AreasModel extends Model
{
    protected $table = 'areas';

    protected $guarded = ['id'];

    public function geojson_areas()
    {
        $areas = $this
            ->select(DB::raw('areas.id, st_asgeojson(geom) as geom, areas.name, areas.description, areas.color, areas.image, st_area(geom, true) as luas_m2,
       st_area(geom, true) / 1000000 as luas_km2,
       st_area(geom, true) / 10000 as luas_hektar, areas.created_at, areas.updated_at, areas.user_id, users.name as user_created'))
            ->leftjoin('users', 'areas.user_id', '=', 'users.id')
            ->get();

        $geojson = [
            'type' => 'FeatureCollection',
            'features' => [],
        ];

        foreach ($areas as $p) {
            $feature = [
                'type' => 'Feature',
                'geometry' => json_decode($p->geom),
                'properties' => [
                    'id' => $p->id,
                    'name' => $p->name,
                    'description' => $p->description,
                    'color' => $p->color,
                    'created_at' => $p->created_at,
                    'updated_at' => $p->updated_at,
                    'luas_m2' => $p->luas_m2,
                    'luas_km2' => $p->luas_km2,
                    'luas_hektar' => $p->luas_hektar,
                    'image' => $p->image,
                    'user_id' => $p->user_id,
                    'user_created' => $p->user_created
                ],
            ];

            array_push($geojson['features'], $feature);
        }
        return $geojson;
    }

    public function geojson_area($id)
    {
        $areas = $this
            ->select(DB::raw('id, st_asgeojson(geom) as geom, name, description, color, image, st_area(geom, true) as luas_m2,
       st_area(geom, true) / 1000000 as luas_km2,
       st_area(geom, true) / 10000 as luas_hektar, created_at, updated_at'))
            ->where('id', $id)
            ->get();

        $geojson = [
            'type' => 'FeatureCollection',
            'features' => [],
        ];

        foreach ($areas as $p) {
            $feature = [
                'type' => 'Feature',
                'geometry' => json_decode($p->geom),
                'properties' => [
                    'id' => $p->id,
                    'name' => $p->name,
                    'description' => $p->description,
                    'color' => $p->color,
                    'created_at' => $p->created_at,
                    'updated_at' => $p->updated_at,
                    'luas_m2' => $p->luas_m2,
                    'luas_km2' => $p->luas_km2,
                    'luas_hektar' => $p->luas_hektar,
                    'image' => $p->image,
                ],
            ];

            array_push($geojson['features'], $feature);
        }
        return $geojson;
    }
}

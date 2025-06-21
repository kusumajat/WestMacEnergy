<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class TitiksModel extends Model
{
    protected $table = 'titiks';

    protected $guarded = ['id'];

    public function geojson_titiks()
    {
        $titiks = $this
            ->select(DB::raw('titiks.id, st_asgeojson(geom) as geom, titiks.name, titiks.description, titiks.color, titiks.image, titiks.created_at, titiks.updated_at, titiks.user_id, users.name as user_created'))
            ->leftjoin('users', 'titiks.user_id', '=', 'users.id')
            ->get();

        $geojson = [
            'type' => 'FeatureCollection',
            'features' => [],
        ];

        foreach ($titiks as $p) {
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
                    'image' => $p->image,
                    'user_id' => $p->user_id,
                    'user_created' => $p->user_created
                ],
            ];

            array_push($geojson['features'], $feature);


        }
        return $geojson;
    }

    public function geojson_titik($id)
    {
        $titiks = $this
            ->select(DB::raw('id, st_asgeojson(geom) as geom, name, description, color, image, created_at, updated_at'))
            ->where('id', $id)
            ->get();

        $geojson = [
            'type' => 'FeatureCollection',
            'features' => [],
        ];

        foreach ($titiks as $p) {
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
                    'image' => $p->image
                ],
            ];

            array_push($geojson['features'], $feature);

        }
        return $geojson;
    }
}

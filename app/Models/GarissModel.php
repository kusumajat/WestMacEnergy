<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class GarissModel extends Model
{
    protected $table = 'gariss';

    protected $guarded = ['id'];

    public function geojson_gariss()
    {
        $gariss = $this
            ->select(DB::raw('gariss.id, st_asgeojson(geom) as geom, gariss.name, gariss.description, gariss.color, gariss.image,
            st_length(geom, true) as length_m, st_length(geom, true)/1000 as length_km,
            gariss.created_at, gariss.updated_at, gariss.user_id, users.name as user_created'))
            ->leftjoin('users', 'gariss.user_id', '=', 'users.id')
            ->get();

        $geojson = [
            'type' => 'FeatureCollection',
            'features' => [],
        ];

        foreach ($gariss as $p) {
            $feature = [
                'type' => 'Feature',
                'geometry' => json_decode($p->geom),
                'properties' => [
                    'id' => $p->id,
                    'name' => $p->name,
                    'description' => $p->description,
                    'created_at' => $p->created_at,
                    'updated_at' => $p->updated_at,
                    'length_m' => $p->length_m,
                    'length_km' => $p->length_km,
                    'image' => $p->image,
                    'user_id' => $p->user_id,
                    'color' => $p->color,
                    'user_created' => $p->user_created

                ],
            ];

            array_push($geojson['features'], $feature);


        }
        return $geojson;
    }

    public function geojson_garis($id)
    {
        $gariss = $this
            ->select(DB::raw('id, st_asgeojson(geom) as geom, name, description, color, image,
            st_length(geom, true) as length_m, st_length(geom, true)/1000 as length_km,
            created_at, updated_at'))
            ->where('id', $id)
            ->get();

        $geojson = [
            'type' => 'FeatureCollection',
            'features' => [],
        ];

        foreach ($gariss as $p) {
            $feature = [
                'type' => 'Feature',
                'geometry' => json_decode($p->geom),
                'properties' => [
                    'id' => $p->id,
                    'name' => $p->name,
                    'description' => $p->description,
                    'created_at' => $p->created_at,
                    'updated_at' => $p->updated_at,
                    'color' => $p->color,
                    'length_m' => $p->length_m,
                    'length_km' => $p->length_km,
                    'image' => $p->image,
                ],
            ];

            array_push($geojson['features'], $feature);


        }
        return $geojson;
    }

}

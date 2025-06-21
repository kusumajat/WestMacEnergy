<?php

namespace App\Http\Controllers;

use App\Models\AreasModel;
use App\Models\GarissModel;
use App\Models\PointsModel;
use App\Models\TitiksModel;
use Illuminate\Http\Request;
use App\Models\PolygonsModel;
use App\Models\PolylinesModel;


class APIController extends Controller
{
    public function __construct()
    {
        $this->points = new PointsModel();
        $this->polylines = new PolylinesModel();
        $this->polygons = new PolygonsModel();
        $this->titiks = new TitiksModel();
        $this->gariss = new GarissModel();
        $this->areas = new AreasModel();
    }

    public function points()
    {
        $points = $this->points->geojson_points();
        return response()->json($points);
    }

    public function point($id)
    {
        $point = $this->points->geojson_point($id);
        return response()->json($point);
    }

    public function polylines()
    {
        $polylines = $this->polylines->geojson_polylines();
        return response()->json($polylines, 200, [], JSON_NUMERIC_CHECK);
    }
    public function polyline($id)
    {
        $polyline = $this->polylines->geojson_polyline($id);
        return response()->json($polyline, 200, [], JSON_NUMERIC_CHECK);
    }

    public function polygons()
    {
        $polygons = $this->polygons->geojson_polygons();
        return response()->json($polygons);
    }

    public function polygon($id)
    {
        $polygon = $this->polygons->geojson_polygon($id);
        return response()->json($polygon);
    }

    public function titiks()
    {
        $titiks = $this->titiks->geojson_titiks();
        return response()->json($titiks);
    }

    public function titik($id)
    {
        $titik = $this->titiks->geojson_titik($id);
        return response()->json($titik);
    }

    public function gariss()
    {
        $gariss = $this->gariss->geojson_gariss();
        return response()->json($gariss, 200, [], JSON_NUMERIC_CHECK);
    }
    public function garis($id)
    {
        $garis = $this->gariss->geojson_garis($id);
        return response()->json($garis, 200, [], JSON_NUMERIC_CHECK);
    }

    public function areas()
    {
        $areas = $this->areas->geojson_areas();
        return response()->json($areas);
    }

    public function area($id)
    {
        $area = $this->areas->geojson_area($id);
        return response()->json($area);
    }
}

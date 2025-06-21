<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GarissModel;

class GarissController extends Controller
{
    public function __construct()
    {
        $this->gariss = new GarissModel();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate data
        $request->validate([
            'name' => 'required|unique:gariss,name',
            'description' => 'required',
            'geom_garis' => 'required',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:5120'
        ],
        [
            'name.required' => 'Name is required',
            'name.unique' => 'Name already exists',
            'description.required' => 'Description is required',
            'geom_garis.required' => 'Geometry is required',
        ]);

        // make folder
        if (!is_dir('storage/images')) {
            mkdir('./storage/images', 0777);
        }

        // upload image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name_image = time() . "_garis." . strtolower($image->getClientOriginalExtension());
            $image->move('storage/images', $name_image);
        } else {
            $name_image = null;
        }

        $data = [
            'geom' => $request->geom_garis,
            'name' => $request->name,
            'description' => $request->description,
            'color' => $request->color,
            'image' => $name_image,
            'user_id' => auth()->user()->id
        ];

        // create data
        if (!$this->gariss->create($data)) {
            return redirect()->route('post-mining')->with('error', 'Garis failed to add!');
        }

        return redirect()->route('post-mining')->with('success', 'Garis has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = [
            'title' => 'Edit Garis',
            'id' => $id,
        ];

        return view('edit-garis', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validate data
        $request->validate(
            [
                'name' => 'required|unique:gariss,name,' . $id,
                'description' => 'required',
                'geom_garis' => 'required',
                'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2408',
            ],
            [
                'name.required' => 'Name is required',
                'name.unique' => 'Name already exist',
                'description.required' => 'Description is required',
                'geom_garis.required' => 'Garis is required',
            ]
        );

        // Create directory if not exist
        if (!is_dir('storage/images')) {
            mkdir('./storage/images', 0777);
        }


        // Get old image
        $old_image = $this->gariss->find($id)->image;

        // Get image File
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name_image = time() . "_garis." . strtolower($image->getClientOriginalExtension());
            $image->move('storage/images', $name_image);

            // Delete old image
            if ($old_image != null) {
                if (file_exists('./storage/images/' . $old_image)) {
                    unlink('./storage/images/' . $old_image);
                }
            }
        } else {
            $name_image = $old_image;
        }

        $data = [
            'name' => $request->name,
            'geom' => $request->geom_garis,
            'description' => $request->description,
            'color' => $request->color,
            'image' => $name_image,
        ];

        // Update data
        if (!$this->gariss->find($id)->update($data)) {
            return redirect()->route('post-mining')->with('error', 'Garis failed to update');
        }

        //redirect to post-mining
        return redirect()->route('post-mining')->with('success', 'Garis has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $imagefile = $this->gariss->find($id)->image;

        if (!$this->gariss->destroy($id)) {
            return redirect()->route('post-mining')->with('error', 'Gariss failed to delete!');
        }
        // delete image
        if ($imagefile != null) {
            if (file_exists('./storage/images/' . $imagefile)) {
                unlink('./storage/images/' . $imagefile);
            }
        }

        return redirect()->route('post-mining')->with('success', 'Gariss has been deleted!');
    }
}

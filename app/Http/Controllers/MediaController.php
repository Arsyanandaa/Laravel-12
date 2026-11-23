<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMediaRequest;
use App\Http\Requests\UpdateMediaRequest;
use App\Models\Media;
use Illuminate\Http\Request;
use App\Http\Resources\MediaResource;


class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return MediaResource::collection(Media::with('users')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMediaRequest $request)
    {
        $media = Media::create($request->validated());

        return (new MediaResource($media))->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Media $media)
    {
        return new MediaResource($media->load('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMediaRequest $request, Media $media)
    {
        $media->update($request->validated());
        return new MediaResource($media);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Media $media)
    {
        $media->delete();

        return response()->json(null, 204);
    }
}

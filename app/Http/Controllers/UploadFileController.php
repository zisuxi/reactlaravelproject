<?php

namespace App\Http\Controllers;

use App\Models\uploadFile;
use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class UploadFileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allFile = uploadFile::all();
        return  response()->json($allFile);
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
        $request->validate([
            "file" => 'required|mimes:jpg,png,jpeg',
        ]);
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileExt = $file->getClientOriginalExtension();
            $imageName = rand(1000, 9000) . '.' . $fileExt;
            $fileMove = $file->move(public_path('/images/'), $imageName);
            if ($fileMove) {
                $uploadFile = uploadFile::create([
                    'file' => $imageName,
                ]);

                if ($uploadFile) {
                    return response()->json(['message' => 200], 200);
                } else {
                    return response()->json(['message' => 'Failed to insert file into database.'], 500);
                }
            } else {
                return response()->json(['message' => 'Failed to upload file.'], 500);
            }
        } else {
            return response()->json(['message' => 'No file uploaded.'], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(uploadFile $uploadFile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(uploadFile $uploadFile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, uploadFile $uploadFile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(uploadFile $uploadFile)
    {
        $filePath = public_path("images/" . $uploadFile->file);
        if (file_exists($filePath)) {
            unlink($filePath);
        }
        $uploadFile->delete();
        return  response()->json([
            ['message' => 200], 200,
        ]);
    }
}

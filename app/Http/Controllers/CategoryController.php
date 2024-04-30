<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use PhpParser\Node\Stmt\Return_;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = User::all();
        return  response()->json( $user);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $createUser = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);
        if ($createUser) {
            return response()->json([
                'status' => 200,
            ]);
        } else {
            return 300;
        }
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
      $edit_user= User::where('id',$id)->first();
      return  response()->json($edit_user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
          $name=  $request->input('name');
          $email= $request->input('email');
            User::where( 'id', $id )->update([
                'name'=>$name,
                'email'=>$email,
            ]);
            return  response()->json([
                'status'=>200,
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    $userRecord= User::where('id',$id)->first();
   $userRecord->delete();
   return response()->json([
    'status'=>200,
   ]);
}
}

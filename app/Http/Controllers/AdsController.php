<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'category_id' => 'required|integer',
            'post_id' => 'required|integer',
        ]);

        // $expirationTime = Carbon::now()->addHours(1);
        $expirationTime = Carbon::now()->addMinutes(1);
        // $now = Carbon::now()->toDateTimeString();
        // dd($now, $expirationTime->toDateTimeString());

        // Simpan iklan jika post unik
        
        $isUnique = !Ads::where('post_id', $request->post_id)->exists();
        if ($isUnique) {
            $ads = new Ads();
            $ads->user_id = $validatedData['user_id'];
            $ads->category_id = $validatedData['category_id'];
            $ads->post_id = $validatedData['post_id'];
            $ads->removed_at = $expirationTime->toDateTimeString();
            // dd($ads);
            $ads->save();
            return redirect('/dashboard/posts')->with('success', 'Ads added successfully!');
        } else {
            return back()->with('error', 'The post already exists');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function show(Ads $ads)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function edit(Ads $ads)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ads $ads)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ads $ads)
    {
        $ads->delete();
        return redirect('/dashboard/posts')->with('success', 'Ads Has Been Deleted');

    }
}

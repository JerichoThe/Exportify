<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\Post;
use App\Models\Temp;
use App\Models\User;
use App\Models\Order;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adminActiveOrders = Ads::with('posts', 'author')->paginate(12)->withQueryString();
        $userActiveOrders = Ads::with('posts', 'author')->
        where('user_id', auth()->user()->id)->paginate(12)->withQueryString();
        
        if (Auth::user()->name == 'admin') {
            return view('dashboard.ads.active', [
                'activeOrders' => $adminActiveOrders
            ]);
        } else {
            return view('dashboard.ads.active', [
                'activeOrders' => $userActiveOrders
            ]);
        }
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
            'role' => 'required|in:1,2,3',
            'day' => 'integer'
        ]);

        $isUnique = !Order::where('post_id', $request->post_id)
            ->whereNull('removed_at')
            ->exists();
        $pay = Order::where('post_id', $validatedData['post_id'])
            ->where('status', 'Done')
            ->exists();
        $title = Post::find($validatedData['post_id'])->title;
        $author_name = User::find($validatedData['user_id'])->name;
        if (!$pay && $isUnique) {
            $uniqueKey = 'validatedData_' . time();
            $temp = new Temp();
            $temp->user_id = $validatedData['user_id'];
            $temp->category_id = $validatedData['category_id'];
            $temp->post_id = $validatedData['post_id'];
            $temp->role = $validatedData['role'];
            if (isset($validatedData['day'])) {
                $temp->day = $validatedData['day'];
            }
            $temp->uniqueKey = $uniqueKey;
            $temp->save();
            // session()->put($uniqueKey, $validatedData);
            return redirect()->route('order.create', [
                'title' => $title,
                'author' => $author_name,
                'data' => $validatedData,
                'uniqueKey' => $uniqueKey
            ]);

        } else {
            return back()->with('error', 'The order already exists');
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

    public function createAds($orders)
    {
        // $validatedData = session()->get($orders->uniqueKey);
        $validatedData = Temp::where('post_id', $orders->post_id)
            ->where('uniqueKey', $orders->uniqueKey)->first();
        $isUnique = !Ads::where('post_id', $orders->post_id)->exists();
        $pay = Order::where('post_id', $orders->post_id)
            ->where('status', 'approve')
            ->exists();
        $expirationTime = null;
        switch ($validatedData['role']) {
            case '1':
                $expirationTime = Carbon::now()->addDays(1);
                break;
            case '2':
                $expirationTime = Carbon::now()->addWeeks(1);
                break;
            case '3':
                $expirationTime = Carbon::now()->addMonths($validatedData['day']);
                break;
            default:
                return back()->with('error', 'Invalid role selected');
        }
        if ($isUnique && $pay) {
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
}

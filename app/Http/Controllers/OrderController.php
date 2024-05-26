<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdsController;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('user_id', auth()->user()->id)->oldest()->paginate(12)->withQueryString();
        $allOrders = Order::oldest()->paginate(12)->withQueryString();
        if (Auth::user()->name == 'admin') {
            return view('dashboard.user.index', [
                'orders' => $allOrders
            ]);
        } else {
            return view('dashboard.user.index', [
                'orders' => $orders
            ])->with('success', 'Order has been created successfully!');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $post_id = $request->data['post_id'];
        $author_id = $request->data['user_id'];
        $title = Post::find($post_id)->title;
        $author = User::find($author_id)->name;
        $uniqueKey = $request->uniqueKey;
        return view('dashboard.user.orderForm', [
            'title' => $title,
            'author' => $author,
            'post_id' => $post_id,
            'author_id' => $author_id,
            'uniqueKey' => $uniqueKey
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->status == 'createOrder') {
            $validatedData = $request->validate([
                'user_id' => 'integer',
                'author' => 'string',
                'post_id' => 'integer',
                'title' => 'string',
                'uniqueKey' => 'string',
                'pay' => 'required|image|file|max:1024',
            ]);
            // Simpan gambar jika diunggah
            if ($request->hasFile('pay')) {
                $validatedData['pay'] = $request->file('pay')->store('payment_receipts');
            }

            Order::create($validatedData);

            // Redirect pengguna ke halaman yang sesuai setelah penyimpanan berhasil
            return redirect('/dashboard/user/order')->with('success', 'Order has been created successfully!');

        }
        $orders = Order::findOrFail($request->order_id);
        if ($request->status == 'approve') {
            // $orders->user_id = $request->user_id;
            $orders->status = 'approve';
            $orders->removed_at = Carbon::now()->toDateTimeString();
            $orders->save();
            $adsController = new AdsController();
            return $adsController->createAds($orders);
        } else if ($request->status == 'reject') {
            $orders->status = 'reject';
            $orders->removed_at = Carbon::now()->toDateTimeString();
            $orders->save();
            return redirect('/dashboard/user/order')->with('success', 'Rejected successfully!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function rejected()
    {
        $adminRejectedOrders = Order::with('posts', 'author')
            ->where('status', 'reject')
            ->latest()
            ->paginate(9)
            ->withQueryString();
        $userRejectedOrders = Order::with('posts', 'author')
            ->where('user_id', auth()->user()->id)
            ->where('status', 'reject')
            ->latest()
            ->paginate(9)
            ->withQueryString();

        if (Auth::user()->name == 'admin') {
            return view('dashboard.user.rejectedOrder', [
                'rejectedOrders' => $adminRejectedOrders
            ]);
        } else {
            return view('dashboard.user.rejectedOrder', [
                'rejectedOrders' => $userRejectedOrders
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function history()
    {
        $adminHistoryOrders = Order::with('posts', 'author')
            ->whereNotNull('removed_at')
            ->latest()
            ->paginate(9)
            ->withQueryString();

        $userHistoryOrders = Order::with('posts', 'author')
            ->where('user_id', auth()->user()->id)
            ->whereNotNull('removed_at')->latest()
            ->paginate(9)
            ->withQueryString();
        ;



        if (Auth::user()->name == 'admin') {
            return view('dashboard.admin.history', [
                'historyOrders' => $adminHistoryOrders
            ]);
        } else {
            return view('dashboard.admin.history', [
                'historyOrders' => $userHistoryOrders
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}

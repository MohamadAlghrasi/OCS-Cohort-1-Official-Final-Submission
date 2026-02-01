<?php

namespace App\Livewire\Coloringroll;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderAddress;
use Livewire\WithPagination;

class Profile extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $activeTab = 'profile';
    protected $queryString = ['activeTab'];


    public $name;
    public $email;

    public $phone;
    public $country;
    public $city;
    public $address;

    // public $orders = [];

    public function mount()
    {
        $user = Auth::user();

        $this->name = $user->name;
        $this->email = $user->email;

        // $this->orders = Order::with([
        //     'items.variant.values.attribute',
        //     'items.product'
        // ])
        //     ->where('user_id', $user->id)
        //     ->latest()
        //     ->get();

        $lastAddress = OrderAddress::whereHas('order', function ($q) use ($user) {
            $q->where('user_id', $user->id);
        })->latest()->first();

        if ($lastAddress) {
            $this->phone = $lastAddress->phone;
            $this->country = $lastAddress->country;
            $this->city = $lastAddress->city;
            $this->address = $lastAddress->address;
        }
    }
    public function saveProfile()
    {
        $this->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|email',
            'phone' => 'required|string',
            'country' => 'required|string',
            'city' => 'required|string',
            'address' => 'required|string',
        ]);

        $user = Auth::user();

        $user->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        $user->default_address = [
            'phone' => $this->phone,
            'country' => $this->country,
            'city' => $this->city,
            'address' => $this->address,
        ];

        $user->save();

        session()->flash('success', 'Profile updated successfully');
    }
    public function updatingPage()
    {
        $this->activeTab = 'orders';
    }

    public function render()
    {
        $orders = Order::with([
            'items.variant.values.attribute',
            'items.product'
        ])
            ->where('user_id', Auth::id())
            ->latest()
            ->paginate(5);

        return view('livewire.coloringroll.profile', [
            'orders' => $orders
        ]);
    }
}

@extends('layouts.admin')

@section('page-title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-lg p-6 shadow-sm">
        <p class="text-sm text-gray-500">Total Orders</p>
        <p class="text-3xl font-bold text-gray-800 mt-1">0</p>
    </div>
    <div class="bg-white rounded-lg p-6 shadow-sm">
        <p class="text-sm text-gray-500">Total Revenue</p>
        <p class="text-3xl font-bold text-gray-800 mt-1">RM 0.00</p>
    </div>
    <div class="bg-white rounded-lg p-6 shadow-sm">
        <p class="text-sm text-gray-500">Total Products</p>
        <p class="text-3xl font-bold text-gray-800 mt-1">0</p>
    </div>
    <div class="bg-white rounded-lg p-6 shadow-sm">
        <p class="text-sm text-gray-500">Total Customers</p>
        <p class="text-3xl font-bold text-gray-800 mt-1">0</p>
    </div>
</div>

<div class="bg-white rounded-lg p-6 shadow-sm">
    <h2 class="text-lg font-semibold mb-4">Recent Orders</h2>
    <p class="text-gray-500 text-sm">No orders yet.</p>
</div>
@endsection
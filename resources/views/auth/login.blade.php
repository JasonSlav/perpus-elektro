@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-10">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div>
            <label>Email</label>
            <input type="email" name="email" required class="border rounded w-full">
        </div>
        <div class="mt-4">
            <label>Password</label>
            <input type="password" name="password" required class="border rounded w-full">
        </div>
        <div class="mt-4">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Login</button>
        </div>
    </form>
</div>
@endsection

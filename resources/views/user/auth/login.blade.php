@extends('user.layouts.main')

@section('content')
    <form method="POST" action="{{ route('login.store') }}">
        @csrf
        <input type="text" name="username" required>
        <input type="password" name="password" required>
        <button type="submit">Login</button>
    </form>
@endsection

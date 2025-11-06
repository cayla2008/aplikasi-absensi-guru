@extends('layouts.app')

@section('title', 'Dashboard Guru')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Dashboard Guru</h1>
    <p>Selamat datang, {{ Auth::user()->name }}! Ini adalah halaman khusus guru.</p>
@endsection

@extends('layouts.app')
@section('content')
<div class="bg-blue-800 text-gray-100 py-4 h-screen overflow-hidden">
    <div class="container flex flex-col mx-auto items-center w-full p-2 md:p-4">
        <h1 class="text-4xl font-semibold">URL Shortener </h1>
        <h2 class="text-2xl text-center mb-4">Simplify your links, track & manage them</h2>
        <url-shortener></url-shortener>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
    <div class="container-left">{{$pageTitle}}</div>

    <div> 
        @if (session('success'))
        <div id="success-message" class="success-message">
            <span> ✔ {{ session('success') }}</span>
        </div>
        @endif
    <div>

    <div class="container">
        <form action="{{ route('edit') }}" method="GET">
            <button class="btn">Edit</button>
        </form>

        <form action="{{ route('delete') }}" method="GET">
            <button class="btn btn-danger">Delete</button>                       
        </form>
    </div>
    
    <div class="grid gap-6 lg:grid-cols-3 lg:gap-8">
        @foreach($buttons as $button)
        <a href={{ $button['link'] }}
            class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[##040404] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#040404]">

            <div class="flex size-12 shrink-0 items-center justify-center rounded-full " style="background-color:{{ $button['color'] }}; opacity:60%;"></div>
            <div class="pt-3 sm:pt-5">
                <h2 class="text-xl font-semibold text-black dark:text-white">{{$button['title']}}</h2>
                <p class="mt-4 text-sm/relaxed">{{$button['link']}}</p>
            </div>
            <svg class="size-6 shrink-0 self-center stroke-[#FF2D20]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/></svg>
        </a>
        @endforeach          
    </div>
@endsection
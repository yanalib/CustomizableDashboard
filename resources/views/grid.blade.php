@extends('layouts.app')

@section('content')
    <div class="container-left">{{$pageTitle}}</div>

    <div class="grid gap-6 lg:grid-cols-3 lg:gap-8">

        @foreach($buttons as $button)
        <a href={{ $action }}/{{ $button['id'] }}
            class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[##040404] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#040404]">

            <div class="flex size-12 shrink-0 items-center justify-center rounded-full" style="background-color:{{ $button['color'] }}; opacity:50%;"></div>

            <div class="pt-3 sm:pt-5">
                <h2 class="text-xl font-semibold text-black dark:text-white">{{$button['title']}}</h2>
                <p class="mt-4 text-sm/relaxed">{{$button['link']}}</p>
            </div>            
        </a>
        @endforeach

    </div>
@endsection
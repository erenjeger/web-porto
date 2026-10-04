@extends('layouts.app')
@section('content')
<div class="min-h-screen bg-[#0a0a0f] lg:flex">
<aside class="fixed inset-y-0 left-0 z-50 hidden w-64 border-r border-[#1f1f2e] bg-[#111118] lg:flex">@include('dashboard._sidebar')</aside>
<div id="mobile-sidebar-backdrop" class="fixed inset-0 z-40 hidden bg-black/60 lg:hidden"></div><aside id="mobile-sidebar" class="fixed inset-y-0 left-0 z-50 hidden w-72 border-r border-[#1f1f2e] bg-[#111118] lg:hidden">@include('dashboard._sidebar')</aside>
<div class="min-w-0 flex-1 lg:ml-64"><header class="sticky top-0 z-30 flex items-center justify-between border-b border-[#1f1f2e] bg-[#111118]/95 px-4 py-3 backdrop-blur lg:hidden"><div class="flex items-center gap-3"><div class="grid h-9 w-9 place-items-center rounded-xl bg-gradient-to-br from-cyan-500 to-blue-600"><x-icon name="code" class="h-4 w-4 text-white"/></div><span class="text-sm font-medium text-white">DevPortfolio</span></div><button id="mobile-sidebar-open" class="text-[#6b7280]"><x-icon name="menu" class="h-6 w-6"/></button></header><main class="min-h-screen p-5 sm:p-6 lg:p-8">@yield('dashboard-content')</main></div>
</div>
@endsection

@extends('layouts.app')
@section('title','Masuk — DevPortfolio')
@section('content')
<div class="min-h-screen flex items-center justify-center px-4 py-10"><div class="w-full max-w-md">
<div class="mb-8 text-center"><div class="mx-auto mb-4 grid h-14 w-14 place-items-center rounded-2xl bg-gradient-to-br from-cyan-500 to-blue-600"><x-icon name="code" class="h-7 w-7 text-white"/></div><h1 class="text-2xl font-semibold tracking-tight text-white">Selamat Datang Kembali</h1><p class="mt-1 text-sm text-[#6b7280]">Masuk ke dashboard portfolio Anda</p></div>
<div class="rounded-2xl border border-[#1f1f2e] bg-[#111118] p-8">@if($errors->any())<div class="mb-4 rounded-xl border border-red-500/20 bg-red-500/10 px-4 py-3 text-sm text-red-300">{{ $errors->first() }}</div>@endif
<form method="POST" action="{{ route('login.store') }}" class="space-y-4">@csrf
<div><label class="label">Email</label><input name="email" type="email" value="{{ old('email') }}" placeholder="nama@email.com" required autofocus class="field w-full"><x-field-error name="email"/></div>
<div><label class="label">Password</label><div class="relative"><input id="login-password" name="password" type="password" placeholder="••••••••" required class="field w-full pr-12"><button type="button" class="password-toggle absolute right-3 top-1/2 -translate-y-1/2 text-[#4b5563]" data-target="login-password"><x-icon name="eye" class="h-5 w-5"/></button></div><x-field-error name="password"/></div>
<label class="flex items-center gap-2 text-xs text-[#6b7280]"><input name="remember" type="checkbox" class="accent-cyan-500"> Ingat saya</label>
<button class="w-full rounded-xl bg-gradient-to-r from-cyan-500 to-blue-600 px-4 py-3 font-medium text-white transition hover:from-cyan-400 hover:to-blue-500">Masuk</button>
</form>
<div class="relative my-6"><div class="border-t border-[#2a2a3e]"></div><span class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 bg-[#111118] px-3 text-sm text-[#4b5563]">atau</span></div>
<a href="{{ route('auth.google') }}" class="flex w-full items-center justify-center gap-3 rounded-xl border border-[#2a2a3e] bg-[#1a1a27] px-4 py-3 font-medium text-white transition hover:bg-[#22223a]"><x-icon name="chrome" class="h-5 w-5 text-[#ea4335]"/> Masuk dengan Google</a>
<p class="mt-6 text-center text-sm text-[#6b7280]">Belum punya akun? <a href="{{ route('register') }}" class="text-cyan-400 hover:text-cyan-300">Daftar sekarang</a></p>
<div class="mt-4 rounded-xl bg-[#1a1a27] p-3 text-center text-xs text-[#6b7280]">Demo: <span class="text-cyan-400">demo@example.com</span> / <span class="text-cyan-400">demo123</span></div>
</div></div></div>
@endsection

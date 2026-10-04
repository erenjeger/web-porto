@extends('layouts.app')
@section('title','Buat Akun — DevPortfolio')
@section('content')
<div class="min-h-screen flex items-center justify-center px-4 py-10"><div class="w-full max-w-md">
<div class="mb-8 text-center"><div class="mx-auto mb-4 grid h-14 w-14 place-items-center rounded-2xl bg-gradient-to-br from-cyan-500 to-blue-600"><x-icon name="code" class="h-7 w-7 text-white"/></div><h1 class="text-2xl font-semibold tracking-tight text-white">Buat Akun Baru</h1><p class="mt-1 text-sm text-[#6b7280]">Mulai tampilkan portfolio Anda</p></div>
<div class="rounded-2xl border border-[#1f1f2e] bg-[#111118] p-8">@if($errors->any())<div class="mb-4 rounded-xl border border-red-500/20 bg-red-500/10 px-4 py-3 text-sm text-red-300">{{ $errors->first() }}</div>@endif
<form method="POST" action="{{ route('register.store') }}" class="space-y-4">@csrf
<div><label class="label">Email</label><input name="email" type="email" value="{{ old('email') }}" placeholder="nama@email.com" required class="field w-full"><x-field-error name="email"/></div>
<div><label class="label">Username</label><div class="relative"><span class="absolute left-4 top-1/2 -translate-y-1/2 text-[#4b5563]">@</span><input name="username" id="username" value="{{ old('username') }}" placeholder="johndoe" required pattern="[a-z0-9_]+" class="field w-full pl-8"></div><p class="mt-1 text-xs text-[#4b5563]">URL portfolio: /portfolio/<span id="username-preview">{{ old('username','username') }}</span></p><x-field-error name="username"/></div>
<div><label class="label">Password</label><div class="relative"><input id="register-password" name="password" type="password" placeholder="Minimal 6 karakter" required class="field w-full pr-12"><button type="button" class="password-toggle absolute right-3 top-1/2 -translate-y-1/2 text-[#4b5563]" data-target="register-password"><x-icon name="eye" class="h-5 w-5"/></button></div><x-field-error name="password"/></div>
<div><label class="label">Konfirmasi Password</label><input name="password_confirmation" type="password" placeholder="Ulangi password" required class="field w-full"><x-field-error name="password_confirmation"/></div>
<button class="w-full rounded-xl bg-gradient-to-r from-cyan-500 to-blue-600 px-4 py-3 font-medium text-white">Buat Akun</button>
</form>
<div class="relative my-6"><div class="border-t border-[#2a2a3e]"></div><span class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 bg-[#111118] px-3 text-sm text-[#4b5563]">atau</span></div>
<a href="{{ route('auth.google') }}" class="flex w-full items-center justify-center gap-3 rounded-xl border border-[#2a2a3e] bg-[#1a1a27] px-4 py-3 font-medium text-white"><x-icon name="chrome" class="h-5 w-5 text-[#ea4335]"/> Daftar dengan Google</a>
<p class="mt-6 text-center text-sm text-[#6b7280]">Sudah punya akun? <a href="{{ route('login') }}" class="text-cyan-400 hover:text-cyan-300">Masuk di sini</a></p>
</div></div></div>
@endsection

@props(['name','class'=>'w-5 h-5'])
<svg {{ $attributes->merge(['class'=>$class,'viewBox'=>'0 0 24 24','fill'=>'none','xmlns'=>'http://www.w3.org/2000/svg']) }} stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
@switch($name)
@case('code')<path d="m8 9-4 3 4 3M16 9l4 3-4 3M14 5l-4 14"/>@break
@case('eye')<path d="M2.5 12s3.5-6 9.5-6 9.5 6 9.5 6-3.5 6-9.5 6-9.5-6-9.5-6Z"/><circle cx="12" cy="12" r="2.5"/>@break
@case('chrome')<circle cx="12" cy="12" r="8.5"/><circle cx="12" cy="12" r="3.1"/><path d="m12 3.5 2.2 5.5M20.4 8.5l-5.9-.2M5 18l3.6-4.8"/>@break
@case('menu')<path d="M4 6h16M4 12h16M4 18h16"/>@break
@case('x')<path d="M6 6l12 12M18 6 6 18"/>@break
@case('external-link')<path d="M14 5h5v5M19 5l-8 8M19 13v5a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5"/>@break
@case('logout')<path d="M10 17l5-5-5-5M15 12H4M20 19V5a2 2 0 0 0-2-2h-5"/>@break
@case('dashboard')<rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/>@break
@case('folder')<path d="M3 6.5a2 2 0 0 1 2-2h5l2 2h7a2 2 0 0 1 2 2v8.5a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6.5Z"/>@break
@case('user')<circle cx="12" cy="8" r="3.5"/><path d="M5 20c.8-3.2 3.1-5 7-5s6.2 1.8 7 5"/>@break
@case('chevron-right')<path d="m9 18 6-6-6-6"/>@break
@case('arrow-right')<path d="M5 12h14M13 6l6 6-6 6"/>@break
@case('plus')<path d="M12 5v14M5 12h14"/>@break
@case('trash')<path d="M3 6h18M9 6V4h6v2M8 10v7M12 10v7M16 10v7M5 6l1 14h12l1-14"/>@break
@case('search')<circle cx="10.8" cy="10.8" r="6.8"/><path d="m16 16 5 5"/>@break
@case('upload')<path d="M12 16V4M8 8l4-4 4 4M4 14v4a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-4"/>@break
@case('copy')<rect x="9" y="9" width="10" height="10" rx="2"/><path d="M6 15H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v1"/>@break
@case('check')<path d="m5 12 4 4L19 6"/>@break
@case('map-pin')<path d="M20 10c0 5-8 11-8 11S4 15 4 10a8 8 0 1 1 16 0Z"/><circle cx="12" cy="10" r="2.5"/>@break
@case('phone')<path d="M6 3h3l1.2 4-2 1.6A15.2 15.2 0 0 0 15.4 15l1.6-2 4 1.2v3c0 1-1 1.8-2 1.8C10.7 19 5 13.3 5 6c0-1.7.4-3 1-3Z"/>@break
@case('mail')<rect x="3" y="5" width="18" height="14" rx="2"/><path d="m4 7 8 6 8-6"/>@break
@case('github')<path d="M12 3a9 9 0 0 0-2.8 17.5c.4.1.5-.2.5-.4v-1.7c-2 .4-2.4-1-2.4-1-.4-.9-.8-1.1-.8-1.1-.7-.5.1-.5.1-.5.8.1 1.2.8 1.2.8.7 1.2 1.8.9 2.2.7.1-.5.3-.9.5-1.1-1.6-.2-3.2-.8-3.2-3.6 0-.8.3-1.5.8-2.1-.1-.2-.4-1 .1-2.1 0 0 .7-.2 2.2.8.6-.2 1.2-.3 1.9-.3s1.3.1 1.9.3c1.5-1 2.2-.8 2.2-.8.5 1.1.2 1.9.1 2.1.5.6.8 1.3.8 2.1 0 2.8-1.6 3.4-3.2 3.6.3.3.5.7.5 1.4v2c0 .2.1.5.5.4A9 9 0 0 0 12 3Z"/>@break
@case('briefcase')<rect x="3" y="7" width="18" height="13" rx="2"/><path d="M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2M3 12h18"/>@break
@case('graduation')<path d="m3 10 9-5 9 5-9 5-9-5Z"/><path d="M7 12.2V17c2.8 2 7.2 2 10 0v-4.8M21 10v6"/>@break
@case('heart')<path d="M20.8 8.6c0 5.5-8.8 11-8.8 11S3.2 14.1 3.2 8.6A4.6 4.6 0 0 1 12 6.4a4.6 4.6 0 0 1 8.8 2.2Z"/>@break
@case('video')<rect x="3" y="6" width="13" height="12" rx="2"/><path d="m16 10 5-3v10l-5-3"/>@break
@case('image')<rect x="3" y="4" width="18" height="16" rx="2"/><circle cx="8.5" cy="9" r="1.5"/><path d="m21 15-4.5-4.5L9 18"/>@break
@case('link')<path d="M10 13a5 5 0 0 0 7.1.1l2-2a5 5 0 0 0-7.1-7.1l-1.1 1.1M14 11a5 5 0 0 0-7.1-.1l-2 2a5 5 0 0 0 7.1 7.1l1.1-1.1"/>@break
@case('save')<path d="M5 3h12l2 2v16H5V3Z"/><path d="M8 3v6h8V3M8 21v-6h8v6"/>@break
@default<circle cx="12" cy="12" r="8"/>
@endswitch
</svg>

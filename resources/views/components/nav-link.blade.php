 @php
         $current = "bg-gray-950/50 text-white";
         $default = "text-gray-300 hover:bg-white/5 hover:text-white";

 @endphp

<a class="block rounded-md bg-gray-950/50 px-3 py-2 text-base font-medium {{ $active ? $current : $default }}" {{ $attributes }}>
    {{ $slot }}
</a>
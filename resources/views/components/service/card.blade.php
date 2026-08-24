@props(['item'])

<div
    class="group relative bg-white rounded-2xl overflow-hidden shadow-lg
           border border-gray-200 hover:shadow-2xl
           transition-all duration-500 transform hover:-translate-y-1">

    {{-- IMAGE (AFTER sebagai cover) --}}
    <div class="h-48 overflow-hidden bg-gray-100 relative">
        <img
            src="{{ $item['after']['image'] }}"
            alt="{{ $item['title'] }}"
            class="w-full h-full object-cover
                   group-hover:scale-105 transition-transform duration-700
                   cursor-pointer"
            onclick="openBeforeAfterModal({{ $item['id'] }})">

        {{-- OVERLAY --}}
        <div
            class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent
                   opacity-0 group-hover:opacity-100 transition-opacity duration-300
                   flex items-end pointer-events-none">
            <div class="p-4 text-white">
                <p class="text-sm font-medium">
                    Lihat sebelum & sesudah
                </p>
            </div>
        </div>
    </div>

    {{-- CONTENT --}}
    <div class="p-5">

        {{-- TITLE --}}
        <h3 class="font-bold text-gray-900 mb-2 line-clamp-1">
            {{ $item['title'] }}
        </h3>

        {{-- DESCRIPTION --}}
        <p class="text-sm text-gray-600 mb-4 line-clamp-2">
            {{ $item['description'] }}
        </p>

        {{-- TAGS --}}
        @if (!empty($item['tags']))
            <div class="flex flex-wrap gap-1.5 mb-4">
                @foreach (array_slice($item['tags'], 0, 3) as $tag)
                    <span
                        class="inline-block px-2 py-1 bg-gray-100 text-gray-700
                               text-xs rounded-md">
                        {{ $tag }}
                    </span>
                @endforeach
            </div>
        @endif

        {{-- FOOTER --}}
        <div class="flex items-center justify-between pt-4 border-t border-gray-100">
            <span class="text-xs text-gray-500">
                {{ $item['date'] }}
            </span>

            <button
                onclick="openBeforeAfterModal({{ $item['id'] }})"
                class="text-blue-600 hover:text-blue-800 text-sm font-medium
                       flex items-center gap-1 hover:bg-blue-50
                       px-3 py-2 rounded-lg transition-colors">
                Lihat Detail
                <span class="transition-transform group-hover:translate-x-1">→</span>
            </button>
        </div>

    </div>
</div>

@props([
    'message' => config('business.message_template'),
    'phone' => config('business.whatsapp'),
])

@php($waMessage = urlencode($message))

<a href="https://wa.me/{{ $phone }}?text={{ $waMessage }}"
   target="_blank"
   rel="noopener noreferrer"
   aria-label="Konsultasi via WhatsApp"
   class="group fixed bottom-5 right-5 z-50 flex h-14 w-14 items-center justify-center rounded-full bg-green-600 text-white shadow-lg transition hover:scale-105 hover:bg-green-700 focus:outline-none focus:ring-4 focus:ring-green-200">
    <x-ui.icon-whatsapp />
    <span class="pointer-events-none absolute right-full mr-3 hidden whitespace-nowrap rounded-lg bg-gray-900 px-3 py-2 text-sm text-white shadow-lg group-hover:block lg:block lg:opacity-0 lg:transition-opacity lg:group-hover:opacity-100">
        Konsultasi via WhatsApp
    </span>
</a>

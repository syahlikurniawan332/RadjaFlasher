@props(['items'])

<div class="mb-12">

    {{-- GRID --}}
    <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @forelse ($items as $item)
            <x-service.card :item="$item" />
        @empty
            <p class="col-span-full text-center text-gray-500">
                Tidak ada data before & after.
            </p>
        @endforelse
    </div>

</div>

{{-- MODAL --}}

<script>
    const beforeAfterItems = @json($items);

    function openBeforeAfterModal(id) {
        const item = beforeAfterItems.find(i => i.id == id);
        if (!item) return;

        document.getElementById('modalTitle').textContent = item.title;
        document.getElementById('modalDescription').textContent = item.description;

        // BEFORE
        document.getElementById('modalBeforeImage').src = item.before.image;
        document.getElementById('modalBeforeTitle').textContent = item.before.title;
        document.getElementById('modalBeforeDesc').textContent = item.before.description;

        // AFTER
        document.getElementById('modalAfterImage').src = item.after.image;
        document.getElementById('modalAfterTitle').textContent = item.after.title;
        document.getElementById('modalAfterDesc').textContent = item.after.description;

        // TAGS
        const tagsContainer = document.getElementById('modalTags');
        tagsContainer.innerHTML = '';
        (item.tags || []).forEach(tag => {
            const span = document.createElement('span');
            span.className =
                'px-3 py-1.5 bg-blue-50 text-blue-700 border border-blue-200 rounded-lg text-sm';
            span.textContent = tag;
            tagsContainer.appendChild(span);
        });

        openComparisonModal();
    }

    function openComparisonModal() {
        const modal = document.getElementById('comparisonModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.classList.add('overflow-hidden');
    }

    function closeComparisonModal() {
        const modal = document.getElementById('comparisonModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.classList.remove('overflow-hidden');
    }
</script>

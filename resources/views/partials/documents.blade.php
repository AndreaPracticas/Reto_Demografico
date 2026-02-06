<h2 class="text-xl font-semibold mb-4">
    {{ ucfirst($scope) }}
    @if($topic) · {{ $topic }} @endif
    @if($subtopic) · {{ $subtopic }} @endif
</h2>

@forelse ($documents as $doc)
    <div class="border rounded p-4 mb-3">
        <h3 class="font-medium">{{ $doc->name }}</h3>
    </div>
@empty
    <p class="italic text-gray-500">
        No hay archivos para esta selección
    </p>
@endforelse
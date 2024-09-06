@if ($messages)
    <div {{ $attributes->merge(['class' => 'text-red-600']) }}>
        @foreach ((array) $messages as $message)
            <p>{{ $message }}</p>
        @endforeach
    </div>
@endif

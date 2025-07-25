<div>
    @props([
    'type' => 'success',
    'message' => '',
    ])

    @php
    $color = [
    'success' => 'green',
    'error' => 'red',
    'warning' => 'yellow',
    'info' => 'blue',
    ][$type] ?? 'gray';
    @endphp

    @if ($message)
    <div class="flex items-center p-4 mb-4 text-sm text-{{ $color }}-800 rounded-lg bg-{{ $color }}-50 dark:bg-gray-800 dark:text-{{ $color }}-400" role="alert">
        <svg class="shrink-0 inline w-4 h-4 me-3" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">{{ ucfirst($type) }}</span>
        <div>
            <span class="font-medium">{{ $message }}</span>
        </div>
    </div>
    @endif

</div>
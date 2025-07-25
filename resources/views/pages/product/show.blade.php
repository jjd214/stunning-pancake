<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Product Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-bold mb-2">{{ $product->name }}</h3>
                    <p class="mb-2"><span class="font-semibold">Description:</span> {{ $product->description ?? 'No Description' }}</p>
                    <p class="mb-2"><span class="font-semibold">Price:</span> ${{ number_format($product->price, 2) }}</p>
                    <p class="mb-4"><span class="font-semibold">Stock:</span> {{ $product->stock }}</p>

                    <form action="{{ route('paypal.create') }}" method="POST" class="space-y-4">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="amount" value="{{ $product->price }}">
                        <div>
                            <x-input-label for="quantity" value="Quantity" />
                            <x-text-input id="quantity" name="quantity" type="number" min="1" max="{{ $product->stock }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 dark:bg-gray-900 dark:text-gray-100" />
                        </div>

                        <button type="submit"
                            class="inline-block px-4 py-2 bg-indigo-600 text-white font-semibold rounded hover:bg-indigo-700 transition">
                            Pay with PayPal
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

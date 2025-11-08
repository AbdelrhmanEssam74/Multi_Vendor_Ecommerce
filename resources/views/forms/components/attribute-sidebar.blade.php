<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <div x-data="{
            state: $wire.$entangle('{{ $getStatePath() }}'),
            opened: []
        }"
         class="flex"
    >
        <!-- Sidebar + Inputs Container -->
        <div class="w-full rounded-lg border bg-gray-900 p-4 overflow-auto"
             style="display: grid; grid-template-columns: 200px 1fr; gap: 16px; min-height: 400px;">

            <!-- Sidebar: Attribute buttons -->
            <div class="flex flex-col">
                <h3 class="text-sm font-semibold mb-4 text-white">
                    Product Attributes
                </h3>

                @php
                    $attributes = $this->getAttributesList();
                @endphp

                @if(empty($attributes))
                    <p class="text-gray-400 text-sm">Select a category to see attributes.</p>
                @else
                    <div class="flex flex-col gap-2">
                        @foreach($attributes as $attr)
                            <button
                                type="button"
                                :class="opened.includes('{{ $attr['id'] }}')
                                        ? 'bg-primary-500 border-primary-500 text-white'
                                        : 'bg-gray-900 border-gray-700 text-white hover:bg-gray-800'"
                                class="px-3 py-1 text-sm text-center rounded-full border border-gray-700 hover:bg-gray-800 text-white transition"
                                @click="opened.includes('{{ $attr['id'] }}')
                                    ? opened = opened.filter(i => i !== '{{ $attr['id'] }}')
                                    : opened.push('{{ $attr['id'] }}')"
                            >
                                {{ $attr['name'] }}
                            </button>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Inputs Area -->
            <div class="flex flex-col gap-4">
                @foreach($attributes as $attr)
                    <div
                        x-show="opened.includes('{{ $attr['id'] }}')"
                        x-transition
                        class="p-4 border rounded-lg shadow-sm border-gray-700 bg-gray-800"
                    >
                        <label class="block text-sm  font-medium text-gray-200 mb-2">
                            {{ $attr['name'] }}
                        </label>
                        <input
                            type="text"
                            wire:model.defer="attributeValues.{{ $attr['id'] }}"
                            placeholder="Enter {{ strtolower($attr['name']) }}"
                            class="w-full rounded-md border-gray-600 bg-gray-700 text-white placeholder-gray-400 text-sm focus:border-primary-500 focus:ring focus:ring-primary-500/20 appearance-none shadow-sm !bg-gray-700 !text-white py-2 px-3"
                        >
                        <p class="text-xs text-gray-400 mt-1">
                            helper
                        </p>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</x-dynamic-component>

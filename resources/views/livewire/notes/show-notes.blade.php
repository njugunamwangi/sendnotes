<?php

use Livewire\Volt\Component;

new class extends Component {

    public function with(): array
    {
        return [
            'notes' => auth()->user()->notes()->get(),
        ];
    }

}; ?>

<div>
    <div class="grid grid-cols-3 gap-4">
        @foreach ($notes as $note)
            <x-card wire:key='{{ $note->id }}' class="p-4">
                <div class="flex justify-between">
                    <div>
                        @can('update', $note)
                            <a href="{{ route('notes.edit', $note) }}" wire:navigate
                                class="text-xl font-bold hover:underline hover:text-blue-500">{{ $note->title }}</a>
                        @else
                            <p class="text-xl font-bold text-gray-500">{{ $note->title }}</p>
                        @endcan
                        <p class="mt-2 text-xs">{{ Str::limit($note->body, 50) }}</p>
                    </div>
                    <div class="text-xs text-gray-500">
                        {{ \Carbon\Carbon::parse($note->send_date)->format('M-d-Y') }}
                    </div>
                </div>
                <div class="flex items-end justify-between mt-4 space-x-1">
                    <p class="text-xs">Recipient: <span class="font-semibold">{{ $note->recipient }}</span></p>
                    <div>
                        <x-button.circle icon="eye" ></x-button.circle>
                        <x-button.circle icon="trash"  ></x-button.circle>
                    </div>
                </div>
            </x-card>
        @endforeach
    </div>
</div>

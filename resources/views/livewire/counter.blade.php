<div>
    <p>{{ $count }}</p>
    <input wire:model.blur='number' type="number">
    <button wire:click="changeCount({{ $number }})">Change Count</button>
</div>

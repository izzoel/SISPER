<div>
    <form wire:submit="submit">

        <div>
            <label for="count">Bird Count</label>
            <input wire:model='count' type="number">
        </div>
        <div>
            <label for="notes">Notes</label>
            <textarea wire:model='notes' cols="30" rows="10"></textarea>
        </div>
        <button>Save</button>
    </form>
    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <div>
                    {{ $error }}
                </div>
            @endforeach
        </div>
    @endif

    <div>
        @foreach ($entries as $entry)
            <div wire:key="{{ $entry->id }}" wire:transition>
                <div>
                    {{ $entry->bird_count }}: {{ $entry->notes }}
                    <button wire:click="delete({{ $entry->id }})">x</button>
                </div>
            </div>
        @endforeach
    </div>
</div>

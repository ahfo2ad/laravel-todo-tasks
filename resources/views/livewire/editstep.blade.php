<div>
    <div class="card-header d-flex justify-content-around p-4 align-items-center">
        <h2>Required Steps </h2>
        <span wire:click="increment" style="cursor: pointer"><i class="fa-solid fa-circle-plus fa-xl"></i></span>
    </div>

    @foreach($steps as $step)
    {{-- @forelse($steps as $step) --}}

        <div class="card-body d-flex justify-content-center align-items-center" wire:key="{{ $loop->index }}">
            <input type="text" name="stepName[]" class="form-control" value="{{ $step['name'] ?? '' }}"
                    placeholder="{{ 'Descripe Step ' . ($loop->index+1) }}">

            <input type="hidden" name="stepId[]" class="form-control" value="{{ $step['id'] ?? '' }}">

            <span wire:click="remove({{ $loop->index }})" style="cursor: pointer; color: red; margin-left:10px">
                <i class="fa-solid fa-close fa-xl"></i>
            </span>
        </div>
    {{-- @endforelse --}}
    @endforeach

    {{-- <h1>{{ $steps }}</h1> --}}
</div>


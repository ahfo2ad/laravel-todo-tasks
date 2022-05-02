<div>
    <div class="card-header d-flex justify-content-around p-4 align-items-center">
        <h2>Required Steps </h2>
        <span wire:click="increment" style="cursor: pointer"><i class="fa-solid fa-circle-plus fa-xl"></i></span>
    </div>

    @foreach($steps as $step)

        <div class="card-body d-flex justify-content-center align-items-center" wire:key="{{ $step }}">
            <input type="text" name="step[]" class="form-control" placeholder="{{ 'Descripe Step ' . ($step+1) }}">

            <span wire:click="remove({{ $step }})" style="cursor: pointer; color: red; margin-left:10px">
                <i class="fa-solid fa-close fa-xl"></i>
            </span>
        </div>
    @endforeach

    {{-- <h1>{{ $steps }}</h1> --}}
</div>

<div class="position-relative">
    <input wire:keyup="search" wire:model="search" type="text" name="search" id="search" class="form-control mr-sm-2" placeholder="Search">

    @if($search)
        <div class="list-group position-absolute w-100" style="z-index: 1;">
            @foreach($products as $product)
                <a href="/products/{{ $product->id }}" class="list-group-item list-group-item-action">
                    {{ $product->name }}
                </a>
            @endforeach
        </div>
    @endif
</div>
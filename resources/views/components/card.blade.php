<div class="card container-sm mb-3 p-0" style="width: 18rem; height: 388px;">
    <div class="card-img-top w-100 h-50 bg-light"><img src="{{ $image }}" alt="Product image" class="rounded img-fluid h-100 w-100"></div>
    <div class="card-body">
        <h5 class="card-title">{{ $name }}</h5>
        <p class="card-text" style="height: 72px">{{ $description }}</p>
        <a href="/products/{{ $id }}" class="btn btn-secondary">Show</a>
    </div>
</div>
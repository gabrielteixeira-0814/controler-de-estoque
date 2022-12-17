
{{-- Form itemEntryProduct --}}
<div class="form-itemEntryProduct">
    <form action="" class="form_entryProduct" id="form_itemEntryProduct">
        @foreach ($products as $product)
            <div class="row">
                <div class="col-8">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="{{ $product->id }}" id="{{ $product->name }}">
                        <label class="form-check-label" for="{{ $product->name }}">
                        {{ $product->name }}
                        </label>
                    </div>
                </div>
                <div class="col-3">
                    <input step="1" value="1" type="number" id="typeNumber" class="form-control" />
                </div>
            </div>
        @endforeach
    </form>
</div>

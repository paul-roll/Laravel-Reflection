<div class="row mb-3">
    <label for="{{ $name }}" class="col-md-4 col-form-label text-md-end">
        {{ ucwords($name) }}
    </label>

    <div class="col-md-6">
        <select id="{{ $name }}" name="{{ $name }}" class="form-select" aria-label="Default select example" {{ $attributes(['value'=>old($name)]) }}>
            <option value="">None</option>
            @foreach ($list as $item)
            <option value="{{ $item->id }}" @if ((($old) ?? '') == $item->id) selected @endif>
                {{ $item->name }}
            </option>
            @endforeach
        </select>

        @error($name)
        <span class="d-block invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
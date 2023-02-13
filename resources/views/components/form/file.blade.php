<div class="row mb-3">
    <label for="{{ $name }}" class="col-md-4 col-form-label text-md-end">
        {{ ucwords($name) }}
    </label>

    <div class="col-md-6">
        <div class="flex mt-6">

            @if ($value)
                <input name="removeLogo" type="submit" value="Remove Logo" />
            @endif

            @if ($value)
            <div class="mt-3">
                <x-logo>{{ $value }}</x-logo>
            </div>
            @endif

            <input name="{{ $name }}" type="file" id="{{ $name }}" {{ $attributes(['value'=>old($name)]) }} />


            @error($name)
            <span class="d-block invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>
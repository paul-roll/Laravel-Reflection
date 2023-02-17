<div class="row mb-3">
    <label for="{{ $name }}" class="col-md-4 col-form-label text-md-end">
        {{ ucwords($label ?? $name) }}
    </label>

    <div class="col-md-6">
        <div class="flex mt-6">

            @if ($value)
                <input type="submit" class="d-none">
                <input name="removeLogo" type="submit" value="Remove Logo" />
            @endif

            
            <div class="my-2">
                @if ($value)
                <img src="{{ asset('storage/company/logos/' . $value) }}" width="100" height="100" alt="" id="preview-selected-image">
                @else
                <img src="{{ asset('img/nologo.jpg') }}" width="100" height="100" alt="" id="preview-selected-image">
                @endif
            </div>

            <input name="{{ $name }}" type="file" id="{{ $name }}" onchange="previewImage(event);" {{ $attributes(['value'=>old($name)]) }} />


            @error($name)
            <span class="d-block invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>
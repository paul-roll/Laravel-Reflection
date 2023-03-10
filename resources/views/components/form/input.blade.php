
<div class="row mb-3">
    <label for="{{ $name }}" class="col-md-4 col-form-label text-md-end">
        {{ ucwords($label ?? $name) }}
    </label>

    <div class="col-md-6">
        <input id="{{ $name }}" class="form-control @error('{{ $name }}') is-invalid @enderror" name="{{ $name }}" {{ $attributes(['value'=>old($name)]) }} autofocus>

        @error($name)
        <span class="d-block invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
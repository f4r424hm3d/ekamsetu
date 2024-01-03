<div class="form-group">
  <label>{{ $label }} {!! $required != null ? '<span class="text-danger">*</span>' : '' !!}</label>
  <select name="{{ $name }}" id="{{ $id }}" class="form-control select-with-search" {{ $required }}
    data-placeholder="Select">
    <option value="">Select</option>

  </select>
  <span class="text-danger" id="{{ $name }}-err">
    @error($name)
      {{ $message }}
    @enderror
  </span>
</div>

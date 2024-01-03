<div class="form-group">
  <label>{{ $label }} {!! $required != null ? '<span class="text-danger">*</span>' : '' !!}</label>
  <select name="{{ $name }}" id="{{ $id }}" class="form-control select-with-search"
    data-placeholder="Select" {{ $required }}>
    <option value="">Select</option>
    @foreach ($list as $row)
      <option value="{{ $row->$savev }}"
        {{ ($ft == 'edit' && $sd->$name == $row->$savev) || old($name) == $row->$savev ? 'selected' : '' }}>
        {{ $row->$showv }}</option>
    @endforeach
    <span class="text-danger" id="{{ $name }}-err">
      @error($name)
        {{ $message }}
      @enderror
    </span>
  </select>
</div>

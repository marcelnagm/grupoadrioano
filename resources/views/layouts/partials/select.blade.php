<select name="{{$name}}" class="form-control" id="{{$name}}">
    <option value="">Select an option</option>
    @foreach ($list as $item)
        <option value="{{ $item->id }}" {{$item->id == $value ? 'selected': ''}} >{{ $item }}</option>
    @endforeach
    class="form-control @error($name) is-invalid @enderror"
</select>
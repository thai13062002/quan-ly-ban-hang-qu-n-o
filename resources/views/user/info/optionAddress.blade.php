@foreach ($data as $result)
    <option value="{{$result->id}}">{{$result->name}}</option>
@endforeach
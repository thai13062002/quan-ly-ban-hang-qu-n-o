@foreach ($categories as $category)
    <option value="{{ $category->id }}">{{ $prefix }} {{ $category->name }}</option>

    @if ($category->children)
        @include('categories.recursive', ['categories' => $category->children, 'prefix' => '- '.$prefix])
    @endif
@endforeach

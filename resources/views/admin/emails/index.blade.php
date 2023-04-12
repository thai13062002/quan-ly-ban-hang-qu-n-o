<!DOCTYPE html>
<html>
<head>
    <title>Laravel 8 Send Mail using Queue Tutorial - TechvBlogs</title>
</head>
<body>
    @if ($data)
        <img src="{{ $data['image']}}" alt="Anh loi">
        <p>Hi</p>
        <p>{{ $data['title'] }}</p>
        <strong>Thank you</strong>
    @else
        <p>Hello</p>
    @endif
</body>
</html>
Name:{{ $name }}
Example 1: {{ '<script>alert("hacking...")</script>' }}
<br>

Gender:{!! $gender !!}
Example 2: {!! '<script>alert("hacking...")</script>' !!}
<br>
<ul>
    @foreach ($marks as $value)
        <li>{{ $value }}</li>
    @endforeach
</ul>

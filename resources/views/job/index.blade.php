<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>job</title>
</head>
<body>
    <h1>Joobs</h1>

    <ul>
        @foreach ($jobs as $job)
        
        <li>
            <h2>{{ $job['title'] }}</h2>
            <p>{{ $job['description'] }}</p>
            <p>Location: {{ $job['location'] }}</p>
            <p>Salary: {{ $job['company'] }}</p>
        </li>
        @endforeach





</body>
</html>
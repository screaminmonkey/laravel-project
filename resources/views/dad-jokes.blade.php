<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dad Jokes</title>
</head>
<body>
<button onclick="location.href='/'">Go Back</button>
<h1>Dad Jokes</h1>
<form method="GET" action="/dad-jokes">

    <input
        type="text"
        name="search"
        placeholder="Search jokes..."
        value="{{ $search ?? '' }}"
    >

    <button type="submit">Search</button>

</form>

<a href="/fetch-joke">
    <button>Get New Joke</button>
</a>

@foreach($jokes as $joke)

    <p>{{ $joke->joke }}</p>

@endforeach

</body>
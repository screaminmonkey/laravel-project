<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    @auth
    <p>Welcome {{auth()->user()->name}}</p> 
    <form action ="/logout" method="POST">
        @csrf
        <button>Logout</button>
    </form>
    <div id="dad-joke" action="/dad-joke" method="GET" style="border: 3px solid black;">
        <h1> Dad Joke </h1>
        <p></p>
        <button onclick="location.href='/dad-jokes'">Get a new joke</button>
    </div>
    <div style="border: 3px solid black;">
        <h1> Create a post </h1>
        <form action="/create-post" method="POST"> 
            @csrf
                <input type="text" name="title" placeholder="post title">
                <textarea name="body" placeholder="Body content"></textarea>
                <button>Save Post</button>
        </form>
        <!--code below is for displaying posts -->
            <div style="border: 3px solid black;">
                <h1> Your posts </h1>
                @foreach($posts as $posts)
                <div style="background-color: grey; padding: 10px; margin: 10px;">
                    <h2>{{ $posts['title'] }}</h2>
                    {{ $posts ['body'] }}
            </div>
                            @endforeach

        </div>
    @else
    <div style="border: 3px solid black;">
        <h1> Welcome </h1>
        <form action="/register" method="POST"> <!--#/register creates a new page -->
        @csrf <!-- this is a security measure to prevent cross-site request forgery attacks. It generates a unique token for each form submission, which the server can verify to ensure that the request is legitimate and not coming from a malicious source. -->
        <input name="name" type="text" placeholder="name">
        <input name="email" type="text" placeholder="email">
        <input name="password" type="password" placeholder="password">
        <button>Register</button>
        </form>   
    </div> 
        <div style="border: 3px solid black;">
        <h1> Login </h1>
        <form action="/login" method="POST"> <!--#/register creates a new page -->
        @csrf <!-- this is a security measure to prevent cross-site request forgery attacks. It generates a unique token for each form submission, which the server can verify to ensure that the request is legitimate and not coming from a malicious source. -->
        <input name="loginname" type="text" placeholder="name">
        <input name="loginpassword" type="password" placeholder="password">
        <button>Login</button>
        </form>   
    </div> 
    
    @endauth

    
</body>
</html>
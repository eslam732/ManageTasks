<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Task Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        /* .container {
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        } */
    </style>
</head>
<body>
    <div class="container d-flex flex-column justify-content-center align-items-center" style="min-height: 100vh;">
        <h1 class="display-4 text-center mb-4">Welcome to Task Manager</h1>
        <p class="lead text-center">Sign up or log in to get started.</p>
        <div class="button-container">
            <a href="http://127.0.0.1:8000/signUpView" class="btn btn-primary btn-lg mb-3">Sign Up</a>
            <br>
            <a href="http://127.0.0.1:8000/loginView" class="btn btn-secondary btn-lg">Log In</a>
        </div>
    </div>
</body>
</html>

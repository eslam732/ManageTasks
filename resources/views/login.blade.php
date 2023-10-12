<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="bootstrap-4.0.0-dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
    @if(isset($error))
    <div class="alert alert-danger">
        {{ $error }}
    </div>
@endif
        <h1 class="display-4 text-center mb-4">Login</h1>
        <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate>
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</body>
</html>

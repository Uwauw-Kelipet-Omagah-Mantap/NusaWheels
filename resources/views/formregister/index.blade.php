<html>

<head>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        h3 {
            font-weight: bold;
            color: #0d6efd;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-end">
            <div class="col-md-5 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">REGISTER</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Masukkan Username" value="{{ old('username') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Masukkan Password" value="{{ old('password') }}"required>
                            </div>
                            <p>Have an account? <a href="{{ route('formlogin.index') }}">Login</a></p>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Register</button>
                            </div>
                        </form>
                    </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

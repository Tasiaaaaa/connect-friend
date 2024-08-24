<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="bg-light d-flex justify-content-center align-items-center">

    <div class="card shadow-sm" style="width: 100%; max-width: 600px;">
        <div class="card-body">
            <h1 class="card-title text-center mb-4">Register</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ url('/register') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}"
                        required autofocus>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <div class="d-flex pass-show-hide justify-content-between gap-2 position-relative">
                        <input autocomplete="new-password" id='password' name='password' style="width: 100%" required
                            type='password' class="form-control">
                        <span id="togglePassword" class="position-absolute end-0 me-3 mt-2 my-auto">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </span>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password:</label>
                    <div class="d-flex pass-show-hide justify-content-between gap-2 position-relative">
                        <input autocomplete="new-password" id='password_confirmation' name='password_confirmation' style="width: 100%" required
                            type='password' class="form-control">
                        <span id="togglePasswordConfirmation" class="position-absolute end-0 me-3 mt-2 my-auto">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </span>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="gender" class="form-label">Gender:</label>
                    <select id="gender" name="gender" class="form-select" required>
                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="instagram_username" class="form-label">Instagram Username:</label>
                    <input type="text" id="instagram_username" name="instagram_username" class="form-control"
                        value="{{ old('instagram_username') }}" required>
                </div>

                <div class="mb-3">
                    <label for="hobbies" class="form-label">Hobbies:</label>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="hobbies[]" value="Reading">
                        <label class="form-check-label">Reading</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="hobbies[]" value="Traveling">
                        <label class="form-check-label">Traveling</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="hobbies[]" value="Gardening">
                        <label class="form-check-label">Gardening</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="hobbies[]" value="Gaming">
                        <label class="form-check-label">Gaming</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="hobbies[]" value="Coding">
                        <label class="form-check-label">Coding</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="hobbies[]" value="Dancing">
                        <label class="form-check-label">Dancing</label>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="mobile_number" class="form-label">Mobile Number:</label>
                    <input type="text" id="mobile_number" name="mobile_number" class="form-control"
                        value="{{ old('mobile_number') }}" required pattern="\d+">
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
                <p class="text-center mt-2">Already have an account?<a class="text-black"
                    href="{{ route('login') }}">Log in</a></p>
            </form>
        </div>
    </div>
    <script>
        document.getElementById('togglePassword').addEventListener('click', function(e) {
            const passwordInputConfirmation = document.getElementById('password');
            const type = passwordInputConfirmation.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInputConfirmation.setAttribute('type', type);
            this.innerHTML = type === 'password' ? '<i class="fa fa-eye" aria-hidden="true"></i>' :
                '<i class="fa fa-eye-slash" aria-hidden="true"></i>';
        });
        document.getElementById('togglePasswordConfirmation').addEventListener('click', function(e) {
            const passwordInputConfirmation = document.getElementById('password_confirmation');
            const type = passwordInputConfirmation.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInputConfirmation.setAttribute('type', type);
            this.innerHTML = type === 'password' ? '<i class="fa fa-eye" aria-hidden="true"></i>' :
                '<i class="fa fa-eye-slash" aria-hidden="true"></i>';
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
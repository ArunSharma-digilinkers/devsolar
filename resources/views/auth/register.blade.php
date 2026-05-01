<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register</title>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Poppins', sans-serif;
}

/* FULL WIDTH */
.register-wrapper {
    display: flex;
    width: 100%;
    height: 100vh;
}

/* LEFT */
.register-left {
background: linear-gradient(135deg, #56ab2f, #a8e063);
    width: 50%;
    position: relative;
}

.register-left img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Overlay */
.register-overlay {
      position: absolute;
    bottom: 50%;
    left: 40px;
    color: #fff;
    font-size: 27px;
}

/* RIGHT */
.register-right {
    width: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f8fafc;
}

/* FORM WIDTH CONTROL */
.register-box {
    width: 100%;
    max-width: 450px;  /* IMPORTANT */
    padding: 20px;
}

.register-box h2 {
    margin-bottom:20px;
}

/* Inputs */
input {
    width: 100%;
    padding: 12px;
    margin: 10px 0 15px;
    border-radius: 8px;
    border: 1px solid #ddd;
}

/* Button */
.register-btn {
    width: 100%;
    padding: 12px;
    border: none;
    border-radius: 8px;
    background: linear-gradient(135deg, #56ab2f, #a8e063);
    color: #fff;
    font-weight: 600;
}

/* Footer */
.register-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

/* Mobile */
@media(max-width:768px){
    .register-wrapper {
        flex-direction: column;
    }

    .register-left {
        width: 100%;
        height: 220px;
    }

    .register-right {
        width: 100%;
    }
}
</style>
</head>

<body>

<div class="register-wrapper">

    <!-- LEFT -->
    <div class="register-left">
        

        <div class="register-overlay">
            <h2>Devsol Energy</h2>
            <p>Create your account </p>
        </div>
    </div>

    <!-- RIGHT -->
    <div class="register-right">
        <div class="register-box">

            <h2>Create Account</h2>

            @if ($errors->any())
                <div style="color:red; margin-bottom:10px;">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <label>Name</label>
                <input type="text" name="name" value="{{ old('name') }}" required>

                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required>

                <label>Password</label>
                <input type="password" name="password" required>

                <label>Confirm Password</label>
                <input type="password" name="password_confirmation" required>

                <div class="register-footer">
                    <a href="{{ route('login') }}" style="color:#56ab2f;">
                        Already registered?
                    </a>

                    <button type="submit" class="register-btn">
                        Register
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>

</body>
</html>
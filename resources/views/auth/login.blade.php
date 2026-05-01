<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Devsolar Login</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap (optional but safe) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
   .login-box h3 {
     margin-bottom:30px;
   }

    .login-wrapper {
        display: flex;
        height: 100vh;
    }

    .login-left {
        width: 50%;
       background: linear-gradient(135deg, #56ab2f, #a8e063);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 40px;
    }

    .login-right {
        width: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #fff;
    }

    .login-box {
        width: 100%;
        max-width: 380px;
    }

    input {
        width: 100%;
        padding: 12px;
        margin-bottom: 15px;
        border-radius: 8px;
        border: 1px solid #ccc;
    }

    .login-btn {
        width: 100%;
        padding: 12px;
        border: none;
        background: linear-gradient(135deg, #56ab2f, #a8e063);
        color: #fff;
        border-radius: 8px;
    }
   .remember-wrap {
    display: flex;          /* inline-block hatao */
    align-items: center;    /* vertical center */
    justify-content: center; /* pura block center (optional) */
    gap: 8px;
    font-size: 16px;
    cursor: pointer;
    width:100px;
}

.remember-wrap input {
    margin: 0; /* default spacing remove */
}

    @media(max-width:768px) {
        .login-wrapper {
            flex-direction: column;
        }

        .login-left,
        .login-right {
            width: 100%;
            padding :35px;
        }


    }
    </style>
</head>

<body>

    <div class="login-wrapper">

        <!-- LEFT -->
        <div class="login-left">
            <div>
                <h1>Devsol Energy</h1>
                <p>Smart Energy Solutions </p>
            </div>
        </div>

        <!-- RIGHT -->
        <div class="login-right">
            <div class="login-box">

                <h3>Login</h3>

                <!-- ERROR SHOW -->
                @if ($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Password" required>

                    <label class="remember-wrap">
                        <input type="checkbox" name="remember">
                        <span>Remember</span>
                    </label>
                    <br><br>

                    <button type="submit" class="login-btn">
                        Login
                    </button>

                </form>

            </div>
        </div>

    </div>

</body>

</html>
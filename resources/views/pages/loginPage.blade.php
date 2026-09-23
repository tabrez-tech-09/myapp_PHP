<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Login - UserMS</title>


    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        body {

            min-height: 100vh;

            font-family:
                Arial,
                Helvetica,
                sans-serif;

            background:
                linear-gradient(
                    135deg,
                    #0f172a,
                    #0369a1
                );

            display: flex;

            align-items: center;

            justify-content: center;

            padding: 20px;

        }


        /* ================= LOGIN CARD ================= */

        .login-card {

            width: 100%;

            max-width: 420px;

            background: white;

            padding: 40px;

            border-radius: 18px;

            box-shadow:
                0 25px 60px
                rgba(0, 0, 0, 0.25);

        }


        /* ================= LOGO ================= */

        .logo {

            text-align: center;

            font-size: 28px;

            font-weight: 700;

            color: #0f172a;

            margin-bottom: 8px;

        }


        .logo span {

            color: #0284c7;

        }


        .subtitle {

            text-align: center;

            color: #64748b;

            font-size: 14px;

            margin-bottom: 30px;

        }


        /* ================= FORM ================= */

        .form-group {

            margin-bottom: 20px;

        }


        .form-group label {

            display: block;

            font-size: 14px;

            font-weight: 600;

            color: #334155;

            margin-bottom: 8px;

        }


        .form-group input {

            width: 100%;

            padding: 13px 14px;

            border: 1px solid #cbd5e1;

            border-radius: 8px;

            outline: none;

            font-size: 15px;

            transition: 0.2s;

        }


        .form-group input:focus {

            border-color: #0284c7;

            box-shadow:
                0 0 0 3px
                rgba(2, 132, 199, 0.12);

        }


        /* ================= LOGIN BUTTON ================= */

        .login-button {

            width: 100%;

            padding: 14px;

            border: none;

            border-radius: 8px;

            background: #0284c7;

            color: white;

            font-size: 15px;

            font-weight: 600;

            cursor: pointer;

            transition: 0.2s;

        }


        .login-button:hover {

            background: #0369a1;

        }


        .login-button:disabled {

            background: #94a3b8;

            cursor: not-allowed;

        }


        /* ================= MESSAGE ================= */

        #message {

            text-align: center;

            font-size: 14px;

            margin-top: 18px;

            min-height: 20px;

        }

        #changePasswordMessage {

            text-align: center;

            font-size: 14px;

            margin-top: 18px;

            min-height: 20px;

            color: #0284c7;

            cursor: pointer;

        }
        #changePasswordMessage:hover {
            text-decoration: underline;
        }
        #changePasswordMessage a {
            color: #0284c7;
            text-decoration: none;
        }
        #changePasswordMessage a:hover {
            text-decoration: underline;
        }



        /* ================= REGISTER ================= */

        .register-text {

            text-align: center;

            margin-top: 25px;

            font-size: 14px;

            color: #64748b;

        }


        .register-text a {

            color: #0284c7;

            text-decoration: none;

            font-weight: 600;

        }


        .register-text a:hover {

            text-decoration: underline;

        }


        /* ================= BACK HOME ================= */

        .back-home {

            display: block;

            text-align: center;

            margin-top: 18px;

            color: #64748b;

            text-decoration: none;

            font-size: 13px;

        }


        .back-home:hover {

            color: #0284c7;

        }


    </style>

</head>


<body>


    <div class="login-card">


        <!-- Logo -->

        <div class="logo">

            User<span>MS</span>

        </div>


        <p class="subtitle">

            Login to your account

        </p>


        <!-- Login Form -->

        <form id="loginForm">


            <!-- Email -->

            <div class="form-group">

                <label for="email">

                    Email Address

                </label>


                <input
                    type="email"
                    id="email"
                    placeholder="Enter your email"
                    required
                >

            </div>


            <!-- Password -->

            <div class="form-group">

                <label for="password">

                    Password

                </label>


                <input
                    type="password"
                    id="password"
                    placeholder="Enter your password"
                    required
                >

            </div>


            <!-- Login Button -->

            <button
                type="submit"
                class="login-button"
                id="loginButton"
            >

                Login

            </button>


            <!-- Message -->
            <div id="message"></div>


        </form>


        <!-- Register -->

        <div class="register-text">

            Don't have an account?

            <a href="/register">

                Register

            </a>

        </div>


        <!-- Back -->

        <a
            href="/home"
            class="back-home"
        >

            ← Back to Home

        </a>


    </div>



    <!-- ================= LOGIN SCRIPT ================= -->

    <script>


        document
            .getElementById('loginForm')
            .addEventListener(
                'submit',
                async function(event) {


                    /*
                    |--------------------------------------------------------------------------
                    | Stop Page Refresh
                    |--------------------------------------------------------------------------
                    */

                    event.preventDefault();


                    /*
                    |--------------------------------------------------------------------------
                    | Get Form Values
                    |--------------------------------------------------------------------------
                    */

                    const email =
                        document
                            .getElementById('email')
                            .value
                            .trim();


                    const password =
                        document
                            .getElementById('password')
                            .value;


                    /*
                    |--------------------------------------------------------------------------
                    | Elements
                    |--------------------------------------------------------------------------
                    */

                    const message =
                        document
                            .getElementById('message');


                    const loginButton =
                        document
                            .getElementById('loginButton');


                    /*
                    |--------------------------------------------------------------------------
                    | Button Loading
                    |--------------------------------------------------------------------------
                    */

                    loginButton.disabled = true;

                    loginButton.innerText =
                        'Logging in...';


                    message.innerText = '';


                    try {


                        /*
                        |--------------------------------------------------------------------------
                        | Login API
                        |--------------------------------------------------------------------------
                        */

                        const response =
                            await fetch(
                                '/api/login',
                                {

                                    method: 'POST',

                                    headers: {

                                        'Content-Type':
                                            'application/json',

                                        'Accept':
                                            'application/json'

                                    },

                                    body:
                                        JSON.stringify({

                                            email:
                                                email,

                                            password:
                                                password

                                        })

                                }
                            );


                        /*
                        |--------------------------------------------------------------------------
                        | API Response
                        |--------------------------------------------------------------------------
                        */

                        const data =
                            await response.json();


                        console.log(
                            'API Response:',
                            data
                        );


                        /*
                        |--------------------------------------------------------------------------
                        | Login Success
                        |--------------------------------------------------------------------------
                        */

                        if (response.ok) {


                            /*
                            | Save User
                            */

                            localStorage.setItem(
                                'user',
                                JSON.stringify(
                                    data.user
                                )
                            );


                            console.log(
                                'Saved User:',
                                localStorage.getItem(
                                    'user'
                                )
                            );


                            /*
                            | Success Message
                            */

                            message.style.color =
                                'green';

                            message.innerText =
                                data.message;


                            /*
                            | Redirect Home
                            */

                            setTimeout(
                                function() {

                                    window.location.href =
                                        '/home';

                                },
                                500
                            );


                        }


                        /*
                        |--------------------------------------------------------------------------
                        | Login Failed
                        |--------------------------------------------------------------------------
                        */

                        else {


                            message.style.color =
                                'red';


                            if (data.errors) {

                                message.innerText =
                                    Object
                                        .values(
                                            data.errors
                                        )
                                        .flat()
                                        .join(' ');

                            }

                            else {

                                message.innerText =
                                    data.message ||
                                    'Invalid email or password';

                            }


                            loginButton.disabled =
                                false;

                            loginButton.innerText =
                                'Login';

                        }


                    }


                    catch (error) {


                        console.error(
                            'Login Error:',
                            error
                        );


                        message.style.color =
                            'red';


                        message.innerText =
                            'Something went wrong. Please try again.';


                        loginButton.disabled =
                            false;

                        loginButton.innerText =
                            'Login';

                    }

                }
            );


    </script>


</body>

</html>

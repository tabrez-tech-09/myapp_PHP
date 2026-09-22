<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Register | UserMS</title>


    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        body {

            font-family:
                Arial,
                Helvetica,
                sans-serif;

            background:
                linear-gradient(
                    135deg,
                    #f1f5f9,
                    #e0f2fe
                );

            min-height: 100vh;

            display: flex;

            align-items: center;

            justify-content: center;

            padding: 20px;

        }


        /* ================= REGISTER CONTAINER ================= */

        .register-container {

            width: 100%;

            max-width: 420px;

            background: white;

            padding: 38px;

            border-radius: 18px;

            box-shadow:
                0 20px 50px
                rgba(15, 23, 42, 0.12);

        }


        /* ================= LOGO ================= */

        .logo {

            text-align: center;

            font-size: 28px;

            font-weight: 700;

            margin-bottom: 8px;

            color: #0f172a;

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


        label {

            display: block;

            margin-bottom: 8px;

            font-size: 14px;

            font-weight: 600;

            color: #334155;

        }


        input {

            width: 100%;

            padding: 13px 14px;

            border: 1px solid #cbd5e1;

            border-radius: 8px;

            font-size: 15px;

            outline: none;

            transition: 0.2s;

        }


        input:focus {

            border-color: #0284c7;

            box-shadow:
                0 0 0 3px
                rgba(2, 132, 199, 0.10);

        }


        input::placeholder {

            color: #94a3b8;

        }


        /* ================= BUTTON ================= */

        button {

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


        button:hover {

            background: #0369a1;

        }


        button:disabled {

            background: #94a3b8;

            cursor: not-allowed;

        }


        /* ================= MESSAGE ================= */

        #message {

            margin-top: 18px;

            text-align: center;

            font-size: 14px;

            line-height: 1.5;

            min-height: 21px;

        }


        /* ================= LOGIN ================= */

        .login-text {

            text-align: center;

            margin-top: 25px;

            color: #64748b;

            font-size: 14px;

        }


        .login-text a {

            color: #0284c7;

            text-decoration: none;

            font-weight: 600;

        }


        .login-text a:hover {

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


        /* ================= RESPONSIVE ================= */

        @media (max-width: 480px) {

            .register-container {

                padding: 28px 22px;

            }

        }

    </style>

</head>


<body>


    <!-- ================= REGISTER CARD ================= -->

    <div class="register-container">


        <!-- Logo -->

        <div class="logo">

            User<span>MS</span>

        </div>


        <!-- Subtitle -->

        <p class="subtitle">

            Create your account

        </p>



        <!-- ================= REGISTER FORM ================= -->

        <form id="registerForm">


            <!-- Name -->

            <div class="form-group">

                <label for="name">

                    Name

                </label>


                <input
                    type="text"
                    id="name"
                    placeholder="Enter your name"
                    required
                >

            </div>



            <!-- Email -->

            <div class="form-group">

                <label for="email">

                    Email

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
                    placeholder="Minimum 8 characters"
                    minlength="8"
                    required
                >

            </div>



            <!-- Submit -->

            <button
                type="submit"
                id="registerButton"
            >

                Create Account

            </button>


        </form>



        <!-- ================= MESSAGE ================= -->

        <div id="message"></div>



        <!-- ================= LOGIN LINK ================= -->

        <div class="login-text">

            Already have an account?

            <a href="/login">

                Login

            </a>

        </div>



        <!-- ================= HOME LINK ================= -->

        <a
            href="/home"
            class="back-home"
        >

            ← Back to Home

        </a>


    </div>



    <!-- ================= JAVASCRIPT ================= -->

    <script>


        /*
        |--------------------------------------------------------------------------
        | Register Form
        |--------------------------------------------------------------------------
        */

        document
            .getElementById('registerForm')
            .addEventListener(
                'submit',
                async function(event) {


                    /*
                    |--------------------------------------------------------------------------
                    | Prevent Page Refresh
                    |--------------------------------------------------------------------------
                    */

                    event.preventDefault();



                    /*
                    |--------------------------------------------------------------------------
                    | Get Input Values
                    |--------------------------------------------------------------------------
                    */

                    const name =
                        document
                            .getElementById('name')
                            .value
                            .trim();


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


                    const registerButton =
                        document
                            .getElementById(
                                'registerButton'
                            );



                    /*
                    |--------------------------------------------------------------------------
                    | Clear Old Message
                    |--------------------------------------------------------------------------
                    */

                    message.innerText = '';



                    /*
                    |--------------------------------------------------------------------------
                    | Loading State
                    |--------------------------------------------------------------------------
                    */

                    registerButton.disabled =
                        true;

                    registerButton.innerText =
                        'Creating Account...';



                    try {


                        /*
                        |--------------------------------------------------------------------------
                        | Register API
                        |--------------------------------------------------------------------------
                        */

                        const response =
                            await fetch(
                                '/api/users',
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

                                            name:
                                                name,

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
                            'Register API Response:',
                            data
                        );



                        /*
                        |--------------------------------------------------------------------------
                        | Registration Successful
                        |--------------------------------------------------------------------------
                        */

                        if (response.ok) {


                            message.style.color =
                                'green';


                            message.innerText =
                                data.message ||
                                'User created successfully';



                            /*
                            |--------------------------------------------------------------------------
                            | Clear Form
                            |--------------------------------------------------------------------------
                            */

                            document
                                .getElementById(
                                    'registerForm'
                                )
                                .reset();



                            /*
                            |--------------------------------------------------------------------------
                            | Redirect To Login
                            |--------------------------------------------------------------------------
                            */

                            setTimeout(
                                function() {

                                    window.location.href =
                                        '/login';

                                },
                                1000
                            );


                        }


                        /*
                        |--------------------------------------------------------------------------
                        | Registration Failed
                        |--------------------------------------------------------------------------
                        */

                        else {


                            message.style.color =
                                'red';



                            /*
                            |--------------------------------------------------------------------------
                            | Laravel Validation Errors
                            |--------------------------------------------------------------------------
                            */

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
                                    'Registration failed';

                            }



                            /*
                            |--------------------------------------------------------------------------
                            | Enable Button Again
                            |--------------------------------------------------------------------------
                            */

                            registerButton.disabled =
                                false;

                            registerButton.innerText =
                                'Create Account';

                        }


                    }


                    /*
                    |--------------------------------------------------------------------------
                    | Network / Server Error
                    |--------------------------------------------------------------------------
                    */

                    catch (error) {


                        console.error(
                            'Register Error:',
                            error
                        );


                        message.style.color =
                            'red';


                        message.innerText =
                            'Something went wrong. Please try again.';



                        registerButton.disabled =
                            false;


                        registerButton.innerText =
                            'Create Account';

                    }

                }
            );


    </script>


</body>

</html>
</script>

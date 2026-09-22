<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>User Management System</title>


    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f8fafc;
            color: #0f172a;
        }


        /* ================= NAVBAR ================= */

        .navbar {

            height: 70px;

            background: #0f172a;

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 0 8%;

            color: white;

        }


        .logo {

            font-size: 22px;

            font-weight: 700;

        }


        .logo span {

            color: #38bdf8;

        }


        .nav-links {

            display: flex;

            gap: 30px;

            list-style: none;

        }


        .nav-links a {

            color: #cbd5e1;

            text-decoration: none;

            font-size: 15px;

        }


        .nav-links a:hover {

            color: white;

        }


        /* ================= USER AREA ================= */

        .user-area {

            display: flex;

            align-items: center;

            gap: 10px;

        }


        /* User Name */

        .user-name {

            color: white;

            font-size: 15px;

            font-weight: 600;

            padding: 10px 15px;

        }


        /* Login Button */

        .login-btn {

            display: inline-block;

            padding: 10px 18px;

            border-radius: 8px;

            background: #38bdf8;

            color: #0f172a;

            font-size: 14px;

            font-weight: 600;

            text-decoration: none;

        }


        .login-btn:hover {

            background: #7dd3fc;

        }


        /* Logout Button */

        .logout-btn {

            padding: 10px 18px;

            border: none;

            border-radius: 8px;

            background: #ef4444;

            color: white;

            font-size: 14px;

            font-weight: 600;

            cursor: pointer;

        }


        .logout-btn:hover {

            background: #dc2626;

        }


        .logout-btn:disabled {

            background: #94a3b8;

            cursor: not-allowed;

        }


        /* ================= HERO ================= */

        .hero {

            min-height: 520px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 70px 8%;

            gap: 50px;

        }


        .hero-content {

            max-width: 600px;

        }


        .badge {

            display: inline-block;

            padding: 8px 14px;

            background: #e0f2fe;

            color: #0369a1;

            border-radius: 20px;

            font-size: 13px;

            font-weight: 600;

            margin-bottom: 20px;

        }


        .hero h1 {

            font-size: 52px;

            line-height: 1.1;

            margin-bottom: 20px;

        }


        .hero h1 span {

            color: #0284c7;

        }


        .hero p {

            font-size: 18px;

            line-height: 1.7;

            color: #64748b;

            margin-bottom: 30px;

        }


        /* ================= BUTTONS ================= */

        .buttons {

            display: flex;

            gap: 15px;

        }


        .primary-btn,
        .secondary-btn {

            padding: 13px 24px;

            border-radius: 8px;

            text-decoration: none;

            font-weight: 600;

        }


        .primary-btn {

            background: #0284c7;

            color: white;

        }


        .primary-btn:hover {

            background: #0369a1;

        }


        .secondary-btn {

            border: 1px solid #cbd5e1;

            color: #334155;

            background: white;

        }


        .secondary-btn:hover {

            background: #f1f5f9;

        }


        /* ================= DASHBOARD ================= */

        .dashboard {

            width: 420px;

            background: white;

            border-radius: 18px;

            padding: 25px;

            box-shadow:
                0 20px 50px
                rgba(15, 23, 42, 0.12);

            border: 1px solid #e2e8f0;

        }


        .dashboard-header {

            display: flex;

            justify-content: space-between;

            margin-bottom: 25px;

        }


        .dashboard-header h3 {

            font-size: 18px;

        }


        .status {

            color: #16a34a;

            font-size: 13px;

            font-weight: 600;

        }


        /* ================= STATS ================= */

        .stat-grid {

            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 15px;

            margin-bottom: 20px;

        }


        .stat {

            background: #f8fafc;

            padding: 20px;

            border-radius: 12px;

        }


        .stat h2 {

            margin-bottom: 5px;

        }


        .stat p {

            color: #64748b;

            font-size: 13px;

        }


        /* ================= USER LIST ================= */

        .user-list {

            border-top: 1px solid #e2e8f0;

            padding-top: 18px;

        }


        .user {

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 10px 0;

        }


        .user-info {

            display: flex;

            align-items: center;

            gap: 10px;

        }


        .avatar {

            width: 38px;

            height: 38px;

            border-radius: 50%;

            background: #e0f2fe;

            display: flex;

            align-items: center;

            justify-content: center;

            color: #0369a1;

            font-weight: 700;

        }


        .user-name-card {

            font-weight: 600;

            font-size: 14px;

        }


        .user-email {

            font-size: 12px;

            color: #64748b;

        }


        .active {

            color: #16a34a;

            font-size: 12px;

        }


        /* ================= FEATURES ================= */

        .features {

            padding: 70px 8%;

            background: white;

            text-align: center;

        }


        .features h2 {

            font-size: 32px;

            margin-bottom: 12px;

        }


        .features > p {

            color: #64748b;

            margin-bottom: 40px;

        }


        .feature-grid {

            display: grid;

            grid-template-columns: repeat(3, 1fr);

            gap: 25px;

        }


        .feature {

            padding: 30px;

            border: 1px solid #e2e8f0;

            border-radius: 14px;

            text-align: left;

        }


        .icon {

            font-size: 30px;

            margin-bottom: 15px;

        }


        .feature h3 {

            margin-bottom: 10px;

        }


        .feature p {

            color: #64748b;

            line-height: 1.6;

        }


        /* ================= FOOTER ================= */

        footer {

            background: #0f172a;

            color: #94a3b8;

            text-align: center;

            padding: 25px;

            font-size: 14px;

        }


        /* ================= RESPONSIVE ================= */

        @media (max-width: 900px) {

            .hero {

                flex-direction: column;

                text-align: center;

            }


            .buttons {

                justify-content: center;

            }


            .dashboard {

                width: 100%;

                max-width: 420px;

            }


            .feature-grid {

                grid-template-columns: 1fr;

            }


            .nav-links {

                display: none;

            }

        }


    </style>

</head>


<body>


    <!-- ================= NAVBAR ================= -->

    <nav class="navbar">


        <!-- Logo -->

        <div class="logo">

            User<span>MS</span>

        </div>


        <!-- Navigation -->

        <ul class="nav-links">

            <li>

                <a href="/home">

                    Home

                </a>

            </li>


            <li>

                <a href="/users">

                    Users

                </a>

            </li>


            <li>

                <a href="#features">

                    About

                </a>

            </li>


            <li>

                <a href="#features">

                    Contact

                </a>

            </li>

        </ul>


        <!-- ================= USER AREA ================= -->

        <div
            class="user-area"
            id="userArea"
        >

            <!-- Login Button -->

            <a
                href="/login"
                class="login-btn"
                id="loginButton"
            >

                Login

            </a>


            <!-- User Name -->

            <span
                class="user-name"
                id="userName"
                style="display: none;"
            >

            </span>


            <!-- Logout -->

            <button
                type="button"
                class="logout-btn"
                id="logoutButton"
                style="display: none;"
            >

                Logout

            </button>


        </div>


    </nav>



    <!-- ================= HERO ================= -->

    <section class="hero">


        <div class="hero-content">


            <div class="badge">

                Laravel User Management System

            </div>


            <h1>

                Manage Your Users

                <span>

                    Effortlessly.

                </span>

            </h1>


            <p>

                A secure and modern user management
                system built with Laravel. Create,
                manage, update and organize users
                from a single platform.

            </p>


            <div class="buttons">


                <a
                    href="/users"
                    class="primary-btn"
                >

                    Manage Users

                </a>


                <a
                    href="#features"
                    class="secondary-btn"
                >

                    Learn More

                </a>


            </div>


        </div>



        <!-- ================= DASHBOARD ================= -->

        <div class="dashboard">


            <div class="dashboard-header">

                <h3>

                    User Dashboard

                </h3>


                <span class="status">

                    ● System Online

                </span>

            </div>



            <!-- Statistics -->

            <div class="stat-grid">


                <div class="stat">

                    <h2>

                        1,248

                    </h2>


                    <p>

                        Total Users

                    </p>

                </div>


                <div class="stat">

                    <h2>

                        1,120

                    </h2>


                    <p>

                        Active Users

                    </p>

                </div>


            </div>



            <!-- User List -->

            <div class="user-list">


                <div class="user">


                    <div class="user-info">


                        <div class="avatar">

                            T

                        </div>


                        <div>

                            <div class="user-name-card">

                                Tabrez

                            </div>


                            <div class="user-email">

                                tabrez@example.com

                            </div>

                        </div>


                    </div>


                    <span class="active">

                        Active

                    </span>


                </div>



                <div class="user">


                    <div class="user-info">


                        <div class="avatar">

                            R

                        </div>


                        <div>

                            <div class="user-name-card">

                                Rahul

                            </div>


                            <div class="user-email">

                                rahul@example.com

                            </div>

                        </div>


                    </div>


                    <span class="active">

                        Active

                    </span>


                </div>



                <div class="user">


                    <div class="user-info">


                        <div class="avatar">

                            A

                        </div>


                        <div>

                            <div class="user-name-card">

                                Aman

                            </div>


                            <div class="user-email">

                                aman@example.com

                            </div>

                        </div>


                    </div>


                    <span class="active">

                        Active

                    </span>


                </div>


            </div>


        </div>


    </section>



    <!-- ================= FEATURES ================= -->

    <section
        class="features"
        id="features"
    >


        <h2>

            Everything You Need

        </h2>


        <p>

            Simple tools to manage users efficiently.

        </p>



        <div class="feature-grid">


            <!-- Feature 1 -->

            <div class="feature">


                <div class="icon">

                    👤

                </div>


                <h3>

                    User Management

                </h3>


                <p>

                    Create, view, update and delete users
                    through a simple management system.

                </p>


            </div>



            <!-- Feature 2 -->

            <div class="feature">


                <div class="icon">

                    🔐

                </div>


                <h3>

                    Secure Authentication

                </h3>


                <p>

                    Protect user information with secure
                    authentication and password handling.

                </p>


            </div>



            <!-- Feature 3 -->

            <div class="feature">


                <div class="icon">

                    ⚡

                </div>


                <h3>

                    Fast & Reliable

                </h3>


                <p>

                    Built with Laravel for a clean,
                    scalable and reliable backend.

                </p>


            </div>


        </div>


    </section>



    <!-- ================= FOOTER ================= -->

    <footer>

        © 2026 UserMS. All rights reserved.

    </footer>



    <!-- ================= AUTH SCRIPT ================= -->

    <script>


        /*
        |--------------------------------------------------------------------------
        | Elements
        |--------------------------------------------------------------------------
        */

        const loginButton =
            document.getElementById('loginButton');


        const userNameElement =
            document.getElementById('userName');


        const logoutButton =
            document.getElementById('logoutButton');



        /*
        |--------------------------------------------------------------------------
        | Show Logged-In / Logged-Out State
        |--------------------------------------------------------------------------
        */

        function updateUserUI() {


            const userData =
                localStorage.getItem('user');


            /*
            |--------------------------------------------------------------------------
            | User Logged In
            |--------------------------------------------------------------------------
            */

            if (userData) {

                try {


                    const user =
                        JSON.parse(userData);


                    /*
                    | Show User Name
                    */

                    userNameElement.innerText =
                        user.name;


                    userNameElement.style.display =
                        'inline-block';


                    /*
                    | Show Logout
                    */

                    logoutButton.style.display =
                        'inline-block';


                    /*
                    | Hide Login
                    */

                    loginButton.style.display =
                        'none';


                }


                catch (error) {


                    console.error(
                        'Invalid user data:',
                        error
                    );


                    localStorage.removeItem(
                        'user'
                    );


                    showLoggedOutUI();

                }

            }


            /*
            |--------------------------------------------------------------------------
            | User Logged Out
            |--------------------------------------------------------------------------
            */

            else {

                showLoggedOutUI();

            }

        }



        /*
        |--------------------------------------------------------------------------
        | Logged Out UI
        |--------------------------------------------------------------------------
        */

        function showLoggedOutUI() {


            /*
            | Show Login
            */

            loginButton.style.display =
                'inline-block';


            /*
            | Hide User Name
            */

            userNameElement.style.display =
                'none';


            /*
            | Hide Logout
            */

            logoutButton.style.display =
                'none';

        }



        /*
        |--------------------------------------------------------------------------
        | Initial UI
        |--------------------------------------------------------------------------
        */

        updateUserUI();



        /*
        |--------------------------------------------------------------------------
        | Logout
        |--------------------------------------------------------------------------
        */

        logoutButton.addEventListener(
            'click',
            async function() {


                /*
                |--------------------------------------------------------------------------
                | Disable Button
                |--------------------------------------------------------------------------
                */

                logoutButton.disabled =
                    true;

                logoutButton.innerText =
                    'Logging out...';



                try {


                    /*
                    |--------------------------------------------------------------------------
                    | Call Logout API
                    |--------------------------------------------------------------------------
                    */

                    const response =
                        await fetch(
                            '/api/logout',
                            {

                                method: 'POST',

                                headers: {

                                    'Accept':
                                        'application/json',

                                    'Content-Type':
                                        'application/json'

                                }

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
                        'Logout API Response:',
                        data
                    );



                    /*
                    |--------------------------------------------------------------------------
                    | Logout Successful
                    |--------------------------------------------------------------------------
                    */

                    if (response.ok) {


                        /*
                        | Clear Login Data
                        */

                        localStorage.removeItem(
                            'user'
                        );


                        /*
                        | Change navbar immediately
                        */

                        updateUserUI();


                        /*
                        | Reset button
                        */

                        logoutButton.disabled =
                            false;

                        logoutButton.innerText =
                            'Logout';


                        console.log(
                            'User logged out successfully'
                        );

                    }


                    /*
                    |--------------------------------------------------------------------------
                    | Logout Failed
                    |--------------------------------------------------------------------------
                    */

                    else {


                        console.error(
                            'Logout failed:',
                            data
                        );


                        logoutButton.disabled =
                            false;

                        logoutButton.innerText =
                            'Logout';


                        alert(
                            data.message ||
                            'Logout failed'
                        );

                    }

                }


                catch (error) {


                    console.error(
                        'Logout API Error:',
                        error
                    );


                    /*
                    |--------------------------------------------------------------------------
                    | Clear Local Login
                    |--------------------------------------------------------------------------
                    */

                    localStorage.removeItem(
                        'user'
                    );


                    /*
                    | Update navbar
                    */

                    updateUserUI();


                    logoutButton.disabled =
                        false;

                    logoutButton.innerText =
                        'Logout';


                    console.log(
                        'Local logout completed'
                    );

                }

            }
        );


    </script>


</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>Halaman Login</title>
    <!-- <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body{
            background-color: #f4f4f4;
        }
        .box{
            width: 500px;
            height: 400px;
            border-radius: 5px;
            margin: 200px auto 0;
            background-color: #ffffff27;
            border-radius: 10px;
            position: relative;
        }
        .box::after {
            content: '';
            position: absolute;
            width: calc(100% + 30px);
            height: calc(100% + 30px);
            z-index: -1;
            background: linear-gradient(to right bottom, #4CC9F0, #4361EE, #3A0CA3);
            top: -15px;
            left: -15px;
            border-radius: 10px
        }
        .box h1 {
            font-size: 3em;
            text-align: center;
            padding: 15px 0 10px;
            color: #fff;
        }
        .box input{
            width: calc(100% - 50px);
            height: 60px;
            padding: 20px;
            margin: 30px auto 20px;
            font-size: 18px;
            display: block;
            outline: none;
            border: none;
            background-color: #ffffff27;
            border: 2px solid #ffffff85;
            color: #fff;
            border-radius: 50px;
        }
        .box input:focus {
            box-shadow: 0 0 5px 5px #ffffff35;
        }
        .box input::placeholder{
            color: #fff;
        }
        .box button {
            width: calc(100% - 50px);
            height: 55px;
            margin: 30px auto 0;
            font-size: 18px;
            display: block;
            background-color: #ffffff37;
            border: 2px solid #ffffff85;
            color: #fff;
            border-radius: 50px;
            cursor: pointer;
        }
        </style> -->
        <style>
            * {
                margin: 0;
                padding: 0;
                font-family: 'Poppins', sans-serif;
                box-sizing: border-box;
            }

            :root{
                --navy: #0E2A47;
                --primary: #007bff;
                --info: #17a2b8;
                --success: #28a745;
                --warning: #ffc107;
                --danger: #dc3545;
                --dark: #343a40;
                --secondary: #6c757d;
            }

            body {
                width: 100%;
                min-height: 100vh;
                background-size: cover;
                background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' version='1.1' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns:svgjs='http://svgjs.com/svgjs' width='2000' height='450' preserveAspectRatio='none' viewBox='0 0 1440 560'%3e%3cg mask='url(%26quot%3b%23SvgjsMask1010%26quot%3b)' fill='rgba(41,158,193,255)'%3e%3crect width='1440' height='560' x='0' y='0' fill='rgba(116,207,226,255)'%3e%3c/rect%3e%3cpath d='M0%2c334.798C66.307%2c328.401%2c129.278%2c320.325%2c192.635%2c299.746C276.032%2c272.658%2c382.261%2c270.208%2c428.406%2c195.646C474.182%2c121.679%2c449.412%2c20.243%2c415.075%2c-59.679C384.5%2c-130.845%2c309.458%2c-166.699%2c250.931%2c-217.433C201.475%2c-260.304%2c155.362%2c-302.528%2c98.182%2c-334.376C26.249%2c-374.441%2c-43.139%2c-430.838%2c-125.389%2c-427.036C-214.445%2c-422.919%2c-308.269%2c-384.74%2c-361.374%2c-313.132C-413.766%2c-242.485%2c-409.866%2c-144.778%2c-399.487%2c-57.438C-390.727%2c16.282%2c-338.342%2c72.901%2c-307.478%2c140.42C-276.628%2c207.908%2c-280.824%2c299.721%2c-218.101%2c339.372C-155.365%2c379.031%2c-73.877%2c341.925%2c0%2c334.798' fill='rgba(29,142,184,255)'%3e%3c/path%3e%3cpath d='M1440 1146.895C1558.248 1138.103 1693.188 1171.8229999999999 1784.874 1096.634 1875.974 1021.925 1872.703 884.614 1899.676 769.927 1921.596 676.726 1917.57 585.118 1927.569 489.898 1941.476 357.464 2027.72 220.77800000000002 1969.94 100.805 1911.626-20.277000000000044 1767.93-80.25199999999995 1637.459-112.48199999999997 1509.97-143.97500000000002 1365.347-144.543 1253.179-76.25300000000004 1147.423-11.866999999999962 1147.018 142.301 1065.663 235.635 983.928 329.405 819.312 346.876 781.16 465.273 743.136 583.274 831.71 701.621 878.513 816.423 927.376 936.2760000000001 948.969 1084.8400000000001 1060.5140000000001 1150.491 1171.787 1215.983 1311.239 1156.469 1440 1146.895' fill='rgba(41,158,193,255)'%3e%3c/path%3e%3c/g%3e%3cdefs%3e%3cmask id='SvgjsMask1010'%3e%3crect width='1440' height='560' fill='rgba(41,158,193,255)'%3e%3c/rect%3e%3c/mask%3e%3c/defs%3e%3c/svg%3e");
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .container {
                width: 400px;
                min-height: 400px;
                background: #fff;
                border-radius: 5px;
                box-shadow: 0 0 5px rgba(255, 255, 255, 0.3);
                padding: 40px 30px;
            }

            .container .login-text {
                color: #89afb6;
                font-weight: 500;
                font-size: 1.1rem;
                text-align: center;
                margin-bottom: 55px;
                display: block;
                text-transform: capitalize;
            }

            .container .login-email .input-group {
                width: 100%;
                height: 60px;
                margin-bottom: 30px;
                color: black;
            }

            .container .login-email .input-group input {
                width: 100%;
                height: 100%;
                border: 2px solid #9b9696;
                padding: 10px 20px;
                text-align: left;
                font-size: 1rem;
                border-radius: 5px;
                background: transparent;
                outline: none;
                transition: .3s;
            }

            .container .login-email .input-group input:focus,
            .container .login-email .input-group input:valid {
                border-color: rgb(105, 100, 100);
            }

            .container .login-email .input-group .btn {
                display: block;
                width: 300px;
                padding: 12px 20px;
                margin-left: 20px;
                text-align: center;
                border: none;
                background: #57ddff;
                outline: antiquewhite solid 1px;
                border-radius: 15px;
                font-size: 1.2rem;
                color: #FFF;
                cursor: pointer;
                transition: .3s;
            }

            .container .login-email .input-group .btn:hover {
                background: transparent;
                color : rgb(218, 185, 146);
                border: 1px solid antiquewhite; 
            }

            .login-register-text {
                color: #89afb6;
                font-weight: 600;
            }

            .login-register-text a {
                text-decoration: none;
                color: #000000;
            }

            .container-logout {
                width: 500px;
                min-height: 200px;
                background: #FFF;
                border-radius: 5px;
                box-shadow: 0 0 5px rgba(0, 0, 0, .3);
                padding: 40px 30px;
            }

            .container-logout .login-email .input-group .btn {
                display: block;
                width: 100%;
                padding: 15px 20px;
                text-align: center;
                border: none;
                background: #a29bfe;
                outline: none;
                border-radius: 30px;
                font-size: 1.2rem;
                color: #FFF;
                cursor: pointer;
                transition: .3s;
                margin-top: 20px;
            }

            .link{
                text-decoration: none;
                color: var(--success);
                text-align: center;
                display: flex;
                margin-top: 20px;
                justify-content: center;
            }

            @media (max-width: 430px) {
                .container {
                    width: 300px;
                }
            }
        </style>
</head>
<body>
<div class="container">
        <form action="proses_login.php" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 600;">Login Page</p>
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" placeholder="Username..." name="username">
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" placeholder="Password..." name="password">
            </div>
            <div class="input-group">
            <button name="submit" class="btn">Login</button>
            <!-- <a href="#" class="link" onclick="location.href='../register.php'">Daftar</a>
            <a href="../" class="link">Kembali</a> -->
            </div>

        </form>
    </div>
</body>
</html>
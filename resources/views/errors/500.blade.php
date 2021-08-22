<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta content="origin" name="referrer">
    <title>Server Error · Btekno</title>
    <meta name="viewport" content="width=device-width">
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: "Fira Code", monospace;
        }

        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #ecf0f1;
        }

        .container {
            text-align: center;
            margin: auto;
            padding: 20px;
        }

        .container img {
            width: 100px;
            height: 100px;
        }

        .container h1 {
            margin-top: 30px;
            margin-bottom: 30px;
            font-size: 35px;
            text-align: center;
        }

        .container p {
            margin-top: 10px;
            color: #666666;
        }

        .container p.info {
            margin-top: 40px;
            font-size: 12px;
            color: #666666;
        }

        .container p.info a {
            text-decoration: none;
            color: #666666;
        }
    </style>
</head>
<body>
    <div class="container">
        <img loading=lazy src="{{ asset('assets/images/logo-mobile.png') }}" />
        <h1>Looks like something went wrong!</h1>
        <p>We track these errors automatically, but if the problem persists feel free to contact us. In the meantime, try refreshing.</p>
        <p class="info">
            <a href="javascript:;">Kontak Kami</a> —
            <a href="https://status.btekno.id">Status</a> —
            <a href="https://twitter.com/404vay">@404vay</a>
        </p>
    </div>
</body>
</html>
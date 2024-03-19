<!doctype html>
<html lang="en">
    <head>
        <title>Email Verification</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <div class="container mt-4">
            <div class="card p-2 text-center">
                <h4>{{ $message }}</h4>
                @if (session()->has('message'))
                    <div class="alert alert-success">{{ session()->get('message') }}</div>
                @endif
            </div>
        </div>
    </body>
</html>

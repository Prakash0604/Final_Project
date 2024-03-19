<!doctype html>
<html lang="en">
    <head>
        <title>{{ $data['name'] }}</title>
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
        <div class="container">
            <div
                class="card col-5 d-flex mx-auto"
                style="
                    background-color:$ {
                        1: orangered;
                    }
                    border-color:$ {
                        2: darkblue;
                    }
                "
            >
                <img class="card-img-top" src="{{ asset('images/AccountVerification1.jpg') }}" alt="Title" width="100px" height="500px" />
                <div class="card-body">
                    <h2 class="card-title text-center" >Dear,{{ $data['name'] }} !!</h2>
                    <p>This is your email and password if lost please contact to us</p>
                    <table class="table table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th>Email</th>
                                <th>Password</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>   
                                <td>{{ $data['email'] }}</td>
                                <td>{{ $data['password'] }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="card-text">Thank you once again for registering us,Please verify your account so you can login now</p>
                    <a href="{{ $data['url'] }}" class="d-flex">
                        <button class="btn btn-primary mx-auto">Verifiy now</button>
                    </a>
                </div>
            </div>
            
        </div>
    </body>
</html>

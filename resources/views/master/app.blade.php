<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Js Libraries -->

        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body, a {
                color: #000;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .btn{
                width: 6em;  
                padding: 0.1em;
                line-height: 1;
                border: 1px solid black;
                text-decoration: none;
                text-align: center;
                border-radius: 5px;
            }
            .btn-update{
                background-color: #aa4500;
            }

            .btn-delete{
                background-color: #f00;
            }

            .btn-create{
                background-color: #080;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                display: flex;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;               
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .blog{
                align-content: left;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .row{
                line-height: 2;
            }

            .row > div {
                height: 20px;
                width: 33.33%; 
                width: calc(100% / 3);
                display: inline-block;
            }

            .form-row {
                margin: 10px;
            }

            .form-row > div{
                width: 50%
                width: calc(100% / 2);
                display: inline-block;
            }
        </style>
       
    </head>
    <body>
        <div class=" position-ref full-height">


            <div class="content">
                <div class="title m-b-md">
                    Blog
                </div>
                <div>
                    @yield('content')
                </div>

               
            </div>
        </div>
        @yield('script')
    </body>
</html>

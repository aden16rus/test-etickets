<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/main.css')}}">
    </head>
    <body>
    <div class="container">
        <div class="row">
            {{--user list--}}
            <div class="request-wrap">
                <div class="row-wrap">
                    <div class="left">
                        URI
                    </div>
                    <div class="right">
                        /api/users
                    </div>
                </div>
                <div class="row-wrap">
                    <div class="left">
                        Description
                    </div>
                    <div class="right">
                        retrieve user list
                    </div>
                </div>
                <div class="row-wrap">
                    <div class="left">
                        Method
                    </div>
                    <div class="right">
                        GET
                    </div>
                </div>
                <div class="row-wrap">
                    <div class="left">
                        Parameters
                    </div>
                    <div class="right">
                        <kbd>page</kbd> - values type integer, optional, default value 1
                    </div>
                </div>
                <div class="row-wrap">
                    <div class="left">
                        Resposne
                    </div>
                    <div class="right">
                        JSON user list
                    </div>
                </div>
            </div>
            {{--user create--}}
            <div class="request-wrap">
                <div class="row-wrap">
                    <div class="left">
                        URI
                    </div>
                    <div class="right">
                        /api/users
                    </div>
                </div>
                <div class="row-wrap">
                    <div class="left">
                        Description
                    </div>
                    <div class="right">
                        Store new user
                    </div>
                </div>
                <div class="row-wrap">
                    <div class="left">
                        Method
                    </div>
                    <div class="right">
                        POST
                    </div>
                </div>
                <div class="row-wrap">
                    <div class="left">
                        Parameters
                    </div>
                    <div class="right">
                        <kbd>name</kbd> - required string, minimal length 2, maximal length 32 <br>
                        <kbd>email</kbd> - required string ex. box@mail.com, maximum length 128, required unique value
                        <br>
                        <kbd>password</kbd> - required string minimum length 8, maximum lentgh 32
                        <br>
                        <kbd>company</kbd> - optional integer of company id
                    </div>
                </div>
                <div class="row-wrap">
                    <div class="left">
                        Resposne
                    </div>
                    <div class="right">
                        JSON edited user
                    </div>
                </div>
            </div>
            {{--user update--}}
            <div class="request-wrap">
                <div class="row-wrap">
                    <div class="left">
                        URI
                    </div>
                    <div class="right">
                        /api/users/{user_id}
                    </div>
                </div>
                <div class="row-wrap">
                    <div class="left">
                        Description
                    </div>
                    <div class="right">
                        Update user data
                    </div>
                </div>
                <div class="row-wrap">
                    <div class="left">
                        Method
                    </div>
                    <div class="right">
                        PUT/PATCH
                    </div>
                </div>
                <div class="row-wrap">
                    <div class="left">
                        Parameters
                    </div>
                    <div class="right">
                        <kbd>user_id</kbd> - required parameter type integer of user id <br>
                        <kbd>name</kbd> - required string, minimal length 2, maximal length 32 <br>
                        <kbd>email</kbd> - required string ex. box@mail.com, maximum length 128 <br>
                        <kbd>password</kbd> - required string minimum length 8, maximum lentgh 32
                    </div>
                </div>
                <div class="row-wrap">
                    <div class="left">
                        Resposne
                    </div>
                    <div class="right">
                        JSON edited user
                    </div>
                </div>
            </div>
            {{--user destroy--}}
            <div class="request-wrap">
                <div class="row-wrap">
                    <div class="left">
                        URI
                    </div>
                    <div class="right">
                        /api/users/{user_id}
                    </div>
                </div>
                <div class="row-wrap">
                    <div class="left">
                        Description
                    </div>
                    <div class="right">
                        Delete user by id
                    </div>
                </div>
                <div class="row-wrap">
                    <div class="left">
                        Method
                    </div>
                    <div class="right">
                        DELETE
                    </div>
                </div>
                <div class="row-wrap">
                    <div class="left">
                        Parameters
                    </div>
                    <div class="right">
                        <kbd>user_id</kbd> - required parameter, value type integer
                    </div>
                </div>
                <div class="row-wrap">
                    <div class="left">
                        Response
                    </div>
                    <div class="right">
                        JSON
                    </div>
                </div>
            </div>
            {{--companies list--}}
            <div class="request-wrap">
                <div class="row-wrap">
                    <div class="left">
                        URI
                    </div>
                    <div class="right">
                        /api/companies
                    </div>
                </div>
                <div class="row-wrap">
                    <div class="left">
                        Description
                    </div>
                    <div class="right">
                        retrieve companies list
                    </div>
                </div>
                <div class="row-wrap">
                    <div class="left">
                        Method
                    </div>
                    <div class="right">
                        GET
                    </div>
                </div>
                <div class="row-wrap">
                    <div class="left">
                        Parameters
                    </div>
                    <div class="right">
                        <kbd>page</kbd> - values type integer, optional, default value 1
                    </div>
                </div>
                <div class="row-wrap">
                    <div class="left">
                        Resposne
                    </div>
                    <div class="right">
                        JSON companies list
                    </div>
                </div>
            </div>
            {{--company create--}}
            <div class="request-wrap">
                <div class="row-wrap">
                    <div class="left">
                        URI
                    </div>
                    <div class="right">
                        /api/companies
                    </div>
                </div>
                <div class="row-wrap">
                    <div class="left">
                        Description
                    </div>
                    <div class="right">
                        Store new company
                    </div>
                </div>
                <div class="row-wrap">
                    <div class="left">
                        Method
                    </div>
                    <div class="right">
                        POST
                    </div>
                </div>
                <div class="row-wrap">
                    <div class="left">
                        Parameters
                    </div>
                    <div class="right">
                        <kbd>name</kbd> - required string, minimal length 2, maximal length 64
                    </div>
                </div>
                <div class="row-wrap">
                    <div class="left">
                        Response
                    </div>
                    <div class="right">
                        JSON edited company
                    </div>
                </div>
            </div>
            {{--company update--}}
            <div class="request-wrap">
                <div class="row-wrap">
                    <div class="left">
                        URI
                    </div>
                    <div class="right">
                        /api/companies/{company_id}
                    </div>
                </div>
                <div class="row-wrap">
                    <div class="left">
                        Description
                    </div>
                    <div class="right">
                        Update company data
                    </div>
                </div>
                <div class="row-wrap">
                    <div class="left">
                        Method
                    </div>
                    <div class="right">
                        PUT/PATCH
                    </div>
                </div>
                <div class="row-wrap">
                    <div class="left">
                        Parameters
                    </div>
                    <div class="right">
                        <kbd>company_id</kbd> - required parameter type integer of company id <br>
                        <kbd>name</kbd> - required string, minimal length 2, maximal length 64
                    </div>
                </div>
                <div class="row-wrap">
                    <div class="left">
                        Response
                    </div>
                    <div class="right">
                        JSON edited company
                    </div>
                </div>
            </div>
            {{--company destroy--}}
            <div class="request-wrap">
                <div class="row-wrap">
                    <div class="left">
                        URI
                    </div>
                    <div class="right">
                        /api/companies/{company_id}
                    </div>
                </div>
                <div class="row-wrap">
                    <div class="left">
                        Description
                    </div>
                    <div class="right">
                        Delete company by id
                    </div>
                </div>
                <div class="row-wrap">
                    <div class="left">
                        Method
                    </div>
                    <div class="right">
                        DELETE
                    </div>
                </div>
                <div class="row-wrap">
                    <div class="left">
                        Parameters
                    </div>
                    <div class="right">
                        <kbd>company_id</kbd> - required parameter, value type integer
                    </div>
                </div>
                <div class="row-wrap">
                    <div class="left">
                        Response
                    </div>
                    <div class="right">
                        JSON
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>

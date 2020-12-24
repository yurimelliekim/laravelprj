<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Add Customer</title>


    </head>

    <body>

        <div id="wrap">
            <form method="post" action="/customer/add">
                @csrf
                <fieldset>
                    <input type = "hidden" name="check"/>
                    <legend>고객 추가</legend>
                    NAME: <input type="text" id="name" name="name" /> <br />
                    PHONE : <input type="text" id="phone" name="phone" />
                    E-MAIL : <input type="text" id="email" name="email" />
                    <br>
                    <input type="submit" value="제출">
                </fieldset>
            </form>
        </div>


    </body>

</html>

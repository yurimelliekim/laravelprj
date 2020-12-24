<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Customer</title>
    </head>

    <body>
            <div>
                회원목록
            </div>

            <div>
                <table border="1">
                    @foreach($customers as $customers)
                        <tr>
                            <th>id: {{ $customers->id }}</th>
                            <td>name: {{ $customers->name }}</td>
                            <td>phone: {{ $customers->phone }}</td>
                            <td>reg: {{ $customers->reg }}</td>
                        </tr>


                    @endforeach

                </table>

            </div>

            <div>
                <button><a href="/customer/add">추가하기</button>
            </div>
{{--            {{ $customers }}--}}




    </body>
</html>

<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Member Detail</title>
    </head>
<body>
{{--    {{$memberDetail}}--}}
{{--    {{$id}}--}}

    <div id="wrap">
        <form action="{{Route('memberDetail',['id'=>$id])}}" method="post">
            <table border="1">
                <caption>회원 정보</caption>

                    @csrf
                    {{ method_field($id>0 ? 'put' : 'post') }}
                    <tr>
                        <th>확인용id</th>
                        <td><input type="text" id="" name="chid" value={{ $id>0? $memberDetail->id :'' }}></td>
                    </tr>
                    <tr>
                        <th>User Id</th>
                        <td><input type="text" id="" name="userid" value={{ $id>0? $memberDetail->userid :'' }}></td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td><input type="text" id="" name="name" value={{ $id>0? $memberDetail->name :'' }}></td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td><input type="text" id="" name="phone" value={{ $id>0? $memberDetail->phone :'' }}></td>
                    </tr>
                    <tr>
                        <th>E-mail</th>
                        <td><input type="text" id="" name="email" value={{ $id>0? $memberDetail->email :'' }}></td>
                    </tr>


                    {{--{{method_field($id>0?'delete':'post')}}--}}


            </table>
            <br>
            @if($id>0)
                <input type="submit" value="회원정보 수정">

{{--            <form action="{{Route('memberDelete'),['id'=>$id]}}}", method="post">--}}

                <input type="submit" value="회원정보 삭제">
{{--            </form>--}}

            @else
                <input type="submit" value="회원 등록">
            @endif
        </form>
    </div>


</body>

</html>

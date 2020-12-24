<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Member list</title>
        <style>
            #wrap{
                //padding: 10px;
                //background:ivory;
                //margin:10px;
            }
            .fright{
                //float:right;
            }



        </style>
    </head>
    <body>
    @include('message')

        <div id="wrap">
            <table border="1">
                <caption>회원 목록</caption>
                <thead>
                    <tr>
                        <th>확인용id</th>
                        <th>User Id</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>E-mail</th>
                        <th>상세보기 및 수정</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($members as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->userid }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->email }}</td>
                            <td><a href="{{ route('memberDetail',['id'=>$item->id]) }}">Click</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
{{--                <button><a href="{{ Route('memberAdd') }}"</button>--}}

{{--이부분잘모르겠음 add로 바로가면안되는지--}}
            <button><a href="{{Route('memberDetail',['id'=>0])}}">회원추가하기</a></button>
{{--            <button class="fright"><a href="{{ Route('memberDetail',['id'=>0]) }}">회원 추가하기</a></button>--}}
        </div>


{{--{{$test}}--}}


{{--    {{$test}}--}}
{{--    {{$test2}}--}}

    {{$test or 'hello'}}
    <br>
    <div>

        <input type="hidden" id="test" value="{{$test}}">
    </div>
    <script>
        //document.write('dsdfd');
        var test = document.getElementById("test").value;
       //document.write(test);

    </script>
    {{--
           <script>


           var msg = '{{Session::get('alert')}}';
           var exist = '{{Session::has('alert')}}';
           if(exist){
               alert(msg);

           }

       </script>

      --}}
    </body>

</html>

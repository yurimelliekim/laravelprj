@extends('../layouts/master')
@section('style')
    <style>
        table{
            border-collapse: collapse;
            border: 2px solid steelblue;
            background-color: antiquewhite;
            margin: 2px;
        }
        th{
            background-color: bisque;
        }
        .button{
            background-color: darkslategray;
            border-radius:10px;
            border:1px solid #777;
            display:inline-block;
            cursor:pointer;
            color:#ffffff;
            font-family:Arial;
            font-size:15px;
            padding:10px 20px;
            text-decoration:none;
            text-shadow:0px 1px 0px #000;
        }
        .button2{
            background-color: silver;
            border-radius:15px;
            border:1px solid #777;
            display:inline-block;
            cursor:pointer;
            color: black;
            font-family:Arial;
            font-size:15px;
            padding:8px 12px;
            text-decoration:none;
            text-shadow:0px 1px 0px #000;
        }
        #wrap{
            margin: 5px 20px;
        }
        #caption_name{
            font-size: 30px;
            color: steelblue;
        }
        .textcss{
            font-size: 20px;
        }
        .texttype{
            font-size: 18px;
            height:30px;
        }
        /*#wrap2{*/
        /*    display:flex;*/
        /*}*/
    </style>
@endsection

@section('content')
    <div id="wrap">
        <table border="2">
            <caption id="caption_name"><a href="{{Route('testmemList')}}">Testmem List</a></caption>
            <tr>
                <th class="textcss">p id</th>
                <th class="textcss">User ID</th>
                <th class="textcss">Name</th>
                <th class="textcss">Phone</th>
                <th class="textcss">E-MAIL</th>
                <th class="textcss">Auth</th>
                <th class="textcss">Created_at</th>
                <th class="textcss">Updated_at</th>
                <th class="textcss">Deleted_at</th>
                <th class="textcss">상세보기</th>
            </tr>
            @foreach($items as $info)
            <tr>
                <td class="textcss">{{$info->id}}</td>
                <td class="textcss">{{$info->userid}}</td>
                <td class="textcss">{{$info->name}}</td>
                <td class="textcss">{{$info->phone}}</td>
                <td class="textcss">{{$info->email}}</td>
                <td class="textcss">{{$info->auth}}</td>
                <td class="textcss">{{$info->created_at}}</td>
                <td class="textcss">{{$info->updated_at}}</td>
                <td class="textcss">{{$info->deleted_at}}</td>
                <td class="textcss"><a href="{{Route('testmemDetail',['id'=>$info->id])}}">Click</a></td>
            </tr>
            @endforeach

        </table>

        <a href="{{Route('testmemDetail',['id'=>0])}}" class="button">추가하기</a>

        <br><br>
{{--        검색기능 추가--}}
        <form action="" method="get" name="searchCheck" id="searchCheck" onsubmit="return formCheck();">
{{--            //통합검색--}}
            <div id="wrap2">
            <div>
                <input type="hidden" name="searchChk" value="1">
                통합검색: <input type="text" name="searchText" class="texttype" placeholder="User ID ~ E-mail 통합 검색">
                <br><br>
            </div>
{{--            //권한검색--}}
            {{--<select name="searchAuth">
                <option value="">선택</option>
                @foreach($eachAuth as $data)
                <option value="{{$data->auth}}">{{$data->auth}}</option>
                @endforeach
            </select>--}}
            <div>
                권한검색: <select name="searchAuth" style="height:30px;">
                    <option value="">선택</option>
                    @foreach(getAuth() as $key=>$val)
                        <option value="{{$key}}">{{$val}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <p>조회기간:
                    <input type="text" autocomplete="off" name="" id="dateRange">

                    <input type="hidden" id="fromDate" name="fromDate" value="">
                    <input type="hidden" id="toDate" name="toDate" value="">
                </p>

                <button type="submit" class="button2">검색</button>

            </div>
            </div>

        </form>
    </div>

@endsection
@section('script')
    <script type="text/javascript">

        $(function() {

            $('input[id="dateRange"]').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear'
                }
            });

            $('input[id="dateRange"]').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('YYYY-MM-DD') + ' ~ ' + picker.endDate.format('YYYY-MM-DD'));
            });

            $('input[id="dateRange"]').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });

        });


        //js
        function formCheck(){

             var dateRange = document.getElementById("dateRange").value;
             var dateRangeEach = dateRange.split("~");

             var fromDate = dateRangeEach[0].trim();
             var toDate = dateRangeEach[1].trim();

             var fromDate = fromDate+" 00:00:00";
             var toDate = toDate+" 23:59:59";

             document.getElementById("fromDate").value = fromDate;
             document.getElementById("toDate").value = toDate;

        }




    </script>
@endsection

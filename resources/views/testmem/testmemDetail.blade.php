@extends('../layouts/master')
@section('style')
    <style>
        table{
            border-collapse: collapse;
            border: 2px solid steelblue;
            background-color: antiquewhite;
            margin: 2px;
        }
        #wrap{
            margin: 5px 20px;
        }
        #caption_name{
            font-size: 30px;
            color: steelblue;
        }

        .button{
            background-color: darkslategray;
            border-radius:15px;
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
        .checkBox{
            background-color: tan;
            border-radius: 5px;
            border: 1px solid #777;
            padding: 5px;
            color: #1a202c;
            text-decoration:none;
        }
        th, td{

            height:38px;
        }
        th{
            width:200px;
        }
        td{
            width:320px;
        }
        .texttype{
            font-size: 18px;
            height:30px;
        }
        .regtext{
            color: red;
            font-size:12px;
        }

    </style>
@endsection

@section('content')

{{--    {{$items}}--}}
{{--    @if($items->id>0:'PUT':'POST')--}}
    <div id="wrap">
        <table border="2">

            <caption id="caption_name">testmem Detail</caption>
            <form method="post" name="libForm" id="libForm" action="{{Route('testmemDetail',['id'=>$id])}}" onsubmit="return formCheck();">
                @csrf
                {{ $id > 0 ? method_field( 'put' ):method_field( 'post' ) }}
{{--                {{ debug(Route('testmemDetail',['id'=>$id])) }}--}}
                <tr>
                    <th>확인용 primary id</th>

                    <td>{{ $id > 0 ? $id : '추가' }}</td>
                </tr>
                <tr>
                    <th>User ID<div><span class="regtext" id="reguserid"><span class="sub_regtext"></span></span></div></th>
                    <td><input type="text" class="texttype dd fname" name="userid" id="userid" placeholder="영문으로 입력하세요." value="{{ $id>0 ? $items->userid : '' }}"></td>
                </tr>
                <tr>
                    <th>Name<div><span class="regtext" id="regname"><span class="sub_regtext"></span></span></div></th>
                    <td><input type="text" class="texttype dd fname" name="name" id="name" value="{{ $id>0 ? $items->name : '' }}"></td>
                </tr>
                <tr>
                    <th>Phone<div><span class="regtext" id="regphone"><span class="sub_regtext"></span></span></div></th>
                    <td><input type="text" class="texttype dd fname" name="phone" id="phone" value="{{ $id>0 ? $items->phone : '' }}"></td>
                </tr>
                <tr>
                    <th>E-MAIL<div><span class="regtext" id="regemail"><span class="sub_regtext"></span></span></div></th>
                    <td><input type="text" class="texttype dd fname" name="email" id="email" value="{{ $id>0 ? $items->email : '' }}">
                    <input type="button" class="checkBox" onclick="ajaxEmail()" value="이메일 확인">
                    </td>

                </tr>
{{--                <tr>--}}
{{--                    <th>Auth<div><span class="regtext" id="regauth"></span></div></th>--}}
{{--                    <td><input type="text" class="texttype dd fname" name="auth" id="auth" placeholder="1~9 숫자 중 입력하세요." value="{{ $id>0 ? $items->auth : '' }}"></td>--}}
{{--                </tr>--}}



                    <tr>
                        <th>Auth<div><span class="regtext" id="regauth"></span></div></th>
                        <td>
                            <select class="texttype dd" name="auth">
                                <option value="">선택</option>
                                @for ($i = 1; $i<10; $i++)
                                    <option value="{{ $id>0 ? $items->auth : '' }}">{{$i}}</option>
                                @endfor
                            </select>
                        </td>
                    </tr>




        </table>
            <br>
            @if ($id > 0 )
                <button type ="submit" class="button">수정하기</button>

{{--            <form method="post" action="{{Route('testmemDelete',['id'=>$id])}}">--}}
{{--                    <input type="hidden" class="texttype" name="userid" value="{{ $id>0 ? $items->userid : '' }}">--}}
{{--                    <input type="hidden" class="texttype" name="name" value="{{ $id>0 ? $items->name : '' }}">--}}
{{--                    <input type="hidden" class="texttype" name="phone" value="{{ $id>0 ? $items->phone : '' }}">--}}
{{--                    <input type="hidden" class="texttype" name="email" value="{{ $id>0 ? $items->email : '' }}">--}}

{{--                <button type ="submit" class="button">삭제하기</button>--}}
{{--            </form>--}}
            @else
                <button type ="submit" class="button">추가하기</button>
            @endif

            </form>

            @if($id > 0)
            <form method="post" action="{{Route('testmemDelete',['id'=>$id])}}">
                @csrf
                {{method_field('delete')}}
                    <input type="hidden" class="texttype" name="userid" value="{{ $id>0 ? $items->userid : '' }}">
                    <input type="hidden" class="texttype" name="name" value="{{ $id>0 ? $items->name : '' }}">
                    <input type="hidden" class="texttype" name="phone" value="{{ $id>0 ? $items->phone : '' }}">
                    <input type="hidden" class="texttype" name="email" value="{{ $id>0 ? $items->email : '' }}">
                    <input type="hidden" class="texttype" name="auth" value="{{ $id>0 ? $items->auth : '' }}">

                <button type ="submit" class="button">삭제하기</button>
            </form>
            @endif
    </div>

@endsection

@section('script')
<script type="text/javascript">

    var t = document.getElementById("auth").value;
    console.log(t);

    // $(".dd").each(function(){
    //     const dd = $(this);
    //     let val = dd.val();
    //     let name = dd.attr('name');
    //     dd(name);
    //     console.log(val, name);
    // });
    //
    // function dd(name){
    //     let qq;
    //     switch (name) {
    //         case 'email':
    //             qq =/^[A-Za-z0-9+]*$/;
    //             break;
    //     }
    //     return qq;
    // }




    $(document).ready(function(){

        function ss(name = null, val = null){
            // console.log(val, name, getPattern(name))
            if( getPattern(name).test(val) ){
                return true;
            } else {
                return false;
            }
        }

        //
        // $('.fname').blur(function () {
        //     let val = $(this).val();
        //     let name = $(this).attr('name');
        //     let idname = $("#reg" + name);
        //
        //     let tt = idname.children();
        //     if(ss(name, val)){
        //         tt.html("올바른 형식입니다.");
        //         return true;
        //     } else {
        //         if(val==""){
        //             tt.html("값을 입력해주세요.");
        //             return false;
        //         }else{
        //             tt.html("올바른 형식이 아닙니다.");
        //             return false;
        //         }
        //     }
        // });

        $(".fname").each(function() {
            const fname = $(this);
            let val = fname.val();
            let name = fname.attr('name');
            //console.log(val, name);
            //let regPattern = getPattern(name);
            //console.log(regPattern);

            /*
            if(ss(name, val)){
                $(fname).blur(function () {
                    let val = fname.val();
                    let name = fname.attr('name');
                    let regPattern = getPattern(name);
                    //console.log(regPattern);
                    let idname = $("#reg" + name);
                    //idname.append("<span>올바른 형식입니다.</span>");

                    // console.log(idname);
                    //
                    //console.log(ss(name, val));
                    //여기서 받아온다음에 true면 아랫것 실행하고
                    // cnosole.log(ss(name, val) == true);
                    if(ss(name, val) == true)
                    {
                        idname.append("<span>올바른 형식입니다.</span>");
                        return false;
                    }
                    else{
                       if(val ==""){
                           $(idname).append("<span>입력해주세요.</span>");
                           return false;
                       }else if(!regPattern.test(val)){


                           $(idname).append("<span>올바른 형식이 아닙니다.</span>");
                           return false;
                       }else {
                           return false;

                       }
                    }
                });
            }
*/
       });
    });

    // $(".fname").each(function(){
    //     const fname = $(this);
    //     let val = fname.val();
    //     let name = fname.attr('name');
    //     //console.log(val, name);
    //     getPattern(name);
    // });

    function getPattern(name){
        let pattern;
        switch(name){
            case 'userid':
                pattern = /^[A-Za-z0-9+]*$/;
                break;
            case 'name':
                pattern = /^[가-힣a-zA-Z]+$/;
                break;
            case 'phone':
                pattern = /^\d{3}-?\d{3,4}-?\d{4}$/;
                break;
            case 'email':
                pattern = /^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*.[a-zA-Z]{2,3}$/i;
                break;
            case 'auth':
                pattern = /^[1-9]{1}$/;
                break;
        }
        return pattern;
    }


    function formCheck(){

        if(checkUserId()&&checkName()&&checkPhone()&&checkEmail()&&checkAuth()){
            return true;
        }else{
            alert("형식을 확인해주세요.");
            return false;
        }
    }

    //유효성체크
    // $(document).ready(function(){
    //     //var form = document.libForm;
    //     $("#userid").blur(function(){
    //         checkUserId();
    //     });
    //     $("#name").blur(function(){
    //         checkName();
    //     });
    //     $("#phone").blur(function(){
    //         checkPhone();
    //     });
    //     $("#email").blur(function(){
    //         checkEmail();
    //     });
    //     $("#auth").blur(function(){
    //         checkAuth();
    //     });
    // });
    //
    // function checkUserId(){
    //     var form = document.libForm;
    //     var userid = $("#userid").val();
    //     var isUserId =/^[A-Za-z0-9+]*$/;
    //     if(userid==""){
    //         //$("#reguserid").text('사용아이디를 입력해주세요.');
    //         //form.userid.focus();
    //         return false;
    //     }else if(!isUserId.test(form.userid.value)){
    //         //$("#reguserid").text('영문,숫자로 입력해주세요.');
    //         //form.userid.focus();
    //         return false;
    //     }else{
    //         $("#reguserid").text('올바른 형식입니다.');
    //         return true;
    //     }
    // }
    //
    // function checkName(){
    //     var form = document.libForm;
    //     var name = $("#name").val();
    //     var isName = /^[가-힣a-zA-Z]+$/;
    //     if(name==""){
    //         $("#regname").text('이름을 입력해주세요.');
    //         //form.name.focus();
    //         return false;
    //     }else if(!isName.test(form.name.value)){
    //         $("#regname").text('한글 or 영어로 입력해주세요.');
    //         //form.name.focus();
    //         return false;
    //     }else{
    //         $("#regname").text('올바른 형식입니다.');
    //         return true;
    //     }
    // }
    //
    // function checkPhone(){
    //     var form = document.libForm;
    //     var phone = $("#phone").val();
    //     var isPhone = /^\d{3}-?\d{3,4}-?\d{4}$/;
    //     if(phone==""){
    //         $("#regphone").text('핸드폰 번호를 입력해주세요.');
    //         //form.phone.focus();
    //         return false;
    //     }else if(!isPhone.test(form.phone.value)){
    //         $("#regphone").text('올바른 형식으로 입력해주세요.');
    //         //form.phone.focus();
    //         return false;
    //     }else{
    //         $("#regphone").text('올바른 형식입니다.');
    //         return true;
    //     }
    // }
    //
    // function checkEmail(){
    //     var form = document.libForm;
    //     var email = $("#email").val();
    //     var isEmail = /^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*.[a-zA-Z]{2,3}$/i;
    //     if(email==""){
    //         $("#regemail").text('이메일 주소를 입력해주세요.');
    //         //form.email.focus();
    //         return false;
    //     }else if(!isEmail.test(form.email.value)){
    //         $("#regemail").text('올바른 형식으로 입력해주세요.');
    //         //form.email.focus();
    //         return false;
    //     }else{
    //         $("#regemail").text('올바른 형식입니다.');
    //         return true;
    //     }
    // }
    //
    // function checkAuth(){
    //     var form = document.libForm;
    //     var auth = $("#auth").val();
    //     var isAuth = /^[1-9]{1}$/;
    //     if(auth==""){
    //         $("#regauth").text('권한을 입력해주세요.');
    //         //form.auth.focus();
    //         return false;
    //     }else if(!isAuth.test(form.auth.value)){
    //         $("#regauth").text('1~9 숫자 중 입력하세요.');
    //         //form.auth.focus();
    //         return false;
    //     }else{
    //         $("#regauth").text('올바른 형식입니다.');
    //         return true;
    //     }
    // }
    //


    //ajaxEmail
    // function ajaxEmail(){
    //     if(!$("#email").val()){
    //         alert('이메일을 입력해주세요.');
    //         document.libForm.email.focus();
    //         return false;
    //     }
    //
    //     $.ajax({
    //
    //     })
    // }
</script>

@endsection

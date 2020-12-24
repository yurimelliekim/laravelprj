<script type="text/javascript">

    //var t = document.getElementsByName("auth");


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
        // $(idname).remove();

        $('.fname').blur(function () {
            let val = $(this).val();
            let name = $(this).attr('name');
            let idname = $("#reg" + name);

            let tt = idname.children();
            if(ss(name, val)){
                tt.html("올바른 형식입니다.");
            } else {
                tt.html("올바른 형식이 아닙니다.");
            }
            // console.log(val, name);
        });

        /*$(".fname").each(function() {
            const fname = $(this);
            let val = fname.val();
            let name = fname.attr('name');
            //console.log(val, name);
            //let regPattern = getPattern(name);
            //console.log(regPattern);
            if(ss(name, val)){
                $(fname).blur(function () {
                    let val = fname.val();
                    let name = fname.attr('name');
                    let regPattern = getPattern(name);
                    //console.log(regPattern);
                    let idname = $("#reg" + name);
                    idname.append("<span>올바른 형식입니다.</span>");

                    // console.log(idname);
                    //
                    //console.log(ss(name, val));
                    //여기서 받아온다음에 true면 아랫것 실행하고
                    // cnosole.log(ss(name, val) == true);
                    /!*if(ss(name, val) == true)
                    {
                        idname.append("<span>올바른 형식입니다.</span>");
                        return false;
                    }*!/
                    /!*else{
                       if(val ==""){
                           $(idname).append("<span>입력해주세요.</span>");
                           return false;
                       }else if(!regPattern.test(val)){


                           $(idname).append("<span>올바른 형식이 아닙니다.</span>");
                           return false;
                       }else {
                           return false;

                       }
                    }*!/
                });
            }

       });*/
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




</script>

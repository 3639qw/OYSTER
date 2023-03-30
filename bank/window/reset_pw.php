<style>
    .login_box{
        height: 95%;
        width: 80%;
        /*border-radius: 10px;*/
        border: none;
        outline: none;
        background-color: #e0e5ec;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        box-shadow: inset 8px 8px 30px #c1c1c1,
        inset -8px -8px 30px #ffffff;
    }

    .logo{
        background: url("img/bank.png");
        width: 96px;
        height: 96px;
        border-radius: 96px;
        margin: 0 auto;
        box-shadow: 0px 0px 2px #5f5f5f,
        0px 0px 0px 5px #ecf0f3,
        8px 8px 15px #a7aaaf,
        -8px -8px 15px #fff;
    }
    .title{
        text-align: center;
        font-size: 28px;
        padding-top: 24px;
        letter-spacing: 0.5px;
    }
    .sub_title{
        text-align: center;
        font-size: 15px;
        padding-top: 7px;
        letter-spacing: 3px;
    }

    .fields{
        width: 100%;
        padding: 75px 5px 5px 5px;
    }
    .fields input{
        border: none;
        outline: none;
        background: none;
        font-size: 18px;
        color: #555;
        padding: 20px; 10px 20px 5px;
        width: 200px;
    }
    .username,.password{
        margin-bottom: 30px;
        border-radius: 25px;
        box-shadow: inset 8px 8px 8px #cbced1,
        inset -8px -8px 8px #fff;
    }
    .username::placeholder{
        font-style: italic;
    }
    .fields svg{
        height: 22px;
        margin: 0 10px -3px 25px;
    }
    .signin_button{
        outline: none;
        border: none;
        cursor: pointer;
        width: 100%;
        height: 60px;
        border-radius: 30px;
        font-size: 20px;
        font-weight: 700;
        color: #FFFFFF;
        text-align: center;
        background-color: #02c8db;
        box-shadow: 3px 3px 8px #b1b1b1,
        -3px -3px 8px #FFFFFF;
        transition: all 0.5s;
    }
    .signin_button:hover{
        background-color: #50e5b9;
    }
    .signin_button:active{
        background-color: #88ef9e;
    }
    .link{
        padding-top: 20px;
        text-align: center;
    }
    .link a{
        text-decoration: none;
        color: #aaa;
        font-size: 15px;
    }

    .checkbox{
        display: none;
        opacity: 0;
        visibility: hidden;
    }
    .label-checkbox{
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        cursor: pointer;
        background: #cfcfcf;
        box-shadow: 5px 5px 10px #9b9b9b,
                    -5px -5px 10px #e3e3e3,
                    inset 0px 0px 0px #9b9b9b,
                    inset 0px 0px 0px #e3e3e3;
        transition: box-shadow 0.4s linear,
        background-color 0.4s linear;
    }
    .checkbox:checked ~ .label-checkbox{
        box-shadow: 0px 0px 0px #9b9b9b,
                    0px 0px 0px #e3e3e3,
                    inset 5px 5px 10px #9b9b9b,
                    inset -5px -5px 10px #e3e3e3;
    }
    .label-checkbox::before,
    .label-checkbox::after{
        content: '';
        position: absolute;
        width: 37.5px;
        height: 6.25px;
        border-radius: 50px;
        background-color: #2bc664;
        transition: transform 0.4s linear,
        width 0.4s linear;
    }
    .label-checkbox::before{
        transform: rotate(-45deg) translate(4px,4px);
        width: 32px;
    }
    .label-checkbox::after {
        transform: rotate(45deg) translate(-2.75px,8.75px);
        width: 18.75px;
    }
    .checkbox:checked ~ .label-checkbox::before{
        width: 37.5px;
        transform: rotate(-45deg) translate(0px,0px);
        background-color: #e73e3e;
    }
    .checkbox:checked ~ .label-checkbox::after{
        width: 37.5px;
        transform: rotate(45deg) translate(0px,0px);
        background-color: #e73e3e;
    }
</style>
<script>
    function Check(){
        // 성명 검증
        if($("input[name=name]").val() == '' || $("input[name=name]").val() == ''){
            alert('성명(법인명)을 입력해주세요');
            $("input[name=name]").focus();
            return false;
        }
        // 신분확인번호 검증
        if($("input[name=id]").val() == '' || $("input[name=id]").val() == null){
            alert('신분확인번호를 입력해주세요');
            $("input[name=id]").focus();
            return false;
        }
        // 재설정할 비밀번호 검증
        if($("input[name=pw]").val() == '' || $("input[name=pw]").val() == null){
            alert('재설정할 비밀번호를 입력해주세요');
            $("input[name=pw]").focus();
            return false;
        }

        return true;
    }

</script>
<div class="login_box" style="box-shadow: none;">
    <div class="logo"></div>
    <div class="title" style="font-weight: 800;">비밀번호 재설정</div>

    <form name="signin_form" id="signin_form" method="post" action="../bank/login/pw_action.php">
        <div class="fields">
            <div class="username">
                <svg class="svg-icon" viewBox="0 0 20 20">
                    <path d="M12.075,10.812c1.358-0.853,2.242-2.507,2.242-4.037c0-2.181-1.795-4.618-4.198-4.618S5.921,4.594,5.921,6.775c0,1.53,0.884,3.185,2.242,4.037c-3.222,0.865-5.6,3.807-5.6,7.298c0,0.23,0.189,0.42,0.42,0.42h14.273c0.23,0,0.42-0.189,0.42-0.42C17.676,14.619,15.297,11.677,12.075,10.812 M6.761,6.775c0-2.162,1.773-3.778,3.358-3.778s3.359,1.616,3.359,3.778c0,2.162-1.774,3.778-3.359,3.778S6.761,8.937,6.761,6.775 M3.415,17.69c0.218-3.51,3.142-6.297,6.704-6.297c3.562,0,6.486,2.787,6.705,6.297H3.415z"></path>
                </svg>
                <input type="username" class="user-input" name="name" placeholder="성명 또는 법인명">
            </div>
            <div class="password">
                <svg class="svg-icon" viewBox="0 0 20 20">
                    <path d="M8.749,9.934c0,0.247-0.202,0.449-0.449,0.449H4.257c-0.247,0-0.449-0.202-0.449-0.449S4.01,9.484,4.257,9.484H8.3C8.547,9.484,8.749,9.687,8.749,9.934 M7.402,12.627H4.257c-0.247,0-0.449,0.202-0.449,0.449s0.202,0.449,0.449,0.449h3.145c0.247,0,0.449-0.202,0.449-0.449S7.648,12.627,7.402,12.627 M8.3,6.339H4.257c-0.247,0-0.449,0.202-0.449,0.449c0,0.247,0.202,0.449,0.449,0.449H8.3c0.247,0,0.449-0.202,0.449-0.449C8.749,6.541,8.547,6.339,8.3,6.339 M18.631,4.543v10.78c0,0.248-0.202,0.45-0.449,0.45H2.011c-0.247,0-0.449-0.202-0.449-0.45V4.543c0-0.247,0.202-0.449,0.449-0.449h16.17C18.429,4.094,18.631,4.296,18.631,4.543 M17.732,4.993H2.46v9.882h15.272V4.993z M16.371,13.078c0,0.247-0.202,0.449-0.449,0.449H9.646c-0.247,0-0.449-0.202-0.449-0.449c0-1.479,0.883-2.747,2.162-3.299c-0.434-0.418-0.714-1.008-0.714-1.642c0-1.197,0.997-2.246,2.133-2.246s2.134,1.049,2.134,2.246c0,0.634-0.28,1.224-0.714,1.642C15.475,10.331,16.371,11.6,16.371,13.078M11.542,8.137c0,0.622,0.539,1.348,1.235,1.348s1.235-0.726,1.235-1.348c0-0.622-0.539-1.348-1.235-1.348S11.542,7.515,11.542,8.137 M15.435,12.629c-0.214-1.273-1.323-2.246-2.657-2.246s-2.431,0.973-2.644,2.246H15.435z"></path>
                </svg>
                <input type="password" class="pass-input" name="id" placeholder="신분확인번호" maxlength="13" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
            </div>
            <div class="password">
                <svg class="svg-icon" viewBox="0 0 20 20">
                    <path d="M17.308,7.564h-1.993c0-2.929-2.385-5.314-5.314-5.314S4.686,4.635,4.686,7.564H2.693c-0.244,0-0.443,0.2-0.443,0.443v9.3c0,0.243,0.199,0.442,0.443,0.442h14.615c0.243,0,0.442-0.199,0.442-0.442v-9.3C17.75,7.764,17.551,7.564,17.308,7.564 M10,3.136c2.442,0,4.43,1.986,4.43,4.428H5.571C5.571,5.122,7.558,3.136,10,3.136 M16.865,16.864H3.136V8.45h13.729V16.864z M10,10.664c-0.854,0-1.55,0.696-1.55,1.551c0,0.699,0.467,1.292,1.107,1.485v0.95c0,0.243,0.2,0.442,0.443,0.442s0.443-0.199,0.443-0.442V13.7c0.64-0.193,1.106-0.786,1.106-1.485C11.55,11.36,10.854,10.664,10,10.664 M10,12.878c-0.366,0-0.664-0.298-0.664-0.663c0-0.366,0.298-0.665,0.664-0.665c0.365,0,0.664,0.299,0.664,0.665C10.664,12.58,10.365,12.878,10,12.878"></path>
                </svg>
                <input type="password" class="pass-input" name="pw" placeholder="재설정할 비밀번호" maxlength="20" oninput="this.value = this.value.replace(/[^a-z0-9]/gi,'')">
            </div>

        </div>
        <button onclick="return Check()" class="signin_button">비밀번호 재설정</button>
    </form>
    <div class="link">
        <a href="/bank">로그인</a>
    </div>
</div>
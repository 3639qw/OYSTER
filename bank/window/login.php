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
</style>
<div class="login_box" style="box-shadow: none;">
    <div class="logo"></div>
    <div class="title" style="font-weight: 800;">온라인은행</div>
    <div class="sub_title" style="font-weight: 600">Direct Bank</div>
    <form name="signin_form" id="signin_form" method="post" action="../bank/login/login_action.php">
        <div class="fields">
            <div class="username">
                <svg class="svg-icon" viewBox="0 0 20 20">
                    <path d="M12.075,10.812c1.358-0.853,2.242-2.507,2.242-4.037c0-2.181-1.795-4.618-4.198-4.618S5.921,4.594,5.921,6.775c0,1.53,0.884,3.185,2.242,4.037c-3.222,0.865-5.6,3.807-5.6,7.298c0,0.23,0.189,0.42,0.42,0.42h14.273c0.23,0,0.42-0.189,0.42-0.42C17.676,14.619,15.297,11.677,12.075,10.812 M6.761,6.775c0-2.162,1.773-3.778,3.358-3.778s3.359,1.616,3.359,3.778c0,2.162-1.774,3.778-3.359,3.778S6.761,8.937,6.761,6.775 M3.415,17.69c0.218-3.51,3.142-6.297,6.704-6.297c3.562,0,6.486,2.787,6.705,6.297H3.415z"></path>
                </svg>
                <input type="username" class="user-input" name="id" placeholder="아이디">
            </div>
            <div class="password">
                <svg class="svg-icon" viewBox="0 0 20 20">
                    <path d="M17.308,7.564h-1.993c0-2.929-2.385-5.314-5.314-5.314S4.686,4.635,4.686,7.564H2.693c-0.244,0-0.443,0.2-0.443,0.443v9.3c0,0.243,0.199,0.442,0.443,0.442h14.615c0.243,0,0.442-0.199,0.442-0.442v-9.3C17.75,7.764,17.551,7.564,17.308,7.564 M10,3.136c2.442,0,4.43,1.986,4.43,4.428H5.571C5.571,5.122,7.558,3.136,10,3.136 M16.865,16.864H3.136V8.45h13.729V16.864z M10,10.664c-0.854,0-1.55,0.696-1.55,1.551c0,0.699,0.467,1.292,1.107,1.485v0.95c0,0.243,0.2,0.442,0.443,0.442s0.443-0.199,0.443-0.442V13.7c0.64-0.193,1.106-0.786,1.106-1.485C11.55,11.36,10.854,10.664,10,10.664 M10,12.878c-0.366,0-0.664-0.298-0.664-0.663c0-0.366,0.298-0.665,0.664-0.665c0.365,0,0.664,0.299,0.664,0.665C10.664,12.58,10.365,12.878,10,12.878"></path>
                </svg>
                <input type="password" class="pass-input" name="pw" placeholder="비밀번호">
            </div>
        </div>
        <button class="signin_button">로그인</button>
    </form>
    <div class="link">
        <a href="?login_fn=id">아이디 조회</a>&nbsp;&nbsp;&nbsp;<a href="?login_fn=pw">비밀번호 재설정</a>
    </div>
</div>
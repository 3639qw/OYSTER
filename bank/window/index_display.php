<style>
    .main_box{
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


    .main_box .top_box{
        width: 350px;
        height: 150px;

        border: none;
        outline: none;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        justify-content: space-between;
        flex-direction: row;
        align-items: start;

        /*background-color: #b60000;*/

    }
    .top_box .name{
        height: 50px;
        font-size: 20px;
        font-weight: 600;
        color: #31456A;
        border: none;
        outline: none;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;


        /*background-color: #00F8FF;*/
    }
    .top_box .button{
        width: 50px;
        height: 50px;
        border: none;
        outline: none;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        border-radius: 50%;
        background: rgb(243,243,244);
        box-shadow:  8px 8px 17px #d5d5d5,
        -8px -8px 17px #d5d5d5;

        /*background-color: #3a8dfd;*/
    }
    .top_box .button .svg_btn{
        height: 30px !important;
    }
    .top_box .button:hover{
        box-shadow:  5px 5px 44px #a1a1a1,
        -5px -5px 44px #ffffff;
        transition: 0.4s;
    }
    .top_box .button:active{
        background: #e0e0e0;
        box-shadow: inset 20px 20px 60px #bebebe,
        inset -20px -20px 60px #ffffff;
    }


    .main_box .balance_box{
        width: 380px;
        height: 120px;
        margin-top: 0px;

        border: none;
        outline: none;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;

        border-radius: 25px;
        background: #E8F0F8;
        box-shadow:  20px 20px 60px #bebebe,
        -20px -20px 60px #ffffff;
    }

    .balance_box .balance{
        /*background-color: #3a8dfd;*/

        width: 100%;
        padding-left: 30px;
        font-size: 25px;
        font-weight: 600;
        color: #31456A;


    }

    .button_container_vertical{
        width: 350px;
        height: 340px;

        margin-top: 40px;
        /*border: 1px solid #000000;*/
        outline: 0;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        justify-content: space-between;
        /*justify-content: center;*/
        flex-direction: column;
        align-items: flex-start;

    }

    .button_container_horizontal{
        height: 100px;
        width: 100%;

        border: none;
        outline: none;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        justify-content: space-around;
        flex-direction: row;
        align-items: start;

        /*background-color: #3a8dfd;*/
    }

    .button_container_horizontal .button_area{
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        /*justify-content: center;*/
        flex-direction: column;
        align-items: center;
        height: 100%;
        width: 70px;
        /*background-color: #b60000;*/
    }

    .button_area .button{
        width: 100%;
        height: 70%;
        border: none;
        outline: none;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        border-radius: 50%;


        background: #f7faff;
        /*box-shadow:  8px 8px 17px #9ec5d3,*/
        /*-8px -8px 17px #d5d5d5;*/
        box-shadow: 8px 8px 17px #d1d1d1,
                    -8px -8px 17px #d5d5d5;


    }
    .button_area .button:hover{
        background: #e5faff;
        /*box-shadow:  5px 5px 44px #a1a1a1,*/
        /*-5px -5px 44px #ffffff;*/
        /*border-radius: 50%;*/
        transition: 0.4s;
    }

    .button_area .button:active{
        background: #aad0f5;
        /*box-shadow: inset 20px 20px 60px #bebebe,*/
        /*inset -20px -20px 60px #ffffff;*/
    }

    .button_area .text{
        width: 100%;
        height: 30%;

        font-size: 15px;
        font-weight: 600;

        border: none;
        outline: none;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
    }

    .svg_btn{
        height: 35px;
    }

    .svg_btn path,
    .svg_btn polygon,
    .svg_btn rect {
        fill: #31456A;
    }

    .svg_btn circle {
        stroke: #a4a4a4;
        stroke-width: 1;
    }

</style>
<div class="main_box" style="box-shadow: none;">
    <div class="top_box">
        <div class="name">
            <?=$_SESSION['name']?>님
        </div>
        <div class="button" onclick="location.href='?log=out'">
            <svg class="svg_btn" viewBox="0 0 20 20">
                <path style="fill: #B0B0B0;" fill="none" d="M8.388,10.049l4.76-4.873c0.303-0.31,0.297-0.804-0.012-1.105c-0.309-0.304-0.803-0.293-1.105,0.012L6.726,9.516c-0.303,0.31-0.296,0.805,0.012,1.105l5.433,5.307c0.152,0.148,0.35,0.223,0.547,0.223c0.203,0,0.406-0.08,0.559-0.236c0.303-0.309,0.295-0.803-0.012-1.104L8.388,10.049z"></path>
            </svg>
        </div>
    </div>
    <div class="balance_box" style="margin-top: -20px;">
        <div class="balance">
            <a style="font-size: 15px; font-weight: 600">입출금 잔액</a><br>
            ₩ <?=number_format($account_lst['wd_Balance_sum'])?>
        </div>
    </div>
    <div class="balance_box" style="height: 80px; background: #f8faff; margin-top: 20px;">
        <div class="balance">
            <a style="font-size: 15px; font-weight: 600">내일 받을 이자</a><br>
            <a style="font-size: 20px;">₩<?=number_format('2159')?></a>
        </div>
    </div>
    <div class="button_container_vertical">
        <div class="button_container_horizontal">
            <div class="button_area">
                <div class="button" onclick="location.href='?log=ac'">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-cash svg_btn" viewBox="0 0 16 16">
                        <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                        <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z"/>
                    </svg>
                </div>
                <div class="text">
                    전체계좌
                </div>
            </div>
            <div class="button_area">
                <div class="button" onclick="location.href='?log=transfer'">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-send svg_btn" viewBox="0 0 16 16">
                        <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
                    </svg>
                </div>
                <div class="text">
                    계좌이체
                </div>
            </div>
            <div class="button_area">
                <div class="button" onclick="location.href='?log=credit'">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-coin svg_btn" viewBox="0 0 16 16">
                        <path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9H5.5zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518l.087.02z"/>
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M8 13.5a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11zm0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"/>
                    </svg>
                </div>
                <div class="text">
                    신용한도
                </div>
            </div>
        </div>
        <div class="button_container_horizontal">
            <div class="button_area">
                <div class="button" onclick="location.href='?log=manage_ac'">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-gear svg_btn" viewBox="0 0 16 16">
                        <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                        <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                    </svg>
                </div>
                <div class="text">
                    계좌관리
                </div>
            </div>
            <div class="button_area">
                <div class="button" onclick="location.href='?log=my'">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person-fill svg_btn" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                    </svg>
                </div>
                <div class="text">
                    MY
                </div>
            </div>
            <div class="button_area">
                <div class="button" onclick="location.href='?log=mall'">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-cart2 svg_btn" viewBox="0 0 16 16">
                        <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                    </svg>
                </div>
                <div class="text">
                    상품몰
                </div>
            </div>
        </div>
        <div class="button_container_horizontal">

        </div>
    </div>
</div>
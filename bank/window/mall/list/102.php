<?php
$product = $bank_lib->ac_list->Product_List();
?>
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
        justify-content: flex-start;
        flex-direction: column;
        align-items: center;
        box-shadow: inset 8px 8px 30px #c1c1c1,
        inset -8px -8px 30px #ffffff;
    }

    .main_box .top_box{
        width: 125%;
        height: auto;
        border: none;
        outline: none;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        justify-content: space-between;
        flex-direction: column;
        align-items: flex-start;
        margin-top: -21px;
        background-color: #dbe4ff;
        border-radius: 30px 30px 0 0;

    }
    .top_box .container_vertical{
        width: 100%;
        /*background-color: #e8efff;*/

        /*margin-top: 40px;*/
        /*border: 1px solid #000000;*/
        outline: 0;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        align-items: center;

        /*flex-direction: row;*/
        /*justify-content: space-around;*/
        /*align-items: center;*/
    }
    .top_box .container_vertical .container_horizontal{
        height: 100%;

        border: none;
        outline: none;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        justify-content: flex-start;
        flex-direction: column;
        align-items: flex-start;

        /*background-color: #3a8dfd;*/
    }


    .top_box .sub_menu{
        width: 100%;

        border: none;
        outline: none;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        justify-content: start;
        flex-direction: row;
        align-items: center;
    }

    .sub_menu .sub_txt{
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

        width: 295px;
        height: 100%;
        /*background-color: #3a8dfd;*/
    }

    .top_box .item .svg_btn{
        color: #F9FFFF;
        width: 70px;
        height: 45px;
        padding: 5px 0 5px 0;
    }

    .top_box .button{
        width: 40px;
        height: 40px;
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
    }
    .top_box .button .svg_btn{
        height: 45px !important;
    }
    .top_box .button .svg_btn path,
    .top_box .button .svg_btn polygon,
    .top_box .button .svg_btn rect {
        fill: #31456A;
    }


    .ac_container_vertical{
        width: 350px;
        height: 560px;

        margin-top: 20px;
        /*border: 1px solid #000000;*/
        outline: 0;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        justify-content: flex-start;
        /*justify-content: center;*/
        flex-direction: column;
        align-items: flex-start;

        /*background-color: #b60000;*/

    }

    .ac_container_horizontal{
        /*height: 80px;*/
        width: 100%;

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

        /*background-color: #3a8dfd;*/

    }

    .ac_container_horizontal .text{
        font-size: 1.0em;
        font-weight: 300;
        letter-spacing: 2px;
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
    }

    .ac_container_horizontal .ac_list{
        width: 100%;
        height: 100%;
        font-size: 1.0em;
        font-weight: 300;
        letter-spacing: 2px;
        color: #31456A;
        border: none;
        outline: none;

        overflow-y: scroll;
        -ms-overflow-style: none; /* IE and Edge */
        scrollbar-width: none; /* Firefox */


        /*background: #F8FAFF;*/
        /*box-shadow:  5px 5px 16px #c7c7c7,*/
        /*-5px -5px 16px #f9f9f9;*/
    }
    .ac_container_horizontal .ac_list::-webkit-scrollbar {
        display: none; /* Chrome, Safari, Opera*/
    }

    .ac_list .account{
        /*height: 80px;*/
        width: 100%;

        border: none;
        outline: none;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        justify-content: start;
        flex-direction: row;
        align-items: center;

        margin-bottom: 0px;
        /*background: #F8FAFF;*/
    }

    .account .ac_num_container{
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

        width: 295px;
        height: 100%;
        letter-spacing: 0.5px;
        font-size: 13px;
        /*background-color: #3a8dfd;*/
    }

    .ac_container_horizontal .confirm{
        border: hidden;
        width: 350px;
        height: 50px;
        letter-spacing: 2px;
        border-radius: 30px;
        font-size: 18px;
        font-weight: 700;
        color: #FFFFFF;
        text-align: center;
        background-color: #02c8db;
        box-shadow: 3px 3px 8px #b1b1b1,
        -3px -3px 8px #FFFFFF;
        transition: all 0.5s;
    }

    .confirm:hover{
        background-color: #50e5b9;
    }

    .confirm:active{
        background-color: #88ef9e;
    }

    .svg_btn{
        height: 23px;
        margin: 0 10px 0 15px;
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
        <div class="container_vertical" style="height: 40px; margin-top: 40px;">
            <div class="container_horizontal" style="width: 50%; color: #F9FFFF; font-family: 'LINESeedKR-Bd';">
                <div style="font-size: 20px; font-weight: 600; letter-spacing: 2px; color: #31456A; background: transparent;">
                    <?=$product['product'][$product['product_key'][$_GET['code']]]?>
                </div>
            </div>
            <div class="container_horizontal button" onclick="history.back()">
                <svg class="svg_btn" viewBox="0 0 20 20">
                    <path fill="none" d="M8.388,10.049l4.76-4.873c0.303-0.31,0.297-0.804-0.012-1.105c-0.309-0.304-0.803-0.293-1.105,0.012L6.726,9.516c-0.303,0.31-0.296,0.805,0.012,1.105l5.433,5.307c0.152,0.148,0.35,0.223,0.547,0.223c0.203,0,0.406-0.08,0.559-0.236c0.303-0.309,0.295-0.803-0.012-1.104L8.388,10.049z"></path>
                </svg>
            </div>
        </div>
        <div class="container_vertical" style="width: 15%; height: 5px; margin-left: 50px; background: #31456A;">

        </div>
        <div class="sub_menu" style="width: auto; height: 40px; margin-left: 50px; margin-top: 10px;">
            <div style="width: 45px;">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person svg_btn" viewBox="0 0 16 16">
                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                </svg>
            </div>
            <div class="sub_txt">
                <div style="width: 100%; height: auto; font-size: 13px; color: #31456A; font-weight: 800; letter-spacing: 2px;">
                    <?=$product['Product_Eligibility'][$product['product_key'][$_GET['code']]]?>
                </div>
            </div>
        </div>
        <div class="sub_menu" style="width: auto; height: 40px; margin-left: 50px;">
            <div style="width: 45px;">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-calendar svg_btn" viewBox="0 0 16 16">
                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                </svg>
            </div>
            <div class="sub_txt">
                <div style="width: 100%; height: auto; font-size: 13px; color: #31456A; font-weight: 800; letter-spacing: 2px;">
                    제한없음
                </div>
            </div>
        </div>
        <div class="sub_menu" style="width: auto; height: 40px; margin-left: 50px; margin-bottom: 15px;">
            <div style="width: 45px;">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-currency-dollar svg_btn" viewBox="0 0 16 16">
                    <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"/>
                </svg>
            </div>
            <div class="sub_txt">
                <div style="width: 100%; height: auto; font-size: 13px; color: #31456A; font-weight: 800; letter-spacing: 2px;">
                    <?=number_format($product['minimum'][$product['product_key'][$_GET['code']]]).'원 이상'?>
                </div>
            </div>
        </div>
    </div>
    <div class="ac_container_vertical" style="margin-top: 10px">
        <div class="ac_container_horizontal" style="height: auto;">
            <div class="ac_list">
                <div class="account" style="width: 100%; height: 35px;">
                    <div style="width: 80px; font-size: 15px; font-weight: 800;">
                        상품유형
                    </div>
                    <div class="ac_num_container">
                        <div style="width: 100%; height: auto; font-size: 12px; font-weight: 800; letter-spacing: 2px;">
                            입출금이 자유로운 예금
                        </div>
                    </div>
                </div>
                <div class="account" style="width: 100%; height: 35px;">
                    <div style="width: 80px; font-size: 15px; font-weight: 800;">
                        예금과목
                    </div>
                    <div class="ac_num_container">
                        <div style="width: 100%; height: auto; font-size: 12px; font-weight: 800; letter-spacing: 2px;">
                            <?=$product['sub'][$product['product_key'][$_GET['code']]]?>
                        </div>
                    </div>
                </div>
                <div class="account" style="width: 100%; height: 35px;">
                    <div style="width: 80px; font-size: 15px; font-weight: 800;">
                        금리
                    </div>
                    <div class="ac_num_container">
                        <div style="width: 100%; height: auto; font-size: 12px; font-weight: 800; letter-spacing: 2px;">
                            무이자
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ac_container_horizontal" style="height: 50px; margin-top: 395px;">
            <form name="ac_open" method="post" action="./">
                <input name="action" value="open_checking" hidden>
                <input name="product" value="<?=$product['product_code'][$product['product_key'][$_GET['code']]]?>" hidden>
                <button class="confirm">가입</button>
            </form>
        </div>
    </div>
</div>
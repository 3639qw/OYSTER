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
        height: 50px;

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
        font-size: 23px;
        font-weight: 600;
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
        height: 80px;
        margin-top: 20px;

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
        font-size: 20px;
        font-weight: 600;
        color: #31456A;


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

        margin-bottom: 20px;
        background: #F8FAFF;
        box-shadow:  5px 5px 16px #c7c7c7,
        -5px -5px 16px #f9f9f9;
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

    .svg_btn_2{
        height: 30px;
    }

    .svg_btn_2 path,
    .svg_btn_2 polygon,
    .svg_btn_2 rect {
        fill: #a4a4a4;
    }

    .svg_btn_2 circle {
        stroke: #a4a4a4;
        stroke-width: 1;
    }



    .svg_btn{
        height: 30px;
        margin: 0 10px 0 15px;
    }

    .svg_btn path,
    .svg_btn polygon,
    .svg_btn rect {
        fill: #a4a4a4;
    }

    .svg_btn circle {
        stroke: #a4a4a4;
        stroke-width: 1;
    }


</style>
<div class="main_box" style="box-shadow: none;">
    <div class="top_box">
        <div class="name">
            적립식 상품
        </div>
        <div class="button" onclick="location.href='/bank/?log=mall'">
            <svg class="svg_btn_2" viewBox="0 0 20 20">
                <path fill="none" d="M8.388,10.049l4.76-4.873c0.303-0.31,0.297-0.804-0.012-1.105c-0.309-0.304-0.803-0.293-1.105,0.012L6.726,9.516c-0.303,0.31-0.296,0.805,0.012,1.105l5.433,5.307c0.152,0.148,0.35,0.223,0.547,0.223c0.203,0,0.406-0.08,0.559-0.236c0.303-0.309,0.295-0.803-0.012-1.104L8.388,10.049z"></path>
            </svg>
        </div>
    </div>
    <div class="ac_container_vertical" style="margin-top: 120px">
        <div class="ac_container_horizontal" style="height: 550px;">
            <div class="ac_list">
                <?php
                foreach ($savings_product_list['checking_name'] as $key => $value){
                ?>
                <div class="account" onclick="location.href='?log=savings_mall&code=<?=$savings_product_list['product_code'][$key]?>'" style="width: 100%; height: 70px;">
                    <div class="ac_num_container">
                        <div style="width: 100%; height: auto; font-size: 15px; font-weight: 800; padding-left: 15px; letter-spacing: 2px;">
                            <?=$savings_product_list['product'][$key]?>
                        </div>
                        <div style="width: 100%; height: auto; font-size: 12px; font-weight: 800; padding-left: 15px; letter-spacing: 2px;">
                            <?=$savings_product_list['sub'][$key].' ('.$savings_product_list['Product_Eligibility'][$key].')'?>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
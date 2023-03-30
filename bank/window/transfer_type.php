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

    .button_container_vertical{
        width: 380px;
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

        /*background: #d4fa82;*/

    }

    .button_container_horizontal{
        height: 110px;
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
        width: 80px;
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
        background: rgb(243,243,244);
        box-shadow:  8px 8px 17px #d5d5d5,
        -8px -8px 17px #d5d5d5;
    }
    .button_area .button:hover{
        box-shadow:  5px 5px 44px #a1a1a1,
        -5px -5px 44px #ffffff;
        transition: 0.4s;
    }
    .button_area .button:active{
        background: #e0e0e0;
        box-shadow: inset 20px 20px 60px #bebebe,
        inset -20px -20px 60px #ffffff;
    }

    .button_area .text{
        width: 100%;
        height: 30%;

        font-size: 12px;
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
            계좌이체
        </div>
        <div class="button" onclick="location.href='/bank'">
            <svg class="svg_btn" viewBox="0 0 20 20">
                <path fill="none" d="M8.388,10.049l4.76-4.873c0.303-0.31,0.297-0.804-0.012-1.105c-0.309-0.304-0.803-0.293-1.105,0.012L6.726,9.516c-0.303,0.31-0.296,0.805,0.012,1.105l5.433,5.307c0.152,0.148,0.35,0.223,0.547,0.223c0.203,0,0.406-0.08,0.559-0.236c0.303-0.309,0.295-0.803-0.012-1.104L8.388,10.049z"></path>
            </svg>
        </div>
    </div>
    <div class="button_container_vertical" style="margin-top: 190px; margin-bottom: 150px;">
        <div class="button_container_horizontal">
            <div class="button_area">
                <div class="button" onclick="location.href='?log=transfer_1'">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-send svg_btn" viewBox="0 0 16 16">
                        <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
                    </svg>
                </div>
                <div class="text">
                    즉시이체
                </div>
            </div>
            <div class="button_area">
                <div class="button" onclick="location.href='?log=transfer_2'">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-arrow-left-right svg_btn" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 11.5a.5.5 0 0 0 .5.5h11.793l-3.147 3.146a.5.5 0 0 0 .708.708l4-4a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 11H1.5a.5.5 0 0 0-.5.5zm14-7a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H14.5a.5.5 0 0 1 .5.5z"/>
                    </svg>
                </div>
                <div class="text">
                    내 계좌간 이체
                </div>
            </div>
            <div class="button_area">
                <div class="button" onclick="location.href='?log=transfer_3'">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-piggy-bank svg_btn" viewBox="0 0 16 16">
                        <path d="M5 6.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0zm1.138-1.496A6.613 6.613 0 0 1 7.964 4.5c.666 0 1.303.097 1.893.273a.5.5 0 0 0 .286-.958A7.602 7.602 0 0 0 7.964 3.5c-.734 0-1.441.103-2.102.292a.5.5 0 1 0 .276.962z"/>
                        <path fill-rule="evenodd" d="M7.964 1.527c-2.977 0-5.571 1.704-6.32 4.125h-.55A1 1 0 0 0 .11 6.824l.254 1.46a1.5 1.5 0 0 0 1.478 1.243h.263c.3.513.688.978 1.145 1.382l-.729 2.477a.5.5 0 0 0 .48.641h2a.5.5 0 0 0 .471-.332l.482-1.351c.635.173 1.31.267 2.011.267.707 0 1.388-.095 2.028-.272l.543 1.372a.5.5 0 0 0 .465.316h2a.5.5 0 0 0 .478-.645l-.761-2.506C13.81 9.895 14.5 8.559 14.5 7.069c0-.145-.007-.29-.02-.431.261-.11.508-.266.705-.444.315.306.815.306.815-.417 0 .223-.5.223-.461-.026a.95.95 0 0 0 .09-.255.7.7 0 0 0-.202-.645.58.58 0 0 0-.707-.098.735.735 0 0 0-.375.562c-.024.243.082.48.32.654a2.112 2.112 0 0 1-.259.153c-.534-2.664-3.284-4.595-6.442-4.595zM2.516 6.26c.455-2.066 2.667-3.733 5.448-3.733 3.146 0 5.536 2.114 5.536 4.542 0 1.254-.624 2.41-1.67 3.248a.5.5 0 0 0-.165.535l.66 2.175h-.985l-.59-1.487a.5.5 0 0 0-.629-.288c-.661.23-1.39.359-2.157.359a6.558 6.558 0 0 1-2.157-.359.5.5 0 0 0-.635.304l-.525 1.471h-.979l.633-2.15a.5.5 0 0 0-.17-.534 4.649 4.649 0 0 1-1.284-1.541.5.5 0 0 0-.446-.275h-.56a.5.5 0 0 1-.492-.414l-.254-1.46h.933a.5.5 0 0 0 .488-.393zm12.621-.857a.565.565 0 0 1-.098.21.704.704 0 0 1-.044-.025c-.146-.09-.157-.175-.152-.223a.236.236 0 0 1 .117-.173c.049-.027.08-.021.113.012a.202.202 0 0 1 .064.199z"/>
                    </svg>
                </div>
                <div class="text">
                    적립식 입금
                </div>
            </div>
        </div>
        <div class="button_container_horizontal">

        </div>
    </div>
</div>
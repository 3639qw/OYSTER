<?php
//error_reporting( E_ERROR );
//ini_set( "display_errors", 1 );


include_once "lib/Karaoke_List.php";
$lst = new Karaoke_List();

$id = $_GET['id'];

$detail = $lst->Song_Detail($id);

//echo '<pre>';
//print_r($detail);
//echo '</pre>';




?>
<style>
    .main_box{
        height: 97%;
        width: 95%;
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
        padding-top: 20px;
        box-shadow: inset 8px 8px 30px #c1c1c1,
        inset -8px -8px 30px #ffffff;
    }



    .main_box .stats_box{
        width: 410px;
        height: 210px;

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
        background: #f8faff;
        box-shadow:  20px 20px 60px #bebebe,
        -20px -20px 60px #ffffff;
        margin-top: 20px;
    }

    .stats_box .all_doc{
        /*background-color: #3a8dfd;*/

        width: 100%;
        padding-left: 30px;
        font-size: 25px;
        font-weight: 600;
        color: #31456A;


    }


    .container_vertical{
        width: 410px;

        margin-top: 20px;
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
    .container_horizontal{
        width: 100%;

        border: none;
        outline: none;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        justify-content: space-evenly;
        flex-direction: row;
        align-items: center;

        /*font-size: 15px;*/

    }

    .slide_first{
        background: #E8F0F8;
        box-shadow:  20px 20px 60px #bebebe,
        -20px -20px 60px #ffffff;
    }

    .scroll::-webkit-scrollbar {
        display: none;
    }

    .scroll {
        -ms-overflow-style: none; /* 인터넷 익스플로러 */
        scrollbar-width: none; /* 파이어폭스 */
        overflow-y: scroll;
    }



    .button_container_vertical{
        width: 350px;
        height: 220px;

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


        background: #F8FAFF;
        box-shadow:  8px 8px 17px #9ec5d3,
        -8px -8px 17px #d5d5d5;



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
        fill: #81bfff;
    }

    .svg_btn circle {
        stroke: #a4a4a4;
        stroke-width: 1;
    }





    .top_box{
        width: 410px;
        height: 200px;

        outline: 0;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        justify-content: space-between;
        /*justify-content: center;*/
        flex-direction: row;
        align-items: flex-start;
    }

    .photo{
        width: 100px; height: 100px;
        /*box-shadow:  20px 20px 60px #bebebe,*/
        /*-20px -20px 60px #ffffff;*/
        border-radius: 20px;
        background: url("") black;
    }

    .detail{
        background: #F8FAFF;
        box-shadow:  20px 20px 60px #bebebe,
        -20px -20px 60px #ffffff;
        border-radius: 20px;

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

    }

    .detail_name{
        background: #E8F0F8;

        width: 100%;
        height: auto;

        border: none;
        outline: none;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        flex-direction: column;
        justify-content: space-evenly;
        align-items: flex-start;
        padding-left: 20px;
        padding-top: 20px;
        padding-bottom: 10px;

        border-radius: 20px 20px 0 0;
        color: #31456A;
    }

    .detail_other{
        /*background: #964358;*/

        width: 100%;
        height: auto;
        /*padding-top: 5px;*/
        /*padding-bottom: 5px;*/

        border: none;
        outline: none;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        justify-content: space-evenly;
        flex-direction: row;
        align-items: center;
        color: #31456A;
    }

</style>
<div class="main_box" style="box-shadow: none;">
    <div class="top_box">
        <div class="photo" style="background: url('<?=$detail['album_link']?>') black; background-repeat: round;" onclick="history.back()">

        </div>
        <div class="detail" style="width: 280px; height: auto; padding-bottom: 20px;">
            <div class="detail_name">
                <div style="font-family: 'Noto Sans JP', sans-serif; font-size: 14px; font-weight: 500;">
                    <?=$detail['natural_name']?>

                    <?php
                    if($detail['kor_name'] != '' && $detail['kor_name'] != null){
                    ?>
                    <br>
                    <a style="font-size: 13px;"><?=$detail['kor_name']?></a>
                    <?php
                    }

                    if($detail['eng_name'] != '' && $detail['eng_name'] != null){
                    ?>
                    <br>
                    <a style="font-size: 13px;"><?=$detail['eng_name']?></a>
                    <?php
                    }
                    ?>
                    <br>
                    <a><?=$detail['karaoke_id']?></a>
                </div>
            </div>
            <div class="detail_other" style="margin-top: 10px;">
                <div style="height: 100%; width: 30px; font-size: 14px; display: flex; justify-content: space-evenly; align-items: center;">
                    작곡
                </div>
                <div style="height: 100%; width: 200px; display: flex; justify-content: center; align-items: flex-start; flex-direction: column;">
                    <?=$detail['jakgok']?>
                </div>
            </div>
            <div class="detail_other">
                <div style="height: 100%; width: 30px; font-size: 14px; display: flex; justify-content: space-evenly; align-items: center;">
                    작사
                </div>
                <div style="height: 100%; width: 200px; display: flex; justify-content: center; align-items: flex-start; flex-direction: column;">
                    <?=$detail['jaksa']?>
                </div>
            </div>
            <div class="detail_other">
                <div style="height: 100%; width: 30px; font-size: 14px; display: flex; justify-content: space-evenly; align-items: center;">
                    노래
                </div>
                <div style="height: 100%; width: 200px; display: flex; justify-content: center; align-items: flex-start; flex-direction: column;">
                    <?=$detail['singer']?>
                </div>
            </div>

        </div>
    </div>

</div>
<?php
//error_reporting( E_ERROR );
//ini_set( "display_errors", 1 );


include_once "lib/Karaoke_List.php";
$lst = new Karaoke_List();

$music_count = $lst->count_Music();
$sum_list = $lst->sum_Music_List();

//echo '<pre>';
//print_r($sum_list);
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
        justify-content: center;
        flex-direction: column;
        align-items: center;
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

</style>
<script>
    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    $({ val : 0/*시작숫자*/ }).animate({ val : <?=$music_count['count']?>/*종료숫자*/ }, {
        duration: <?=$music_count['count']*40?>,
        step: function() {
            var num = numberWithCommas(Math.floor(this.val));
            $(".count_num").text(num);
        },
        complete: function() {
            var num = numberWithCommas(Math.floor(this.val));
            $(".count_num").text(num);
        }
    });
</script>
<div class="main_box" style="box-shadow: none;">
    <div class="stats_box">
        <div class="all_doc">
            <a style="font-size: 15px; font-weight: 600;">등록된 모든 노래</a><br>
            <div class="count_num"></div>
        </div>
    </div>
    <div class="container_vertical slide_first" style="height: 530px; margin-top: 40px; border-radius: 20px;">
        <div class="container_horizontal" style="width: 100%; height: 50px; border-radius: 20px 20px 0 0; background: #F8FAFF;">
            <div style="width: 50px; height: 100%; text-align: center; display: flex; justify-content: center; align-items: center;">
                번호
            </div>
            <div style="width: 290px; height: 100%; text-align: center; display: flex; justify-content: center; align-items: center;">
                곡 이름
            </div>
        </div>
        <div class="scroll" style="width: 100%; height: 480px; border-radius: 0 0 20px 20px;">

            <?php
            foreach ($sum_list as $key => $value){
            ?>
            <div class="container_horizontal" style="width: 100%; height: auto; background: transparent; margin: 10px 0;" onclick="location.href='?log=song&id=<?=$sum_list[$key]['karaoke_id']?>'">
                <div style="width: 50px; height: 100%;">
                    <?=$sum_list[$key]['karaoke_id']?>
                </div>
                <div style="width: 290px; height: 100%; display: flex; justify-content: left; align-items: flex-start; flex-direction: column;">
                    <div style="font-family: 'Noto Sans JP', sans-serif; font-weight: 500;">
                        <?=$sum_list[$key]['natural_name']?>
                    </div>
                    <div style="font-size: 14px;">
                        <?=$sum_list[$key]['kor_name']?>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>

        </div>
    </div>

    <div class="button_container_vertical">
        <div class="button_container_horizontal">
            <div class="button_area">
                <div class="button" onclick="location.href='?log=ac'">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-search svg_btn" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </div>
<!--                <div class="text">-->
<!--                    검색-->
<!--                </div>-->
            </div>
        </div>
    </div>
</div>
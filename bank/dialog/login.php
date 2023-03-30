<div style="float: right; width: 300px; text-align: center; height: 150px; background-color: white; box-shadow: 1px 8px 16px 0px #CCCCCC;">
    <?php
    if($_SESSION['PID'] != '' && $_SESSION['PID'] != null){
    ?>
    <div style="width: 100%; height: 100%; display: inline-block;  background: #FFFFFF;">
        <table border="1" style="border-collapse: collapse; font-size: 13px; width: 90%; margin: auto; margin-top: 17px;">
            <tr>
                <td style="width: 70%; height: 32px; text-align: left; font-size: 14px;">
                    <?=$_SESSION['name']?>님<br>반갑습니다
                </td>
                <td style="width: 30%;">
                    <button onclick="location.href='./login/logout.php'" style="width: 100%; height: 32px; border-radius: 1em; border: 0; color: white; background: rgb(51, 76, 121);">
                        로그아웃
                    </button>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: left;">
                    <?=$_SESSION['type'].'고객'?>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: left;">
                    고객번호:&nbsp;&nbsp;<?=$_SESSION['PID_Dash']?>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: left;">
                    가입일:&nbsp;&nbsp;<?=$_SESSION['reg_date']?>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: left;">
                    예금 잔액:&nbsp;&nbsp;<?=number_format($account_lst['ac_Balance_sum'])?>
                </td>
            </tr>
        </table>
    </div>
    <?php
    }else{
    ?>
    <div style="width: 100%; height: 100%;">
        <form name="login_form" id="login_form" method="post" action="./login/login_action.php">
            <table border="0" style="border-collapse: collapse; font-size: 13px; width: 90%; margin: auto; margin-top: 10px;">
                <tr>
                    <td style="width: 30%; height: 30px; text-align: left; padding-left: 10px;">
                        아이디
                    </td>
                    <td style="width: 5%;">
                        :
                    </td>
                    <td align="left" style="width: 10%;">
                        <input type="text" name="id" style="padding-left: 5px; font-weight: normal; width: 120px; height: auto; display: inline-block; border: 1px solid #000000; background: transparent;" maxlength="10">
                    </td>
                </tr>
                <tr>
                    <td style="height: 30px; text-align: left; padding-left: 10px;">
                        비밀번호
                    </td>
                    <td>
                        :
                    </td>
                    <td align="left" style="width: 50%;">
                        <input type="password" name="pw" style="padding-left: 5px; font-weight: normal; width: 120px; height: auto; display: inline-block; border: 1px solid #000000; background: transparent;" maxlength="20">
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <button onclick="location.href = '/login'" form="login_form" style="width: 94%; height: 30px; display: inline-block; border-radius: 2em; border: 0px; color: white; background-color: rgb(51, 76, 121);">
                            로그인
                        </button>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="height: 30px;">
                        <table border="0" style="border-collapse: collapse; width: 100%; height: 80%; margin-top: 10px;">
                            <tr>
                                <td style="width: 30%; border-right: 1px solid #333333;" onclick="location.href='./login/search_id.php'">
                                    아이디 조회
                                </td>
                                <td style="width: 40%; border-right: 1px solid #333333;" onclick="location.href='./login/reset_pw.php'">
                                    비밀번호 재등록
                                </td>
                                <td style="width: 30%;" onclick="location.href='./login/register.php'">
                                    회원가입
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <?php
    }
    ?>
</div>
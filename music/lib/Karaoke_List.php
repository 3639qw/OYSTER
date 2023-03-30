<?php
include_once "SandBox.php";
class Karaoke_List extends SandBox
{

    // 모든 노래 리스트
    function sum_Music_List(){
        $sql = "
        select karaoke_id, natural_name, kor_name, album_link
        from karaoke_list
        order by karaoke_id asc;
        ";
        $result = mysqli_query($this->con,$sql);
        $count = 1;
        while ($lst = mysqli_fetch_assoc($result)){
            foreach ($lst as $key => $value){
                $list[$count][$key] = $value;
            }
            $count++;
        }
        return $list;
    }

    // 등록된 모든노래 갯수
    function count_Music(){
        $sql = "
        select count(karaoke_id) as count
        from karaoke_list
        ";
        $row = mysqli_fetch_assoc(mysqli_query($this->con,$sql));

        return $row;
    }

    // 개별 노래정보
    function Song_Detail($id){
        $sql = "
        select karaoke_id, natural_name, eng_name, kor_name, jakgok, jaksa, singer, video_link, album_link
        from karaoke_list a
        where a.karaoke_id = '".$id."';
        ";
        $row = mysqli_fetch_assoc(mysqli_query($this->con,$sql));

        return $row;
    }


}
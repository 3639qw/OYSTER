<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/academy/record/lib/Dictionary.php";

class Course_GP extends Dictionary
{

    // 과목별 절대평가 평어를 리턴 4.5 Scale -- 교양과목 P
    function Grade_Rank(){
        $ac_record = new Academic_Integrate();

        $raw = $ac_record->course_record->Course_Raw();

        foreach ($raw as $key => $value){
            if($value != 'P'){
                switch (true){
                    case $value >= 95:
                        $record[$key] = 'A+';
                        break;
                    case $value >= 90:
                        $record[$key] = 'A0';
                        break;
                    case $value >= 85:
                        $record[$key] = 'B+';
                        break;
                    case $value >= 80:
                        $record[$key] = 'B0';
                        break;
                    case $value >= 75:
                        $record[$key] = 'C+';
                        break;
                    case $value >= 70:
                        $record[$key] = 'C0';
                        break;
                    case $value >= 65:
                        $record[$key] = 'D+';
                        break;
                    case $value >= 60:
                        $record[$key] = 'D0';
                        break;
                    case $value <= 59:
                        $record[$key] = 'F';
                        break;
                }
            }else{
                $record[$key] = 'P';
            }
        }
        return $record;
    }
    // 과목별 절대평가 평점을 리턴 4.5 Scale -- 교양과목 제외
    function Grade_Point(){
        $ac_record = new Academic_Integrate();

        $raw = $ac_record->course_record->Course_Raw();

        foreach ($raw as $key => $value){
            if($value != 'P'){
                switch (true){
                    case $value >= 95:
                        $record[$key] = 4.5;
                        break;
                    case $value >= 90:
                        $record[$key] = 4.0;
                        break;
                    case $value >= 85:
                        $record[$key] = 3.5;
                        break;
                    case $value >= 80:
                        $record[$key] = 3.0;
                        break;
                    case $value >= 75:
                        $record[$key] = 2.5;
                        break;
                    case $value >= 70:
                        $record[$key] = 2.0;
                        break;
                    case $value >= 65:
                        $record[$key] = 1.5;
                        break;
                    case $value >= 60:
                        $record[$key] = 1.0;
                        break;
                    case $value <= 59:
                        $record[$key] = 0.0;
                        break;
                }
            }
        }
        return $record;
    }

    // 과목별 상대평가 평어를 리턴 4.5 Scale -- 교양과목 P
    function Relative_Rank(){
        $ac_record = new Academic_Integrate();

        $isRank = $ac_record->course_detail->Course_isRank();
        $raw = $ac_record->course_rank->Relative_Score();

        foreach ($isRank as $key => $value){
            if($value == 'Y'){
                switch (true){
                    case $raw[$key] >= 95:
                        $record[$key] = 'A+';
                        break;
                    case $raw[$key] >= 90:
                        $record[$key] = 'A0';
                        break;
                    case $raw[$key] >= 85:
                        $record[$key] = 'B+';
                        break;
                    case $raw[$key] >= 80:
                        $record[$key] = 'B0';
                        break;
                    case $raw[$key] >= 75:
                        $record[$key] = 'C+';
                        break;
                    case $raw[$key] >= 70:
                        $record[$key] = 'C0';
                        break;
                    case $raw[$key] >= 65:
                        $record[$key] = 'D+';
                        break;
                    case $raw[$key] >= 60:
                        $record[$key] = 'D0';
                        break;
                    case $raw[$key] <= 59:
                        $record[$key] = 'F';
                        break;
                }
            }else{
                $record[$key] = 'P';
            }
        }
        return $record;
    }
    // 과목별 상대평가 평어를 백분율로 리턴 4.5 Scale -- 교양과목 P
    function Relative_Rank_Percentile(){
        $ac_record = new Academic_Integrate();

        $isRank = $ac_record->course_detail->Course_isRank();
        $raw = $ac_record->course_rank->Relative_Score();

        foreach ($isRank as $key => $value){
            if($value == 'Y'){
                $record[$key] = $raw[$key];
            }else{
                $record[$key] = 'P';
            }
        }
        return $record;
    }
    // 과목별 상대평가 평점을 리턴 4.5 Scale -- 교양과목 제외
    function Relative_Point(){
        $ac_record = new Academic_Integrate();

        $raw = $ac_record->course_rank->Relative_Score();

        foreach ($raw as $key => $value){
            if($value != 'P'){
                switch (true){
                    case $value >= 95:
                        $record[$key] = 4.5;
                        break;
                    case $value >= 90:
                        $record[$key] = 4.0;
                        break;
                    case $value >= 85:
                        $record[$key] = 3.5;
                        break;
                    case $value >= 80:
                        $record[$key] = 3.0;
                        break;
                    case $value >= 75:
                        $record[$key] = 2.5;
                        break;
                    case $value >= 70:
                        $record[$key] = 2.0;
                        break;
                    case $value >= 65:
                        $record[$key] = 1.5;
                        break;
                    case $value >= 60:
                        $record[$key] = 1.0;
                        break;
                    case $value <= 59:
                        $record[$key] = 0.0;
                        break;
                }
            }
        }

        return $record;
    }



    // 절대평가 GPA 실점 변환점수
    function Conversion_Record(){
        $ac_record = new Academic_Integrate();

        $name = $ac_record->course_detail->Course_Name();

        $raw = $ac_record->course_record->Course_Raw();

        foreach ($name as $key => $value){
            if($raw[$key] != 'P'){
                $record[$key] = floor(50+($raw[$key] * 50/100));
            }else{
                $record[$key] = 'P';
            }
        }
        return $record;
    }
    // 절대평가 변환점수 기반 등급
    function Conversion_Grade(){
        $score = $this->Conversion_Record();

        foreach ($score as $key => $value){
            switch (true){
                case $value == 'P':
                    $record[$key] = 'P';
                    break;
                case $value >= 95:
                    $record[$key] = 'A+';
                    break;
                case $value >= 90:
                    $record[$key] = 'A0';
                    break;
                case $value >= 85:
                    $record[$key] = 'B+';
                    break;
                case $value >= 80:
                    $record[$key] = 'B0';
                    break;
                case $value >= 75:
                    $record[$key] = 'C+';
                    break;
                case $value >= 70:
                    $record[$key] = 'C0';
                    break;
                case $value >= 65:
                    $record[$key] = 'D+';
                    break;
                case $value >= 60:
                    $record[$key] = 'D0';
                    break;
                case $value <= 59:
                    $record[$key] = 'F';
                    break;
            }
        }
        return $record;
    }
    // 절대평가 변환점수 기반 GP
    function Conversion_GP(){
        $score = $this->Conversion_Record();

        foreach ($score as $key => $value){
            if($value != null){
                switch (true){
                    case $value == 'P':
                        break;
                    case $value >= 95:
                        $record[$key] = 4.5;
                        break;
                    case $value >= 90:
                        $record[$key] = 4.0;
                        break;
                    case $value >= 85:
                        $record[$key] = 3.5;
                        break;
                    case $value >= 80:
                        $record[$key] = 3.0;
                        break;
                    case $value >= 75:
                        $record[$key] = 2.5;
                        break;
                    case $value >= 70:
                        $record[$key] = 2.0;
                        break;
                    case $value >= 65:
                        $record[$key] = 1.5;
                        break;
                    case $value >= 60:
                        $record[$key] = 1.0;
                        break;
                    case $value <= 59:
                        $record[$key] = 0.0;
                        break;
                }
            }
        }
        return $record;
    }
    // 절대평가 변환점수 기반 GPA
    function Conversion_GPA(){
        $ac_record = new Academic_Integrate();

        $gp = $this->Conversion_GP();
        $cr = $ac_record->course_detail->Course_Credit();

        foreach ($gp as $key => $value){
            $credit['Merged'] += $cr[$key];
            $record['Merged'] += ($value * $cr[$key]);
            $credit[substr($key,-2,2)] += $cr[$key];
            $record[substr($key,-2,2)] += ($value * $cr[$key]);
        }

        foreach ($record as $key => $value){
            $record[$key] = round($value / $credit[$key],2);
        }

        return $record;
    }
    // 절대평가 변환점수 백분율
    function Conversion_Percentile(){
        $ac_record = new Academic_Integrate();
        $score = $this->Conversion_Record();
        $credit = $ac_record->course_detail->Course_Credit();

        foreach ($score as $key => $value){
            if($value != 'P'){
                $record['Merged'] += $value * $credit[$key];
                $cr['Merged'] += $credit[$key];
                $record[substr($key,-2)] += $value  * $credit[$key];
                $cr[substr($key,-2)] += $credit[$key];
            }
        }

        foreach ($record as $key => $value){
            $record[$key] = $value / $cr[$key];
        }

        return $record;
    }



    // 고등학교 성적증명서 발급에 필요한 성취도 평어
    // A: 90-100
    // B: 80-89
    // C: 70-79
    // D: 60-69
    // E: 0-59
    function Grade_Level(){
        $ac_record = new Academic_Integrate();

        $cat = $ac_record->course_detail->Course_Cat();
        $raw = $ac_record->course_record->Course_Raw_All();

        foreach ($raw as $key => $value){
            switch (true){
                case $raw[$key] == null:
                    $record[$key] = null;
                    break;
                case $raw[$key] >= 90:
                    $record[$key] = 'A';
                    break;
                case $raw[$key] >= 80:
                    $record[$key] = 'B';
                    break;
                case $raw[$key] >= 70:
                    $record[$key] = 'C';
                    break;
                case $raw[$key] >= 60:
                    $record[$key] = 'D';
                    break;
                case $raw[$key] <= 59:
                    $record[$key] = 'E';
                    break;
            }
        }
        return $record;
    }


    // Grade Point Average
    // 학기별 학업성적평균평점 (가중치)
    function GPA(){
        $ac_record = new Academic_Integrate();

        // 과목별 학점
        $credit = $ac_record->course_detail->Course_Credit();
        // 과목별 평점
        $point = $this->Grade_Point();

        $record = [];
        $cr = [];

        foreach ($point as $key => $value){
            $record['Merged'] += ($value * $credit[$key]);
            $cr['Merged'] += $credit[$key];

            if(substr($key,-2) == '11'){
                $record['11'] += ($value * $credit[$key]);
                $cr['11'] += $credit[$key];
            }
            if(substr($key,-2) == '12'){
                $record['12'] += ($value * $credit[$key]);
                $cr['12'] += $credit[$key];
            }
            if(substr($key,-2) == '21'){
                $record['21'] += ($value * $credit[$key]);
                $cr['21'] += $credit[$key];
            }
            if(substr($key,-2) == '22'){
                $record['22'] += ($value * $credit[$key]);
                $cr['22'] += $credit[$key];
            }
            if(substr($key,-2) == '31'){
                $record['31'] += ($value * $credit[$key]);
                $cr['31'] += $credit[$key];
            }
            if(substr($key,-2) == '32'){
                $record['32'] += ($value * $credit[$key]);
                $cr['32'] += $credit[$key];
            }
        }

        foreach ($record as $key => $value){
            $record[$key] = round($value / $cr[$key],2);
        }
        return $record;
    }

    // Grade Point Average
    // 상대평가 학기별 학업성적평균평점 (가중치)
    function Relative_GPA(){
        $ac_record = new Academic_Integrate();

        // 과목별 학점
        $credit = $ac_record->course_detail->Course_Credit();
        // 과목별 평점
        $point = $this->Relative_Point();

        $record = [];
        $cr = [];

        foreach ($point as $key => $value){
            $record['Merged'] += ($value * $credit[$key]);
            $cr['Merged'] += $credit[$key];

            if(substr($key,-2) == '11'){
                $record['11'] += ($value * $credit[$key]);
                $cr['11'] += $credit[$key];
            }
            if(substr($key,-2) == '12'){
                $record['12'] += ($value * $credit[$key]);
                $cr['12'] += $credit[$key];
            }
            if(substr($key,-2) == '21'){
                $record['21'] += ($value * $credit[$key]);
                $cr['21'] += $credit[$key];
            }
            if(substr($key,-2) == '22'){
                $record['22'] += ($value * $credit[$key]);
                $cr['22'] += $credit[$key];
            }
            if(substr($key,-2) == '31'){
                $record['31'] += ($value * $credit[$key]);
                $cr['31'] += $credit[$key];
            }
            if(substr($key,-2) == '32'){
                $record['32'] += ($value * $credit[$key]);
                $cr['32'] += $credit[$key];
            }
        }

        foreach ($record as $key => $value){
            $record[$key] = round($value / $cr[$key],2);
        }
        return $record;
    }

}
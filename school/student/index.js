function check_insert() {

	// 학번이 공백인지 확인
	if(document.stu_insert.stuid.value == ""){
		alert("학번을 입력해주세요");
		stu_insert.stuid.focus();
		return false;
	}
    
    // 학번이 5글자 넘는지 확인 
    if(document.stu_insert.stuid.value > 99999 ||
       isNaN(document.stu_insert.stuid.value) == true){
        alert("학번을 올바르게 입력해주세요");
        stu_insert.stuid.focus();
        document.stu_insert.stuid.value="";
        return false;
    }
    
    // 이름이 공백인지 확인
	if(document.stu_insert.name.value == "" ){
		alert("이름을 입력해주세요");
		stu_insert.name.focus();
		return false;
	}
    
    // 중학교 공백인지 확인
	if(document.stu_insert.mid_sch.value == "" ){
		alert("중학교를 입력해주세요");
		stu_insert.mid_sch.focus();
		return false;
	}


    
    
    



	// 역사 점수 입력 값 확인
	// if(   document.frm_insert.history.value == "" 				// 공백인지 확인
	//    || document.frm_insert.history.value < 0					// 0 보다 작은 값 확인
	//    || document.frm_insert.history.value > 100				// 100 보다  큰 값 확인
	//    || isNaN(document.frm_insert.history.value) == true )	// 문자 확인
	// {
	// 	alert("역사 점수를 정확하게 입력해주세요");
	// 	frm_insert.history.focus();
	// 	return false;
	// }

	alert("학생 등록이 완료됐습니다.");
	return true;
}
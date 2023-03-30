function check_insert() {

	if(document.class_insert.name.value == ""){
		alert("반 이름을 입력해주세요");
		class_insert.name.focus();
		return false;
	}
    
    if(document.class_insert.sch.value == ""){
        alert("학교명을 입력해주세요");
        class_insert.sch.focus();
        return false;
    }

    if(document.class_insert.teacher_id.value > 99999 ||
       isNaN(document.class_insert.teacher_id.value) == true){
        alert("담임교사 ID를 올바르게 입력해주세요");
        class_insert.teacher_id.focus();
        document.class_insert.teacher_id.value="";
        return false;
    }

	alert("교실 등록이 완료됐습니다.");
	return true;
}
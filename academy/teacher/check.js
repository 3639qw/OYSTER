function check_insert() {

	if(document.tea_insert.tid.value == ""){
		alert("교원번호를 입력해주세요");
		tea_insert.tid.focus();
		return false;
	}
    
    if(document.tea_insert.tid.value > 99999 ||
       isNaN(document.tea_insert.tid.value) == true){
        alert("교원번호를 올바르게 입력해주세요");
        tea_insert.tid.focus();
        document.tea_insert.tid.value="";
        return false;
    }
    
	if(document.tea_insert.name.value == ""){
		alert("이름을 입력해주세요");
		tea_insert.name.focus();
		return false;
	}
    
	if(document.tea_insert.sch.value == ""){
		alert("소속학교를 입력해주세요");
		tea_insert.sch.focus();
		return false;
	}
	alert("교원 등록이 완료됐습니다.");
	return true;
}
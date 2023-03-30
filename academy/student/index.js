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

    // 고등학교 공백인지 확인
	if(document.stu_insert.high_sch.value == "" ){
		alert("고등학교를 입력해주세요");
		stu_insert.high_sch.focus();
		return false;
	}

	alert("학생 등록이 완료됐습니다.");
	return true;
}

function Index() {
    location.href = "/academy";
}

function update_check() {

	// 학번이 공백인지 확인
	if (document.stu_insert.stuid.value == "") {
		alert("학번을 입력해주세요");
		stu_insert.stuid.focus();
		return false;
	}

	// 이름이 공백인지 확인
	if (document.stu_insert.name.value == "") {
		alert("이름을 입력해주세요");
		stu_insert.name.focus();
		return false;
	}

	// 중학교 공백인지 확인
	if (document.stu_insert.mid_sch.value == "") {
		alert("중학교를 입력해주세요");
		stu_insert.mid_sch.focus();
		return false;
	}

	// 고등학교 공백인지 확인
	if (document.stu_insert.high_sch.value == "") {
		alert("고등학교를 입력해주세요");
		stu_insert.high_sch.focus();
		return false;
	}

	alert("학생 등록이 완료됐습니다.");
	return true;
}

function Index() {
	location.href = "/academy";
}

function openZipSearch() {
    new daum.Postcode({
        oncomplete: function (data) {
            $('[name=zip]').val(data.zonecode); // 우편번호 (5자리)
            $('[name=addr1]').val(data.address);
            $('[name=addr2]').val(data.buildingName);
        }
    }).open();
}

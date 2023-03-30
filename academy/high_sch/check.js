function check_insert() {
	// 교명이 공백인지 확인
	if(document.high_insert.name.value == ""){
		alert("교명을 입력해주세요");
		high_insert.name.focus();
		return false;
	}

	// 이니셜 공백인지 확인
	if(document.high_insert.initial.value == ""){
		alert("이니셜을 입력해주세요");
		high_insert.initial.focus();
		return false;
	}

	// 이니셜 영문여부, 5글자 준수여부 확인
	const regExp = /^[a-zA-Z]*$/g;
	if(!regExp.test(document.high_insert.initial.value) ||
		document.high_insert.initial.value.length > 5) {
		alert("이니셜을 올바르게 입력해주세요");
		return false;
	}

    //주소 공백인지 확인
    if(document.high_insert.addr1.value == ""){
        alert("주소를 입력해주세요");
        return false;
    }

	alert("학교 등록이 완료됐습니다.");
	return true;
}

function openZipSearch() {
	new daum.Postcode({
		oncomplete: function(data) {
			$('[name=zip]').val(data.zonecode); // 우편번호 (5자리)
			$('[name=addr1]').val(data.address);
			$('[name=addr2]').val(data.buildingName);
		}
	}).open();
}
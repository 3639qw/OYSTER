function check_insert() {

	// 교명이 공백인지 확인
	if(document.mid_insert.name.value == ""){
		alert("교명을 입력해주세요");
		mid_insert.name.focus();
		return false;
	}

    //주소 공백인지 확인
    if(document.mid_insert.addr1.value == ""){
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
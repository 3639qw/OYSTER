function check_insert() {

	// 학번이 공백인지 확인
	if(document.score_insert.stuid.value == ""){
		alert("학번을 입력해주세요");
		score_insert.stuid.focus();
		return false;
	}
    
    // 성적이 100점 넘는지 확인 
    if(document.score_insert.sub1.value > 100 || document.score_insert.sub1.value < 0 ||
       isNaN(document.score_insert.sub1.value) == true){
        alert("성적을 올바르게 입력해주세요");
        score_insert.sub1.focus();
        document.score_insert.sub1.value="";
        return false;
    }
    
    // 성적이 100점 넘는지 확인 
    if(document.score_insert.sub2.value > 100 || document.score_insert.sub2.value < 0 ||
       isNaN(document.score_insert.sub2.value) == true){
        alert("성적을 올바르게 입력해주세요");
        score_insert.sub2.focus();
        document.score_insert.sub2.value="";
        return false;
    }

    // 성적이 100점 넘는지 확인 
    if(document.score_insert.sub3.value > 100 || document.score_insert.sub3.value < 0 ||
       isNaN(document.score_insert.sub3.value) == true){
        alert("성적을 올바르게 입력해주세요");
        score_insert.sub3.focus();
        document.score_insert.sub3.value="";
        return false;
    }

    // 성적이 100점 넘는지 확인 
    if(document.score_insert.sub4.value > 100 || document.score_insert.sub4.value < 0 ||
       isNaN(document.score_insert.sub4.value) == true){
        alert("성적을 올바르게 입력해주세요");
        score_insert.sub4.focus();
        document.score_insert.sub4.value="";
        return false;
    }

    // 성적이 100점 넘는지 확인 
    if(document.score_insert.sub5.value > 100 || document.score_insert.sub5.value < 0 ||
       isNaN(document.score_insert.sub5.value) == true){
        alert("성적을 올바르게 입력해주세요");
        score_insert.sub5.focus();
        document.score_insert.sub5.value="";
        return false;
    }

    // 성적 공백인지 확인
	if(document.score_insert.sub1.value == ""){
		alert("성적을 입력해주세요");
		score_insert.sub1.focus();
		return false;
	}

    // 성적 공백인지 확인
	if(document.score_insert.sub2.value == ""){
		alert("성적을 입력해주세요");
		score_insert.sub2.focus();
		return false;
	}

    // 성적 공백인지 확인
	if(document.score_insert.sub3.value == ""){
		alert("성적을 입력해주세요");
		score_insert.sub3.focus();
		return false;
	}

    // 성적 공백인지 확인
	if(document.score_insert.sub4.value == ""){
		alert("성적을 입력해주세요");
		score_insert.sub4.focus();
		return false;
	}

    // 성적 공백인지 확인
	if(document.score_insert.sub5.value == ""){
		alert("성적을 입력해주세요");
		score_insert.sub5.focus();
		return false;
	}
    
	alert("성적 등록이 완료됐습니다.");
	return true;
}


function Index() {
    location.href = "/academy";
}

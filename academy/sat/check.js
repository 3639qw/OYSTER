function check_insert() {

	// 학번이 공백인지 확인
	if(document.score_insert.id.value == ""){
		alert("학번을 입력해주세요");
		score_insert.id.focus();
		return false;
	}
    
    // 성적이 100점 넘는지 확인 
    if(document.score_insert.kor.value > 100 || document.score_insert.kor.value < 0 ||
       isNaN(document.score_insert.kor.value) == true){
        alert("성적을 올바르게 입력해주세요 kor");
        score_insert.kor.focus();
        document.score_insert.kor.value="";
        return false;
    }
    
    // 성적이 100점 넘는지 확인 
    if(document.score_insert.math.value > 100 || document.score_insert.math.value < 0 ||
       isNaN(document.score_insert.math.value) == true){
        alert("성적을 올바르게 입력해주세요 math");
        score_insert.math.focus();
        document.score_insert.math.value="";
        return false;
    }

    // 성적이 100점 넘는지 확인 
    if(document.score_insert.eng.value > 100 || document.score_insert.eng.value < 0 ||
       isNaN(document.score_insert.eng.value) == true){
        alert("성적을 올바르게 입력해주세요 eng");
        score_insert.eng.focus();
        document.score_insert.eng.value="";
        return false;
    }

    // 성적이 50점 넘는지 확인 
    if(document.score_insert.kor_history.value > 50 || document.score_insert.kor_history.value < 0 ||
       isNaN(document.score_insert.kor_history.value) == true){
        alert("성적을 올바르게 입력해주세요 his");
        score_insert.kor_history.focus();
        document.score_insert.kor_history.value="";
        return false;
    }

    // 성적이 50점 넘는지 확인 
    if(document.score_insert.sub1.value > 50 || document.score_insert.sub1.value < 0 ||
       isNaN(document.score_insert.sub1.value) == true){
        alert("성적을 올바르게 입력해주세요 sub1");
        score_insert.sub1.focus();
        document.score_insert.sub1.value="";
        return false;
    }

    // 성적이 50점 넘는지 확인 
    if(document.score_insert.sub2.value > 50 || document.score_insert.sub2.value < 0 ||
       isNaN(document.score_insert.sub2.value) == true){
        alert("성적을 올바르게 입력해주세요 sub2");
        score_insert.sub2.focus();
        document.score_insert.sub2.value="";
        return false;
    }

    // 성적 공백인지 확인
	if(document.score_insert.kor.value == ""){
		alert("성적을 입력해주세요");
		score_insert.kor.focus();
		return false;
	}

    // 성적 공백인지 확인
	if(document.score_insert.math.value == ""){
		alert("성적을 입력해주세요");
		score_insert.math.focus();
		return false;
	}

    // 성적 공백인지 확인
	if(document.score_insert.eng.value == ""){
		alert("성적을 입력해주세요");
		score_insert.eng.focus();
		return false;
	}

    // 성적 공백인지 확인
	if(document.score_insert.kor_history.value == ""){
		alert("성적을 입력해주세요");
		score_insert.kor_history.focus();
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
    
	alert("성적 등록이 완료됐습니다.");
	return true;
}
function scoreup() {
    const kor = document.getElementById('kor').value;
    const math = document.getElementById('math').value;
    const eng = document.getElementById('eng').value;
    const kor_history = document.getElementById('kor_history').value*2;
    const sub1 = document.getElementById('sub1').value*2;
    const sub2 = document.getElementById('sub2').value*2;
    let avg = Math.round(((parseFloat(kor) + parseFloat(math) + parseFloat(eng) + parseFloat(kor_history) + parseFloat(sub1) + parseFloat(sub2)) / 6) * 100) / 100;
    // let avg = (parseFloat(kor) + parseFloat(math) + parseFloat(eng) + parseFloat(kor_history) + parseFloat(sub1) + parseFloat(sub2)) / 6;

    if (avg != 'NaN') {
        document.getElementById("result").innerText = avg;
    }
};

function Index() {
    location.href = "/academy";
}

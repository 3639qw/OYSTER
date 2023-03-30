function check_insert() {

    // 회사 입력여부 확인
    if(document.stock_insert.name.value == ""){
        alert("회사를 입력해주세요");
        stock_insert.name.focus();
        return false;
    }

    // 종목코드 입력여부 확인
    if(document.stock_insert.ticker.value == ""){
        alert("종목코드를 입력해주세요");
        stock_insert.ticker.focus();
        return false;
    }

    // 액면가 입력여부 확인
    if(document.stock_insert.value.value == ""){
        alert("액면가를 입력해주세요");
        stock_insert.value.focus();
        return false;
    }

    // 종목코드 여부 확인
    if(document.stock_insert.ticker.value > 999999 || document.stock_insert.ticker.value < 0 ||
        isNaN(document.stock_insert.ticker.value) == true){
        alert("액면가를 올바르게 입력해주세요");
        stock_insert.ticker.focus();
        document.stock_insert.ticker.value="";
        return false;
    }

    // 액면가 정상가 여부 확인
    if(document.stock_insert.value.value > 5000 || document.stock_insert.value.value < 0 ||
        isNaN(document.stock_insert.value.value) == true){
        alert("액면가를 올바르게 입력해주세요");
        stock_insert.value.focus();
        document.stock_insert.value.value="";
        return false;
    }

    alert("등록이 완료됐습니다.");
    return true;
}

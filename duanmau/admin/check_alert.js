    //check alert action 
    var check=document.querySelector('.alert');
    if((check.innerText) ==""){
        check.remove();
    }
    //check all 
    var checks = document.getElementsByName('check[]');
    var checkall = document.querySelector('.check_all');
    checkall.addEventListener('click', function() {
        for (check of checks) {
            check.checked = true;
        }
    })
    var uncheck = document.querySelector('.uncheck');
    uncheck.addEventListener('click', function() {
        for (check of checks) {
            check.checked = false;
        }
    })
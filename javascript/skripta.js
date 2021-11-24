function createNewAccount() {
    window.location.href = './html/create_new_account.html';
}


function hello() {
    let x = document.forms["login"]["email"].value;
    let password = document.forms["login"]["password"].value;

    let username = x.substring(0, x.indexOf('@'));

    if(password.length < 6){  
        alert("Password must be at least 6 characters long.");  
        return false;  
    }
    else {
        alert("Wellcome \n" + username);
        return true;
    }
}
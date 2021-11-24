function welcome() {
    let fname = document.forms["signup"]["fname"].value;
    let lname = document.forms["signup"]["lname"].value;
    let password = document.forms["signup"]["password"].value;
    var regName = /^[a-zA-Z]+ [a-zA-Z]+$/;

    if(!regName.test(fname) || !regName.test(lname)) {
        alert('Invalid name given');
    } 
    else if(password.length<6){  
        alert("Password must be at least 6 characters long.");  
        return false;  
    }
    else {
        alert("Welcome: " + fname + " " + lname);
        return true;
    }
}


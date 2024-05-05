document.addEventListener("DOMContentLoaded", function() {
    useRegexUsername("");
    useRegexPassword("");
});

// ^ - start of the string
// (?=.*[a-z]) - at least one lowercase letter
// (?=.*[A-Z]) - at least one uppercase letter
// (?=.*\d) - at least one digit
// (?=.*[#%=@$!%*?&]) - at least one special character
// [A-Za-z\d#%=@$!%*?&]{10,} - at least 10 characters from the mentioned set
// u - unicode flag
// we check spaces first, then length, then regex
// length is checked in 2 places because we want to give the user a more specific error message
// it's better to use regex in php because it's more secure but the problem is that it's not as readable as in js
// if we want to use regex in php and return the result at a real time we would have to use ajax
// first step of implementing ajax is to create a new php file that will contain the code that we want to execute
// js regex can easily be bypassed by disabling js in the browser or by using a tool like postman or curl
// to protect the server from such attacks we need to use php regex
// is it recommended to use regex in both js and php?
// it's not necessary to use regex in both js and php but it's recommended because it's more secure and it solves the problem of the user not having to wait for the server to respond so we don't have to use ajax
var disabled1 = true;
var disabled2 = true;

function useRegexUsername(input) {
    // ISPISUJE PORUKU SAMO KADA SU SVI UVJETI ISPUNJENI
    paragraph = document.getElementById("input-name-details");

    let result = input.includes(" ");

    let regex = /^[A-Za-z\d]{10,}$/u;

    if(regex.test(input) && !result && input.length >= 10){
        paragraph.innerHTML = "Sve je ispravno!";
        paragraph.style.color = "green";
        disabled1 = false;
        return true;
    }
    else{
        paragraph.innerHTML = "Nisu svi uvjeti ispunjeni!";
        paragraph.style.color = "red";
        disabled1 = true;
    }
}


function useRegexPassword(input) {
    // ISPISUJE PORUKU SAMO KADA SU SVI UVJETI ISPUNJENI
    paragraph = document.getElementById("input-pass-details");
    
    let result = input.includes(" ");
    let regexAll = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#%=@$!%*?&])[A-Za-z\d@$!%*?&]{10,}$/u;

    if(regexAll.test(input) && !result && input.length >= 10){
        paragraph.innerHTML = "Sve je ispravno!";
        paragraph.style.color = "green";
        disabled2 = false;
    }
    else{
        paragraph.innerHTML = "Nisu svi uvjeti ispunjeni!";
        paragraph.style.color = "red";
        disabled2 = true;
    }
}

function enableSubmit(){
    if(disabled1 == false && disabled2 == false){
        document.getElementById("submit").disabled = false;
        console.log("enabled");
    }
    else{
        document.getElementById("submit").disabled = true;
        console.log("disabled");
    }
}
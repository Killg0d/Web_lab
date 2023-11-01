var currentTab = 0;
var validate = true;
var tab = document.getElementsByClassName("tab");
showtab(currentTab);
function showtab(n) {
    
    tab[n].style.display = "block";
    if (n == 0) {
        document.getElementById("previous").style.display = "none";
    }
    else {
        document.getElementById("previous").style.display = "inline";
    }
    console.log(n+"n vlaue tab length"+tab.length);
    if (n == (tab.length - 1)) {
        console.log('exexuting');
        document.getElementById("next").innerHTML = "Submit";
    }
    else {
        document.getElementById("previous").innerHTML = "Next";
    }
    fixStepIndicator(currentTab);
}
function nextPrevTab(n) {
    if (validateArea(currentTab)) {
        console.log(tab.length);
        console.log(n+"n value");
        if (n == 3)
            return false;
        tab[currentTab].style.display = "none";
        currentTab += n;
        console.log(currentTab+"This is before check");
        if (currentTab >= tab.length) {
            var formData = new FormData(document.getElementById('regForm'));
            console.log(formData.get('Username'));
            var htmlString = "<p>Username: " + formData.get('Username') + "</p>" +
                 "<p>First Name: " + formData.get('fname') + "</p>" +
                 "<p>Last Name: " + formData.get('lname') + "</p>" +
                 "<p>Gender: " + formData.get('gender') + "</p>" +
                 "<p>Nationality: " + formData.get('nationality') + "</p>" +
                 "<p>Date: " + formData.get('date') + "</p>" +
                 "<p>Email: " + formData.get('email') + "</p>" +
                 "<p>Mobile: " + formData.get('mobile') + "</p>" +
                 "<p>Address: " + formData.get('address') + "</p>" +
                 "<p>Facebook: " + formData.get('facebook') + "</p>" +
                 "<p>Twitter: " + formData.get('twiiter') + "</p>" +
                 "<p>LinkedIn: " + formData.get('linkedin') + "</p>" +
                 "<p>UG: " + formData.get('Ug') + "</p>" +
                 "<p>PG: " + formData.get('pg') + "</p>" +
                 "<p>Project 1: " + formData.get('project1') + "</p>" +
                 "<p>Project 2: " + formData.get('project2') + "</p>" +
                 "<p>Project 3: " + formData.get('project3') + "</p>";
            document.getElementById("regForm").submit();
            document.write(htmlString);
            return false;
        }
        console.log(currentTab);
        showtab(currentTab);
    }
}
function validateUsername(){
    var name=document.getElementById('Username');
    var regExp=/[A-Z][a-z]{4,}/;
    var error = document.getElementsByClassName('error');
    var isValid=regExp.test(name.value);
    error[0].style.display = isValid ? 'none' : 'block';
    return isValid;
}
function validatePassword(){
    password=document.getElementById('Password');
    var regExp=/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    var error = document.getElementsByClassName('error');
    var isValid=regExp.test(password.value);
    error[1].style.display = isValid ? 'none' : 'block';
    return isValid;
}
function validateArea(currentTab) {
    if (currentTab == 0) {
        return validateUsername() ? true : false;
    }
    else
        return true;

}

function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class on the current step:
    x[n].className += " active";
    if(n==x.length-1)
        x[n].className+=" finish";
}

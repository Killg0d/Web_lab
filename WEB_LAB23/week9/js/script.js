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
function validateArea(currentTab) {
    console.log('this1');
    if (currentTab == 0) {
        // Validate Area here
        var unamevalue = document.getElementById('Username').value;
        var error = document.getElementsByClassName('error');
        console.log(error);
        if (!unamevalue.match('[A-Z][a-z]{4,}')) {
            error[0].style.display = 'block';
            y = tab[0].getElementsByTagName('input');
            y[0].classname += "invalid";
            console.log(y[0]);
            return false;
        }
        else {
            error[0].style.display = 'none';
            return true;
        }
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

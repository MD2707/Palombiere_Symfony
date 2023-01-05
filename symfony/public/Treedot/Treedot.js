function td_form_ctc(){
    let forms= document.getElementsByClassName("td-create-ctc-form");
    var arr = Array.from(forms);
    arr.forEach(form => {
        form.classList.add("td-form-contact");
        let inputname= document.createElement("input");
        inputname.id="name";
        inputname.type="text";
        inputname.placeholder="Name";

        let inputsurname= document.createElement("input");
        inputsurname.id="surname";
        inputsurname.type="text";
        inputsurname.placeholder="Surname";

        let inputemail= document.createElement("input");
        inputemail.id="email";
        inputemail.type="text";
        inputemail.placeholder="Email";

        let textarea = document.createElement("textarea");
        textarea.placeholder="Write your message here ...";

        let button = document.createElement("button");
        button.textContent="Submit";
        button.classList.add("td-btn-s3");
        button.style.padding="7% 50% ";

        form.appendChild(inputname);
        form.appendChild(inputsurname);
        form.appendChild(inputemail);
        form.appendChild(textarea);
        form.appendChild(button);
        
    });
    
}

function td_rv_hdl() {
    //ClassList contient la methode contains utile pour ce que je vais faire apres
    var reveals = document.querySelectorAll(".td-fade-in, .td-fade-left, .td-fade-right, .td-fade-bottom, .td-fade-up");
    for (var i = 0; i < reveals.length; i++) {
        var elementTop = reveals[i].getBoundingClientRect().top;
        var elementBottom = reveals[i].getBoundingClientRect().bottom;
        if (elementBottom>window.screenTop &&  elementTop <= window.innerHeight-10){
            if(reveals[i].classList.contains("td-fade-in")) reveals[i].classList.add("td-fade-in-active");
            else if(reveals[i].classList.contains("td-fade-left")) reveals[i].classList.add("td-fade-left-active");
            else if(reveals[i].classList.contains("td-fade-right")) reveals[i].classList.add("td-fade-right-active");
            else if(reveals[i].classList.contains("td-fade-bottom")) reveals[i].classList.add("td-fade-bottom-active");
            else if(reveals[i].classList.contains("td-fade-up")) reveals[i].classList.add("td-fade-up-active");
        }  
        else {
            reveals[i].classList.remove("td-fade-in-active");
            reveals[i].classList.remove("td-fade-left-active");
            reveals[i].classList.remove("td-fade-right-active");
            reveals[i].classList.remove("td-fade-bottom-active");
            reveals[i].classList.remove("td-fade-up-active");
        }
    }
}

function isOnScreen(){
    var reveals = document.querySelectorAll(".td-fade-in, .td-fade-left, .td-fade-right, .td-fade-bottom, .td-fade-up");
    for (var i = 0; i < reveals.length; i++) {
        var elementTop = reveals[i].getBoundingClientRect().top;
        if(elementTop<window.innerHeight) {
            if(reveals[i].classList.contains("td-fade-in")) reveals[i].classList.add("td-fade-in-active");
            else if(reveals[i].classList.contains("td-fade-left")) reveals[i].classList.add("td-fade-left-active");
            else if(reveals[i].classList.contains("td-fade-right")) reveals[i].classList.add("td-fade-right-active");
            else if(reveals[i].classList.contains("td-fade-bottom")) reveals[i].classList.add("td-fade-bottom-active");
            else if(reveals[i].classList.contains("td-fade-up")) reveals[i].classList.add("td-fade-up-active");

        }
    }
}

window.addEventListener("scroll", td_rv_hdl);
window.addEventListener("load", td_form_ctc);
window.addEventListener("load", isOnScreen) ;



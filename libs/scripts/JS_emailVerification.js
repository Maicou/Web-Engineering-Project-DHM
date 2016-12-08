/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function validateEmail(emailInput){

    var emailValue = emailInput;
    var reg = /\S+@\S+\.\S+/;
    if (emailValue == '' || !reg.test(emailValue())){
        alert("blub");
        return false;
    } else  {
    alert("lololol");
    }
}


function validateEmail2OLD(email){
<!--alert("nutte");-->
<!--alert(email);-->
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*\.\w{2,3})+$/;
    
    if (email.match(mailformat))
    {
    alert("lucky!!");
    document.form1.text1.focus();    
    return true;
    } else {
    alert("You have entered an invalid email adress!");
    document.form1.text1.focus();
    return false;
    }
}
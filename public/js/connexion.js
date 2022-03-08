const form = document.querySelector('.form');
const login = document.querySelector('.login');
const password = document.querySelector('.password');
const emailError = document.getElementById('email_error');
const passError = document.getElementById('pass_error');

var inputLogin = document.forms['form']['login'];
var inputPass= document.forms['form']['password'];



//Functions-------------------------------------------------------------
function showError(input, message) {//Afficher les messages d'erreur
    if(input==inputLogin){
        input.style.border= "1px solid #e74c3c";
        emailError.style.display = 'block';
        emailError.innerText = message;
    }
    if(input==inputPass){
        input.style.border= "1px solid #e74c3c";
        passError.style.display = 'block';
        passError.innerText = message;
    }
}
//
function showSuccess(input) {
    if(input==inputLogin){
        input.style.border= "1px solid #2ecc71";
    }
    if(input==inputPass){
        input.style.border= "1px solid #2ecc71";
    }
}
//
function checkEmail(input){//Tester si l'email est valide :  javascript : valid email
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if (re.test(input.value.trim().toLowerCase())) {
        showSuccess(input);
    } else {
        showError(input,`Email is not valid!`);
    }
}
//
function checkRequired(inputArray) {// Tester si les champs ne sont pas vides
    inputArray.forEach(input => {
        if (input.value.trim() === '') {
            showError(input,`${getFieldName(input)} is required`);
        }else{
            showSuccess(input);
        }
    });
}
//
function getFieldName(input) {//Retour le nom de chaque input en se basant sur son id
    return input.className.charAt(0).toUpperCase() + input.className.slice(1);
}
//
function checkLength(input, min, max) {//Tester la longueur de la valeur  d'un input
    if(input.value.length < min){
        showError(input, `${getFieldName(input)} doit au moins être égal à ${min} caractères!`);
    }else if(input.value.length > max){
        showError(input, `${getFieldName(input)} doit être moins de ${max} caractères!`);
    }else{
        showSuccess(input);
    }
}



//
// function checkPasswordMatch(input1, input2) {
//     if (input1.value !== input2.value) {
//         showError(input2, 'Passwords do not match!');
//     }
// }


//Even listeners--------------------------------------------------------
form.addEventListener('submit',function(e){
    checkLength(password, 4, 25);
    checkEmail(login);
    checkRequired([login,password]);
     // annule l'envoi du formulaire
     e.preventDefault();
         
     setTimeout( function(){
         // lorsque que 5 secondes ce sont écoulé
         // envoi le formulaire
         e.target.submit();
     }, 1000);
    
});

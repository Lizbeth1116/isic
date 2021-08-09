(function () {
    'use strict';
    window.addEventListener('load', function () {
        // Get the forms we want to add validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function (form) {
            form.addEventListener('submit', function (event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();


datosModalDoc = function (iddoc, GraAca, NomDoc,APate,AMate,corDoc,tiemDoc,tutDoc){
    $('#iddocente').val(iddoc);
    $('#GradoAcademico').val(GraAca);
    $('#NombreDoc').val(NomDoc);
    $('#APaternoDoc').val(APate);
    $('#AMaternoDoc').val(AMate);
    $('#correoDoc').val(corDoc);
//    console.log(document.getElementById('Check1'));
    if(tiemDoc!='No')
    document.getElementById('Check1').checked=true;
    else 
    document.getElementById("Check1").checked=false;
    if(tutDoc!='No')
    document.getElementById('Check2').checked=true;
    else 
    document.getElementById("Check2").checked=false;
    
};

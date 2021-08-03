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


datosModalDoc = function (iddocente, GradoAcademico, NombreDoc,APaternoDoc,AMaternoDoc,correoDoc,tiempoDoc,tutorDoc){
    $('#iddocente').val(iddocente);
    $('#GradoAcademico').val(GradoAcademico);
    $('#NombreDoc').val(NombreDoc);
    $('#APaternoDoc').val(APaternoDoc);
    $('#AMaternoDoc').val(AMaternoDoc);
    $('#correoDoc').val(correoDoc);
    $('#tiempoDoc').val(tiempoDoc);
    $('#tutorDoc').val(tutorDoc);
};

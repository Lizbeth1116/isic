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

datosModalAs = function (idAs, doce, asig, dia, horaIni, horaFin){
    $('#idAsesoria').val(idAs);
    $('#docenteAs').val(doce);
    $('#asignaturaAs').val(asig);
    $('#diaAs').val(dia);
    $('#horaIniAs').val(horaIni);
    $('#horaFinAs').val(horaFin);
};
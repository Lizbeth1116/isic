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

datosModalEsp1 = function (id, nombre, objetivo, pdf) {
    $('#idespecialidadEsp').val(id);
    $('#nombreEsp').val(nombre);
    $('#objetivoEsp').val(objetivo);
    $('#opEsp').val(1);
    $('#pdfReticula').val(pdf);
};

datosModalEsp2 = function (id, perfil) {
    $('#idegresoEsp').val(id);
    $('#perfilEsp').val(perfil);
    $('#perfilOriEsp').val(perfil);
    $('#opEsp').val(2);
};

datosModalEsp3 = function (idEsp, idAsi, descripcion) {
    $('#idEspEsp').val(idEsp);
    $('#labclaveEsp').text(idAsi);
    $('#claveEsp').val(idAsi);
    $('#descripcionEsp').val(descripcion);
    $('#opEsp').val(3);
};
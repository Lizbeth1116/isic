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

datosModalHistoInfo = function (id, nombre, obj, imag) {
    $('#idHist').val(id);
    $('#nombreHist').val(nombre);
    $('#objHist').val(obj);
    $('#imagenOriHist').val(imag);
};

datosModalCont = function (id, nombre) {
    $('#espConteHisto').val(id);
    $('#nombreCont').val(nombre);
    $('#espOriCont').val(id);
    $('#nombreOriCont').val(nombre);
};

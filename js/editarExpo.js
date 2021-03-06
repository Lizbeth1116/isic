// Disable form submissions if there are invalid fields
aux = 0;
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

datosModalExp2 = function (id) {
    $('#addIdPeriImag').val(id);
};

datosModalExp1 = function (id, desc) {
    $('#idImgExp').val(id);
    $('#descripcionExp').val(desc);
};

datosModalExp = function (id, per, anio) {
    $('#idPeriExp').val(id);
    $('#periodoExpo').val(per);
    $('#AnioExp').val(anio);
};


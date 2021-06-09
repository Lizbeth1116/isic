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

datosModalExp2 = function (id, carp) {
    $('#addIdPeriImag').val(id);
    $('#addCarpetaImag').val(carp);
};

datosModalExp1 = function (id, desc, imag, carp) {
    $('#idImgExp').val(id);
    $('#descripcionExp').val(desc);
    $('#nomImagOri').val(imag);
    $('#CarpetaImag').val(carp);
    
};

datosModalExp = function (id, per, anio) {
    $('#idPeriExp').val(id);
    $('#periodoExpo').val(per);
    $('#AnioExp').val(anio);
    $('#periodoExpoOri').val(per);
    $('#AnioExpOri').val(anio);
};


datosModalCarr = function (id, imag, text) {
    $('#idCarrou').val(id);
    $('#nomOriImgCarr').val(imag);
    $('#txtCar').val(text);
};

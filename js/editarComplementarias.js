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

datosModalComp = function (id, nombre, desc, imag, pdf) {
    $('#idComplement').val(id);
    $('#nombreComplement').val(nombre);
    $('#descComplement').val(desc);
    $('#nomOriImgComplement').val(imag);
    $('#nomOriPdfComplement').val(pdf);  
};

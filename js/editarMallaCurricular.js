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

datosModalMC1 = function (Semestre, areaConocimiento, clave, asignatura, horas) {
    $('#semestre').val(Semestre);
    $('#conocimiento').val(areaConocimiento);
    $('#clave').val(clave);
    $('#claveOri').val(clave);
    $('#nombre').val(asignatura);
    $('#horas').val(horas);
    $('#especialidad').val(1);
    $('#opGlobal').val(3);
    if (areaConocimiento === "Especialidad") {
        document.getElementById('especialidadtxt').style.display = 'block';
        document.getElementById('especialidad').style.display = 'block';
        $('#op').val(0);
    } else {
        document.getElementById('especialidadtxt').style.display = 'none';
        document.getElementById('especialidad').style.display = 'none';
    }
};

datosModalMC2 = function (Semestre, areaConocimiento, clave, asignatura, horas, Especialidad) {
    $('#semestre').val(Semestre);
    $('#conocimiento').val(areaConocimiento);
    $('#clave').val(clave);
    $('#claveOri').val(clave);
    $('#nombre').val(asignatura);
    $('#horas').val(horas);
    $('#especialidad').val(Especialidad);
    $('#idespecialidadOri').val(Especialidad);
    $('#opGlobal').val(3);
    if (areaConocimiento === "Especialidad") {
        $('#op').val(1);
        aux = 1;
        document.getElementById('especialidadtxt').style.display = 'block';
        document.getElementById('especialidad').style.display = 'block';
    } else {
        document.getElementById('especialidadtxt').style.display = 'none';
        document.getElementById('especialidad').style.display = 'none';
    }
};

showSelected = function ()
{
    var cod = document.getElementById("conocimiento").value;
    if (cod === "Especialidad") {
        if (aux === 1) {
            $('#op').val(1);
        } else {
            $('#op').val(0);
        }
        document.getElementById('especialidadtxt').style.display = 'block';
        document.getElementById('especialidad').style.display = 'block';
    } else {
        $('#op').val(-1);
        document.getElementById('especialidadtxt').style.display = 'none';
        document.getElementById('especialidad').style.display = 'none';
    }
};

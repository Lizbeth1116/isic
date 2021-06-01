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

datosModalInv1 = function (idtemaInv, temaInv){
    $('#idtemaInvInv').val(idtemaInv);
    $('#temaInvInv').val(temaInv);
    $('#opInv').val(1);
};

datosModalInv2 = function (tema, docente, cargo){
    $('#temaInv').val(tema);
    $('#temaOriInv').val(tema);
    $('#docenteInv').val(docente);
    $('#docenteOriInv').val(docente);
    $('#cargoInv').val(cargo);
    $('#opInv').val(2);
};

aux = 0;
datosModalMC1 = function (Semestre, areaConocimiento, clave, asignatura, horas, pdfOri) {
    $('#semestreMC').val(Semestre);
    $('#conocimientoMC').val(areaConocimiento);
    $('#claveMC').val(clave);
    $('#claveOriMC').val(clave);
    $('#nombreMC').val(asignatura);
    $('#horasMC').val(horas);
    $('#especialidadMC').val(1);
    $('#nomOriPdf').val(pdfOri);
    if (areaConocimiento === "Especialidad") {
        document.getElementById('especialidadtxtMC').style.display = 'block';
        document.getElementById('especialidadMC').style.display = 'block';
        $('#opMC').val(0);
    } else {
        document.getElementById('especialidadtxtMC').style.display = 'none';
        document.getElementById('especialidadMC').style.display = 'none';
    }
};

datosModalMC2 = function (Semestre, areaConocimiento, clave, asignatura, horas, Especialidad, pdfOri) {
    $('#semestreMC').val(Semestre);
    $('#conocimientoMC').val(areaConocimiento);
    $('#claveMC').val(clave);
    $('#claveOriMC').val(clave);
    $('#nombreMC').val(asignatura);
    $('#horasMC').val(horas);
    $('#especialidadMC').val(Especialidad);
    $('#idespecialidadOriMC').val(Especialidad);
    $('#nomOriPdf').val(pdfOri);
    if (areaConocimiento === "Especialidad") {
        $('#opMC').val(1);
        aux = 1;
        document.getElementById('especialidadtxtMC').style.display = 'block';
        document.getElementById('especialidadMC').style.display = 'block';
    } else {
        document.getElementById('especialidadtxtMC').style.display = 'none';
        document.getElementById('especialidadMC').style.display = 'none';
    }
};

showSelected = function ()
{
    var cod = document.getElementById("conocimientoMC").value;
    if (cod === "Especialidad") {
        if (aux === 1) {
            $('#opMC').val(1);
        }else{
            $('#opMC').val(0);
        }
        document.getElementById('especialidadtxtMC').style.display = 'block';
        document.getElementById('especialidadMC').style.display = 'block';
    } else {
        $('#opMC').val(-1);
        document.getElementById('especialidadtxtMC').style.display = 'none';
        document.getElementById('especialidadMC').style.display = 'none';
    }
    
    var cod2 = document.getElementById("conocimientoMCAdd").value;
    if (cod2 === "Especialidad") {
        document.getElementById('especialidadtxtMCAdd').style.display = 'block';
        document.getElementById('especialidadMCAdd').style.display = 'block';
    } else {
        document.getElementById('especialidadtxtMCAdd').style.display = 'none';
        document.getElementById('especialidadMCAdd').style.display = 'none';
    }
};
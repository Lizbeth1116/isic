/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

modVerMas = function (nom, obj) {
    document.getElementById('ModNom').textContent = nom;
    document.getElementById('ModObj').textContent = obj;
};

modVerMasEgr = function (Clave, Des) {
    document.getElementById('ModEspEgr').textContent = Clave;
    document.getElementById('ModEgre').textContent = Des;
};

modVerMasDesc = function (Clave, Des) {
    document.getElementById('ModClav').textContent = Clave;
    document.getElementById('ModDesc').textContent = Des;
}

modVerMasSoli = function (Nombre, Apellidos, Email, Semestre, Grupo, Telefono, Matricula, Proyecto, Fecha) {
    var texto = '<h4><b>' + Proyecto + '</b></h4><br>'
            + '<p>Nombre: <b>' + Nombre + ' ' + Apellidos+ '</b>'
            + '<br>Email: <b>' + Email + '</b>'
            + '<br>Matricula: <b>' + Matricula + '</b>'
            + '<br>Telefono: <b>' + Telefono + '</b>'
            + '<br>Semestre y Grupo: <b>' + Semestre + '° - ' + Grupo + '</b>'
            + '<br>Fecha: <b>' + Fecha + '</b></p>';
    document.getElementById('pSoliNo').innerHTML = texto;
}

modVerMasSoli2 = function (Nombre, Apellidos, Email, Semestre, Grupo, Telefono, Matricula, Proyecto, Fecha) {
    var texto = '<h4>' + Proyecto + '</h4><br>'
            + '<p>Nombre: ' + Nombre + ' ' + Apellidos
            + '<br>Email: ' + Email + '<br>Matricula: ' + Matricula 
            + '<br>Telefono: ' + Telefono 
            + '<br>Semestre y Grupo: ' + Semestre + '-' + Grupo 
            + '<br>Fecha: ' + Fecha + '</p>';
    document.getElementById('pSoli').innerHTML = texto;
}
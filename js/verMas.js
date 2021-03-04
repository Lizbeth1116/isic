/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

modVerMas= function (nom, obj){
    document.getElementById('ModNom').textContent=nom;
    document.getElementById('ModObj').textContent=obj;
};

modVerMasEgr= function (Clave, Des){
    document.getElementById('ModEspEgr').textContent=Clave;
    document.getElementById('ModEgre').textContent=Des;
};

modVerMasDesc= function (Clave, Des){
    document.getElementById('ModClav').textContent=Clave;
    document.getElementById('ModDesc').textContent=Des;
    
}
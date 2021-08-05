-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3308
-- Tiempo de generación: 14-06-2021 a las 05:43:24
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.8


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `isic`
--
create database isic;
use isic;
DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `DesHabPostFb` (`id` INT, `estado` INT, `op` INT)  BEGIN
IF op = 1 then
UPDATE `isic`.`postfb` SET `Estado` = estado WHERE (`idpostfb` = id);
elseif op = 2 then
DELETE FROM `isic`.`postfb` WHERE (`idpostfb` = id);
end if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_AddAsesoria` (`asesor` INT, `asig` VARCHAR(10), `ini` INT, `fin` INT, `dia` INT)  BEGIN
INSERT INTO `isic`.`asesorias` (`idAsesor`, `clavAsignatura`, `horaInicio`, `horaFin`, `dia`) 
VALUES (asesor, asig, ini, fin, dia);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_AddAsignaturaMalla` (`clav` VARCHAR(10), `asig` VARCHAR(60), `sem` INT, `hor` VARCHAR(15), `areatxt` VARCHAR(45), `esp` INT, `pdf` VARCHAR(100))  BEGIN
set @area = (select idareaConocimiento from isic.areaconocimiento  where Nombre = areatxt);
IF @area <> 8 then
	INSERT INTO `isic`.`mallacurricular` (`MC_ClaveAsignatura`, `MC_NombreAsignatura`, `MC_SemestreAsignatura`, `MC_HorasTot`, `MC_Area`, `MC_PdfNombre`) 
	VALUES (clav, asig, sem, hor, @area, pdf);
else 
	INSERT INTO `isic`.`mallacurricular` (`MC_ClaveAsignatura`, `MC_NombreAsignatura`, `MC_SemestreAsignatura`, `MC_HorasTot`, `MC_Area`, `MC_PdfNombre`, `MC_Especialidad`) 
	VALUES (clav, asig, sem, hor, @area, pdf, esp);
	INSERT INTO `isic`.`asignaturas_esp` (`idespecialidad`, `idasignatura`) 
    VALUES (esp, clav);
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_AddCarruselExpo` (`imag` VARCHAR(100), `txt` VARCHAR(45), `pert` INT)  BEGIN
INSERT INTO `isic`.`carruselexpo` (`ImagenCarr`, `Texto`, `Perteneciente`) 
VALUES (imag, txt, pert);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_AddColaboradorInv` (`tema` INT, `docent` INT, `cargo` INT)  BEGIN
INSERT INTO `isic`.`linea_investigacion` (`temalinea`, `Docente`, `CargoDocente`) 
VALUES (tema, docent, cargo);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_AddComplementarias` (`nom` VARCHAR(60), `descrip` VARCHAR(600), `imag` VARCHAR(100), `pdf` VARCHAR(100))  BEGIN
INSERT INTO `isic`.`complementarias` (`Nombre`, `Descripcion`, `Imagen`, `Pdf`) 
VALUES (nom, descrip, imag, pdf);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_AddContenidoHis` (`id` INT, `nom` VARCHAR(100))  BEGIN
INSERT INTO `isic`.`historial_contenido` (`idhistorial`, `nomContenidol`) 
VALUES (id, nom);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_AddContenidoHistorial` (`id` INT, `nom` VARCHAR(60))  BEGIN
INSERT INTO `isic`.`historial_contenido` (`idhistorial`, `nomContenidol`) 
VALUES (id, nom);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_AddEspecialidad` (`nom` VARCHAR(100), `obj` VARCHAR(600), `pdf` VARCHAR(100), `imag` VARCHAR(100))  BEGIN
INSERT INTO `isic`.`especialidad` (`Nombre`, `Objetivo`, `pdfReticula`, `imagen`) 
VALUES (nom, obj, pdf, imag);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_AddHistorialInfo` (`nom` VARCHAR(100), `obj` VARCHAR(600), `imag` VARCHAR(100))  BEGIN
INSERT INTO `isic`.`historial_esp` (`HINombre`, `HIObjetivo`, `HIimagen`) 
VALUES (nom, obj, imag);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_AddImgExpo` (`idPeri` INT, `descrip` VARCHAR(60), `imagenNom` VARCHAR(60))  BEGIN
INSERT INTO `isic`.`imagenexpo` (`idPeriodo`, `descripcion`, `imagenNom`) 
VALUES (idPeri, descrip, imagenNom);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_AddPEgreEsp` (`esp` INT, `cap` VARCHAR(300))  BEGIN
INSERT INTO `isic`.`p_egreso_esp`
(`idespecialidad`, `capacidad`)
VALUES(esp, cap);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_AddPeroExpo` (`peri` INT, `an` INT, `carpeta` VARCHAR(25))  BEGIN
INSERT INTO `isic`.`periodoexpo` (`periodo`, `año`, `carpetaImg`) 
VALUES (peri, an, carpeta);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_AddPostFb` (`post` VARCHAR(800), `subtitulo` VARCHAR(80))  BEGIN
INSERT INTO `isic`.`postfb` (`post`, `subtitulo`) 
VALUES (post, subtitulo);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_AddSolicitud` (`nomb` VARCHAR(45), `apellidos` VARCHAR(45), `email` VARCHAR(80), `sem` INT, `grupo` VARCHAR(1), `tel` VARCHAR(10), `matricula` VARCHAR(8), `proy` INT)  BEGIN
INSERT INTO `isic`.`solicitud` 
(`Nombre`, `Apellidos`, `Email`, `Semestre`, `Grupo`, `Telefono`, `Matricula`, `Proyecto`, `Fecha`) 
VALUES (nomb, apellidos, email, sem, grupo, tel, matricula, proy, (SELECT CURDATE()));
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_AddTemaLineaInvest` (`nom` VARCHAR(100))  BEGIN
INSERT INTO `isic`.`tema_linea_investigacion` (`Nombre`) VALUES (nom);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_area` ()  BEGIN
SELECT Nombre, Horas FROM isic.areaconocimiento;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_asignaturasEsp` (`pes` INT)  BEGIN
SELECT es.Nombre, ae.idasignatura, m.MC_NombreAsignatura, ae.descripcion 
FROM  isic.especialidad es join isic.asignaturas_esp ae join isic.mallacurricular m 
on (ae.idasignatura = m.MC_ClaveAsignatura and es.idespecialidad = ae.idespecialidad)
where ae.idespecialidad = pes and ae.Estado = 1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_DesHabAsesoria` (`asesoria` INT, `estado` INT, `op` INT)  BEGIN
IF op = 1 then
UPDATE `isic`.`asesorias` SET `estado` = estado WHERE (`idasesorias` = asesoria);
elseif op = 2 then
DELETE FROM `isic`.`asesorias` WHERE (`idasesorias` = asesoria);
end if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_DesHabAsigEsp` (`idesp` INT, `idasig` VARCHAR(10), `estado` INT, `op` INT)  BEGIN
IF op = 1 then
UPDATE `isic`.`asignaturas_esp` SET `Estado` = estado 
WHERE (`idespecialidad` = idesp) and (`idasignatura` = idasig);

elseif op = 2 then
DELETE FROM `isic`.`asignaturas_esp`
WHERE (`idespecialidad` = idesp) and (`idasignatura` = idasig);

end if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_DesHabCarruselExpo` (`id` INT, `estado` INT, `op` INT)  BEGIN
IF op = 1 then
UPDATE `isic`.`carruselexpo` SET `Estado` = estado 
where `idcarruselExpo` = id;

elseif op = 2 then
DELETE FROM `isic`.`carruselexpo`
where `idcarruselExpo` = id;

end if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_DesHabComplement` (`id` INT, `estado` INT, `op` INT)  BEGIN

IF op = 1 then
UPDATE `isic`.`complementarias` SET `Estado` = estado WHERE (`idComplementarias` = id);

elseif op = 2 then
DELETE FROM `isic`.`complementarias`
WHERE `idComplementarias` = id;
end if;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_DesHabContenidoHis` (`id` INT, `nom` VARCHAR(100), `estado` INT, `op` INT)  BEGIN

IF op = 1 then
UPDATE `isic`.`historial_contenido` SET `Estado` = estado 
WHERE (`idhistorial` = id) and (`nomContenidol` = nom);

elseif op = 2 then
DELETE FROM `isic`.`historial_contenido`
WHERE (`idhistorial` = id) and (`nomContenidol` = nom);
end if;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_DesHabEsp` (`esp` INT, `estado` INT, `op` INT)  BEGIN
IF op = 1 then
UPDATE `isic`.`especialidad` SET `Estado` = estado WHERE (`idespecialidad` = esp);

elseif op = 2 then
DELETE FROM `isic`.`especialidad`
WHERE `idespecialidad` = esp;
end if;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_DesHabExpo` (`idPer` INT, `estado` INT, `op` INT)  BEGIN
IF op = 1 then
UPDATE `isic`.`periodoexpo` SET `estado` = estado 
where `idperiodoExpo` = idPer;

elseif op = 2 then
DELETE FROM `isic`.`periodoexpo`
where `idperiodoExpo` = idPer;

end if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_DesHabHist` (`id` INT, `estado` INT, `op` INT)  BEGIN

IF op = 1 then
UPDATE `isic`.`historial_esp` SET `Estado` = estado WHERE (`idhistorial` = id);

elseif op = 2 then
DELETE FROM `isic`.`historial_esp`
WHERE `idhistorial` = id;
end if;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_DesHabImagExpo` (`idImg` INT, `estado` INT, `op` INT)  BEGIN
IF op = 1 then
UPDATE `isic`.`imagenexpo` SET `estado` = estado 
where `idimagenExpo` = idImg;

elseif op = 2 then
DELETE FROM `isic`.`imagenexpo`
where `idimagenExpo` = idImg;

end if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_DesHabLineaInvDoc` (`tema` INT, `doc` INT, `estado` INT, `op` INT)  BEGIN
IF op = 1 then
UPDATE `isic`.`linea_investigacion` SET `Estado` = estado 
WHERE (`temalinea` = tema) and (`Docente` = doc);

elseif op = 2 then
DELETE FROM `isic`.`linea_investigacion`
WHERE (`temalinea` = tema) and (`Docente` = doc);

end if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_DesHabMalla` (`clav` VARCHAR(10), `estado` INT, `op` INT)  BEGIN
IF op = 1 then
UPDATE `isic`.`mallacurricular` SET `MC_Estado` = estado 
WHERE (`MC_ClaveAsignatura` = clav);

elseif op = 2 then
DELETE FROM `isic`.`mallacurricular`
WHERE (`MC_ClaveAsignatura` = clav);

end if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_DesHabPEgreso` (`idesp` INT, `cap` VARCHAR(300), `estado` INT, `op` INT)  BEGIN
IF op = 1 then
UPDATE `isic`.`p_egreso_esp` SET `Estado` = estado
WHERE (`idespecialidad` = idesp and `capacidad` = cap);

elseif op = 2 then
DELETE FROM `isic`.`p_egreso_esp`
WHERE (`idespecialidad` = idesp and `capacidad` = cap);

end if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_DesHabSolicitud` (`soli` INT, `op` INT)  BEGIN
IF op = 1 then
UPDATE `isic`.`solicitud` SET `Leida` = '1' WHERE (`idsolicitud` = soli);
elseif op = 2 then
DELETE FROM `isic`.`solicitud` WHERE (`idsolicitud` = soli);
end if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_DesHabTemaInv` (`idTemaInv` INT, `estado` INT, `op` INT)  BEGIN
IF op = 1 then
UPDATE `isic`.`tema_linea_investigacion` SET `Estado` = estado 
WHERE (`idtema_linea_investigacion` = idTemaInv);

elseif op = 2 then
DELETE FROM `isic`.`tema_linea_investigacion`
WHERE (`idtema_linea_investigacion` = idTemaInv);

end if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_editAdmin` (`nUs` VARCHAR(50), `nPass` VARCHAR(50), `Us` VARCHAR(50))  BEGIN
UPDATE `isic`.`admin` SET `Usuario` = (select isic.fn_encript(nUs)), 
`Contraseña` = (select isic.fn_encript(nPass)) 
WHERE (`Usuario` = Us);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_editarAsig` (`nclav` VARCHAR(10), `nasig` VARCHAR(60), `nsem` INT, `nhor` VARCHAR(15), `narea` VARCHAR(45), `clav` VARCHAR(10), `esp` INT, `nesp` INT, `op` INT, `pdf` VARCHAR(100))  BEGIN
set @area = (select idareaConocimiento from isic.areaconocimiento  where Nombre = narea);
IF @area <> 8 then
	UPDATE `isic`.`mallacurricular` 
	SET `MC_ClaveAsignatura` = nclav, `MC_NombreAsignatura` = nasig, `MC_SemestreAsignatura` = nsem, `MC_HorasTot` = nhor, `MC_Area` = @area, `MC_PdfNombre` = pdf 
	WHERE (`MC_ClaveAsignatura` = clav);
ELSEIF @area = 8 and op = 0 then  
	UPDATE `isic`.`mallacurricular` 
	SET `MC_ClaveAsignatura` = nclav, `MC_NombreAsignatura` = nasig, `MC_SemestreAsignatura` = nsem, `MC_HorasTot` = nhor, `MC_Area` = @area, `MC_PdfNombre` = pdf  
	WHERE (`MC_ClaveAsignatura` = clav); 
    IF (Select count(idasignatura) FROM isic.asignaturas_esp where idasignatura = nclav)>0 then
		UPDATE `isic`.`asignaturas_esp` SET `idespecialidad` = nesp WHERE `idasignatura` = nclav;
	ELSE
		INSERT INTO `isic`.`asignaturas_esp` (`idespecialidad`, `idasignatura`) VALUES (nesp, nclav);
	END IF;
ELSEIF @area = 8 and op = 1 then 
	UPDATE `isic`.`mallacurricular` 
	SET `MC_ClaveAsignatura` = nclav, `MC_NombreAsignatura` = nasig, `MC_SemestreAsignatura` = nsem, `MC_HorasTot` = nhor, `MC_Area` = @area, `MC_PdfNombre` = pdf  
	WHERE (`MC_ClaveAsignatura` = clav); 
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_editarEsp` (`idesp` INT, `nom` VARCHAR(100), `obj` VARCHAR(600), `pdf` VARCHAR(100), `imag` VARCHAR(100))  BEGIN
UPDATE `isic`.`especialidad` SET `Nombre` = nom, `Objetivo` = obj, `pdfReticula` = pdf, `imagen` = imag 
WHERE (`idespecialidad` = idesp);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_editarLineaInv` (`temaOri` INT, `docOri` INT, `tema` INT, `doc` INT, `cargo` INT)  BEGIN
UPDATE `isic`.`linea_investigacion` SET `temalinea` = tema, `Docente` = doc, `CargoDocente` = cargo 
WHERE (`temalinea` = temaOri) and (`Docente` = docOri);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_editAsesoria` (`idasesoria` INT, `asesor` INT, `asig` VARCHAR(10), `ini` INT, `fin` INT, `dia` INT)  BEGIN
UPDATE `isic`.`asesorias` 
SET `idAsesor` = asesor, `clavAsignatura` = asig, `horaInicio` = ini, `horaFin` = fin, `dia` = dia  
WHERE (`idasesorias` = idasesoria);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_editAsigEsp` (`idesp` INT, `idasig` VARCHAR(10), `des` VARCHAR(600))  BEGIN
UPDATE `isic`.`asignaturas_esp` SET `descripcion` = des 
WHERE (`idespecialidad` = idesp) and (`idasignatura` = idasig);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_editCarruselExpo` (`id` INT, `imag` VARCHAR(100), `txt` VARCHAR(45))  BEGIN
UPDATE `isic`.`carruselexpo` SET `ImagenCarr` = imag, `Texto` = txt 
WHERE (`idcarruselExpo` = id);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_editComplementarias` (`nom` VARCHAR(60), `descrip` VARCHAR(600), `imag` VARCHAR(100), `pdf` VARCHAR(100), `id` INT)  BEGIN
UPDATE `isic`.`complementarias` 
SET `Nombre` = nom, `Descripcion` = descrip, `Imagen` = imag, `Pdf` = pdf 
WHERE (`idComplementarias` = id);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_editContenidoHis` (`id` INT, `nom` VARCHAR(100), `idn` INT, `nomn` VARCHAR(100))  BEGIN
UPDATE `isic`.`historial_contenido` 
SET `idhistorial` = idn, `nomContenidol` = nomn 
WHERE (`idhistorial` = id) and (`nomContenidol` = nom);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_editHitorialEsp` (`id` INT, `nom` VARCHAR(100), `obj` VARCHAR(600), `imag` VARCHAR(100))  BEGIN
UPDATE `isic`.`historial_esp` 
SET `HINombre` = nom, `HIObjetivo` = obj, `HIimagen` = imag 
WHERE (`idhistorial` = id);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_editImgExpo` (`idImg` INT, `descrip` VARCHAR(60), `imagenNom` VARCHAR(60))  BEGIN
UPDATE `isic`.`imagenexpo`
SET `descripcion` = descrip, `imagenNom` = imagenNom
where `idimagenExpo` = idImg;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_editInfoRelevante` (`id` INT, `año` INT, `tiempo` INT, `mat` VARCHAR(45), `numEsp` INT, `numLab` INT, `desTecno` VARCHAR(65))  BEGIN
UPDATE `isic`.`inforelevante` 
SET `año` = año, 
`tiempo` = tiempo, 
`matriculas` = mat, 
`numEspecialidades` = numEsp, 
`numLaboratorios` = numLab, 
`desTecno` = desTecno 
WHERE (`idinfoRelevante` = id);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_editPEgreso` (`idesp` INT, `capOri` VARCHAR(300), `cap` VARCHAR(300))  BEGIN
UPDATE `isic`.`p_egreso_esp` SET `capacidad` = cap
WHERE (`idespecialidad` = idesp and `capacidad` = capOri);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_editPeriodoExpo` (`idExpo` INT, `periodo` INT, `año` INT, `carpeta` VARCHAR(25))  BEGIN
UPDATE `isic`.`periodoexpo` SET `periodo` = periodo, `año` = año, `carpetaImg` = carpeta 
WHERE (`idperiodoExpo` = idExpo);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_editPostFb` (`id` INT, `subtitulo` VARCHAR(80))  BEGIN
UPDATE `isic`.`postfb` SET `subtitulo` = subtitulo WHERE (`idpostfb` = id);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_editTemaIvs` (`idTema` INT, `tema` VARCHAR(100))  BEGIN
UPDATE `isic`.`tema_linea_investigacion` SET `Nombre` = tema 
WHERE (`idtema_linea_investigacion` = idTema);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_egreso` (`pes` INT)  BEGIN
SELECT capacidad FROM isic.p_egreso_esp
where idespecialidad = pes and Estado = 1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_especialidad` (`pes` INT)  BEGIN
SELECT Nombre, Objetivo, pdfReticula, imagen
FROM isic.especialidad
where idespecialidad = pes;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_especialidad_lista` ()  BEGIN
SELECT idespecialidad,Nombre FROM isic.especialidad
where Estado = 1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getAdmin` ()  BEGIN
select isic.fn_desencript(Usuario) Usuario, 
isic.fn_desencript(Contraseña) Contraseña 
FROM isic.admin;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getAdminOri` ()  BEGIN
SELECT * FROM isic.admin;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getAsesor` ()  BEGIN
SELECT concat(d.Nombre, " ", d.APaterno, " ", d.AMaterno) asesor 
FROM isic.asesorias a join isic.docente d
on (a.idAsesor = d.iddocente)
group by a.idAsesor; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getAsesorias` ()  BEGIN
SELECT a.idasesorias, a.idAsesor, concat(d.Nombre, " ", d.APaterno, " ", d.AMaterno) asesor,
a.clavAsignatura, m.MC_NombreAsignatura asignatura, a.horaInicio,  a.horaFin, a.dia, a.estado
FROM isic.asesorias a join isic.docente d join isic.mallacurricular m
on (a.idAsesor = d.iddocente and a.clavAsignatura = m.MC_ClaveAsignatura)
order by a.idAsesor;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getAsignatura` (`clav` VARCHAR(10))  BEGIN
SELECT m.MC_SemestreAsignatura , m.MC_ClaveAsignatura, m.MC_HorasTot, m.MC_NombreAsignatura, a.Nombre
FROM isic.mallacurricular m join isic.areaconocimiento a on (m.MC_Area = a.idareaConocimiento)
where  m.MC_ClaveAsignatura like clav;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getAsignaturaEspAdmin` ()  BEGIN
SELECT es.idespecialidad, es.Nombre, ae.idasignatura, ae.descripcion, ae.Estado
FROM isic.asignaturas_esp ae join isic.especialidad es
on ae.idespecialidad = es.idespecialidad;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getCarruselExpo` ()  BEGIN
SELECT * FROM isic.carruselexpo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getComplementarias` ()  BEGIN
SELECT * FROM isic.complementarias;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getContenidoHistorial` (`id` INT)  BEGIN
SELECT nomContenidol, Estado
FROM isic.historial_contenido
where idhistorial = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getContenidoHistorialAdmin` ()  BEGIN
SELECT c.nomContenidol, c.Estado, i.HINombre, c.idhistorial 
FROM isic.historial_contenido c join isic.historial_esp i 
on (c.idhistorial = i.idhistorial);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getDatosAPasarHistorial` (`esp` INT)  BEGIN
SELECT MC_NombreAsignatura, MC_PdfNombre 
FROM isic.mallacurricular 
where MC_Especialidad = esp;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getDocente` ()  BEGIN
select iddocente, concat_ws(" ", Nombre, APaterno, AMaterno) as Docente, correo, tiempo 
FROM isic.docente;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getEgresoAdmin` ()  BEGIN
SELECT eg.idespecialidad, es.Nombre, eg.capacidad, eg.Estado
FROM isic.p_egreso_esp eg join isic.especialidad es
on es.idespecialidad = eg.idespecialidad;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getEspecialidadAdmin` ()  BEGIN
SELECT * FROM isic.especialidad;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getHistorialInfo` ()  BEGIN
SELECT * FROM isic.historial_esp;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getIdHistorial` (`nom` VARCHAR(100))  BEGIN
SELECT idhistorial 
FROM isic.historial_esp
where HINombre = nom;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getImagenesExpo` (`per` INT)  BEGIN
SELECT i.idimagenExpo, i.descripcion, i.estado, i.imagenNom, p.carpetaImg 
FROM isic.imagenexpo i join isic.periodoexpo p 
on i.idPeriodo = p.idperiodoExpo
where idPeriodo = per;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getInforelevante` ()  BEGIN
SELECT * FROM isic.inforelevante;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getListaPE` ()  BEGIN
SELECT * FROM isic.tipo_pe;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getListaServicios` ()  BEGIN
SELECT idservicios, Nombre_Servicio FROM isic.servicios;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getMalla_Admin` ()  BEGIN
SELECT m.MC_SemestreAsignatura , m.MC_ClaveAsignatura, m.MC_HorasTot, m.MC_NombreAsignatura, a.Nombre, m.MC_Estado, m.MC_PdfNombre
FROM isic.mallacurricular m join isic.areaconocimiento a on (m.MC_Area = a.idareaConocimiento)
order by m.MC_SemestreAsignatura;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getPEDescrip` (`tipo` INT)  BEGIN
SELECT d.idpe_isic, t.Nombre, d.DescripcionPE 
FROM isic.pe_isic d join isic.tipo_pe t
on (d.idPETipo = t.idtipo_PE)
where d.idPETipo = tipo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getPeriodo` ()  BEGIN
SELECT * FROM isic.periodoexpo order by año, periodo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getPostfb` ()  BEGIN
SELECT * FROM isic.postfb;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getServicio` (`idServ` INT)  BEGIN
SELECT Nombre_Servicio, Objetivo FROM isic.servicios
WHERE idservicios = idServ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getSolicitud` ()  BEGIN
SELECT s.idsolicitud, s.Nombre, s.Apellidos, s.Email, s.Semestre, s.Grupo, 
s.Telefono, s.Matricula, t.Nombre Proyecto, s.Fecha, s.Leida 
FROM isic.solicitud s join isic.tema_linea_investigacion t
on (s.Proyecto = t.idtema_linea_investigacion)
group by s.Proyecto order by s.Fecha DESC; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getTemaInv` ()  BEGIN
SELECT * FROM isic.tema_linea_investigacion;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getUltimaExpo` ()  BEGIN
SELECT idperiodoExpo, periodo, año FROM isic.periodoexpo order by año desc, periodo desc limit 1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_get_ListaMateriasEsp` ()  BEGIN
SELECT ae.idespecialidad, es.Nombre, ae.idasignatura
FROM  isic.especialidad es join isic.asignaturas_esp ae
on (es.idespecialidad = ae.idespecialidad);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_lineaInvs` ()  BEGIN
SELECT li.temalinea, tl.Nombre, d.GradoAcademico, li.Docente as idDocente, 
concat_ws(" ", d.Nombre, d.APaterno, d.AMaterno) as Docente, 
li.CargoDocente, li.Estado, tl.Estado as EstadoTema
FROM isic.linea_investigacion li join isic.tema_linea_investigacion tl join isic.docente d
on (li.temalinea = tl.idtema_linea_investigacion and li.Docente = d.iddocente)
order by Nombre, CargoDocente;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_malla` (`psem` INT, `pes` INT)  BEGIN 
SELECT m.MC_ClaveAsignatura, m.MC_HorasTot, m.MC_NombreAsignatura, a.Nombre, a.Horas, m.MC_PdfNombre
FROM isic.mallacurricular m join isic.areaconocimiento a on (m.MC_Area = a.idareaConocimiento)
where m.MC_SemestreAsignatura = psem and m.MC_Estado = 1
and m.MC_NombreAsignatura not in 
(SELECT m.MC_NombreAsignatura
FROM isic.asignaturas_esp ae join isic.mallacurricular m 
on (ae.idasignatura = m.MC_ClaveAsignatura) where ae.idespecialidad <> pes);
END$$

--
-- Funciones
--
CREATE DEFINER=`root`@`localhost` FUNCTION `fn_desencript` (`passE` VARCHAR(50)) RETURNS VARCHAR(50) CHARSET latin1 NO SQL
BEGIN

declare pass varchar(50) default '';
declare aux int;
declare aux2 int default 1;
declare ascEnc int;
declare keyP int default (SELECT ASCII(SUBSTR(passE,(length(passE)),1)));

i: loop
	IF aux2 < (select length(passE)) THEN
		set aux = (SELECT ASCII(SUBSTR(passE,aux2,1)));
		set aux2 = aux2+1;
		set ascEnc = aux-keyP;
		set pass = (SELECT CONCAT(pass, cast(CHAR(ascEnc using utf8)as char)));
		ITERATE i;
	END IF;    
	LEAVE i;
END LOOP i;
	
RETURN pass;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `fn_encript` (`pass` VARCHAR(50)) RETURNS VARCHAR(50) CHARSET latin1 NO SQL
BEGIN

declare passE varchar(50) default '';
declare aux int;
declare aux2 int default 1;
declare ascEnc int;
declare keyP int default (select FLOOR(rand()*127+1)); 

i: loop
	IF aux2 <= (select length(pass)) THEN
		set aux = (SELECT ASCII(SUBSTR(pass,aux2,1)));
		set aux2 = aux2+1;
		set ascEnc = aux+keyP; 
		set passE = (SELECT CONCAT(passE, cast(CHAR(ascEnc using utf8)as char)));
        if ascEnc > 127 then
			set passE = '';
            set keyP = (select FLOOR(rand()*127+1)); 
            set aux2=1;
        END IF; 
		ITERATE i;
	END IF;    
    set passE = (SELECT CONCAT(passE, cast(CHAR(keyP using utf8)as char)));
	LEAVE i;
END LOOP i;
	
RETURN passE;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `Usuario` varchar(50) NOT NULL,
  `Contraseña` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`Usuario`, `Contraseña`) VALUES
('uuo', 'p{zvlo5pzpj9798');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areaconocimiento`
--

CREATE TABLE `areaconocimiento` (
  `idareaConocimiento` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Horas` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `areaconocimiento`
--

INSERT INTO `areaconocimiento` (`idareaConocimiento`, `Nombre`, `Horas`) VALUES
(1, 'Ciencias Basicas', 832),
(2, 'Ciencias de la Ingenieria', 558),
(3, 'Ingenieria Aplicada', 512),
(4, 'Diseño en Ingenieria', 864),
(5, 'Ciencias Sociales y Humanidades', 256),
(6, 'Cursos complementarios', 400),
(7, 'Ciencias economico administrativa', 288),
(8, 'Especialidad', 400),
(9, 'Residencia', 500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asesorias`
--

CREATE TABLE `asesorias` (
  `idasesorias` int(11) NOT NULL,
  `idAsesor` int(11) DEFAULT NULL,
  `clavAsignatura` varchar(10) DEFAULT NULL,
  `horaInicio` int(2) DEFAULT NULL,
  `horaFin` int(2) DEFAULT NULL,
  `dia` int(1) DEFAULT 1,
  `estado` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asesorias`
--

INSERT INTO `asesorias` (`idasesorias`, `idAsesor`, `clavAsignatura`, `horaInicio`, `horaFin`, `dia`, `estado`) VALUES
(30, 9, 'TDAM-2003', 15, 16, 1, 1),
(31, 9, 'SCC-1017', 16, 17, 1, 1),
(32, 9, 'ACA-0909', 12, 13, 5, 1),
(33, 5, 'SCD-1015', 12, 14, 1, 1),
(35, 5, 'SCD-1020', 16, 18, 3, 1),
(37, 6, 'SCA-1004', 15, 16, 1, 1),
(38, 6, 'SCD-1011', 13, 14, 2, 1),
(39, 3, 'SCC-1019', 15, 16, 1, 1),
(40, 3, 'ACA-0909', 14, 15, 2, 1),
(41, 3, 'CDDT-2004', 11, 12, 3, 1),
(42, 3, 'CDDT-2004', 10, 11, 5, 1),
(43, 3, 'SCC-1019', 11, 12, 5, 1),
(44, 10, 'SCC-1014', 12, 13, 1, 1),
(45, 10, 'SCC-1014', 17, 18, 2, 1),
(46, 11, 'SCD-1015', 13, 14, 2, 1),
(47, 11, 'SCD-1027', 8, 9, 5, 1),
(48, 11, 'SCC-1019', 12, 13, 5, 1),
(51, 15, 'AEF-1052', 15, 16, 2, 1),
(52, 15, 'SCD-1018', 16, 17, 2, 1),
(53, 13, 'SCD-1020', 10, 12, 1, 1),
(55, 13, 'CDDT-2003', 9, 10, 2, 1),
(56, 13, 'SCD-1020', 12, 13, 3, 1),
(57, 13, 'SCC-1010', 11, 12, 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaturas_esp`
--

CREATE TABLE `asignaturas_esp` (
  `idespecialidad` int(11) NOT NULL,
  `idasignatura` varchar(10) NOT NULL,
  `descripcion` varchar(600) DEFAULT NULL,
  `Estado` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asignaturas_esp`
--

INSERT INTO `asignaturas_esp` (`idespecialidad`, `idasignatura`, `descripcion`, `Estado`) VALUES
(1, 'CDDT-2001', 'Identifica y aplica los conceptos de ciencia de datos con relación a la estadística para dar solución de proyectos que demanda de procesamiento de datos y toma de decisiones.', 1),
(1, 'CDDT-2002', 'Diseñar e implementar herramientas de programación que requieran procesar grandes volúmenes de información en situaciones reales y de ingeniería, de tal forma que le permitan obtener información valiosa para la toma de decisiones.', 1),
(1, 'CDDT-2003', 'Aplicar técnicas de minería de datos, a fin de analizar la información de un data warehouse o una estructura de big data, para obtener el conocimiento que le ayude a tomar decisiones estratégicas y operacionales en una organización. ', 1),
(1, 'CDDT-2004', 'Desarrollar aplicaciones y sistemas que utilicen técnicas de aprendizaje computacional para la obtención de un modelo a partir de la extracción automática de información y conocimiento de grandes volúmenes de datos.', 1),
(1, 'CDDT-2005', 'Analiza problemas que requieran la toma decisiones tomando como base la información que se genera en una empresa, procesa la información usando las técnicas y herramientas que mejor se ajusten al problema y genera resultados para la toma de decisiones.', 1),
(2, 'TDAM-2001', 'Analiza y aplica las herramientas y metodologías para el desarrollo de aplicaciones móviles según su evolución en hardware y software.', 1),
(2, 'TDAM-2002', 'Desarrolla, depura y coloca aplicaciones en dispositivos con software propietario, para  un ambiente de desarrollo móvil.', 1),
(2, 'TDAM-2003', 'Conocer técnicas avanzadas de visión por computadora para que los estudiantes formen una capacidad de resolución de problemas en entornos nuevos o poco conocido dentro de contextos más amplios (o multidisciplinares) relacionados con su área de estudio. Capacidad de integrar tecnologías y algoritmos propios de la visión por computadora, con carácter generalista, y en contextos más amplios y multidisciplinares.', 1),
(2, 'TDAM-2004', 'Conoce e implementa las herramientas y técnicas de un framework propietario y abierto para el desarrollo de aplicaciones móviles multiplataforma.', 1),
(2, 'TDAM-2005', 'Identifica, analiza y simula amenazas cibernéticas que vulneran la integridad de la información y recursos de una infraestructura de red así como técnicas de pruebas para aseverar la calidad en un proyecto.', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carruselexpo`
--

CREATE TABLE `carruselexpo` (
  `idcarruselExpo` int(11) NOT NULL,
  `ImagenCarr` varchar(100) DEFAULT NULL,
  `Texto` varchar(45) DEFAULT 'Expo Sistemas',
  `Estado` int(11) DEFAULT 1,
  `Perteneciente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carruselexpo`
--

INSERT INTO `carruselexpo` (`idcarruselExpo`, `ImagenCarr`, `Texto`, `Estado`, `Perteneciente`) VALUES
(1, 'demo4.jpg', 'Agosto - Diciembre 2020', 1, 2),
(2, 'demo3.jpg', 'Enero - Mayo 2020', 1, 2),
(3, 'demo6.jpg', 'Agosto - Diciembre 2019', 1, 2),
(4, 'demo5.jpg', 'Enero - Mayo 2019', 1, 2),
(8, 'imagen-home_01.jpg', '', 1, 1),
(9, 'imagen-home_02.jpg', '', 1, 1),
(10, 'imagen-home_03.jpg', '', 1, 1),
(11, 'imagen-home_04.jpg', '', 1, 1),
(12, 'imagen-home_05.jpg', '', 1, 1),
(13, 'imagen-home_06.jpg', '', 1, 1),
(14, 'imagen-home_07.jpg', '', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `complementarias`
--

CREATE TABLE `complementarias` (
  `idComplementarias` int(11) NOT NULL,
  `Nombre` varchar(60) DEFAULT NULL,
  `Descripcion` varchar(600) DEFAULT NULL,
  `Imagen` varchar(100) DEFAULT 'Sin Imagen',
  `Pdf` varchar(100) DEFAULT 'Sin Archivo',
  `Estado` varchar(45) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `complementarias`
--

INSERT INTO `complementarias` (`idComplementarias`, `Nombre`, `Descripcion`, `Imagen`, `Pdf`, `Estado`) VALUES
(1, 'Gamer ISIC', 'Integrar un equipo de competencia para las diferentes ramas de los e-sports, a través de la participación y practica de estudiantes de los programas educativos de la institución, para competir en torneos locales, estatales y/o nacionales.', 'game_isic.svg', 'formato de registro de actividades complementarias GamerISIC 2021.pdf', '1'),
(2, 'Rally Networks', 'Brindar a las y los estudiantes de la carrera de Ingeniería en Sistemas Computacionales, la oportunidad de probar sus habilidades creando redes interactivas y demostrando tanto sus conocimientos como aptitudes desarrolladas en los cursos de Cisco Networking Academy.', 'really_networks.svg', 'formato de registro de actividades complementarias RallyNetworksISIC 2021 vf.pdf', '1'),
(3, 'Robótica', 'Generar prototipos del área de robótica a través de la participación de estudiantes y docentes de los diversos programas educativos, que permitan competir en torneos locales, estatales y/o nacionales.', 'robotica.svg', 'formato de registro de actividades complementarias Robótica 2021.pdf', '1'),
(4, 'Taller de Lógica MatemáticaTaller de Lógica Matemática', 'Desarrollar la lógica y reconocimiento de patrones de los estudiantes utilizando rompecabezas tipo tangramas, el juego en línea de aprendizaje de habilidades de , y la plataforma en línea de aprendizaje de habilidades de p', 'logica_matematica.svg', 'formato de registro de actividades complementarias Taller de LógicaMatemática 2021.pdf', '1'),
(5, 'Taller de Fabrica de Software', 'Desarrollar sistemas de información y aplicaciones de software, mediante el uso de metodologías, hardware y software que den solución a las necesidades en el área de Sistemas Computacionales u algunas otras dentro del Instituto.', 'fabrica_de_software.svg', 'formato de registro de actividades complementarias Taller FabricaDeSoftware 2021.pdf', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `iddocente` int(11) NOT NULL,
  `GradoAcademico` varchar(15) DEFAULT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `APaterno` varchar(45) DEFAULT NULL,
  `AMaterno` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `tiempo` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`iddocente`, `GradoAcademico`, `Nombre`, `APaterno`, `AMaterno`, `correo`, `tiempo`) VALUES
(1, 'Ingeniería', 'Javier', 'Pérez', 'Escamilla', 'javierperez@itsoeh.edu.mx', 2),
(2, 'Maestria', 'Lorena', 'Mendoza', 'Gúzman', 'lmendozag@itsoeh.edu.mx', 2),
(3, 'Maestria', 'Dulce Jazmín', 'Navarrete', 'Arias', 'dnavarrete@itsoeh.edu.mx', 1),
(5, 'Maestria', 'Mario', 'Pérez', 'Bautista', 'mperez@itsoeh.edu.mx', 2),
(6, 'Maestria', 'Cristy Elizabeth', 'Aguilar', 'Ojeda', 'caguilar@itsoeh.edu.mx', 2),
(7, 'Maestria', 'Héctor Daniel', 'Hernández', 'García', 'hhernandez@itsoeh.edu.mx', 2),
(8, 'Maestria', 'Eliud', 'Paredes', 'Reyes', 'eparedes@itsoeh.edu.mx', 2),
(9, 'Doctorado', 'Elizabeth', 'García', 'Ríos', 'egarciar@itsoeh.edu.mx', 2),
(10, 'Maestria', 'Guadalupe', 'Calvo', 'Torres', 'gcalvo@itsoeh.edu.mx', 1),
(11, 'Maestria', 'Aline', 'Pérez', 'Martínez', 'aperez@itsoeh.edu.mx', 1),
(12, 'Maestria', 'Juan Carlos', 'Céron', 'Almaraz', 'jcerona@itsoeh.edu.mx', 1),
(13, 'Maestria', 'Sergio', 'Cruz', 'Pérez', 'scruzp@itsoeh.edu.mx', 1),
(14, 'Maestria', 'Guillermo', 'Castañeda', 'Ortíz', 'gcastaneda@itsoeh.edu.mx', 1),
(15, 'Ingeniería', 'Jorge Armando', 'Garcia', 'Bautista', 'jgarciab@itsoeh.edu.mx', 1),
(16, 'Maestria', 'Juan Lucino', 'Lugo', 'López', 'llugol@itsoeh.edu.mx', 1),
(17, 'Maestria', 'Juan Adolfo', 'Alvarez', 'Martínez', 'jaalvarez@itsoeh.edu.mx', 1),
(18, 'Licenciatura', 'German', 'Rebolledo', 'Avalos', 'grebolledo@itsoeh.edu.mx', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `idespecialidad` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Objetivo` varchar(600) DEFAULT NULL,
  `Estado` int(11) DEFAULT 1,
  `pdfReticula` varchar(100) DEFAULT 'Sin Archivo',
  `imagen` varchar(100) DEFAULT 'Sin Imagen'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`idespecialidad`, `Nombre`, `Objetivo`, `Estado`, `pdfReticula`, `imagen`) VALUES
(1, 'Ciencia de los Datos', 'El especialista En Ciencia de los Datos será capaz de estudiar las diversas fuentes de información disponibles en una organización, extraer, depurar y analizar datos a partir de diversos formatos, idear y desarrollar algoritmos; realizar inferencias, preparar, comunicar resultados y transmitir conclusiones acerca de los estudios que ayude al organismo o compañí­a a tomar decisiones basadas en el conocimiento extraído.', 1, 'RETICULA ISIC 2010-224, Ciencia de datos.pdf', 'Ciencia de los Datos.svg'),
(2, 'Tecnologías Emergentes para el Desarrollo de aplicaciones móviles', 'El especialista en tecnologías emergentes para el desarrollo de aplicaciones móviles será capaz de diseñar, construir e implementar aplicaciones móviles utilizando tecnología emergente que resuelva problemáticas y necesidades en las empresas e instituciones públicas y privadas.', 1, 'RETICULA ISIC 2010-224, Tecnologias emergentes para el desarrollo de aplicaciones mo¦üviles .pdf', 'Tecnologías Emergentes para el Desarrollo de aplicaciones móviles.svg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_contenido`
--

CREATE TABLE `historial_contenido` (
  `idhistorial` int(11) NOT NULL,
  `nomContenidol` varchar(60) NOT NULL,
  `Estado` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `historial_contenido`
--

INSERT INTO `historial_contenido` (`idhistorial`, `nomContenidol`, `Estado`) VALUES
(1, 'Aplicaciones Multiplataforma', 1),
(1, 'Modelos de Negocio y Marketing en Tecnología', 1),
(1, 'Sensores y Actuadores', 1),
(1, 'Sistemas Embebidos y Automatizados', 1),
(1, 'Sistemas Inteligentes', 1),
(2, 'Desarrollo Móvil I', 1),
(2, 'Desarrollo Móvil II', 1),
(2, 'Desarrollo Móvil Multiplataforma', 1),
(2, 'Modelos de Negocio y Marketing en Tecnología', 1),
(2, 'Segurirdad en Tecnología Móvil', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_esp`
--

CREATE TABLE `historial_esp` (
  `idhistorial` int(11) NOT NULL,
  `HINombre` varchar(100) DEFAULT NULL,
  `HIObjetivo` varchar(600) DEFAULT NULL,
  `HIimagen` varchar(100) DEFAULT 'Sin Imagen',
  `Estado` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `historial_esp`
--

INSERT INTO `historial_esp` (`idhistorial`, `HINombre`, `HIObjetivo`, `HIimagen`, `Estado`) VALUES
(1, 'Tecnologías y Aplicaciones con Sistemas Inteligentes', 'El especialista en Tecnologías y Aplicaciones con Sistemas Inteligentes será capaz de generar, adaptar y aplicar tecnología innovadora para resolver problemas de robótica e inteligencia artificial en proyectos del internet de las cosas, así como en ambientes académicos y de investigación.', 'historial_especialidad_1.svg', 1),
(2, 'Desarrollo de Aplicaciones Móviles', 'El especialista en desarrollo de aplicaciones móviles será capaz de analizar y desarrollar aplicaciones móviles en ambientes nativas y de multiplataforma para las necesidades de las empresas e instituciones públicas y privadas que satisfagan las necesidades y problemas con tecnología móvil.', 'historial_especialidad_2.svg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenexpo`
--

CREATE TABLE `imagenexpo` (
  `idimagenExpo` int(11) NOT NULL,
  `idPeriodo` int(11) NOT NULL,
  `descripcion` varchar(60) DEFAULT NULL,
  `estado` int(1) DEFAULT 1,
  `imagenNom` varchar(100) DEFAULT 'Sin Imagen'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `imagenexpo`
--

INSERT INTO `imagenexpo` (`idimagenExpo`, `idPeriodo`, `descripcion`, `estado`, `imagenNom`) VALUES
(29, 6, 'Participante de Expo-Sistemas', 1, '01.jpg'),
(31, 6, 'Participante de Expo-Sistemas', 1, '02.jpg'),
(35, 6, 'Participante de Expo-Sistemas', 1, '03.jpg'),
(36, 6, 'Participante de Expo-Sistemas', 1, '04.jpg'),
(37, 6, 'Participante de Expo-Sistemas', 1, '05.jpg'),
(40, 6, 'Participante de Expo-Sistemas', 1, '06.jpg'),
(41, 6, 'Participante de Expo-Sistemas', 1, '07.jpg'),
(42, 9, 'Entrega de Reconocimientos', 1, '01.jpg'),
(43, 9, 'Participante de Expo-Sistemas', 1, '02.jpg'),
(44, 9, 'Participante de Expo-Sistemas', 1, '03.jpg'),
(45, 9, 'Participante de Expo-Sistemas', 1, '04.jpg'),
(46, 9, 'Participante de Expo-Sistemas', 1, '05.jpg'),
(47, 9, 'Participante de Expo-Sistemas', 1, '06.jpg'),
(48, 9, 'Entrega de Reconocimientos', 1, '07.jpg'),
(49, 9, 'Entrega de Reconocimientos', 1, '08.jpg'),
(50, 1, 'Participante de Expo-Sistemas', 1, '01.png'),
(53, 6, 'Participante de Expo-Sistemas', 1, '08.jpg'),
(54, 1, 'Participante de Expo-Sistemas', 1, '02.png'),
(55, 1, 'Participante de Expo-Sistemas', 1, '03.png'),
(56, 1, 'Participante de Expo-Sistemas', 1, '04.png'),
(57, 1, 'Participante de Expo-Sistemas', 1, '05.png'),
(58, 1, 'Participante de Expo-Sistemas', 1, '06.jpg'),
(59, 1, 'Participante de Expo-Sistemas', 1, '07.png'),
(60, 1, 'Participante de Expo-Sistemas', 1, '08.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inforelevante`
--

CREATE TABLE `inforelevante` (
  `idinfoRelevante` int(11) NOT NULL,
  `año` int(11) DEFAULT NULL,
  `tiempo` int(11) DEFAULT NULL,
  `matriculas` varchar(45) DEFAULT NULL,
  `numEspecialidades` int(11) DEFAULT NULL,
  `numLaboratorios` int(11) DEFAULT NULL,
  `desTecno` varchar(65) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inforelevante`
--

INSERT INTO `inforelevante` (`idinfoRelevante`, `año`, `tiempo`, `matriculas`, `numEspecialidades`, `numLaboratorios`, `desTecno`) VALUES
(1, 2019, 5, '256 Estudiantes', 2, 4, '1 Centro de formación de capital humano');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea_investigacion`
--

CREATE TABLE `linea_investigacion` (
  `temalinea` int(11) NOT NULL,
  `Docente` int(11) NOT NULL,
  `CargoDocente` int(11) DEFAULT NULL,
  `Estado` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `linea_investigacion`
--

INSERT INTO `linea_investigacion` (`temalinea`, `Docente`, `CargoDocente`, `Estado`) VALUES
(1, 1, 2, 1),
(1, 2, 2, 1),
(1, 8, 1, 1),
(2, 3, 1, 1),
(2, 9, 2, 1),
(3, 5, 2, 1),
(3, 6, 2, 1),
(3, 7, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mallacurricular`
--

CREATE TABLE `mallacurricular` (
  `MC_ClaveAsignatura` varchar(10) NOT NULL,
  `MC_NombreAsignatura` varchar(60) DEFAULT NULL,
  `MC_SemestreAsignatura` int(1) DEFAULT NULL,
  `MC_HorasTot` varchar(15) DEFAULT NULL,
  `MC_Area` int(11) DEFAULT NULL,
  `MC_Estado` tinyint(4) DEFAULT 1,
  `MC_PdfNombre` varchar(100) DEFAULT 'Sin Archivo',
  `MC_Especialidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mallacurricular`
--

INSERT INTO `mallacurricular` (`MC_ClaveAsignatura`, `MC_NombreAsignatura`, `MC_SemestreAsignatura`, `MC_HorasTot`, `MC_Area`, `MC_Estado`, `MC_PdfNombre`, `MC_Especialidad`) VALUES
('***', 'Residencia', 9, '10', 9, 1, 'Sin Archivo', NULL),
('ACA-0907', 'Taller de Etica', 1, '0-4-4 -> 64Hrs', 5, 1, 'AC007 Taller de Etica.pdf', NULL),
('ACA-0909', 'Taller de Investigacion I', 6, '0-4-4 -> 64Hrs', 5, 1, 'Sin Archivo', NULL),
('ACA-0910', 'Taller de Investigacion II', 8, '0-4-4 -> 64Hrs', 5, 1, 'Sin Archivo', NULL),
('ACC-0906', 'Fundamentos de Investigacion', 1, '2-2-4 -> 64Hrs', 5, 1, 'AC006 Fundamentos de Investigacion.pdf', NULL),
('ACD-0908', 'Desarollo Sustentable', 5, '2-3-5 -> 80Hrs', 7, 1, 'Sin Archivo', NULL),
('ACF-0901', 'Calculo Diferencial', 1, '3-2-5 -> 80Hrs', 1, 1, 'AC001 Calculo Diferencial.pdf', NULL),
('ACF-0902', 'Calculo Integral', 2, '3-2-5 -> 80Hrs', 1, 1, 'AC002 Calculo Integral.pdf', NULL),
('ACF-0903', 'Algebra Lineal', 2, '3-2-5 -> 80Hrs', 1, 1, 'Sin Archivo', NULL),
('ACF-0904', 'Calculo Vectorial', 3, '3-2-5 -> 80Hrs', 1, 1, 'Sin Archivo', NULL),
('ACF-0905', 'Ecuaciones Diferenciales', 4, '3-2-5 -> 80Hrs', 1, 1, 'Sin Archivo', NULL),
('ACM-0001', 'Actividad Complementaria I', 2, '0-1-1 -> 16Hrs', 6, 1, 'Sin Archivo', NULL),
('ACM-0002', 'Actividad Complementaria II', 3, '0-1-1 -> 16Hrs', 6, 1, 'Sin Archivo', NULL),
('ACM-0003', 'Actividad Complementaria III', 4, '0-1-1 -> 16Hrs', 6, 1, 'Sin Archivo', NULL),
('ACM-0004', 'Actividad Complementaria IV', 5, '0-1-1 -> 16Hrs', 6, 1, 'Sin Archivo', NULL),
('ACM-0005', 'Actividad Complementaria V', 6, '0-1-1 -> 16Hrs', 6, 1, 'Sin Archivo', NULL),
('AEB-1055', 'Programacion WEB', 5, '1-4-5 -> 80Hrs', 4, 1, 'Sin Archivo', NULL),
('AEC-1008', 'Contabilidad Financiera', 2, '2-2-4 -> 64Hrs', 7, 1, 'AE008 Contabilidad Financiera.pdf', NULL),
('AEC-1034', 'Fundamentos de Telecomunicaciones', 5, '2-2-4 -> 64Hrs', 2, 1, 'Sin Archivo', NULL),
('AEC-1058', 'Quimica General', 2, '2-2-4 -> 64Hrs', 1, 1, 'AE058 Quimica.pdf', NULL),
('AEC-1061', 'Sistemas Operativos', 3, '2-2-4 -> 64Hrs', 2, 1, 'Sin Archivo', NULL),
('AED-1026', 'Estructura de Datos', 3, '2-3-5 -> 80Hrs', 2, 1, 'Sin Archivo', NULL),
('AEF-1031', 'Fundamentos de Base de Datos', 4, '3-2-5 -> 80Hrs', 3, 1, 'Sin Archivo', NULL),
('AEF-1041', 'Matematicas Discretas', 1, '3-2-5 -> 80Hrs', 1, 1, 'AE041 Matematicas Discretas.pdf', NULL),
('AEF-1052', 'Probabilidad y Estadistica', 2, '3-2-5 -> 80Hrs', 1, 1, 'Sin Archivo', NULL),
('CDDT-2001', 'Introduccion a la Ciencia de los Datos', 7, '2-3-5 -> 80Hrs', 8, 1, 'Sin Archivo', 1),
('CDDT-2002', 'Lenguajes de Programacion para Ciencia de los Datos', 7, '2-3-5 -> 80Hrs', 8, 1, 'Sin Archivo', 1),
('CDDT-2003', 'Mineria de Datos', 8, '2-3-5 -> 80Hrs', 8, 1, 'Sin Archivo', 1),
('CDDT-2004', 'Aprendizaje Maquina', 8, '2-3-5 -> 80Hrs', 8, 1, 'Sin Archivo', 1),
('CDDT-2005', 'Inteligencia de Negocios', 8, '2-3-5 -> 80Hrs', 8, 1, 'Sin Archivo', 1),
('SCA-1004', 'Administracion de Redes', 8, '0-4-4 -> 64Hrs', 4, 1, 'Administración de redes..pdf', NULL),
('SCA-1025', 'Taller de Base de Datos', 5, '0-4-4 -> 64Hrs', 4, 1, 'Sin Archivo', NULL),
('SCA-1026', 'Taller de Sistemas Operativos', 4, '0-4-4 -> 64Hrs', 4, 1, 'Sin Archivo', NULL),
('SCB-1001', 'Administracion de Base de Datos', 6, '1-4-5 -> 80Hrs', 4, 1, 'Sin Archivo', NULL),
('SCC-1005', 'Cultura Empresarial', 3, '2-2-4 -> 64Hrs', 7, 1, 'Sin Archivo', NULL),
('SCC-1007', 'Fundamentos de Ing. de Software', 5, '2-2-4 -> 64Hrs', 3, 1, 'Sin Archivo', NULL),
('SCC-1010', 'Graficacion', 8, '2-2-4 -> 64Hrs', 4, 1, 'Sin Archivo', NULL),
('SCC-1012', 'Inteligencia Artificial', 7, '2-2-4 -> 64Hrs', 4, 1, 'Sin Archivo', NULL),
('SCC-1013', 'Investigacion de Operaciones', 3, '2-2-4 -> 64Hrs', 1, 1, 'Sin Archivo', NULL),
('SCC-1014', 'Lenguajes de Interfaz', 6, '2-2-4 -> 64Hrs', 3, 1, 'Sin Archivo', NULL),
('SCC-1017', 'Metodos Numericos', 4, '2-2-4 -> 64Hrs', 1, 1, 'Sin Archivo', NULL),
('SCC-1019', 'Programacion Logica y Funcional', 6, '2-2-4 -> 64Hrs', 3, 1, 'Sin Archivo', NULL),
('SCC-1023', 'Sistemas Programables', 7, '2-2-4 -> 64Hrs', 4, 1, 'Sin Archivo', NULL),
('SCD-1003', 'Arquitectura de Computadoras', 5, '2-3-5 -> 80Hrs', 3, 1, 'Sin Archivo', NULL),
('SCD-1004', 'Conmutacion y Enrutamiento de Redes de Datos', 7, '2-3-5 -> 80Hrs', 4, 1, 'Sin Archivo', NULL),
('SCD-1008', 'Fundamentos de Programacion', 1, '2-3-5 -> 80Hrs', 2, 1, 'AE085 Fundamentos de Programacion.pdf', NULL),
('SCD-1011', 'Ingenieria de Software', 6, '2-3-5 -> 80Hrs', 4, 1, 'Sin Archivo', NULL),
('SCD-1015', 'Lenguajes y Automatas I', 6, '2-3-5 -> 80Hrs', 3, 1, 'Sin Archivo', NULL),
('SCD-1016', 'Lenguajes y Automatas II', 7, '2-3-5 -> 80Hrs', 4, 1, 'Sin Archivo', NULL),
('SCD-1018', 'Principios Electricos y Aplicaciones Digitale', 4, '2-3-5 -> 80Hrs', 2, 1, 'Sin Archivo', NULL),
('SCD-1020', 'Programacion Orientada a Objetos', 2, '2-3-5 -> 80Hrs', 2, 1, 'AE086 Programacion Orientada a Objetos.pdf', NULL),
('SCD-1021', 'Redes de Computadora', 6, '2-3-5 -> 80Hrs', 4, 1, 'Sin Archivo', NULL),
('SCD-1022', 'Simulacion', 5, '2-3-5 -> 80Hrs', 3, 1, 'Sin Archivo', NULL),
('SCD-1027', 'Topicos Avanzados de Programacion', 4, '2-3-5 -> 80Hrs', 2, 1, 'Sin Archivo', NULL),
('SCF-1006', 'Fisica General', 3, '3-2-5 -> 80Hrs', 1, 1, 'Sin Archivo', NULL),
('SCG-1009', 'Gestion de Proyectos de Software', 7, '3-3-6 -> 96Hrs', 3, 1, 'Sin Archivo', NULL),
('SCH-1024', 'Taller de Administracion', 1, '1-3-4 -> 64Hrs', 7, 1, 'Taller de Administración.pdf', NULL),
('TDAM-2001', 'Aplicaciones nativas para moviles de codigo abierto', 7, '2-3-5 -> 80Hrs', 8, 1, 'Sin Archivo', 2),
('TDAM-2002', 'Programacion movil nativo para sistema propietario', 7, '2-3-5 -> 80Hrs', 8, 1, 'Sin Archivo', 2),
('TDAM-2003', 'Visión por computadora en dispositivos moviles', 8, '2-3-5 -> 80Hrs', 8, 1, 'Sin Archivo', 2),
('TDAM-2004', 'Lenguajes multiplataforma para el desarrollo movil', 8, '2-3-5 -> 80Hrs', 8, 1, 'Sin Archivo', 2),
('TDAM-2005', 'Seguridad y testing en Tecnologia Movil', 8, '2-3-5 -> 80Hrs', 8, 1, 'Sin Archivo', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodoexpo`
--

CREATE TABLE `periodoexpo` (
  `idperiodoExpo` int(11) NOT NULL,
  `periodo` int(1) DEFAULT 1,
  `año` int(4) DEFAULT NULL,
  `estado` int(1) DEFAULT 1,
  `carpetaImg` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `periodoexpo`
--

INSERT INTO `periodoexpo` (`idperiodoExpo`, `periodo`, `año`, `estado`, `carpetaImg`) VALUES
(1, 2, 2017, 1, '2017_Agosto-Diciembre'),
(6, 1, 2018, 1, '2018_Enero-Mayo'),
(9, 2, 2018, 1, '2018_Agosto-Diciembre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pe_isic`
--

CREATE TABLE `pe_isic` (
  `idpe_isic` int(11) NOT NULL,
  `idPETipo` int(11) DEFAULT NULL,
  `DescripcionPE` varchar(650) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pe_isic`
--

INSERT INTO `pe_isic` (`idpe_isic`, `idPETipo`, `DescripcionPE`) VALUES
(1, 1, 'Formar ingenieros en sistemas computacionales con conocimientos significativos y habilidades pertinentes; a través de una formación integral en un programa educativo certificado y acreditado con estándares de calidad, que den solución a los problemas de los sectores de la producción, transformación y de servicios.'),
(2, 2, 'Ser un programa educativo actualizado y reconocido por sus estándares de calidad académica, a través de la capacitación y certificación de docentes y estudiantes e infraestructura pertinente; para la formación de profesionistas competentes en el desarrollo de sistemas computacionales.'),
(3, 3, 'Somos una institución de Educación Superior Tecnológico, con programas educativos acreditados que forma profesionistas creativos e innovadores, con sentido crítico, ético y participativo con competencias profesionales capaces de dar respuesta a las necesidades del entorno, que impulsa la investigación y la generación del desarrollo tecnológico com pleno respeto a la diversidad y con firme compromiso con la sociedad.'),
(4, 4, 'El Instituto Tecnológico Superior del Occidente del Estado de Hidalgo es un referente educativo de nivel superior tecnológico en la región del Valle del Mezquital, reconocido por la calidad de sus servicios educativos, que aplica, transfiere y genera conocimientos científicos y tecnológicos en beneficio.'),
(5, 5, 'OE1.- Los egresados diseñan, desarrollan y/o implementan: aplicaciones computacionales, interfaces de automatización de hardware y software, software de propósito específico (como bases de datos, sistemas descentralizados, plataformas y dispositivos), para resolver problemas en un entorno, apegado a las normas y estándares internacionales vigentes y de seguridad aplicables a su entorno.'),
(6, 5, 'OE2.- Los egresados implementan modelos y/o herramientas matemáticas para solucionar problemas complejos que atiendan alguna necesidad en su entorno, mediante la automatización y/o procesamiento de la información a través de la interpretación de datos.'),
(7, 5, 'OE3.- Los egresados coordinan y participan en equipos multidisciplinarios para crear soluciones complejas e innovadoras que atiendan alguna necesidad de un sector, industria o necesidad humana, con sentido ético.'),
(8, 6, 'AE1.- Los egresados Implementan aplicaciones computacionales para solucionar problemas complejos de ingeniería en diversos contextos, integrando hardware y software, plataformas o dispositivos dentro de una empresa o consultoría.'),
(9, 6, 'AE2.- Diseña, desarrolla y aplica modelos computacionales para solucionar problemas complejos de ingeniería, mediante la selección y uso de herramientas matemáticas.'),
(10, 6, 'AE3.- Diseña e implementa interfaces para la automatización de sistemas de hardware y desarrollo del software asociado basado en normas y estándares vigentes.'),
(11, 6, 'AE4.- Coordina y participa en equipos multidisciplinarios para la aplicación de soluciones innovadoras en diferentes contextos, mediante un plan estratégico.'),
(12, 6, 'AE5.- Diseña, implementa y administra bases de datos optimizando los recursos disponibles, conforme a las normas vigentes de manejo y seguridad de la información para apoyar la productividad y eficiencia de las organizaciones.'),
(13, 6, 'AE6.- Desarrolla y administra software para apoyar la productividad y competitividad de las organizaciones cumpliendo con estándares de calidad en diferentes contextos integrando diferentes tecnologías, plataformas y/o dispositivos.'),
(14, 6, 'AE7.- Evalúa tecnologías de hardware para soportar aplicaciones de manera efectiva, tomando en cuenta las diferentes plataformas y/o dispositivos.'),
(15, 6, 'AE8.- Detecta áreas de oportunidad empleando una visión empresarial para crear proyectos aplicando las Tecnologías de la Información.'),
(16, 6, 'AE9.- Diseña, configura y administra redes de computadoras para crear soluciones de conectividad en la organización, aplicando las normas y estándares vigentes.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postfb`
--

CREATE TABLE `postfb` (
  `idpostfb` int(11) NOT NULL,
  `post` varchar(800) DEFAULT NULL,
  `Estado` int(11) DEFAULT 1,
  `subtitulo` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `postfb`
--

INSERT INTO `postfb` (`idpostfb`, `post`, `Estado`, `subtitulo`) VALUES
(1, '<iframe src=\"https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fpermalink.php%3Fstory_fbid%3D2117953188347195%26id%3D142983839177483&show_text=true&width=500\" width=\"100%\" height=\"454\" style=\"border:none;overflow:hidden\" scrolling=\"no\" frameborder=\"0\" allowfullscreen=\"true\" allow=\"autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share\"></iframe>', 1, 'Mejores Promedios'),
(2, '<iframe src=\"https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fpermalink.php%3Fstory_fbid%3D1877206242307273%26id%3D916964301664810&show_text=true&width=500\" width=\"100%\" height=\"740\" style=\"border:none;overflow:hidden;\" scrolling=\"no\" frameborder=\"0\" allowfullscreen=\"true\" allow=\"autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share\"></iframe>', 1, '4ta edición de la Expo Sistemas'),
(3, '<iframe src=\"https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fpermalink.php%3Fstory_fbid%3D1653763444651555%26id%3D916964301664810&show_text=true&width=500\" width=\"100%\" height=\"778\" style=\"border:none;overflow:hidden;\" scrolling=\"no\" frameborder=\"0\" allowfullscreen=\"true\" allow=\"autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share\"></iframe>', 1, 'Entrega de reconocimientos a mejores promedios'),
(4, '<iframe src=\"https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fpermalink.php%3Fstory_fbid%3D2055901021219079%26id%3D142983839177483&show_text=true&width=500\" width=\"100%\" height=\"559\" style=\"border:none;overflow:hidden;\" scrolling=\"no\" frameborder=\"0\" allowfullscreen=\"true\" allow=\"autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share\"></iframe>', 1, 'Reconocimiento a Mtra. Cristy Elizabeth Aguilar Ojeda'),
(5, '<iframe src=\"https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2F916964301664810%2Fphotos%2Fa.943603462334227%2F1725766717451227%2F%3Ftype%3D3&show_text=true&width=500\" width=\"500\" height=\"543\" style=\"border:none;overflow:hidden\" scrolling=\"no\" frameborder=\"0\" allowfullscreen=\"true\" allow=\"autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share\"></iframe>', 1, 'Segunda ronda de la competencia internacional NetRiders');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p_egreso_esp`
--

CREATE TABLE `p_egreso_esp` (
  `idespecialidad` int(11) NOT NULL,
  `capacidad` varchar(300) DEFAULT NULL,
  `Estado` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `p_egreso_esp`
--

INSERT INTO `p_egreso_esp` (`idespecialidad`, `capacidad`, `Estado`) VALUES
(1, 'Implementa aplicaciones computacionales para solucionar problemas de diversos contextos, integrando diferentes tecnologías, plataformas o dispositivos.', 1),
(1, 'Coordina y participa en equipos multidisciplinarios para la aplicación de soluciones innovadoras en diferentes contextos.', 1),
(1, 'Diseña, implementa y administra bases de datos optimizando los recursos disponibles, conforme a las normas vigentes de manejo y seguridad de la información.', 1),
(1, 'Desarrolla y administra software para apoyar la productividad y competitividad de las organizaciones cumpliendo con estándares de calidad. ', 1),
(1, 'Coordina y participa en proyectos interdisciplinarios.', 1),
(1, 'Posee habilidades metodológicas de investigación que fortalezcan el desarrollo cultural, científico y tecnológico en el ámbito de sistemas computacionales y disciplinas afines.', 1),
(1, 'Identificar fuentes de información que den solución a las necesidades de toma de decisiones de las empresas u organizaciones.', 1),
(1, 'Extraer y depurar los datos de fuentes con formatos diversos que permita su análisis.', 1),
(1, 'Implementar algoritmos inteligentes que evalúen el comportamiento de los datos, ayuden a realizar inferencias y pronósticos basados en la probabilidad y la estadística.', 1),
(2, 'Implementar aplicaciones computacionales para solucionar problemas de diversos contextos, integrando diferentes tecnologías, plataformas o dispositivos.', 1),
(2, 'Coordinar y participar en equipos multidisciplinarios para la aplicación de soluciones innovadoras en diferentes contextos.', 1),
(2, 'Analizar problemas dentro de una empresa e instituciones públicas y privadas para darle solución mediante tecnología móvil.', 1),
(2, 'Desarrollar base de datos locales y en la nube para procesar  información desde aplicaciones móviles.', 1),
(2, 'Aplicar lenguajes de programación para desarrollar aplicaciones móviles según la evolución de software y hardware.', 1),
(2, 'Aplicar metodologías y tecnologías emergentes para el desarrollo de aplicaciones móviles', 1),
(2, 'Aplicar tecnologías y algoritmos de seguridad para la integridad de los datos.', 1),
(2, 'Aplicar algoritmos y técnicas de inteligencia artificial para el internet de las cosas.', 1),
(2, 'Implementar realidad aumentada, visión por computadora, georeferenciación, IoT, utilizando tecnología emergente.', 1),
(2, 'Aplicar esquemas de pruebas en software para el aseguramiento de la calidad.', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `idservicios` int(11) NOT NULL,
  `Nombre_Servicio` varchar(45) DEFAULT NULL,
  `Objetivo` varchar(800) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`idservicios`, `Nombre_Servicio`, `Objetivo`) VALUES
(1, 'Tutorías', 'Establecer la normativa que sustente y sistematice el otorgamiento de la atención tutorial a los estudiantes, a través del Programa Nacional de Tutoría (PNT); propiciando el mejoramiento de la calidad educativa y contribuyendo a su formación integral, mejorando los índices de permanencia, egreso y titulación oportuna en las Instituciones adscritas al TecNM.'),
(2, 'Asesorías Académicas', 'Establece los lineamientos para brindar asesorías académicas a los estudiantes de los diferentes programas educativos del instituto, con la finalidad de disminuir los indices de reprobación en los diferentes cursos.'),
(3, 'Actividades Complementarias', 'Establecer la normativa para el cumplimiento de las actividades complementarias para la formación y desarrollo de competencias profesionales de las Instituciones adscritas al TecNM, con la finalidad de fortalecer la formación integral de los estudiantes.'),
(4, 'Servicios de Apoyo', 'Servicio Médico Edificio IV planta alta Ext 311*Servicio de psicología y asesorías Edificio de biblioteca Ext 309 y 310*Coordinación de idiomas Edificio V planta alta Ext 303*Control escolar y becas Edificio de Dirección General Ext 630 y 631*Servicio de laboratorios de cómputo Edificio VI Ext 111*Servicio de biblioteca Edificio Centro de Información Ext 302*Actividades culturales y deportivas Edificio de Dirección General*Servicio social y residencia profesional Edificio de Dirección General Ext 540 y 541*Centro de cómputo Edificio VI Ext 111*Servicio de cafetería*Plaza del estudiante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `idsolicitud` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Apellidos` varchar(45) DEFAULT NULL,
  `Email` varchar(80) DEFAULT NULL,
  `Semestre` int(2) DEFAULT NULL,
  `Grupo` varchar(1) DEFAULT NULL,
  `Telefono` varchar(10) DEFAULT NULL,
  `Matricula` varchar(8) DEFAULT NULL,
  `Proyecto` int(11) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Leida` int(1) DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`idsolicitud`, `Nombre`, `Apellidos`, `Email`, `Semestre`, `Grupo`, `Telefono`, `Matricula`, `Proyecto`, `Fecha`, `Leida`) VALUES
(12, '', '', 'smaye@itsoeh.edu.mx', 8, 'B', '84965', '21651', 2, '2021-06-13', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tema_linea_investigacion`
--

CREATE TABLE `tema_linea_investigacion` (
  `idtema_linea_investigacion` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Estado` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tema_linea_investigacion`
--

INSERT INTO `tema_linea_investigacion` (`idtema_linea_investigacion`, `Nombre`, `Estado`) VALUES
(1, 'Ingeniería de software y sistemas distribuidos', 1),
(2, 'Control inteligente y Procesamiento Digital de Señales', 1),
(3, 'Sistemas, Base de Datos y Plataformas Computacionales', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_pe`
--

CREATE TABLE `tipo_pe` (
  `idtipo_PE` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_pe`
--

INSERT INTO `tipo_pe` (`idtipo_PE`, `Nombre`) VALUES
(1, 'Misión del programa de estudios'),
(2, 'Visión del programa de estudios'),
(3, 'Misión institucional'),
(4, 'Visión institucional'),
(5, 'Objetivos Educacionales'),
(6, 'Atributos de Egreso');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Usuario`);

--
-- Indices de la tabla `areaconocimiento`
--
ALTER TABLE `areaconocimiento`
  ADD PRIMARY KEY (`idareaConocimiento`);

--
-- Indices de la tabla `asesorias`
--
ALTER TABLE `asesorias`
  ADD PRIMARY KEY (`idasesorias`),
  ADD KEY `idDocente_idx` (`idAsesor`),
  ADD KEY `clavAsignatura_idx` (`clavAsignatura`);

--
-- Indices de la tabla `asignaturas_esp`
--
ALTER TABLE `asignaturas_esp`
  ADD PRIMARY KEY (`idespecialidad`,`idasignatura`),
  ADD KEY `idasignatura_idx` (`idasignatura`);

--
-- Indices de la tabla `carruselexpo`
--
ALTER TABLE `carruselexpo`
  ADD PRIMARY KEY (`idcarruselExpo`);

--
-- Indices de la tabla `complementarias`
--
ALTER TABLE `complementarias`
  ADD PRIMARY KEY (`idComplementarias`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`iddocente`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`idespecialidad`);

--
-- Indices de la tabla `historial_contenido`
--
ALTER TABLE `historial_contenido`
  ADD PRIMARY KEY (`idhistorial`,`nomContenidol`);

--
-- Indices de la tabla `historial_esp`
--
ALTER TABLE `historial_esp`
  ADD PRIMARY KEY (`idhistorial`);

--
-- Indices de la tabla `imagenexpo`
--
ALTER TABLE `imagenexpo`
  ADD PRIMARY KEY (`idimagenExpo`),
  ADD KEY `idPeriodo_idx` (`idPeriodo`);

--
-- Indices de la tabla `inforelevante`
--
ALTER TABLE `inforelevante`
  ADD PRIMARY KEY (`idinfoRelevante`);

--
-- Indices de la tabla `linea_investigacion`
--
ALTER TABLE `linea_investigacion`
  ADD PRIMARY KEY (`temalinea`,`Docente`),
  ADD KEY `idDocente_idx` (`Docente`),
  ADD KEY `temalinea_idx` (`temalinea`);

--
-- Indices de la tabla `mallacurricular`
--
ALTER TABLE `mallacurricular`
  ADD PRIMARY KEY (`MC_ClaveAsignatura`),
  ADD KEY `MC_Especialidad_idx` (`MC_Especialidad`);

--
-- Indices de la tabla `periodoexpo`
--
ALTER TABLE `periodoexpo`
  ADD PRIMARY KEY (`idperiodoExpo`);

--
-- Indices de la tabla `pe_isic`
--
ALTER TABLE `pe_isic`
  ADD PRIMARY KEY (`idpe_isic`),
  ADD KEY `idPETipo_idx` (`idPETipo`);

--
-- Indices de la tabla `postfb`
--
ALTER TABLE `postfb`
  ADD PRIMARY KEY (`idpostfb`);

--
-- Indices de la tabla `p_egreso_esp`
--
ALTER TABLE `p_egreso_esp`
  ADD KEY `idespecialidad_idx` (`idespecialidad`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`idservicios`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`idsolicitud`),
  ADD KEY `Proyecto_idx` (`Proyecto`);

--
-- Indices de la tabla `tema_linea_investigacion`
--
ALTER TABLE `tema_linea_investigacion`
  ADD PRIMARY KEY (`idtema_linea_investigacion`);

--
-- Indices de la tabla `tipo_pe`
--
ALTER TABLE `tipo_pe`
  ADD PRIMARY KEY (`idtipo_PE`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `areaconocimiento`
--
ALTER TABLE `areaconocimiento`
  MODIFY `idareaConocimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `asesorias`
--
ALTER TABLE `asesorias`
  MODIFY `idasesorias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de la tabla `carruselexpo`
--
ALTER TABLE `carruselexpo`
  MODIFY `idcarruselExpo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `complementarias`
--
ALTER TABLE `complementarias`
  MODIFY `idComplementarias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `idespecialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `historial_esp`
--
ALTER TABLE `historial_esp`
  MODIFY `idhistorial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `imagenexpo`
--
ALTER TABLE `imagenexpo`
  MODIFY `idimagenExpo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT de la tabla `inforelevante`
--
ALTER TABLE `inforelevante`
  MODIFY `idinfoRelevante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `periodoexpo`
--
ALTER TABLE `periodoexpo`
  MODIFY `idperiodoExpo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `pe_isic`
--
ALTER TABLE `pe_isic`
  MODIFY `idpe_isic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `postfb`
--
ALTER TABLE `postfb`
  MODIFY `idpostfb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `idservicios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `idsolicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tema_linea_investigacion`
--
ALTER TABLE `tema_linea_investigacion`
  MODIFY `idtema_linea_investigacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tipo_pe`
--
ALTER TABLE `tipo_pe`
  MODIFY `idtipo_PE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asesorias`
--
ALTER TABLE `asesorias`
  ADD CONSTRAINT `clavAsignatura` FOREIGN KEY (`clavAsignatura`) REFERENCES `mallacurricular` (`MC_ClaveAsignatura`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idAsesor` FOREIGN KEY (`idAsesor`) REFERENCES `docente` (`iddocente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `asignaturas_esp`
--
ALTER TABLE `asignaturas_esp`
  ADD CONSTRAINT `idasignatura` FOREIGN KEY (`idasignatura`) REFERENCES `mallacurricular` (`MC_ClaveAsignatura`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idespecialidad` FOREIGN KEY (`idespecialidad`) REFERENCES `especialidad` (`idespecialidad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `historial_contenido`
--
ALTER TABLE `historial_contenido`
  ADD CONSTRAINT `idhistorial` FOREIGN KEY (`idhistorial`) REFERENCES `historial_esp` (`idhistorial`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `imagenexpo`
--
ALTER TABLE `imagenexpo`
  ADD CONSTRAINT `idPeriodo` FOREIGN KEY (`idPeriodo`) REFERENCES `periodoexpo` (`idperiodoExpo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `linea_investigacion`
--
ALTER TABLE `linea_investigacion`
  ADD CONSTRAINT `idDocente` FOREIGN KEY (`Docente`) REFERENCES `docente` (`iddocente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `temalinea` FOREIGN KEY (`temalinea`) REFERENCES `tema_linea_investigacion` (`idtema_linea_investigacion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mallacurricular`
--
ALTER TABLE `mallacurricular`
  ADD CONSTRAINT `MC_Especialidad` FOREIGN KEY (`MC_Especialidad`) REFERENCES `especialidad` (`idespecialidad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pe_isic`
--
ALTER TABLE `pe_isic`
  ADD CONSTRAINT `idPETipo` FOREIGN KEY (`idPETipo`) REFERENCES `tipo_pe` (`idtipo_PE`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `p_egreso_esp`
--
ALTER TABLE `p_egreso_esp`
  ADD CONSTRAINT `especialidadegre` FOREIGN KEY (`idespecialidad`) REFERENCES `especialidad` (`idespecialidad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD CONSTRAINT `Proyecto` FOREIGN KEY (`Proyecto`) REFERENCES `tema_linea_investigacion` (`idtema_linea_investigacion`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

-- agregados

ALTER TABLE `isic`.`docente` 
ADD COLUMN `tutor` INT NULL DEFAULT '1' AFTER `tiempo`;

USE `isic`;
DROP procedure IF EXISTS `sp_getDocente`;

DELIMITER $$
USE `isic`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getDocente`()
BEGIN
select iddocente, concat_ws(" ", Nombre, APaterno, AMaterno) as Docente, GradoAcademico,correo,IF(tiempo=1,"No","Tiempo Completo") as tiempo,  IF(tutor=1,"No","Tutor") as tutor
FROM isic.docente;
END$$

DELIMITER ;



USE `isic`;
DROP procedure IF EXISTS `sp_AddDocente`;
-- add docentessp_getDocente
DELIMITER $$
USE `isic`$$
CREATE PROCEDURE `sp_AddDocente`(`docente` INT, `grad` VARCHAR(15), `nom` VARCHAR(45),  `app` VARCHAR(45), `apm` VARCHAR(45),`correo` VARCHAR(45),`tiempo` INT,`tutor` INT)
BEGIN
INSERT INTO `isic`.`docente` (`iddocente`, `GradoAcademico`, `Nombre`, `APaterno`, `AMaterno`,`correo`, `tiempo`, `tutor`)
VALUES (docente,grad, nom, app, apm,correo,tiempo,tutor);
END$$

DELIMITER ;


USE `isic`;
DROP procedure IF EXISTS `sp_DeleteDocente`;

DELIMITER $$
USE `isic`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_DeleteDocente`(`iddoc` INT)
BEGIN
DELETE FROM `isic`.`docente` WHERE (`iddocente` = iddoc);
END$$

DELIMITER ;




USE `isic`;
DROP procedure IF EXISTS `sp_editDocente`;

DELIMITER $$
USE `isic`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_editDocente`(`iddoc` INT, `GradoAc` VARCHAR(15), `Nom` VARCHAR(45), `APat` VARCHAR(45),  `AMat` VARCHAR(45),`corr` VARCHAR(45),`tiem` INT,`tuto` INT)
BEGIN
UPDATE `isic`.`docente` 
SET `GradoAcademico` = GradoAc, `Nombre` = Nom,  `APaterno` = APat, `AMaterno` = AMat, `correo` = corr, `tiempo` = tiem, `tutor` = tuto
 WHERE (`iddocente` = iddoc);
END$$

DELIMITER ;



USE `isic`;
DROP procedure IF EXISTS `sp_getDocenteEdit`;

DELIMITER $$
USE `isic`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getDocenteEdit`()
BEGIN
select iddocente,Nombre, APaterno, AMaterno, GradoAcademico,correo,IF(tiempo=1,"No","Tiempo Completo") as tiempo,  IF(tutor=1,"No","Tutor") as tutor
FROM isic.docente;
END$$

DELIMITER ;






/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

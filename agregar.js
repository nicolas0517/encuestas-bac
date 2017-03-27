$(document).ready(function() {
    var vicepresidencias, elementos, conocimientos, criterios;

    //obtiene los datos del json vicepresidencias
    function obtenerVicepresidencias() {
        $.getJSON("vicepresidencias.json", function(data, status) {
            alert("DATOS OBTENIDOS - " + status);
            vicepresidencias = data;
            console.log("vicepresidencias");
            console.log(vicepresidencias);
        });
    }
    obtenerVicepresidencias();

    //guarda las vicepresidencias en la base de datos
    $("#agregarvicepresidencias").click(function() {
        console.log(vicepresidencias.vicepresidencias.length);
        for (var i = 0; i < vicepresidencias.vicepresidencias.length; i++) {
            //console.log("vicepresidencia:" + vicepresidencias.vicepresidencias[i].vicepresidencia);
            //console.log("norma:" + vicepresidencias.vicepresidencias[i].norma);
            $.post("subirvicepresidencias.php", { vicepresidencia: vicepresidencias.vicepresidencias[i].vicepresidencia, norma: vicepresidencias.vicepresidencias[i].norma }, function(data) {
                var resultado = data;
                console.log(resultado);
            });
        };
    });

    //obtiene los datos del json elementos
    function obtenerElementos() {
        $.getJSON("elementos.json", function(data, status) {
            alert("DATOS OBTENIDOS - " + status);
            elementos = data;
            console.log("elementos");
            console.log(elementos);
        });
    }
    obtenerElementos();

    //agrega los elementos en la base de datos
    $("#agregarelementos").click(function() {
        console.log(elementos.elemento.length);
        for (var i = 0; i < elementos.elemento.length; i++) {
            //console.log("vicepresidencia:" + vicepresidencias.vicepresidencias[i].vicepresidencia);
            //console.log("norma:" + vicepresidencias.vicepresidencias[i].norma);
            $.post("subirelementos.php", { elemento: elementos.elemento[i].elemento, descripcion: elementos.elemento[i].descripcion, norma: elementos.elemento[i].norma }, function(data) {
                var resultado = data;
                console.log(resultado);
            });
        };
    });

    //obtiene los datos del json criterios
    function obtenerCriterios() {
        $.getJSON("criterios.json", function(data, status) {
            alert("DATOS OBTENIDOS - " + status);
            criterios = data;
            console.log("criterios");
            console.log(criterios);
        });
    }
    obtenerCriterios();

    //agrega los criterios en la base de datos
    $("#agregarcriterios").click(function() {
        console.log(criterios.criterio.length);
        for (var i = 0; i < criterios.criterio.length; i++) {
            //console.log("vicepresidencia:" + vicepresidencias.vicepresidencias[i].vicepresidencia);
            //console.log("norma:" + vicepresidencias.vicepresidencias[i].norma);
            $.post("subircriterios.php", { descripcion: criterios.criterio[i].criterio, elemento: criterios.criterio[i].k_elemento }, function(data) {
                var resultado = data;
                console.log(resultado);
            });
        };
    });

    //obtiene los datos del json conocimientos
    function obtenerConocimientos() {
        $.getJSON("conocimientos.json", function(data, status) {
            alert("DATOS OBTENIDOS - " + status);
            conocimientos = data;
            console.log("conocimientos");
            console.log(conocimientos);
        });
    }
    obtenerConocimientos();

    //agrega los conocimientos en la base de datos
    $("#agregarconocimientos").click(function() {
        console.log(conocimientos.conocimiento.length);
        for (var i = 0; i < 2500; i++) {
            //conocimientos.conocimiento.length
            //console.log("norma:" + vicepresidencias.vicepresidencias[i].norma);
            $.post("subirconocimientos.php", { descripcion: conocimientos.conocimiento[i].conocimiento, elemento: conocimientos.conocimiento[i].elemento }, function(data) {
                var resultado = data;
                console.log(resultado);
            });
        };
    });

});
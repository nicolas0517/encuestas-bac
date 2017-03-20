$(document).ready(function() {
    var datos;

    function obtenerVicepresidencias() {
        $.getJSON("vicepresidencias.json", function(data, status) {
            alert("DATOS OBTENIDOS - " + status);
            datos = data;
            console.log("vicepresidencias");
            console.log(datos);
        });
    }
    obtenerVicepresidencias();

    $("#agregarvicepresidencias").click(function() {
        console.log(datos.vicepresidencias.length);
        for (var i = 0; i < datos.vicepresidencias.length; i++) {
            //console.log("vicepresidencia:" + datos.vicepresidencias[i].vicepresidencia);
            //console.log("norma:" + datos.vicepresidencias[i].norma);
            $.post("subirvicepresidencias.php", { vicepresidencia: datos.vicepresidencias[i].vicepresidencia, norma: datos.vicepresidencias[i].norma }, function(data) {
                var resultado = data;
                console.log(resultado);
            });
        };
    });

});
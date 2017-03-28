$(document).ready(function() {

    var numero_encuesta;
    var norma_escogida;
    var descripcion_norma;
    var normasescogidas = new Array();
    var nombre_persona;
    var idem;
    var texto = "<h4>Normas seleccionadas:</h4>";
    //oculta las preguntas de la encuesta y el final mientras inician la encuesta
    $("#preguntas_encuesta").hide();
    $("#final_encuesta").hide();

    //función para obtener el id del usuario que esta haciendo la encuesta

    $.ajax({
            data: {},
            type: "GET",
            dataType: "json",
            url: "usuario.php",
        })
        .done(function(data, textStatus, jqXHR) {
            if (console && console.log) {
                console.log("La solicitud del usuario se ha completado correctamente.");
                idem = data.idem;
                nombre_persona = data.nomemp;
                console.log("idem: " + idem);
                console.log("nombre: " + nombre_persona);
                $("#nombre").val(nombre_persona);
            }
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            if (console && console.log) {
                console.log("La solicitud ha fallado: " + textStatus);
            }
        });

    //crea la encuesta y guarda el id de ella
    $("#iniciar_encuesta").click(function() {
        $.post("crearencuesta.php", { nombre: nombre_persona, idem: idem }, function(data) {
            numero_encuesta = data;
            console.log(numero_encuesta);
            if (numero_encuesta === 0) {
                $("#error_crear_encuesta").html("<p>No se ha podido crear la encuesta. Revise los datos e intentelo de nuevo</p>")
            } else {
                $("#preguntas_encuesta").show();
                $("#creacion_encuesta").hide();
            }
        });
    });

    //trae todas las vicepresidencias
    function vicepresidencias() {
        $.post("vicepresidencias.php", {}, function(data) {
            $("#vicepresidencia").html(data);
        });
    };
    vicepresidencias();

    //trae todas las normas 
    function normas() {
        $.post("normas.php", { filtro: 0 }, function(data) {
            $("#normas").html(data);
        });
    };
    normas();

    //trae las normas de acuerdo a la vicepresidencia seleccionada
    $("#vicepresidencia").click(function() {
        $("#vicepresidencia option:selected").each(function() {
            filtro = $(this).val();
            $("#elementos").html('');
            $.post("normas.php", { filtro: filtro }, function(data) {
                $("#normas").html(data);
            });
        });
    });

    //trae los elementos de acuerdo a la norma escogida
    $("#normas").change(function() {
        $("#normas option:selected").each(function() {
            var filtro = $(this).val();
            descripcion_norma = $(this).text();
            norma_escogida = filtro;
            $.post("elementos.php", { filtro: filtro }, function(data) {
                $("#elementos").html(data);
            });
        });
    });

    //funcion que obtiene la norma, los elementos, los criterios, los conocimientos, los rangos y las evidencias escogidas por el encuestado
    $("#nueva_norma").click(function() {
        console.log(numero_encuesta);
        console.log(norma_escogida);
        texto += "<p>" + descripcion_norma + "</p>";
        $(".normasescogidas").html(texto);
        //arrays con el id de los elementos seleccionados
        var elementos_seleccionados = new Array();
        var criterios_seleccionados = new Array();
        var conocimientos_seleccionados = new Array();
        //añade los items sellecionados a los arrays
        $(".check_elementos:checked").each(function() {
            elementos_seleccionados.push($(this).val());
        });
        $(".check_criterios:checked").each(function() {
            criterios_seleccionados.push($(this).val());
        });
        $(".check_conocimientos:checked").each(function() {
            conocimientos_seleccionados.push($(this).val());
        });
        //imprime los datos recolectados
        console.log("elementos: " + elementos_seleccionados);
        console.log("criterios: " + criterios_seleccionados);
        console.log("conocimientos: " + conocimientos_seleccionados);
        //guarda los items en la base de datos
        //norma
        $.post("guardarnorma.php", { encuesta: numero_encuesta, norma: norma_escogida }, function(data) {
            resultado = data;
            descripcion_norma = "";
        });
        //elementos
        for (var i = 0; i < elementos_seleccionados.length; i++) {
            $.post("guardarelementos.php", { encuesta: numero_encuesta, elemento: elementos_seleccionados[i] }, function(data) {
                resultado = data;
            });
        };
        //criterios
        for (var i = 0; i < criterios_seleccionados.length; i++) {
            $.post("guardarcriterios.php", { encuesta: numero_encuesta, criterio: criterios_seleccionados[i] }, function(data) {
                resultado = data;
            });
        };
        //conocimientos
        for (var i = 0; i < conocimientos_seleccionados.length; i++) {
            $.post("guardarconocimientos.php", { encuesta: numero_encuesta, conocimiento: conocimientos_seleccionados[i] }, function(data) {
                resultado = data;
            });
        };
        alert("Datos enviados correctamente, escoja una nueva norma");
        $("#elementos").html("<p> Escoja una nueva norma </p>");
    });

    //funcion que obtiene la norma, los elementos, los criterios, los conocimientos, los rangos y las evidencias escogidas por el encuestado y termina la encuesta
    $("#finalizar_encuesta").click(function() {
        console.log(numero_encuesta);
        console.log(norma_escogida);
        texto += "<p>" + descripcion_norma + "</p>";
        $(".normasescogidas").html(texto);
        //arrays con el id de los elementos seleccionados
        var elementos_seleccionados = new Array();
        var criterios_seleccionados = new Array();
        var conocimientos_seleccionados = new Array();
        //añade los items sellecionados a los arrays
        $(".check_elementos:checked").each(function() {
            elementos_seleccionados.push($(this).val());
        });
        $(".check_criterios:checked").each(function() {
            criterios_seleccionados.push($(this).val());
        });
        $(".check_conocimientos:checked").each(function() {
            conocimientos_seleccionados.push($(this).val());
        });
        //imprime los datos recolectados
        console.log("elementos: " + elementos_seleccionados);
        console.log("criterios: " + criterios_seleccionados);
        console.log("conocimientos: " + conocimientos_seleccionados);
        //guarda los items en la base de datos
        //norma
        $.post("guardarnorma.php", { encuesta: numero_encuesta, norma: norma_escogida }, function(data) {
            resultado = data;
        });
        //elementos
        for (var i = 0; i < elementos_seleccionados.length; i++) {
            $.post("guardarelementos.php", { encuesta: numero_encuesta, elemento: elementos_seleccionados[i] }, function(data) {
                resultado = data;
            });
        };
        //criterios
        for (var i = 0; i < criterios_seleccionados.length; i++) {
            $.post("guardarcriterios.php", { encuesta: numero_encuesta, criterio: criterios_seleccionados[i] }, function(data) {
                resultado = data;
            });
        };
        //conocimientos
        for (var i = 0; i < conocimientos_seleccionados.length; i++) {
            $.post("guardarconocimientos.php", { encuesta: numero_encuesta, conocimiento: conocimientos_seleccionados[i] }, function(data) {
                resultado = data;
            });
        };
        $("#preguntas_encuesta").hide();
        $("#final_encuesta").show();
    });



});


//función que obtiene los criterios, los conocimientos, los rangos y las evidencias.
function obtenerDatos(id) {
    if ($("#elemento" + id).prop('checked')) {

        $.post("criterios.php", { filtro: id }, function(data) {
            $("#criterios" + id).html(data);
        });
        $.post("conocimientos.php", { filtro: id }, function(data) {
            $("#conocimientos" + id).html(data);
        });
    } else {
        $("#criterios" + id).html('');
        $("#conocimientos" + id).html('');
    }
}
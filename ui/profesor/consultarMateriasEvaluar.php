<?php
include('ui/menuProfesor.php');
?>
<div class="container-fluid p-2" style="background-color: #EAF1F9; height: 100vh;">
    <div class="row">
        <div class="col-12 order-0 order-sm-1">
            <div class="container-fluid" style="background-color: #EAF1F9;">
                <div class="row p-3">
                    <div class="col-12 bg-white p-2 m-0" style=" border-radius: 15px;">
                        <div class="container-fluid">
                            <div class="row p-0">
                                <div class="col-12  d-flex justify-content-center col-md-3 justify-content-md-start ">
                                    <a class="navbar-brand" href="#"><span class="text-dark"><i class="fas fa-search mr-2"></i>Filtrar por salones</span></a>
                                </div>
                                <div class="col-12 col-md-4 d-flex justify-content-start">
                                    <select class="custom-select" id="filtros">
                                        <option value="" disabled selected>Seleccione un curso</option>
                                        <option value="1">Parvulos</option>
                                        <option value="2">Pre-Jardin</option>
                                        <option value="3">Jardin</option>
                                        <option value="4">Transición</option>
                                        <option value="5">Primero</option>
                                        <option value="6">Segundo</option>
                                        <option value="7">Tercero</option>
                                        <option value="8">Cuarto</option>
                                        <option value="9">Quinto</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-5 d-flex justify-content-center justify-content-md-end">
                                    <span class="mt-2 font-weight-bold">Califica la asignatura según corresponda</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row px-3">
        <div class="col-12">
            <div class="container-fluid">
                <div class="row">
                    <div class="col bg-white text-center p-4 msjSel" style=" border-radius: 15px;">
                     <h3>Seleccione el curso a evaluar.</h3>
                    </div>
                </div>
                <div id="salonesFiltrados"></div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#filtros").change(function() {
            let dato = parseInt($("#filtros").val());
            let ruta = "";
            switch (dato) {
                case 1:
                    ruta = "indexAjax.php?pid=<?php echo base64_encode("ui/asignatura/consultarAsignaturasParvulos.php"); ?>"
                    break;
                case 2:
                    ruta = "indexAjax.php?pid=<?php echo base64_encode("ui/asignatura/consultarAsignaturasPreJardin.php"); ?>"
                    break;
                case 3:
                    ruta = "indexAjax.php?pid=<?php echo base64_encode("ui/asignatura/consultarAsignaturasJardin.php"); ?>"
                    break;
                case 4:
                    ruta = "indexAjax.php?pid=<?php echo base64_encode("ui/asignatura/consultarAsignaturasTransicion.php"); ?>"
                    break;
                case 5:
                    ruta = "indexAjax.php?pid=<?php echo base64_encode("ui/asignatura/consultarAsignaturasPrimero.php"); ?>"
                    break;
                case 6:
                    ruta = "indexAjax.php?pid=<?php echo base64_encode("ui/asignatura/consultarAsignaturasSegundo.php"); ?>"
                    break;
                case 7:
                    ruta = "indexAjax.php?pid=<?php echo base64_encode("ui/asignatura/consultarAsignaturasTercero.php"); ?>"
                    break;
                case 8:
                    ruta = "indexAjax.php?pid=<?php echo base64_encode("ui/asignatura/consultarAsignaturasCuarto.php"); ?>"
                    break;
                case 9:
                    ruta = "indexAjax.php?pid=<?php echo base64_encode("ui/asignatura/consultarAsignaturasQuinto.php"); ?>"
                    break;
                default:
            }

            $.ajax({
                type: "get",
                url: ruta,
                beforeSend: function() {
                    $(".msjSel").text("");
                    $(".msjSel").html("Procesando, espere por favor...");
                },
                success: function() {
                    console.log("Bien");
                    $('.msjSel').load(ruta);
                    $('#filtros').val("");
                }
            });
        });
    });
</script>
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
                                        <?php 
                                        $cap =  new CursoAsignaturaProfesor("","","","", $_SESSION['id']);
                                        $cursos = $cap -> selectAllByProfesor();

                                        foreach ($cursos as $currentCurso) {
                                            echo "<option value='" . $currentCurso -> getCurso() -> getIdCurso() . "'>" .$currentCurso -> getCurso() -> getNombre() . "</option>";
                                        }
                                        ?>
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
            let ruta = "indexAjax.php?pid=<?php echo base64_encode("ui/asignatura/consultarAsignaturasCurso.php"); ?>&idCurso="+ escape(dato);
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
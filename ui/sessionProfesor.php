<?php
include('ui/menuProfesor.php');
$profesor = new Profesor($_SESSION['id']);
$profesor -> select();
?>
<div class="container-fluid p-2" style="background-color: #EAF1F9; height: 100vh;">
	<div class="row p-3">
			

			<div class="col-12 col-md-4 order-2">
				<div class="container">
					<div class="row">
						<div class="col bg-white text-center p-4" style=" border-radius: 15px;">
                            <h3>Fechas Importantes</h3>
                            
                        </div>
                    </div>
				</div>
			</div>

		<div class="col-12 col-md-8 order-1">
			<div class="container">
				<div class="row">
				    <div class="col bg-white text-center p-4" style=" border-radius: 15px;">
						<h3 class="my-3">Noticias</h3>
                         
					</div>
				</div>

                <div class="row mt-3">
					<div class="col bg-white p-4" style=" border-radius: 15px;">
						<h2 class="my-2 text-center"></h2>
                    <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt cum dolores voluptates ea accusamus animi ipsa vel rem consequuntur nisi? Illum modi excepturi quod cumque! Reprehenderit quisquam laborum impedit commodi?</p>
                        
					</div>
                </div>

                <div id="preguntasFiltradas"></div>    
			</div>
		</div>
	</div>
</div>
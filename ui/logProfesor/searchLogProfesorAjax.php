<script charset="utf-8">
	$(function () { 
		$("[data-toggle='tooltip']").tooltip(); 
	});
</script>
<div class="table-responsive">
<table class="table table-striped table-hover">
	<thead>
		<tr><th></th>
			<th nowrap>Action</th>
			<th nowrap>Date</th>
			<th nowrap>Time</th>
			<th nowrap>Ip</th>
			<th nowrap>Os</th>
			<th nowrap>Browser</th>
			<th>Profesor</th>
			<th nowrap></th>
		</tr>
	</thead>
	</tbody>
		<?php
		$logProfesor = new LogProfesor();
		$logProfesors = $logProfesor -> search($_GET['search']);
		$counter = 1;
		foreach ($logProfesors as $currentLogProfesor) {
			echo "<tr><td>" . $counter . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentLogProfesor -> getAction()) . "</td>";
			echo "<td nowrap>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentLogProfesor -> getDate()) . "</td>";
			echo "<td nowrap>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentLogProfesor -> getTime()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentLogProfesor -> getIp()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentLogProfesor -> getOs()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentLogProfesor -> getBrowser()) . "</td>";
			echo "<td>" . $currentLogProfesor -> getProfesor() -> getNombre() . " " . $currentLogProfesor -> getProfesor() -> getApellido() . "</td>";
			echo "<td class='text-right' nowrap>
				<a href='modalLogProfesor.php?idLogProfesor=" . $currentLogProfesor -> getIdLogProfesor() . "'  data-toggle='modal' data-target='#modalLogProfesor' >
					<span class='fas fa-eye' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='View more information' ></span>
				</a>
				</td>";
			echo "</tr>";
			$counter++;
		}
		?>
	</tbody>
</table>
</div>
<div class="modal fade" id="modalLogProfesor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" >
		<div class="modal-content" id="modalContent">
		</div>
	</div>
</div>
<script>
	$('body').on('show.bs.modal', '.modal', function (e) {
		var link = $(e.relatedTarget);
		$(this).find(".modal-content").load(link.attr("href"));
	});
</script>

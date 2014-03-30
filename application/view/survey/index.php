<div class="row-fluid">
	<div class="container">
		
		<div class="span12">
			<h1>Surveys</h1>
			<table class="table">
				<thead>
					
					<tr>
						<!-- <th>id</th> -->
						<th>Title</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach( $this->surveys as $survey): ?>
					<tr>
						<!-- <td><?=$survey->id?></td> -->
						<td><a href="?r=question/listall&survey_id=<?php echo $survey->id?>"><?=$survey->title?></a></td>
					</tr>
					<?php endforeach;?>

				</tbody>

			</table>
		</div>	
	</div>
	
</div>
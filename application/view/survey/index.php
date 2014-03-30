<div class="row">
	<div class="columns twelve">
		<table class="table">
			<thead>
				
				<tr>
					<th>id</th>
					<th>title</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach( $this->surveys as $survey): ?>
				<tr>
					<td><?=$survey->id?></td>
					<td><a href="?r=question/listall&survey_id=<?php echo $survey->id?>"><?=$survey->title?></a></td>
				</tr>
				<?php endforeach;?>

			</tbody>

		</table>
	</div>
</div>
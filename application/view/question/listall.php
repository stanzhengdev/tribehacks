<div class="row">
	<div class="columns twelve">
		<table class="table">
			<thead>
				<tr>
					<td>id</td>
					<td>title</td>
					<td>description</td>
					<td>survey_id</td>
					<td>question_type</td>
				</tr>
			</thead>
			<tbody>
				<?php foreach($this->survey->questions as $question):?>
				<tr>
					<td><?=$question->id?></td>
					<td><?=$question->title?></td>
					<td><?=$question->description?></td>
					<td><?=$question->survey_id?></td>
					<td><?=$question->question_type?></td>
				</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	</div>
</div>
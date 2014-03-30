<div class="row-fluid">
	<div class="container">
		<div class="span12">
			<h1>Survey <?=$this->survey->title?></h1>
			<table class="table">
				<thead>
					<tr>
						<!-- <td>id</td> -->
						<td>Questions</td>
						<!-- <td>description</td>
						<td>survey_id</td>
						<td>question_type</td> -->
					</tr>
				</thead>
				<tbody>
					<?php foreach($this->survey->questions as $question):?>
					<tr>
						<!-- <td><a href="?r=question/view&id=<?php echo $question->id?>"><?=$question->id?></a></td> -->
						<td><a href="?r=question/view&id=<?php echo $question->id?>"><?=$question->title?></a></td>
						<!-- <td><?=$question->description?></td>
						<td><?=$question->survey_id?></td>
						<td><?=$question->question_type?></td> -->
					</tr>
					<?php endforeach;?>
				</tbody>
			</table>
		</div>
	</div>
</div>
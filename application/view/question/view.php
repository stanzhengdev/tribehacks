<div class="row-fluid">
	<div class="container">
		<div class="span12">
			<h1>Generate Widget for question:<h1> 
			<h2><small><em>"<?php echo $this->question->title?>"</em></small></h2>
			<form class="form" id="generate-form" action="?r=question/generate" method="post">
				<fieldset>
					<legend>
						Select the parameters
					</legend>
					
					<input type="hidden" name="survey" value="<?php echo $this->survey->id ?>" />
					<input type="hidden" name="question" value="<?php echo $this->question->id ?>"/>

					<label for="check1" class="checkbox"><input type="checkbox" name="params[]" id="check1" class="" value="gender"><span></span>Gender</label>
					<label for="check2" class="checkbox"><input type="checkbox" name="params[]" id="check2" class="" value="phd_year"><span></span>Phd year</label>
					<label for="check3" class="checkbox"><input type="checkbox" name="params[]" id="check3" class="" value="tenure"><span></span>Tenure</label>
					<label for="check4" class="checkbox"><input type="checkbox" name="params[]" id="check4" class="" value="region_of_study"><span></span>Region of study</label>
				</fieldset>
				<hr>
				<fieldset>
					<input type="submit" class="btn btn-success" id="generatebtn" value="Generate">
				</fieldset>
				
			</form>
		</div>		
	</div>
	
</div>

<script type="text/javascript">
	
	$(document).ready(function(){

		$('#generatebtn').click(function(event){
			

		});




		// var survey = <?php //echo $_GET['survey'] ?>;
		// var question = <?php //echo $_GET['question']?>;
		// var paramsArray = [];
		// var params = paramsArray.toString();
		// var data = 'r=answer/getanswers&survey=' + survey + '&question=' + question + '&params=' + params;

		// $('#params :checkbox').click(function(){
		// 	if( $(this).is(':checked') )
		// 		paramsArray.push( $(this).val()) ;
		// 	else
		// 		paramsArray.pop( $(this).val());
		// 	console.log(paramsArray);
		// 	console.log(this);
		// });

		// $.ajax({
		// 	url: 'index.php',
		// 	data: data,
		// 	type: 'get',
		// 	dataType: 'json',
		// 	success: function(r)
		// 	{
		// 		console.log(r);
		// 	}
		// });
	});
</script>
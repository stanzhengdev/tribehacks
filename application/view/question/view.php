<div class="row">
	<div class="columns twelve">
		<form class="form" id="params">
			<div class="">
				<label for="check1" class="checkbox"><input type="checkbox" name="params[]" id="check1" class="" value="gender"><span></span>Gender</label>
				<label for="check2" class="checkbox"><input type="checkbox" name="params[]" id="check2" class="" value="phd_year"><span></span>Phd year</label>
				<label for="check3" class="checkbox"><input type="checkbox" name="params[]" id="check3" class="" value="tenure"><span></span>Tenure</label>
				<label for="check4" class="checkbox"><input type="checkbox" name="params[]" id="check4" class="" value="region_of_study"><span></span>Region of study</label>
			</div>
		</form>
	</div>
</div>

<script type="text/javascript">
	
	$(document).ready(function(){
		var survey = <?php echo $_GET['survey'] ?>;
		var question = <?php echo $_GET['question']?>;
		var paramsArray = [];
		var params = paramsArray.toString();
		var data = 'r=answer/getanswers&survey=' + survey + '&question=' + question + '&params=' + params;

		$('#params :checkbox').click(function(){
			if( $(this).is(':checked') )
				paramsArray.push( $(this).val()) ;
			else
				paramsArray.pop( $(this).val());
			console.log(paramsArray);
			console.log(this);
		});

		$.ajax({
			url: 'index.php',
			data: data,
			type: 'get',
			dataType: 'json',
			success: function(r)
			{
				console.log(r);
			}
		});
	});
</script>
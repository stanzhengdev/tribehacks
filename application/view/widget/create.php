<div ng-view="ng-view" class="wrap"></div>

<script>
$(document).ready(function(){

	var container = $('#datacontainer');
	container.val('XYZ');
	container.trigger('input');
});
</script>
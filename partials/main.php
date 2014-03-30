
<div class="container">
	<section id="data">
		<h3>Data</h3>
		<div class="row-fluid">
			<textarea id="datacontainer" class="span12" width="100%" style="height:400px" placeholder="Paste your text or drag-and-drop a file here. No data on hand? Choose one of our sample!" ng-model="text" ng-init="datacontainerInit('<?php echo ($_COOKIE["data"]);?>')"></textarea>
		</div>
		<div ng-show="error &amp;&amp; !loading" class="alert alert-danger">{{error}}</div>
		<div ng-show="!error &amp;&amp; data.length &amp;&amp; !loading" class="alert alert-success"><span>Everything seems fine with your data! Please continue</span></div>
		<div ng-show="loading" class="alert alert-danger"><span>Please wait while loading data...</span></div>
		<div class="row-fluid">
			<div class="span4">
				<p class="light">{{data.length}} items in your data</p>
			</div>
			<div class="span8">
				<div class="dropdown pull-right"><a data-toggle="dropdown" href="#" role="button" class="dropdown-toggle">choose a data sample <b class="caret"></b></a>
					<ul role="menu" aria-labelledBy="dLabel" class="dropdown-menu">
						<li ng-repeat="sample in samples" role="presentation"><a data-target="#" tabindex="-1" role="menuitem" ng-click="chooseSample(sample)">{{sample.title}}</a></li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<section id="layout" ng-show="data.length">
		<h3>Layout</h3>
		<div class="row-fluid">
			<div class="span3">
				<select id="suca" ui-select2="select2Options" ng-model="chart" ng-options="c.title for c in charts" class="span12"></select>
			</div>
			<div class="span3">
				<div ng-style="getBackground(chart)" class="image"></div>
			</div>
			<div class="span6">
				<p ng-bind-html="chart.description"></p>
			</div>
		</div>
	</section>
	<section id="mapping" ng-show="data.length">
		<h3>Mapping</h3>
		<div class="row-fluid">
			<!-- Header-->
			<div class="span3">
				<ul droppable="droppable" accept="&gt; li" group="group" every="1" watch="header" class="unstyled keys">
					<li draggable="draggable" ng-repeat="field in header" connect-to-sortable="ul.map" helper="clone" value="{{field}}" class="key span12">{{field.key}}<span class="muted"> {{field.type}}</span></li>
				</ul>
			</div>
			<!-- Model-->
			<div class="span9">
				<div class="sticky">
					<div group="group" every="3" watch="chart.model" class="row-fluid">
						<!-- Structure-->
						<div ng-repeat="structure in chart.model.structure" class="span4">
							<ul sortable="sortable" ng-model="structure" placeholder="placeholder" single="structure.single" accept="structure.accept" items="&gt; li:not('.initial')" class="keys unstyled map well">
								<p class="header">{{structure.title}}</p>
								<!--div.placeholder.static drop here-->
								<li ng-repeat="item in structure.value" value="{{item}}" class="key">{{item.key}}</li>
							</ul>
						</div>
						<!-- Mapping-->
						<div ng-repeat="mapper in chart.model.map" class="span4">
							<ul sortable="sortable" ng-model="mapper" placeholder="placeholder" single="mapper.single" accept="mapper.accept" items="&gt; li:not('.initial')" class="keys unstyled map well">
								<p class="header">{{mapper.title}}</p>
								<!--div.placeholder.static drop here-->
								<li ng-repeat="item in mapper.value" value="{{item}}" class="key">{{item.key}}</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section ng-show="data.length"><!--<a href="" class="toggles"></a><i class="icon-chevron-left active"></i>-->
		<div class="row-fluid">
			<div id="options" class="span3">
				<h3>Options</h3>
				<div ng-repeat="(name, option) in chart.options" ng-model="option" class="option">
					<div ng-switch="" on="option.type">
						<p class="header">{{option.title}}</p>
						<input type="number" min="0" ng-switch-when="number" ng-model="option.value" class="span12"/>
						<div ng-switch-when="boolean">
							<label class="checkbox">
								<input type="checkbox" ng-model="option.value"/>
							</label>
						</div>
						<div color="color" ng-switch-when="color" model="chart.model" colors="option.value"></div>
						<input type="text" ng-switch-default="ng-switch-default" ng-model="option.value" class="span12"/>
					</div>
				</div>
			</div>
			<div id="visualization" class="span9">
				<h3>Visualization</h3>
				<div id="vis" chart="chart" class="span12"></div>
			</div>
		</div>
	</section>
	<section id="export" ng-show="data.length">
		<h3>Export</h3>
		<div class="row-fluid">
			<span class

			<downloader type="svg" label="svg" source="#vis" class="span3"></downloader>
			<downloader type="png" label="png (beta)" source="#vis" class="span3"></downloader>
			<!-- <downloader type="json" label="data (json)" source="{{chart.model.applyOn(data)}}" class="span3"></downloader> -->
			<div class="span3">
				<p class="header">Send to Email</p>
				<p><input class="span12" id="emailToSend" name="emailToSend" placeholder="Enter the email address to share"></p>
				<p><a id="sendEmailTrigger" href="#" class="btn success span12"> <i class="icon-envelope icon-white"></i>Send</a></p>
			</div>
			<div class="span3">
				<p class="header">Embed in HTML</p>
				<coder source="#vis &gt; svg"></coder>
				<p>Copy and paste the code above in the source code of your HTML document to embed the visualization.</p>
			</div>
		</div>
	</section>
</div>
<div class="container">
	<div id="push"></div>
</div>

<script type="text/javascript">
	
	$(document).ready(function(){

		$('#sendEmailTrigger').click(function(event){

			var email = $('#emailToSend').val();
			var message = $('#question_label').html();
			message += $('#source-to-copy').val();

			console.log(email);
			console.log(message);
			data = "to=" + email + "&message=" + message + "&subject=Graph Generated";
			// data = JSON.stringify(data);
			$.ajax({
				url: 'index.php?r=widget/emailajax',
				data: data,
				type: 'post',
				dataType: 'json',
				success: function(r)
				{
					console.log(r);
				}
			});
			event.preventDefault();

		});
	});
</script>
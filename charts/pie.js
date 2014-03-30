raw.charts.pie = function(){

	return {

		title : 'Pie Chart',

		description : 'A piechart for rendering values with a legend',
		image : 'charts/imgs/pie.png',
		model : raw.models.pie({
			// the Model you extend off of is located in raw.model.js
//#define what your droppable mappings are.
	//title the name of your field
	// accept is the type allowed in
	// single  = number of things insidee it
			color : {
				title : 'Color',
				accept : ['number','string'],
				single : true,
				value : [],
				map : function(d) { return this.value.length ? d[this.value[0].key] : null; }
			}
		}),

		options : {

			width : {
				title : 'Width',
				type : 'number',
				position : 1,
				description : 'Width is whatever',
				value : 800
			},

			height : {
				title : 'Height',
				type : 'number',
				position : 1,
				description : 'Width is whatever',
				value : 500
			},
			color : {
				title : 'Color',
				type : 'color',
				position : 2,
				description : 'Color sucks!',
				value : raw.diverging()
			}
		},

		render : function(data, target) {

			//pass in your information
			var model = this.model,
					options = this.options,
					format = d3.format(",d");
			//console.log(data);
			console.log(JSON.stringify(data));
			//console.log(JSON.stringify(data));
			//debugger;
			var points = model.applyOn(data);
			console.log(points);
			//sets the data.
			  points.forEach(function(d) {
			    d.x = +d.x;
			  });

			// let's calculate margins
			// var marginLeft = !options.grid.value ? 0 : d3.max(points, function(d){ return (Math.log(d.y) / 2.302585092994046) + 1; }) * 9,
			// 		marginBottom = !options.grid.value ? 0 : 20,
			// 		w = options.width.value - marginLeft -1,
			// 		h = options.height.value - marginBottom-1;
			 		var width = options.width.value;
			 		var height = options.height.value;
			 		var radius = Math.min(width,height)/2;//options.maxRadius.value;
					var color = d3.scale.ordinal()
					   .range(["#98abc5", "#8a89a6", "#7b6888", "#6b486b", "#a05d56", "#d0743c", "#ff8c00"]);
					//values = options.color.value.domain(raw.unique(points, "color"));
					//console.log(eval(values));
			var arc = d3.svg.arc()
			    .outerRadius(radius - 10)
			    .innerRadius(0);
			var pie = d3.layout.pie()
			    .sort(null)
			    .value(function(d) { return d.x; });

				svg = target.append("svg:svg")
			    .attr("width", parseInt(options.width.value))
			    .attr("height",parseInt(options.height.value))
			  	.append("svg:g").attr("transform", "translate(" + width / 2 + "," + height / 2 + ")");
  var g = svg.selectAll(".arc")
      .data(pie(points))
    .enter().append("g")
      .attr("class", "arc");

  g.append("path")
      .attr("d", arc)
      .style("fill", function(d) { return color(d.data.x); });

  g.append("text")
      .attr("transform", function(d) { return "translate(" + arc.centroid(d) + ")"; })
      .attr("dy", ".35em")
      .style("text-anchor", "middle")
      .text(function(d) {
      	return d.data.y; });



//get color			var color = options.color.value.domain(raw.unique(points, "color"));


			return this;
		}//end of render

	}
};

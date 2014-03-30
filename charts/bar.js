raw.charts.bar = function(){

	return {

		title : 'Bar Graph',

	description : 'Super Cool Bar Graph<br> Based on <a href="http://nvd3.org/ghpages/scatter.html">http://nvd3.org/ghpages/scatter.html</a>',
		image : 'charts/imgs/bubble.png',
		model : raw.models.pie({

			color : {
				title : 'Color',
				accept : ['number','string'],
				single : true,
				value : [],
				map : function(d) { return this.value.length ? d[this.value[0].key] : null; }
			},

			label : {
				title : 'Label',
				accept : ['number','string'],
				single : true,
				value : [],
				map : function(d) { return this.value.length ? d[this.value[0].key] : null; }
			},

			size : {
				title : 'Size',
				accept : ['number'],
				value : [],
				single : true,
				map : function(d,t) {
					return this.value.length ? parseFloat(d[this.value[0].key]) + parseFloat(t) : parseFloat(t) + 1;
				}
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

			labels : {
				title : 'Labels',
				type : 'boolean',
				position : 2,
				description : 'Show labels',
				value : true
			},

			grid : {
				title : 'Grid',
				type : 'boolean',
				position : 2,
				description : '',
				value : true
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
			var model = this.model,
					options = this.options,
					format = d3.format(",d");
 var margin = {top: 20, right: 20, bottom: 30, left: 40};
//     width = 960 - margin.left - margin.right,
//     height = 500 - margin.top - margin.bottom;
	var width = options.width.value;
	var height = options.height.value;
var x = d3.scale.ordinal()
    .rangeRoundBands([0, width], .1);

var y = d3.scale.linear()
    .range([height, 0]);

var xAxis = d3.svg.axis()
    .scale(x)
    .orient("bottom");

var yAxis = d3.svg.axis()
    .scale(y)
    .orient("left")
    .ticks(10, "%");

var svg = target.append("svg")
    .attr("width", width + margin.left + margin.right)
    .attr("height", height + margin.top + margin.bottom)
  .append("g")
    .attr("transform", "translate(" + margin.left + "," + margin.top + ")");
			var model = this.model,
					options = this.options,
					format = d3.format(",d");


			var points = model.applyOn(data);
	console.log(points);


  x.domain(points.map(function(d) { return d.y; }));
  y.domain([0, d3.max(points, function(d) { return d.x; })]);

  svg.append("g")
      .attr("class", "x axis")
      .attr("transform", "translate(0," + height + ")")
      .call(xAxis);

  svg.append("g")
      .attr("class", "y axis")
      .call(yAxis)
    .append("text")
      .attr("transform", "rotate(-90)")
      .attr("y", 6)
      .attr("dy", ".71em")
      .style("text-anchor", "end")
      .text("Frequency");

			var color = options.color.value.domain(raw.unique(points, "color"));
  svg.selectAll(".bar")
      .data(points)
    .enter().append("rect")
      .attr("class", "bar")
      .attr("x", function(d) { return x(d.y); })
      .attr("width", x.rangeBand())
      .attr("y", function(d) { return y(d.x); })
      .attr("height", function(d) { return height - y(d.x); })
      .style("fill", function(d) { return model.map.color.value.length ? color(d.color) : color("undefined"); })
      //whjatever color someone wants

function type(d) {
  d.x = +d.x;
  return d;
}


	return this;
		}

	}
};

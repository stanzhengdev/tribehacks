Widgen
=====

Generate Widgets uses data from The Institute for the Theory and Practice of International Relations (ITPIR)'s Survey database. The widgets are customizable from data attributes, type of graph representation, and even the size and color. The widgets are fully embeddable, can be exported as PNGs and emailed.

These widgets are generated dynamically D3.js and Angular hosted on our php service. We utilized the ITPIR data and use SendGrid as a method of sharing widgets among our users.

Widgen Dependency Stack
---
- PHP create of API
- MYSQL Server
- DensityDesign Raw Library [Link] -> https://github.com/stanzheng/raw (version that was hacked on) (raw uses somew eird routing so we copy pasted this version into this project)
    - AngularJS
    - D3.JS

Want to Create Your Own Template?
---
The current generate maps valid tabular JSON or CSV files.

In config.js, define the name of your new generator. They map to your charts/MYGENERATOR.js name. Recommended to also add a representation of your graph in  charts/img.

edit the chart/config file to create your diagram

Utilizes one of the existing charts in charts/XX.js as a template. These use angular base models in  js/lib/raw. These are your base models that generally all properties of graphs will have. This is also where you can write your data type validation for your graphs.

In your charts this is kind of the documention
    Title - name of your graph
    Description - description
    options - dragable perspectives on your graph this of this as the DYNAMIC variables you want to change (size of x,y,colors,etc)
    Render - where you want to write all your D3.JS templating logic; majority of d3 maps at the D3 Gallery can be copy pasted, and then retrofitted to reflect the new data.
"render : function(data, target) {"
Data is your info from the textbox, target is mapped to the SVG on your view.
https://github.com/mbostock/d3/wiki/Gallery

PHP API
----
Setup MYSQL, and use the config/sample_db.php as your template. After filling in your settings rename it to config/db.php.

This must use some sort of PHP backend server to run. Also make sure mysql is running. You can easily use this command if you have PHP 5.3+ to start a server.
```shell
#terminal
php -S localhost:8888

```

After that you can navigate to the route http://localhost:8888/?r=survey to see the surveys in the database. (assuming the schema is all the same)


Contact
----
- Stanley Zheng at @stanzheng https://twitter.com/StanZheng
- Jose Mateo


License
---
MIT

(function ($, Drupal, drupalSettings) {
    var initialized;
    function init() {
        if(!initialized) {
            initialized = true;
            console.log('Gealden');
            var w = 1200;
            var h = 1000;
            div = 'dt_graphic';

            var force = d3.layout.force()
                .size([w, h])
                .on("tick", tick);

            var svg = d3.select('#' + div).append("svg")
            .attr("preserveAspectRatio", "xMinYMin meet")
            .attr("viewBox", "0 0 1400 940")
            .classed("svg-container", true)
                .classed("svg-content-responsive", true)
                .on("click", explicitlyPosition);

            var innerG = svg.append("g");
            var innerG2 = svg.append("g");
            var innerG3 = svg.append("g");
            var innerG4 = svg.append("g");
            var innerG5 = svg.append("g");
            var innerG6 = svg.append("g");
            var innerG7 = svg.append("g");
            var innerG8 = svg.append("g");
            var innerG9 = svg.append("g");
            var innerG10 = svg.append("g");
            var innerG11 = svg.append("g");

            var tooltip = d3.select("body")
                .append("div")
                .style("position", "absolute")
                .style("z-index", "10")
                .style("visibility", "hidden")
                .text("a simple tooltip");

            //erste Phase divergent
            var rectangle = svg.append("rect")
                .attr("x", 1)
                .attr("y", 227)
                .attr("width", 214)
                .attr("height", 600);

            //erste Phase konvergent
            var rectangle2 = svg.append("rect")
                .attr("x", 215)
                .attr("y", 227)
                .attr("width", 216)
                .attr("height", 600);

            //zweite Phase divergent
            var rectangle3 = svg.append("rect")
                .attr("x", 433)
                .attr("y", 227)
                .attr("width", 215)
                .attr("height", 600);

            //zweite Phase konvergent
            var rectangle4 = svg.append("rect")
                .attr("x", 648)
                .attr("y", 227)
                .attr("width", 216)
                .attr("height", 600);

            var rectangle5 = innerG.append("rect")
                .attr("x", 1)
                .attr("y", 1)
                .attr("width", 1295)
                .attr("height", 100);

            var textLabels = innerG.append("text")
                .attr("x", 500)
                .attr("y", 70)
                .text( "Vorbereitung")
                .attr("font-family", "sans-serif")
                .attr("font-size", "55px")
                .attr("fill", "white");

            var rectangle6 = innerG2.append("rect")
                .attr("x", 1)
                .attr("y", 103)
                .attr("width", 430)
                .attr("height", 60);

            var textLabels = innerG2.append("text")
                .attr("x", 120)
                .attr("y", 145)
                .text( "Problemraum")
                .attr("font-family", "sans-serif")
                .attr("font-size", "35px")
                .attr("fill", "white");

            var rectangle7 = innerG3.append("rect")
                .attr("x", 433)
                .attr("y", 103)
                .attr("width", 430)
                .attr("height", 60);

            var textLabels = innerG3.append("text")
                .attr("x", 552)
                .attr("y", 145)
                .text( "Lösungsraum")
                .attr("font-family", "sans-serif")
                .attr("font-size", "35px")
                .attr("fill", "white");

            var rectangle8 = innerG4.append("rect")
                .attr("x", 866)
                .attr("y", 103)
                .attr("width", 430)
                .attr("height", 60);

            var textLabels = innerG4.append("text")
                .attr("x", 890)
                .attr("y", 145)
                .text( "Implementierungsraum")
                .attr("font-family", "sans-serif")
                .attr("font-size", "35px")
                .attr("fill", "white");

            var rectangle20 = innerG5.append("rect")
                .attr("x", 1)
                .attr("y", 165)
                .attr("width", 213)
                .attr("height", 60);

            var textLabels = innerG5.append("text")
                .attr("dy", "0em")
                .attr("x", 70)
                .attr("y", 190)
                .html("Problem")
                .attr("font-family", "sans-serif")
                .attr("font-size", "22px")
                .attr("fill", "white");

            var rectangle9 = innerG6.append("rect")
                .attr("x", 216)
                .attr("y", 165)
                .attr("width", 215)
                .attr("height", 60);

            var textLabels = innerG7.append("text")
                .attr("dy", "0em")
                .attr("x", 250)
                .attr("y", 200)
                .html("Recherchieren")
                .attr("font-family", "sans-serif")
                .attr("font-size", "22px")
                .attr("fill", "white");

            innerG5.append("text")
                .attr("dy", "1em")
                .attr("x", 65)
                .attr("y", 193)
                .html("definieren")
                .attr("font-family", "sans-serif")
                .attr("font-size", "22px")
                .attr("fill", "white");

            var rectangle10 = innerG7.append("rect")
                .attr("x", 433)
                .attr("y", 165)
                .attr("width", 214)
                .attr("height", 60);

            var textLabels = innerG7.append("text")
            .attr("dy", "0em")
            .attr("x", 515)
            .attr("y", 190)
            .html("Ideen")
            .attr("font-family", "sans-serif")
            .attr("font-size", "22px")
            .attr("fill", "white");

            innerG7.append("text")
            .attr("dy", "1em")
            .attr("x", 490)
            .attr("y", 193)
            .html("generieren")
            .attr("font-family", "sans-serif")
            .attr("font-size", "22px")
            .attr("fill", "white");

        var rectangle11 = innerG8.append("rect")
            .attr("x", 649)
            .attr("y", 165)
            .attr("width", 215)
            .attr("height", 60);

        var textLabels = innerG8.append("text")
            .attr("dy", "0em")
            .attr("x", 729)
            .attr("y", 190)
            .html("Ideen")
            .attr("font-family", "sans-serif")
            .attr("font-size", "22px")
            .attr("fill", "white");

        innerG8.append("text")
            .attr("dy", "1em")
            .attr("x", 700)
            .attr("y", 193)
            .html("ausarbeiten")
            .attr("font-family", "sans-serif")
            .attr("font-size", "22px")
            .attr("fill", "white");

        var rectangle12 = innerG9.append("rect")
            .attr("x", 866)
            .attr("y", 165)
            .attr("width", 214)
            .attr("height", 60);

        var textLabels = innerG9.append("text")
            .attr("dy", "0em")
            .attr("x", 920)
            .attr("y", 190)
            .html("Prototypen")
            .attr("font-family", "sans-serif")
            .attr("font-size", "22px")
            .attr("fill", "white");

        innerG9.append("text")
            .attr("dy", "1em")
            .attr("x", 917)
            .attr("y", 193)
            .html("ausarbeiten")
            .attr("font-family", "sans-serif")
            .attr("font-size", "22px")
            .attr("fill", "white");

        var rectangle13 = innerG10.append("rect")
            .attr("x", 1082)
            .attr("y", 165)
            .attr("width", 214)
            .attr("height", 60);

        var textLabels = innerG10.append("text")
            .attr("dy", "0em")
            .attr("x", 1150)
            .attr("y", 190)
            .html("Lösung")
            .attr("font-family", "sans-serif")
            .attr("font-size", "22px")
            .attr("fill", "white");

        innerG10.append("text")
            .attr("dy", "1em")
            .attr("x", 1142)
            .attr("y", 193)
            .html("bewerten")
            .attr("font-family", "sans-serif")
            .attr("font-size", "22px")
            .attr("fill", "white");


        var triangle1 = svg.append('path')
            .attr('d', function(d) {
                return 'M ' + 215 +' '+ 228 +
                ' L' + 3 + ' ' + 527 +
                ' L' + 215 + ' ' + 827 +
                ' z';
            })

        var triangle2 = svg.append('path')
            .attr('d', function(d) {
                return 'M ' + 215 +' '+ 228 +
                ' L' + 431 + ' ' + 527 +
                ' L' + 215 + ' ' + 827 +
                ' z';
            })

        var triangle3 = svg.append('path')
            .attr('d', function(d) {
                return 'M ' + 648 +' '+ 228 +
                ' L' + 433 + ' ' + 527 +
                ' L' + 648 + ' ' + 827 +
                ' z';
            })

        var triangle4 = svg.append('path')
            .attr('d', function(d) {
                return 'M ' + 648 +' '+ 228 +
                ' L' + 864 + ' ' + 527 +
                ' L' + 648 + ' ' + 827 +
                ' z';
            })

        //dritte Phase divergent
        var rectangle14 = svg.append("rect")
            .attr("x", 866)
            .attr("y", 227)
            .attr("width", 216)
            .attr("height", 600);

        var rectangle15 = svg.append("rect")
            .attr("x", 1081)
            .attr("y", 227)
            .attr("width", 215)
            .attr("height", 600);

        var rectangle16 = innerG11.append("rect")
            .attr("x", 1)
            .attr("y", 830)
            .attr("width", 1295)
            .attr("height", 100);

        var textLabels = innerG11.append("text")
            .attr("x", 405)
            .attr("y", 894)
            .text( "Projektmanagement")
            .attr("font-family", "sans-serif")
            .attr("font-size", "55px")
            .attr("fill", "white");

        var triangle5 = svg.append('path')
            .attr('d', function(d) {
                return 'M ' + 1081 +' '+ 228 +
                ' L' + 866 + ' ' + 527 +
                ' L' + 1081 + ' ' + 827 +
                ' z';
            })

        var triangle6 = svg.append('path')
            .attr('d', function(d) {
                return 'M ' + 1081 +' '+ 228 +
                ' L' + 1296 + ' ' + 527 +
                ' L' + 1081 + ' ' + 827 +
                ' z';
            })

        var link = svg.selectAll(".link"),
            node = svg.selectAll(".node"),
            rect = svg.selectAll("rec");

        function tick() {
            link.attr("x1", function(d) { return d.source.x; })
                .attr("y1", function(d) { return d.source.y; })
                .attr("x2", function(d) { return d.target.x; })
                .attr("y2", function(d) { return d.target.y; });

            node.attr("cx", function(d) { return d.x; })
                .attr("cy", function(d) { return d.y; })
                .style("fill", function(d) { return d.color; });

            //Vorbereitung
            rectangle5.style("fill", function(d) { return "#595959"; });

            //erste Phase
            rectangle.style("fill", function(d) { return "#ad91be"; });
            rectangle2.style("fill", function(d) { return "#ad91be"; });

            rectangle6.style("fill", function(d) { return "#ad91be"; });

            rectangle20.style("fill", function(d) { return "#ad91be"; });
            rectangle9.style("fill", function(d) { return "#ad91be"; });


            //zweite Phase
            rectangle3.style("fill", function(d) { return "#7a9bb9"; });
            rectangle4.style("fill", function(d) { return "#7a9bb9"; });

            //Lösungsraum
            rectangle7.style("fill", function(d) { return "#7a9bb9"; });

            rectangle10.style("fill", function(d) { return "#7a9bb9"; });
            rectangle11.style("fill", function(d) { return "#7a9bb9"; });

            //dritte Phase
            rectangle14.style("fill", function(d) { return "#70c46f"; });
            rectangle15.style("fill", function(d) { return "#70c46f"; });

            //Lösungsraum
            rectangle8.style("fill", function(d) { return "#70c46f"; });

            rectangle12.style("fill", function(d) { return "#70c46f"; });
            rectangle13.style("fill", function(d) { return "#70c46f"; });

            //Projektmanagement
            rectangle16.style("fill", function(d) { return "#595959"; });

            triangle1.style("fill", function(d) { return "#8f56b2"; });
            triangle2.style("fill", function(d) { return "#783d99"; });
            triangle3.style("fill", function(d) { return "#446f95"; });
            triangle4.style("fill", function(d) { return "#335e87"; });
            triangle5.style("fill", function(d) { return "#3aa039"; });
            triangle6.style("fill", function(d) { return "#328131"; });
        }

        function explicitlyPosition() {

            node.each(function(d) {
                d.x = 0;
                d.y = 0;
                d.fixed = false;
            });

            tick();

            node.each(function(d) {
                d.fixed = true;
            });

            force.resume();
        }

        var taskArray = drupalSettings.data;

        force
            .nodes(taskArray.nodes)
            .links(taskArray.links)
            .start();

        link = link.data(taskArray.links)
            .enter().append("line")
            .attr("stroke", "#000")
            .attr("stroke-width", "1.5px");

        node = node.data(taskArray.nodes)
            .enter().append("circle")
            .attr("class", "node")
            .attr("r", 10)
            .on("mouseover", function(){console.log("TEST");});
            }
    }
    Drupal.behaviors.DesignThinkingGraphic = {
      attach: function (context, settings) {
        // can access setting from 'drupalSettings';
        init();
      }
    };
    })(jQuery, Drupal, drupalSettings);
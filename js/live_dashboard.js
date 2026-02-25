// jshint ignore: start
var dashboardArray = [], countyLabels = [], countyPercentages = [];
var dashColumns = ["county_name", "percentage"];
jQuery(document).ready(function($) {
    var obj = "";
    $.getJSON( "https://web.njsba.org/NJSBADataMart/CountyPercentages", function(data) {
        var json = JSON.stringify(data);
        obj = jQuery.parseJSON(json);
        
        var tot_obj = obj.length;        
        for (var i = 0; i < tot_obj ; i++)
        {
            var lineChild = [];
            for (var x = 0; x < dashColumns.length; x++ ) {
                lineChild.push(obj[i][dashColumns[x]]);
            }
            dashboardArray.push(lineChild);
        }

        for (var i = 0; i < dashboardArray.length; i++ )
        {
            countyLabels.push(dashboardArray[i][0]);
            countyPercentages.push(dashboardArray[i][1]);
        }
        // Bar Chart
        var barChartData = {
            labels : countyLabels,
            datasets : [
                    {
                        label: "Number of Districts Registered",
                        fillColor : "rgba(0, 115, 131, 0.75)",
                        strokeColor : "rgba(0, 115, 131, 0.9)",
                        highlightFill: "rgba(53, 167, 182,0.75)",
                        highlightStroke: "rgba(53, 167, 182,.9)",
                        data : countyPercentages
                    }
                ]

            };
            var ctx = document.getElementById("canvas").getContext("2d");
            window.myBar = new Chart(ctx).Bar(barChartData, {
                responsive : true,
                scaleFontStyle: "bold",
                scaleFontFamily: "'acumin-pro-semi-condensed', sans-serif",
                scaleFontSize: 12,
                tooltipFontFamily: "'acumin-pro-semi-condensed', sans-serif",
                scaleShowHorizontalLines: false,
                scaleShowVerticalLines: false,
                barValueSpacing : 3,
                scaleLabel : "<%= value + '%' %>"
            });
    });
});
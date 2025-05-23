// !function(e){"use strict";function a(){}a.prototype.createBarChart=function(a,t,e,o,r,i){Morris.Bar({element:a,data:t,xkey:e,ykeys:o,labels:r,dataLabels:!1,hideHover:"auto",resize:!0,gridLineColor:"rgba(65, 80, 95, 0.07)",barSizeRatio:.2,barColors:i})},a.prototype.createAreaChartDotted=function(a,t,e,o,r,i,s,l,n,c){Morris.Area({element:a,pointSize:3,lineWidth:1,data:o,xkey:r,ykeys:i,labels:s,dataLabels:!1,hideHover:"auto",pointFillColors:l,pointStrokeColors:n,resize:!0,smooth:!1,gridLineColor:"rgba(65, 80, 95, 0.07)",lineColors:c})},a.prototype.createDonutChart=function(a,t,e){Morris.Donut({element:a,data:t,barSize:.2,resize:!0,colors:e,backgroundColor:"transparent"})},a.prototype.init=function(){var a=["#02c0ce"],t=e("#statistics-chart").data("colors");t&&(a=t.split(",")),this.createBarChart("statistics-chart",[{y:"2012",a:87},{y:"2013",a:75},{y:"2014",a:50},{y:"2015",a:75},{y:"2016",a:50},{y:"2017",a:38},{y:"2018",a:72}],"y",["a"],["Statistics"],a);a=["#4a81d4","#e3eaef"];(t=e("#income-amounts").data("colors"))&&(a=t.split(",")),this.createAreaChartDotted("income-amounts",0,0,[{y:"2012",a:10,b:20},{y:"2013",a:75,b:65},{y:"2014",a:50,b:40},{y:"2015",a:75,b:65},{y:"2016",a:50,b:40},{y:"2017",a:75,b:65},{y:"2018",a:90,b:60}],"y",["a","b"],["Bitcoin","Litecoin"],["#ffffff"],["#999999"],a);a=["#4fc6e1","#6658dd","#ebeff2"];(t=e("#lifetime-sales").data("colors"))&&(a=t.split(",")),this.createDonutChart("lifetime-sales",[{label:" Pending ",value:30},{label:" Hired ",value:50},{label:" Cancelled ",value:20}],a)},e.Dashboard4=new a,e.Dashboard4.Constructor=a}(window.jQuery),function(){"use strict";window.jQuery.Dashboard4.init()}();
!function(e) {
    "use strict";
    function a() {}

    a.prototype.createDonutChart = function(a, t, e) {
        Morris.Donut({
            element: a,
            data: t,
            barSize: 0.2,
            resize: !0,
            colors: e,
            backgroundColor: "transparent",
            labelColor: "#ffffff", 
            formatter: function(y) {
                var total = 0;
                t.forEach(function(d) { total += d.value; }); 
                return ((y / total) * 100).toFixed(1) + "%"; 
            }
        });
    };

    a.prototype.init = function() {
        var a = ["#4fc6e1", "#6658dd", "#e3eaef"];
        var t = e("#lifetime-sales").data("colors");
        if (t) a = t.split(",");

        this.createDonutChart("lifetime-sales", [
            { label: "", value: 30 },  
            { label: "", value: 50 },
            { label: "", value: 20 }
        ], a);
    };

    e.Dashboard4 = new a, e.Dashboard4.Constructor = a;
}(window.jQuery),

function() {
    "use strict";
    window.jQuery.Dashboard4.init();
}();   

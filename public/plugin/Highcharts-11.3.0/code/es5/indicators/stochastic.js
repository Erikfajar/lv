/**
 * Highstock JS v11.3.0 (2024-01-10)
 *
 * Indicator series type for Highcharts Stock
 *
 * (c) 2010-2024 Paweł Fus
 *
 * License: www.highcharts.com/license
 */!function(t){"object"==typeof module&&module.exports?(t.default=t,module.exports=t):"function"==typeof define&&define.amd?define("highcharts/indicators/stochastic",["highcharts","highcharts/modules/stock"],function(e){return t(e),t.Highcharts=e,t}):t("undefined"!=typeof Highcharts?Highcharts:void 0)}(function(t){"use strict";var e=t?t._modules:{};function o(t,e,o,i){t.hasOwnProperty(e)||(t[e]=i.apply(null,o),"function"==typeof CustomEvent&&window.dispatchEvent(new CustomEvent("HighchartsModuleLoaded",{detail:{path:e,module:t[e]}})))}o(e,"Stock/Indicators/ArrayUtilities.js",[],function(){return{getArrayExtremes:function(t,e,o){return t.reduce(function(t,i){return[Math.min(t[0],i[e]),Math.max(t[1],i[o])]},[Number.MAX_VALUE,-Number.MAX_VALUE])}}}),o(e,"Stock/Indicators/MultipleLinesComposition.js",[e["Core/Series/SeriesRegistry.js"],e["Core/Utilities.js"]],function(t,e){var o,i=t.seriesTypes.sma.prototype,r=e.defined,n=e.error,s=e.merge;return function(t){var e=["bottomLine"],o=["top","bottom"],a=["top"];function p(t){return"plot"+t.charAt(0).toUpperCase()+t.slice(1)}function l(t,e){var o=[];return(t.pointArrayMap||[]).forEach(function(t){t!==e&&o.push(p(t))}),o}function c(){var t,e=this,o=e.pointValKey,a=e.linesApiNames,c=e.areaLinesNames,h=e.points,u=e.options,f=e.graph,d={options:{gapSize:u.gapSize}},y=[],m=l(e,o),g=h.length;if(m.forEach(function(e,o){for(y[o]=[];g--;)t=h[g],y[o].push({x:t.x,plotX:t.plotX,plotY:t[e],isNull:!r(t[e])});g=h.length}),e.userOptions.fillColor&&c.length){var v=y[m.indexOf(p(c[0]))],A=1===c.length?h:y[m.indexOf(p(c[1]))],x=e.color;e.points=A,e.nextPoints=v,e.color=e.userOptions.fillColor,e.options=s(h,d),e.graph=e.area,e.fillGraph=!0,i.drawGraph.call(e),e.area=e.graph,delete e.nextPoints,delete e.fillGraph,e.color=x}a.forEach(function(t,o){y[o]?(e.points=y[o],u[t]?e.options=s(u[t].styles,d):n('Error: "There is no '+t+' in DOCS options declared. Check if linesApiNames are consistent with your DOCS line names."'),e.graph=e["graph"+t],i.drawGraph.call(e),e["graph"+t]=e.graph):n('Error: "'+t+" doesn't have equivalent in pointArrayMap. To many elements in linesApiNames relative to pointArrayMap.\"")}),e.points=h,e.options=u,e.graph=f,i.drawGraph.call(e)}function h(t){var e,o=[],r=[];if(t=t||this.points,this.fillGraph&&this.nextPoints){if((e=i.getGraphPath.call(this,this.nextPoints))&&e.length){e[0][0]="L",o=i.getGraphPath.call(this,t),r=e.slice(0,o.length);for(var n=r.length-1;n>=0;n--)o.push(r[n])}}else o=i.getGraphPath.apply(this,arguments);return o}function u(t){var e=[];return(this.pointArrayMap||[]).forEach(function(o){e.push(t[o])}),e}function f(){var t,e=this,o=this.pointArrayMap,r=[];r=l(this),i.translate.apply(this,arguments),this.points.forEach(function(i){o.forEach(function(o,n){t=i[o],e.dataModify&&(t=e.dataModify.modifyValue(t)),null!==t&&(i[r[n]]=e.yAxis.toPixels(t,!0))})})}t.compose=function(t){var i=t.prototype;return i.linesApiNames=i.linesApiNames||e.slice(),i.pointArrayMap=i.pointArrayMap||o.slice(),i.pointValKey=i.pointValKey||"top",i.areaLinesNames=i.areaLinesNames||a.slice(),i.drawGraph=c,i.getGraphPath=h,i.toYData=u,i.translate=f,t}}(o||(o={})),o}),o(e,"Stock/Indicators/Stochastic/StochasticIndicator.js",[e["Stock/Indicators/ArrayUtilities.js"],e["Stock/Indicators/MultipleLinesComposition.js"],e["Core/Series/SeriesRegistry.js"],e["Core/Utilities.js"]],function(t,e,o,i){var r,n=this&&this.__extends||(r=function(t,e){return(r=Object.setPrototypeOf||({__proto__:[]})instanceof Array&&function(t,e){t.__proto__=e}||function(t,e){for(var o in e)Object.prototype.hasOwnProperty.call(e,o)&&(t[o]=e[o])})(t,e)},function(t,e){if("function"!=typeof e&&null!==e)throw TypeError("Class extends value "+String(e)+" is not a constructor or null");function o(){this.constructor=t}r(t,e),t.prototype=null===e?Object.create(e):(o.prototype=e.prototype,new o)}),s=o.seriesTypes.sma,a=i.extend,p=i.isArray,l=i.merge,c=function(e){function o(){return null!==e&&e.apply(this,arguments)||this}return n(o,e),o.prototype.init=function(){e.prototype.init.apply(this,arguments),this.options=l({smoothedLine:{styles:{lineColor:this.color}}},this.options)},o.prototype.getValues=function(o,i){var r,n,s,a,l,c=i.periods[0],h=i.periods[1],u=o.xData,f=o.yData,d=f?f.length:0,y=[],m=[],g=[],v=null;if(!(d<c)&&p(f[0])&&4===f[0].length){var A=!0,x=0;for(l=c-1;l<d;l++){if(r=f.slice(l-c+1,l+1),n=(a=t.getArrayExtremes(r,2,1))[0],isNaN(s=(f[l][3]-n)/(a[1]-n)*100)&&A){x++;continue}A&&!isNaN(s)&&(A=!1);var N=m.push(u[l]);isNaN(s)?g.push([g[N-2]&&"number"==typeof g[N-2][0]?g[N-2][0]:null,null]):g.push([s,null]),l>=x+(c-1)+(h-1)&&(v=e.prototype.getValues.call(this,{xData:m.slice(-h),yData:g.slice(-h)},{period:h}).yData[0]),y.push([u[l],s,v]),g[N-1][1]=v}return{values:y,xData:m,yData:g}}},o.defaultOptions=l(s.defaultOptions,{params:{index:void 0,period:void 0,periods:[14,3]},marker:{enabled:!1},tooltip:{pointFormat:'<span style="color:{point.color}">●</span><b> {series.name}</b><br/>%K: {point.y}<br/>%D: {point.smoothed}<br/>'},smoothedLine:{styles:{lineWidth:1,lineColor:void 0}},dataGrouping:{approximation:"averages"}}),o}(s);return a(c.prototype,{areaLinesNames:[],nameComponents:["periods"],nameBase:"Stochastic",pointArrayMap:["y","smoothed"],parallelArrays:["x","y","smoothed"],pointValKey:"y",linesApiNames:["smoothedLine"]}),e.compose(c),o.registerSeriesType("stochastic",c),c}),o(e,"masters/indicators/stochastic.src.js",[],function(){})});
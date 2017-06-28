

<!DOCTYPE html>
<html>
<head>
	<title>onClick / onBeforeChange</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<link rel="stylesheet" type="text/css" href="../codebase/fonts/font_roboto/roboto.css"/>
	<link rel="stylesheet" href="http://cdn.dhtmlx.com/edge/dhtmlx.css" 
    type="text/css"> 
<script src="./codebase/dhtmlxcalendar.js"></script>
	<style>
		#calendar {
			border: 1px solid #dfdfdf;
			font-family: Roboto, Arial, Helvetica;
			font-size: 14px;
			color: #404040;
		}
		#logsHere {
			width: 700px;
			height: 150px;
			overflow: auto;
			border: 1px solid #dfdfdf;
			font-family: Roboto, Arial, Helvetica;
			font-size: 14px;
			color: #404040;
		}
	</style>
	<script>
		var myCalendar;
		function doOnLoad() {
			myCalendar = new dhtmlXCalendarObject("cal_1");
			myCalendar.attachEvent("onClick", function(d){
				writeLog("onClick event called, date "+myCalendar.getFormatedDate(null,d));
			});
			myCalendar.attachEvent("onBeforeChange", function(d){
				var allow = d.getDate()<20;
				writeLog("onBeforeChange event called, date "+myCalendar.getFormatedDate(null,d)+", "+(allow?"allow to change":"not allow"));
				return allow;
			});
			writeLog("for tests onBeforeChange will not acceps to change date if day >= 20");
		}
		var logObj, logInd=0;
		function writeLog(t) {
			if (!logObj) logObj = document.getElementById("logsHere");
			logObj.innerHTML = (++logInd)+") "+t+"<br>"+logObj.innerHTML;
		}
	</script>
</head>
<body onload="doOnLoad();">
	<div style="position:relative;height:350px;"><input type="text" id="cal_1"></div>
	<div id="logsHere"></div>
</body>
</html>


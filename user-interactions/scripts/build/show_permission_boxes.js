!function n(d,o,i){function u(t,e){if(!o[t]){if(!d[t]){var r="function"==typeof require&&require;if(!e&&r)return r(t,!0);if(l)return l(t,!0);throw new Error("Cannot find module '"+t+"'")}r=o[t]={exports:{}};d[t][0].call(r.exports,function(e){var r=d[t][1][e];return u(r||e)},r,r.exports,n,d,o,i)}return o[t].exports}for(var l="function"==typeof require&&require,e=0;e<i.length;e++)u(i[e]);return u}({1:[function(e,r,t){const n=document.getElementById("add-form-permission"),d=document.getElementById("add-form-student-hide-box"),o=document.getElementById("add-form-teacher-hide-box"),i=document.getElementById("add-form-class"),u=document.getElementById("add-form-birthdate"),l=document.getElementById("add-form-room");n.addEventListener("change",()=>{var e=n.options[n.selectedIndex].value;d.style.display="none",o.style.display="none",i.required=!1,u.required=!1,l.required=!1,"t"==e?(o.style.display="flex",l.required=!0):"s"==e&&(d.style.display="flex",i.required=!0,u.required=!0)})},{}]},{},[1]);
//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoic2hvd19wZXJtaXNzaW9uX2JveGVzLmpzIiwic291cmNlcyI6WyJzaG93X3Blcm1pc3Npb25fYm94ZXMuanMiXSwic291cmNlc0NvbnRlbnQiOlsiKGZ1bmN0aW9uIGUodCxuLHIpe2Z1bmN0aW9uIHMobyx1KXtpZighbltvXSl7aWYoIXRbb10pe3ZhciBhPXR5cGVvZiByZXF1aXJlPT1cImZ1bmN0aW9uXCImJnJlcXVpcmU7aWYoIXUmJmEpcmV0dXJuIGEobywhMCk7aWYoaSlyZXR1cm4gaShvLCEwKTt0aHJvdyBuZXcgRXJyb3IoXCJDYW5ub3QgZmluZCBtb2R1bGUgJ1wiK28rXCInXCIpfXZhciBmPW5bb109e2V4cG9ydHM6e319O3Rbb11bMF0uY2FsbChmLmV4cG9ydHMsZnVuY3Rpb24oZSl7dmFyIG49dFtvXVsxXVtlXTtyZXR1cm4gcyhuP246ZSl9LGYsZi5leHBvcnRzLGUsdCxuLHIpfXJldHVybiBuW29dLmV4cG9ydHN9dmFyIGk9dHlwZW9mIHJlcXVpcmU9PVwiZnVuY3Rpb25cIiYmcmVxdWlyZTtmb3IodmFyIG89MDtvPHIubGVuZ3RoO28rKylzKHJbb10pO3JldHVybiBzfSkoezE6W2Z1bmN0aW9uKHJlcXVpcmUsbW9kdWxlLGV4cG9ydHMpe1xuY29uc3QgYWRkX2Zvcm1fcGVybWlzc2lvbiA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdhZGQtZm9ybS1wZXJtaXNzaW9uJyk7XG5jb25zdCBzdHVkZW50X2hpZGVfYm94ID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2FkZC1mb3JtLXN0dWRlbnQtaGlkZS1ib3gnKTtcbmNvbnN0IHRlYWNoZXJfaGlkZV9ib3ggPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnYWRkLWZvcm0tdGVhY2hlci1oaWRlLWJveCcpO1xuXG5jb25zdCBhZGRfZm9ybV9jbGFzcyA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKFwiYWRkLWZvcm0tY2xhc3NcIik7XG5jb25zdCBhZGRfZm9ybV9iaXJ0aGRheSA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKFwiYWRkLWZvcm0tYmlydGhkYXRlXCIpO1xuY29uc3QgYWRkX2Zvcm1fcm9vbSA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKFwiYWRkLWZvcm0tcm9vbVwiKTtcblxuYWRkX2Zvcm1fcGVybWlzc2lvbi5hZGRFdmVudExpc3RlbmVyKFwiY2hhbmdlXCIsICgpID0+IHtcbiAgbGV0IHZhbHVlID0gYWRkX2Zvcm1fcGVybWlzc2lvbi5vcHRpb25zW2FkZF9mb3JtX3Blcm1pc3Npb24uc2VsZWN0ZWRJbmRleF0udmFsdWU7XG5cbiAgc3R1ZGVudF9oaWRlX2JveC5zdHlsZS5kaXNwbGF5ID0gXCJub25lXCI7XG4gIHRlYWNoZXJfaGlkZV9ib3guc3R5bGUuZGlzcGxheSA9IFwibm9uZVwiO1xuXG4gIGFkZF9mb3JtX2NsYXNzLnJlcXVpcmVkID0gZmFsc2U7XG4gIGFkZF9mb3JtX2JpcnRoZGF5LnJlcXVpcmVkID0gZmFsc2U7XG4gIGFkZF9mb3JtX3Jvb20ucmVxdWlyZWQgPSBmYWxzZTtcblxuICBpZiAodmFsdWUgPT0gXCJ0XCIpIHtcbiAgICB0ZWFjaGVyX2hpZGVfYm94LnN0eWxlLmRpc3BsYXkgPSBcImZsZXhcIjtcbiAgICBhZGRfZm9ybV9yb29tLnJlcXVpcmVkID0gdHJ1ZTtcbiAgfVxuICBlbHNlIGlmICh2YWx1ZSA9PSBcInNcIikge1xuICAgIHN0dWRlbnRfaGlkZV9ib3guc3R5bGUuZGlzcGxheSA9IFwiZmxleFwiO1xuICAgIGFkZF9mb3JtX2NsYXNzLnJlcXVpcmVkID0gdHJ1ZTtcbiAgICBhZGRfZm9ybV9iaXJ0aGRheS5yZXF1aXJlZCA9IHRydWU7XG4gIH1cbn0pO1xufSx7fV19LHt9LFsxXSkiXSwibmFtZXMiOlsiZSIsInQiLCJuIiwiciIsInMiLCJvIiwidSIsImEiLCJyZXF1aXJlIiwiaSIsIkVycm9yIiwiZiIsImV4cG9ydHMiLCJjYWxsIiwibGVuZ3RoIiwiMSIsIm1vZHVsZSIsImFkZF9mb3JtX3Blcm1pc3Npb24iLCJkb2N1bWVudCIsImdldEVsZW1lbnRCeUlkIiwic3R1ZGVudF9oaWRlX2JveCIsInRlYWNoZXJfaGlkZV9ib3giLCJhZGRfZm9ybV9jbGFzcyIsImFkZF9mb3JtX2JpcnRoZGF5IiwiYWRkX2Zvcm1fcm9vbSIsImFkZEV2ZW50TGlzdGVuZXIiLCJ2YWx1ZSIsIm9wdGlvbnMiLCJzZWxlY3RlZEluZGV4Iiwic3R5bGUiLCJkaXNwbGF5IiwicmVxdWlyZWQiXSwibWFwcGluZ3MiOiJDQUFBLFNBQVVBLEVBQUVDLEVBQUVDLEVBQUVDLEdBQUcsU0FBU0MsRUFBRUMsRUFBRUMsR0FBRyxJQUFJSixFQUFFRyxHQUFHLENBQUMsSUFBSUosRUFBRUksR0FBRyxDQUFDLElBQUlFLEVBQWtCLG1CQUFUQyxTQUFxQkEsUUFBUSxJQUFJRixHQUFHQyxFQUFFLE9BQU9BLEVBQUVGLEdBQUUsR0FBSSxHQUFHSSxFQUFFLE9BQU9BLEVBQUVKLEdBQUUsR0FBSSxNQUFNLElBQUlLLE1BQU0sdUJBQXVCTCxFQUFFLEtBQVNNLEVBQUVULEVBQUVHLEdBQUcsQ0FBQ08sUUFBUSxJQUFJWCxFQUFFSSxHQUFHLEdBQUdRLEtBQUtGLEVBQUVDLFFBQVEsU0FBU1osR0FBRyxJQUFJRSxFQUFFRCxFQUFFSSxHQUFHLEdBQUdMLEdBQUcsT0FBT0ksRUFBRUYsR0FBSUYsSUFBSVcsRUFBRUEsRUFBRUMsUUFBUVosRUFBRUMsRUFBRUMsRUFBRUMsR0FBRyxPQUFPRCxFQUFFRyxHQUFHTyxRQUFrRCxJQUExQyxJQUFJSCxFQUFrQixtQkFBVEQsU0FBcUJBLFFBQWdCSCxFQUFFLEVBQUVBLEVBQUVGLEVBQUVXLE9BQU9ULElBQUlELEVBQUVELEVBQUVFLElBQUksT0FBT0QsRUFBclosQ0FBeVosQ0FBQ1csRUFBRSxDQUFDLFNBQVNQLEVBQVFRLEVBQU9KLEdBQ3JiLE1BQU1LLEVBQXNCQyxTQUFTQyxlQUFlLHVCQUM5Q0MsRUFBbUJGLFNBQVNDLGVBQWUsNkJBQzNDRSxFQUFtQkgsU0FBU0MsZUFBZSw2QkFFM0NHLEVBQWlCSixTQUFTQyxlQUFlLGtCQUN6Q0ksRUFBb0JMLFNBQVNDLGVBQWUsc0JBQzVDSyxFQUFnQk4sU0FBU0MsZUFBZSxpQkFFOUNGLEVBQW9CUSxpQkFBaUIsU0FBVSxLQUM3QyxJQUFJQyxFQUFRVCxFQUFvQlUsUUFBUVYsRUFBb0JXLGVBQWVGLE1BRTNFTixFQUFpQlMsTUFBTUMsUUFBVSxPQUNqQ1QsRUFBaUJRLE1BQU1DLFFBQVUsT0FFakNSLEVBQWVTLFVBQVcsRUFDMUJSLEVBQWtCUSxVQUFXLEVBQzdCUCxFQUFjTyxVQUFXLEVBRVosS0FBVEwsR0FDRkwsRUFBaUJRLE1BQU1DLFFBQVUsT0FDakNOLEVBQWNPLFVBQVcsR0FFVCxLQUFUTCxJQUNQTixFQUFpQlMsTUFBTUMsUUFBVSxPQUNqQ1IsRUFBZVMsVUFBVyxFQUMxQlIsRUFBa0JRLFVBQVcsTUFHL0IsS0FBSyxHQUFHLENBQUMifQ==

// This file provides function and retrives information from the server
// to the lift-tracker homepage

// Calls when document loads
// retrives information from server and sets click events for
// display button and record button
$(document).ready(function() {
	ajax();
	$("#logout").click(function() {
		$(location).attr("href", "logout.php");
	});
	$("#display").click(function() {
		displayGraph();
	});
	$("#record").click(function() {
		displayRecord();
	});
});

// Displays graph of lifts
// Hides record menu
function displayGraph() {
	$("#track").css("display", "none");
	$("#graph").css("display", "block");
}

// Displays record menu
// Hides graph of lifts
function displayRecord() {
	$("#track").css("display", "block");
	$("#graph").css("display", "none");
}

// Retrieves information from server
function ajax() {
	var username = $.cookie("username");
	var request = new XMLHttpRequest();
	request.onload = createGraph;
	request.open("GET", "lifts.php?username=" + username, true);
	request.send();
}

// Creates graph with the one rep max and date of the entry
function createGraph() {
	var data = this.responseXML;
	var lifts = data.querySelectorAll("lift");
	var values = []; // stores objects
	var object = {};
	var layout = {
		title: "One Rep Maxes",
		xaxis: {
			title: "Date of Entry",
			titlefont: {
				family: "Courier, monospace, sans serif",
				size: 12,
				color: "black"
			}
		},
		yaxis: {
			title: "Weight in Pounds",
			titlefont: {
				family: "Courier, monospace, sans serif",
				size: 12,
				color: "black"
			}
		}
	};
	for(var i = 0; i < lifts.length; i++) { //one value for each lift
		var lift = lifts[i];
		var liftName = lift.getAttribute("name");
		var entries = lift.querySelectorAll("entry");
		var date = [];
		var weight = [];
		for(var k = 0; k < entries.length; k++) { //loops through entries
			var entry = entries[k];
			date.push(entry.getAttribute("date"));
			weight.push(entry.getAttribute("weight"));
		}
		object.x = date;
		object.y =weight;
		object.type = "scatter";
		object.name = liftName;
		values.push(object);
		object = {};	// Reset data structures
		date = [];
		weight = [];
	}

	Plotly.newPlot("graph", values, layout);
}
$(document).ready
(
	function()
	{
		// alert ("Page loaded");	
		loadCustomers();	


	}
	

);

function loadCustomers()
{
	console.log("loadCustomers");
	$.post('controllers/ajax/getCustomers.php',{},loadCustomersCallback);	
}

function loadCustomersCallback(data)
{
//	alert(data);
	console.log("loadCustomersCallback");
	customersObj = JSON.parse(data);
//	console.log(customersObj);

	var customerTable = "<p>Welcome to the list of PropellerHead customers. This is a list of the current ones. Hover over and then ";
	customerTable += "click on a customer to view details of that customer, and then have the possibility to add notes ";
	customerTable += "for this customer. You can also create a new customer by clicking on the <b>Add Customer</b> button below.</p>";
	customerTable += "<table id='customerTable'><tr><th>CustomerID</th><th>Status</th><th>Date created</th><th>Information</th><tr>";
	customersObj.forEach(function(customerObj)
	{
		customerTable += "<tr class='customer'>";
		customerTable += "<td>" + customerObj.customer_id + "</td>";
		customerTable += "<td>" + customerObj.status      + "</td>";
		customerTable += "<td>" + customerObj.creationDate  + "</td>";
		customerTable += "<td>" + customerObj.information + "</td>";
		customerTable += "</tr>";
	});
	customerTable += "</table>";
	customerTable += "<div id='addCustomerButton' class='button'>Add Customer</div>";

	$("#content").html(customerTable);

	$(".customer").hover(function(){$(this).addClass("table-item-hover");},function(){$(this).removeClass("table-item-hover");});
	$(".customer").click(showCustomer);
	$("#addCustomerButton").hover(function(){$(this).addClass("buttonHover");},function(){$(this).removeClass("buttonHover");});
	$("#addCustomerButton").click(addCustomer);

}

function addCustomer()
{
	console.log("addCustomer");
}


function showCustomer()
{
	console.log("showCustomer " + $(this).children().first().html());
	CustomerID = $(this).children().first().html(); 
	$.post('controllers/ajax/showCustomer.php',{CustomerID: CustomerID},showCustomerCallback);	

}

function showCustomerCallback(data)
{
	console.log("showCustomerCallback");
//	alert(data);
	var customer = JSON.parse(data);

//	console.log(customer);
//	alert(customer.creationDate);

	var customerDetail = "<table id='customerDetail'>";
	customerDetail += "<tr><td class='title'>CustomerID</td><td>"+customer.customer_id+"</td></tr>";
	customerDetail += "<tr><td class='title'>Status</td><td>"+customer.status+"</td></tr>";
	customerDetail += "<tr><td class='title'>Date created</td><td>"+customer.creationDate+"</td></tr>";
	customerDetail += "<tr><td class='title'>Information</td><td>"+customer.information+"</td></tr>";

	var theNotes = customer.notes;
	console.log(theNotes);

	for(var key in theNotes)
	{
//		console.log(theNotes[key]);
		customerDetail += "<tr><td class='title'>" + key + "</td><td>"+theNotes[key]+"</td></tr>";
	}

	customerDetail += "</table>";

	customerDetail += "<div id='addNoteButton' class='button'>Add Note</div>";
	$("#content").html(customerDetail);
	$("#addNoteButton").hover(function(){$(this).addClass("buttonHover");},function(){$(this).removeClass("buttonHover");});
	$("#addNoteButton").click(function(){addNote(customer.customer_id);});
}

function addNote(customer)
{
	console.log("addNote");
//	alert(customer);
//	alert($(this).html());
	$.post('controllers/ajax/showCustomer.php',{CustomerID: customer},AddNoteCallback);	
//	console.log("hello" + customer);

	/*var statusSelectHTML = "<select id=note_status>";
	console.log(statusItemsObj);
	$.each(statusItemsObj,function(key,value)
		{
		statusSelectHTML+="<option value=" + key + ">" + value + "</option>";
		});
	statusSelectHTML += "</select>";*/
//	alert(statusSelectHTML);
}

function AddNoteCallback(data)
{
	console.log("AddNoteCallback");
//	alert (data);
	var customer = JSON.parse(data);
	var noteHTML = "<table id='note'>";
	noteHTML += "<tr><td class='title'>CustomerID</td><td id='note_customer_id'>"+customer.customer_id+"</td></tr>";
	noteHTML += "<tr><td class='title'>Status</td><td>"+customer.status+"</td></tr>";
	noteHTML += "<tr><td class='title'>Date created</td><td>"+customer.creationDate+"</td></tr>";
	noteHTML += "<tr><td class='title'>Information</td><td>"+customer.information+"</td></tr>";
	noteHTML += "<tr><td class='title' >New Note</td><td><textarea id='noteText' style='width:100%;' rows='4'></textarea></td></tr>";
	noteHTML += "</table>";
	noteHTML += "<div id='addNoteCancelButton' class='button'>Cancel</div>";
	noteHTML += "<div id='addNoteSaveButton' class='button'>Save Note</div>";

//	alert(noteHTML);

	$("#content").html(noteHTML);

	$("#addNoteCancelButton").hover(function(){$(this).addClass("buttonHover");},function(){$(this).removeClass("buttonHover");});
	$("#addNoteCancelButton").click(function(){showCustomer});

	$("#addNoteSaveButton").hover(function(){$(this).addClass("buttonHover");},function(){$(this).removeClass("buttonHover");});
	$("#addNoteSaveButton").click(function(){addNoteSave(customer.customer_id)});
}

function addNoteSave(customer)
{
	console.log("addNoteSave");
	console.log(customer);
	console.log($(this).toString());

	$.post('controllers/ajax/saveNote.php',{
		CustomerID: customer, Note: $("#noteText").val()
	},saveNoteCallback);	
}

function saveNoteCallback(data)
{
	console.log("saveNoteCallback");
//	alert(data);
	$.post('controllers/ajax/showCustomer.php',{CustomerID: CustomerID},showCustomerCallback);	

}
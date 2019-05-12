
<html>
	<head>

		<title>PHP Mysql REST API CRUD</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</head>
	<body>
		<p>source used: https://www.webslesson.info/2018/05/how-to-make-simple-crud-rest-api-in-php-with-mysql.html</p>
		I got some ideas from this link but completely redesigned the backend as I thought that part of the example wasn't very practical
    <div class="container">
			<br />

			<h3 align="center">CRUD actions using a RESTful API</h3>
			<br />
			<div align="right" style="margin-bottom:5px;">
				<button type="button" name="add_button" id="addButton" class="btn btn-success btn-xl">Add</button>
			</div>
      <div class="table-responsive">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Date</th>
              <th>URL</th>
							<th>Desc</th>
              <th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
      </div>
    </div>
  </body>
</html>

<div class="modal fade" id="updateModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <form id="updateForm" method =  "post">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h3 class="modal-title" id = "updateTitle">Create Entry</h3>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Data to be updated:</label>
							<select class = "form-control" id = "choice">
							  <option class = "choice" value="name">name</option>
							  <option class = "choice" value="url">url</option>
							  <option class = "choice" value="thedesc">thedesc</option>
							</select>
            </div>

						<div class="form-group">
							<label>Overwrite with:</label>
							<input class = "form-control" type = "text" id = "overwrite"/>
						</div>

          </div>
          <div class="modal-footer">
            <input type="hidden" name="hidden_id" id="updateid" />
						<input type = "hidden" name = "hidden" id="hiddenJSON"/>
            <input type="hidden" name="action" id="action" value="insert" />
            <input type="submit" name="button_action" id="updateButton" class="btn btn-info" value="Update" />
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>

  </div>
</div>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <form id="theForm" method =  "post">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h3 class="modal-title">Create Entry</h3>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Enter name of book</label>
              <input type="text" name="name" id="name" class="form-control" />
            </div>

            <div class="form-group">
              <label>Enter URL of book</label>
              <input type="text" name="url" id="url" class="form-control" />
            </div>

						<div class="form-group">
              <label>Enter description of book</label>
              <input type="text" name="url" id="desc" class="form-control" />
            </div>
          </div>
          <div class="modal-footer">
            <input type="hidden" name="hidden_id" id="hidden_id" />
						<input type = "hidden" name = "hidden" id="hiddenJSON"/>
            <input type="hidden" name="action" id="action" value="insert" />
            <input type="submit" name="button_action" id="actionButton" class="btn btn-info" value="Insert" />
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>

  </div>
</div>


<script>

function retrieve_table(){
	var json = {
		action:"retrieve",
		choice:"",
		overwrite:""
	};
	var jsonData = JSON.stringify(json);
	$.ajax({
		method: "POST",
		url:"http://localhost/Assignment5/Server/myAPI.php",
		data: jsonData,
		success:function(data){
			var json = JSON.parse(data);
			var table = "";
			for(var i = 0; i<= json.length-1;++i){
				table+= "<tr>";
				table+= "<td>" + json[i].id+"</td>";
				table+= "<td>" + json[i].name+"</td>";
				table+= "<td>" + json[i].date+"</td>";
				table+= "<td>" + json[i].url+"</td>";
				table+= "<td>" + json[i].thedesc+"</td>";
				table+='<td><button type="button" name="edit" onClick = "editID(this.id);"class="btn btn-warning btn-xs edit" id="'+json[i].id+'">Edit</button></td>';
				table+='<td><button type="button" name="delete" onClick="deleteID(this.id);" class="btn btn-danger btn-xs delete" id="'+json[i].id+'">Delete</button></td></tr>';

			}
			$('tbody').html(table);
		}
	});
}

function editID(id){
	$("#updateModal").modal("show");
	$("#updateTitle").text("Update an entry");
	$("#updateid").val(id);
}
function deleteID(id){
	if(!confirm("Are you sure you want to delete id " + id + "?")){

	}else{
		console.log("Deleting...")
		var theID = id;
		var json = {
			action:"delete",
			id:theID,
			choice:"",
			overwrite:""
		};
		var jsonData=JSON.stringify(json);
		$.ajax({
			method:"POST",
			url:"http://localhost/Assignment5/Server/myAPI.php",
			data: jsonData,
			success:function(){
				retrieve_table();
			}
		});
}
}

$(document).ready(function(){
  retrieve_table();


	$("#updateForm").on("submit",function(event){
		event.preventDefault();

		var json = {
			action:"update",
			id:$("#updateid").val(),
			choice:$("#choice").children("option:selected").val(),
			overwrite:$("#overwrite").val()
		};

		var jsonData2 = JSON.stringify(json);
		console.log(jsonData2);
		$.ajax({
			method: "POST",
			url:"http://localhost/Assignment5/Server/myAPI.php",
			data: jsonData2,
			success:function(){
				retrieve_table();

				$('#updateForm')[0].reset();
				$('#updateForm').modal('hide');

			}
		});


	});

  $("#addButton").click(function(){
    $("#myModal").modal("show");
    $("#actionButton").val("Create");
    $(".modal-title").text("Create an Entry");
    $("#action").val("insert");

  });

  $("#theForm").on('submit', function(event){
    var dateRegex = new RegExp("[0-9]{4,4}:[0-9][0-9]:[0-9][0-9]");
		console.log($("#theForm").serialize());
		event.preventDefault();
		if($('#name').val() == '')
		{
			alert("Enter Book Name");
		}
		else if($('#url').val() == '')
		{
			alert("Enter URL");
		}
    else if($("#date").val() == ''){
      alert("Enter a date of publication.");
    }

		else
		{

			var today = new Date();
			var currentdate = today.getFullYear()+':'+(today.getMonth()+1)+':'+today.getDate();
			console.log(currentdate);
			var form_data = {
        action:"insert",
        id:$('#hidden_id').val(),
        name:$('#name').val(),
				desc:$('#desc').val(),
        date:currentdate,
        url:$('#url').val(),
				choice:"",
				overwrite:""

      };

      var formData = JSON.stringify(form_data);
      $("#hiddenJSON").val(formData);
      console.log(formData);
			$.ajax({
				url:"http://localhost/Assignment5/Server/myAPI.php",
				method:"POST",
        data: formData,
				success:function(data)
				{
					retrieve_table();
					$('#theForm')[0].reset();
					$('#myModal').modal('hide');
					if(data == 'insert')
					{
						alert("Data Inserted using PHP API");
					}
					if(data == 'update')
					{
						alert("Data Updated using PHP API");
					}
				}
			});
		}
	});


});

</script>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<first_name>ADMIN CATEGORIES</first_name>

<!----------------PAGE LEVEL STYLES------------------------------->
<link href="<?php echo ASSETS_ADMIN_PATH ;?>css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo ASSETS_ADMIN_PATH ;?>css/bootstrap-table.css" rel="stylesheet">
<link href="<?php echo ASSETS_ADMIN_PATH ;?>css/styles.css" rel="stylesheet">

<!--Icons-->
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
<!----------------PAGE LEVEL STYLES ///--------------------------->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/datatables/css/dataTables.bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/datatables/css/dataTables.tableTools.min.css">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head> 
<body>
<?php
include('left.php');
?>	
	
    <div class="col-sm-6 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
    <div class="row">
        <ol class="breadcrumb">
            <li>
            <a href="#">
            <svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg>
            </a>
            </li>
            <li class="active">USERS</li>
        </ol>
    </div><!--/.row-->
		
		<!--/.row-->	
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">USERS</div>
                    
                   <div class="container">
                   <input type="checkbox" id="select-all">
                   <button class="btn btn-danger delete_all">Delete Selected</button>
                   <button class="btn btn-primary" onclick="goBack()">Back</button>
                    </div>
                    
					<div class="panel-body">
                        <table id="table" class="table table-striped table-bordered" cellspacing="0">
                          <thead>
                            <tr>
                              <th></th>
                              <th>S.No</th>
							  <th>IP address</th>
                              <th>First name</th>
                              <th>Last Name</th>
							  <th>Phone</th>
                              <th>Email</th>
                              <th>DOJ</th>							  
							  <th>Account</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          </tbody>
                          <tfoot>
                          </tfoot>
                        </table>
                  </div>
			</div>
		</div><!--/.row-->	
	</div><!--/.main-->
</div>

  <script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/dataTables.tableTools.min.js')?>"></script>
	<script>
    function goBack() 
    {
        window.history.back();
    }
    </script>

  <script type="text/javascript">

    var save_method; //for save method string
    var table;
    $(document).ready(function() 
	{
      table = $('#table').DataTable
	  ({ 
       "processing": true, //Feature control the processing indicator.
       "serverSide": true, //Feature control DataTables' server-side processing mode.
		
		"dom": 'T<"clear">lfrtip',
        "tableTools": {
            "sSwfPath": "<?php echo BASE_URL; ?>assets/datatables/swf/copy_csv_xls_pdf.swf"
        },
		
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo base_url('admin/users/ajax_list')?>",
            "type": "POST"
        },
		
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
          "targets": [ -1,-2,-3 ], //last column
          "orderable": false, //set not orderable
        },
        ],

      });
    });

    function add_person()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
      $('.modal-first_name').text('Add User'); // Set Title to Bootstrap modal first_name
    }

    function edit_person(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo base_url('admin/users/ajax_edit/')?>/"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
           
            $('[name="id"]').val(data.id);
            $('[name="first_name"]').val(data.first_name);
            $('[name="active"]').val(data.active);
            /*$('[name="gender"]').val(data.gender);
            $('[name="address"]').val(data.address);
            $('[name="dob"]').val(data.dob);*/
            
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-first_name').text('Edit User'); // Set first_name to Bootstrap modal first_name
            
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }

    function reload_table()
    {
      table.ajax.reload(null,false); //reload datatable ajax 
    }

    function save()
    {
	  var url;
      if(save_method == 'add') 
      {
          	url = "<?php echo base_url('admin/users/ajax_add')?>";
      }
      else
      {
        	url = "<?php echo base_url('admin/users/ajax_update')?>";
      }

       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {			   
			   if(data['status'])
			   {
					$('#modal_form').modal('hide');
               		reload_table();
			   }
			   else
			   {
				   $('#modal_form').modal('show');
				   $(".modal-header").html(data['message']);
			   }
			  
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
				 alert('Error adding / update data');
            }
        });
    }

    function delete_person(id)
    {
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data to database
          $.ajax({
            url : "<?php echo base_url('admin/users/ajax_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
               //if success reload ajax table
               $('#modal_form').modal('hide');
               reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
         
      }
    }
	
	
	
	/*---------------------------------BULK DELETE-------------------------*/
	
	jQuery('.delete_all').on('click', function(e) 
	{ 
		var allVals = [];  
        $(".sub_chk:checked").each(function() 
		{  
            allVals.push($(this).attr('data-id'));
        });  
        //alert(allVals.length); return false;  
        if(allVals.length <=0)  
        {  
            alert("Please select row.");  
        }  
        else 
		{  
            //$("#loading").show(); 
            WRN_PROFILE_DELETE = "Are you sure you want to delete this row?";  
            var check = confirm(WRN_PROFILE_DELETE);  
            if(check == true){  
                //for server side
                
                var join_selected_values = allVals.join(","); 
				
				//alert(join_selected_values);
                
                $.ajax({   
                  
                    type: "POST",  
                    url : "<?php echo base_url('admin/users/ajax_multi_delete')?>/",
                    cache:false, 
					dataType: "JSON", 
                    data: 'ids='+join_selected_values,  
                    success: function(response)  
                    {   
                        //alert(response['status']);
						//$('#modal_form').modal('hide');
               			reload_table();
                        //referesh table
                    }   
                });
              //for client side
              $.each(allVals, function( index, value ) 
			  {
                  $('table tr').filter("[data-row-id='" + value + "']").remove();
              });
            }  
        }  
    });
	/*---------------------------------BULK DELETE----///---------------------/
	
	
	/*---------------------------CHECK -UNCHECK CHECKBOX---------------------*/
	$(document).ready(function(){
	  $('#select-all').click(function(event) {   
		if(this.checked) {
		  // Iterate each checkbox
		  $(':checkbox').each(function() {
			this.checked = true;                        
		  });
		}
		else {
		  // Iterate each checkbox
		  $(':checkbox').each(function() {
			this.checked = false;
		  });
		}
	  });
	});
	/*---------------------------CHECK -UNCHECK CHECKBOX-----/////----------------*/
	
  </script>

  <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="color:#F00; font-weight:bold;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-first_name">Georgian users Form</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
          <input type="hidden" value="" name="id"/> 
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Users</label>
              <div class="col-md-9">
                 <input name="active" placeholder="active" class="form-control" type="text">
              </div>
            </div>
            
          </div>
        </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->
  
   <!----------------PAGE COMMON SCRIPTS------------------------------->
	<script src="<?php echo ASSETS_ADMIN_PATH ;?>js/bootstrap.min.js"></script>
    <script src="<?php echo ASSETS_ADMIN_PATH ;?>js/lumino.glyphs.js"></script>
    <!----------------PAGE COMMON SCRIPTS--//----------------------------->  
    
    
    
  </body>
</html>
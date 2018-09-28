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
            <li class="active">result</li>
        </ol>
    </div><!--/.row-->
		
		<!--/.row-->	
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">result</div>
                    
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
                              <th>First name</th>
                              <th>Last Name</th>
                              <th>Aptitude Test</th>
                              <th>Personality Test</th>
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
            "url": "<?php echo base_url('admin/result/ajax_list')?>",
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

 

    function edit_person(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo base_url('admin/result/ajax_edit/')?>/"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
           
            $('[name="id"]').val(data.id);
			$('[name="report1"]').html(data.a_result);  
            $('[name="report2"]').html(data.p_result);  			
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-first_name').text('Edit Result'); // Set first_name to Bootstrap modal first_name
            
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

    
  </script>

  <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="color:#F00; font-weight:bold;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-first_name">Result Form</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
          <input type="hidden" value="" name="id"/> 
          <div class="form-body">
            <div class="form-group">
              <div name="report1"></div>
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
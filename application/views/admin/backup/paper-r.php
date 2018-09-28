<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ADMIN CATEGORIES</title>

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
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/multiselect/chosen.css" />
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head> 

<style>
.chzn-choices
{
	width:420px !important; 
	line-height:30px !important; 
}
</style>

<body>
<?php
include('left.php');

//echo '<pre>';print_r($stream);echo '</pre>';

//echo $stream['0']['title'];
?>	
	
    <div class="col-sm-6 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
    <div class="row">
        <ol class="breadcrumb">
            <li>
            <a href="#">
            <svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg>
            </a>
            </li>
            <li class="active">CATEGORIES</li>
            <li class="active">
			<?php
			if(isset($bread_crum['0']['paper_name']))
			{
            	echo strtoupper($bread_crum['0']['paper_name']);
			}
			?>
            </li>
            <?php //echo '<pre>';print_r($bread_crum).'</pre>'; ?>

        </ol>
    </div><!--/.row-->
		
		<!--/.row-->	
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"></div>
                    
                   <div class="container">
                   <input type="checkbox" id="select-all">
                   <button class="btn btn-danger delete_all">Delete Selected</button>
                   <button class="btn btn-success" onclick="add_person()"><i class="glyphicon glyphicon-plus"></i> Add</button>
                   <button class="btn btn-primary" onclick="goBack()">Back</button>
                    </div>
                    
					<div class="panel-body">
                        <table id="table" class="table table-striped table-bordered" cellspacing="0">
                          <thead>
                            <tr>
                              <th></th>
                              <th>S.No</th>
                              <th>Name</th>
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

  

  <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Question Form</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
          <input type="hidden" value="" name="id"/> 
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Question</label>
              <div class="col-md-9">
                <textarea name="question" placeholder="Category Name" class="form-control" rows="5" cols="5"></textarea>
              </div>
            </div>
            
          </div>
          
           <div class="form-body">
           <div class="form-group">
              <label class="control-label col-md-3">Stream A</label>
              <div class="col-md-9">
                <select class="form-control" name="stream_a" id="stream_a">
                <?php 
				$count = sizeof($stream);
				for($i=0;$i<$count;$i++)
				{
					echo  "<option value='".$stream[$i]['id']."'>".$stream[$i]['title']."</option>";
				?>
                <?php
				}
				?>
                </select>                
              </div>
           </div>
           </div>
           
           <div class="form-body">
           <div class="form-group">
            <label class="control-label col-md-3">Branch A</label>
              <div class="col-md-9">
              <select id="branch_a" class="form-control chzn-select" multiple name="branch_a[]">
				<?php
				$count2 = sizeof($branch);
                for($i=0;$i<$count2;$i++) 
                {//$rt = (($i==1|| $i==4)?'selected':'');
                	echo  "<option value='".$branch[$i]['id']."' >".$branch[$i]['title']."</option>";	
                }
                ?>
               </select>                
              </div>
           </div>
           </div>
           
           <div class="form-body">
           <div class="form-group">
              <label class="control-label col-md-3">Stream B</label>
              <div class="col-md-9">
                <select class="form-control" name="stream_b" id="stream_b">
                <?php 
				$count = sizeof($stream);
				for($i=0;$i<$count;$i++)
				{
					echo  "<option value='".$stream[$i]['id']."'>".$stream[$i]['title']."</option>";
				}
				?>
                </select>
              </div>
           </div>
           </div>
           
           <div class="form-body">
           <div class="form-group">
              <label class="control-label col-md-3">Branch B</label>
              <div class="col-md-9">
               <select id="branch_b" class="form-control chzn-select" multiple name="branch_b[]">
				<?php
				$count2 = sizeof($branch);
                for($i=0;$i<$count2;$i++) 
                {
                	echo  "<option value='".$branch[$i]['id']."'>".$branch[$i]['title']."</option>";	
                }
                ?>
               </select>      
              </div>
           </div>
           </div>
           
           <div class="form-body">
           <div class="form-group">
              <label class="control-label col-md-3">Stream C</label>
              <div class="col-md-9">
                <select class="form-control" name="stream_c" id="stream_c">
                <?php 
				$count = sizeof($stream);
				for($i=0;$i<$count;$i++)
				{
					echo  "<option value='".$stream[$i]['id']."'>".$stream[$i]['title']."</option>";
				}
				?>
                </select>
              </div>
           </div>
           </div>
           
           
           <div class="form-body">
           <div class="form-group">
           <label class="control-label col-md-3">Branch C</label>
              <div class="col-md-9">
                <select class="form-control chzn-select" multiple name="branch_c[]" id="branch_c">
				<?php
				$count2 = sizeof($branch);
                for($i=0;$i<$count2;$i++) 
                {
                	echo  "<option value='".$branch[$i]['id']."'>".$branch[$i]['title']."</option>";	
                }
                ?>
               </select>      
              </div>
           </div>
           </div>
           
           <div class="form-body">
           <div class="form-group">
              <label class="control-label col-md-3">Stream D</label>
              <div class="col-md-9">
                <select class="form-control" name="stream_d" id="stream_d">
                <?php 
				$count = sizeof($stream);
				for($i=0;$i<$count;$i++)
				{
					echo  "<option value='".$stream[$i]['id']."'>".$stream[$i]['title']."</option>";
				}
				?>
                </select>
              </div>
           </div>
           </div>
           
           <div class="form-body">
           <div class="form-group">
            <label class="control-label col-md-3">Branch D</label>
              <div class="col-md-9">
                <select class="form-control chzn-select" multiple name="branch_d[]" id="branch_d">
				<?php
				$count2 = sizeof($branch);
                for($i=0;$i<$count2;$i++) 
                {
                	echo  "<option value='".$branch[$i]['id']."'>".$branch[$i]['title']."</option>";	
                }
                ?>
               </select>      
              </div>
           </div>
           </div>
           
           
           <div class="form-body">
           <div class="form-group">
              <label class="control-label col-md-3">Stream E</label>
              <div class="col-md-9">
                <select class="form-control" name="stream_e" id="stream_e">
                <?php 
				$count = sizeof($stream);
				for($i=0;$i<$count;$i++)
				{
					echo  "<option value='".$stream[$i]['id']."'>".$stream[$i]['title']."</option>";
				}
				?>
                </select>
              </div>
           </div>
           </div>
           
           <div class="form-body">
           <div class="form-group">
            <label class="control-label col-md-3">Branch E</label>
              <div class="col-md-9">
                <select class="form-control chzn-select" multiple name="branch_e[]" id="branch_e">
				<?php 
				$count2 = sizeof($branch);
                for($i=0;$i<$count2;$i++) 
                {
                	echo  "<option value='".$branch[$i]['id']."'>".$branch[$i]['title']."</option>";	
                }
                ?>
               </select>      
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
<script src="<?php echo ASSETS_ADMIN_PATH ;?>js/chart.min.js"></script>
<script src="<?php echo ASSETS_ADMIN_PATH ;?>js/chart-data.js"></script>
<script src="<?php echo ASSETS_ADMIN_PATH ;?>js/easypiechart.js"></script>
<script src="<?php echo ASSETS_ADMIN_PATH ;?>js/easypiechart-data.js"></script>
<script src="<?php echo ASSETS_ADMIN_PATH ;?>js/lumino.glyphs.js"></script>
<!----------------PAGE COMMON SCRIPTS--//----------------------------->  

<!-------------------MULTI SELECT BOX------------------------------------->
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/multiselect/chosen.jquery.min.js"></script>
<script>
$(".chzn-select").chosen(); 
$(".chzn-select-deselect").chosen({allow_single_deselect:true});/*$("#branch_a").val('5').trigger('change');$("#branch_a").val('16').trigger('change');$("#branch_a").val('5').trigger('change');*//*$('#branch_a').trigger('liszt:updated');*/
</script>
<!-------------------MULTI SELECT BOX-------//------------------------------>


<script type="text/javascript">

    var save_method; //for save method string
    var table;
    $(document).ready(function() {
      table = $('#table').DataTable({ 
        
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        
		"dom": 'T<"clear">lfrtip',
        "tableTools": {
            "sSwfPath": "<?php echo BASE_URL; ?>assets/datatables/swf/copy_csv_xls_pdf.swf"
        },
		
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('admin/paper/ajax_list/'.$mcat_id)?>",
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
      $('.modal-title').text('Add Under <?php
			if(isset($bread_crum['0']['paper_name']))
			{
            	echo strtoupper($bread_crum['0']['paper_name']);
			}
			?>'); // Set Title to Bootstrap modal title
    }

    function edit_person(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('admin/paper/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {		/*alert(data.branch[0].branch_id );*/		var str_arraya = [];var str_arrayb = [];var str_arrayc = [];var str_arrayd = [];var str_arraye = [];$.each(data.branch, function( index, value ) {  /*alert( data.branch[index].branch_id+ ": " + data.branch[index].branch_option);*/  if(data.branch[index].branch_option=="a"){  var brancha = data.branch[index].branch_id;  str_arraya.push(brancha);   }  else if(data.branch[index].branch_option=="b"){  var branchb = data.branch[index].branch_id;  str_arrayb.push(branchb);   }  else if(data.branch[index].branch_option=="c"){  var branchc = data.branch[index].branch_id;  str_arrayc.push(branchc);   }  else if(data.branch[index].branch_option=="d"){  var branchd = data.branch[index].branch_id;  str_arrayd.push(branchd);   }  else if(data.branch[index].branch_option=="e"){  var branche = data.branch[index].branch_id;  str_arraye.push(branche);   }});$("#branch_a").val(str_arraya).trigger("liszt:updated");$("#branch_b").val(str_arrayb).trigger("liszt:updated");$("#branch_c").val(str_arrayc).trigger("liszt:updated");$("#branch_d").val(str_arrayd).trigger("liszt:updated");$("#branch_e").val(str_arraye).trigger("liszt:updated");alert("uuuuuuuuuuuuuu:");
			//console.log(data);
			//alert(data.branch.a);
			$('[name="id"]').val(data.question.id);
            $('[name="question"]').val(data.question.question);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('<?=strtoupper($bread_crum['0']['paper_name']);?>'); // Set title to Bootstrap modal title
			
			/*Get the value from a dropdown select*/
			
			//$('.id_100 option[value=val2]').attr('selected','selected');
			
			$('#stream_a').val(data.stream['0'].stream_id);
			$('#stream_b').val(data.stream['1'].stream_id);
			$('#stream_c').val(data.stream['2'].stream_id);
			$('#stream_d').val(data.stream['3'].stream_id);
			$('#stream_e').val(data.stream['4'].stream_id);
			
			$("#branch_a").val('5').trigger('change');
			/*$('#branch_a').val(data.branch['a']['0']);
			$('#branch_b').val(data.branch['b']['0']);
			$('#branch_c').val(data.branch['c']['0']);
			$('#branch_d').val(data.branch['d']['0']);
			$('#branch_e').val(data.branch['e']['0']);*/
			
				
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
          url = "<?php echo site_url('admin/paper/ajax_add/'.$mcat_id)?>";
      }
      else
      {
        url = "<?php echo site_url('admin/paper/ajax_update/'.$mcat_id)?>";
      }

       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               $('#modal_form').modal('hide');
               reload_table();
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
            url : "<?php echo site_url('admin/paper/ajax_delete')?>/"+id,
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
                    url : "<?php echo site_url('admin/paper/ajax_multi_delete')?>/",
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
</body>
</html>

<!--http://www.crackerworld.in/2013/10/multiple-drop-down-select-box.html-->
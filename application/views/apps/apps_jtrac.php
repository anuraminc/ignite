<?php $this->load->view('header'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="<?=$fullurl?>includes/css/arbor-halfviz.css" type="text/css" charset="utf-8">
</head>
<body>
  <div id="halfviz">
    <canvas id="viewport" height="600"></canvas>
    <div id="editor">
      <div class="io">
        <div class="ctrl"><a href="#" class="new">clear</a><a class="examples" href="#">examples <span></span></a></div>
        <ul class="dialog"></ul>
      </div>
      <textarea id="code"></textarea>
      <div id="editarea" style="font-size: 6px;"></div>
    </div>
    <div id="grabber"></div>
  </div>  

  <div id="dashboard">
    <ul class="controls">
      <li class="stiffness">spring tension <span class="frob">10,000</span></li>
      <li class="repulsion">node repulsion <span class="frob">10,000</span></li>
      <li class="friction">friction <span class="frob">20%</span></li>
      <li class="gravity">gravity <span class="toggle">.</span></li>
    </ul>
  </div>
    <div id="apps_jtrac_search">
        Group by:
        <select id="apps_jtrac_search_group_by">
            <option value="0000"></option>
            <option value="1111">Status</option>
        </select>
        
        Status:
        <select id="apps_jtrac_search_status">
            <option value="0">All</option>
            <option value="1">Open</option>
            <option value="2">Assigned</option>
            <option value="3">WIP</option>
            <option value="4">Resolved</option>
            <option value="5">Reopened</option>
            <option value="6">User-Tested-Ok</option>
            <option value="7">On-Hold</option>
            <option value="99">Closed</option>           
        </select>
        
        Category:
        <select id="apps_jtrac_search_category">
            <option value="0">All</option>
            <option value="3">Enhancement</option>
            <option value="4">Data-Change</option>
            <option value="7">Status-Change</option>
            <option value="2">Defect</option>
            <option value="1">Change Request</option>
            <option value="5">Business Process</option>
            <option value="6">Query</option>
            <option value="8">Duplicate</option>
            <option value="9">Master Update</option>
        </select>
        
        Root Cause:
        <select id="apps_jtrac_search_rootcause">
            <option value="0">All</option>
            <option value="1">System Issue</option>
            <option value="2">Incorrect Requirement</option>
            <option value="3">Lack of System Knowledge</option>
            <option value="12">Incorrect Data</option>
            <option value="13">Lack of User Training</option>
            <option value="15">New User</option>
            <option value="16">Forgot Password</option>
        </select>
        
        Assigned To:
        <select id="apps_jtrac_search_assigned_to">
            <option value="0">All</option>
            <option value="11111" selected>BizSoln</option>
            <option value="22222">Users</option>
        </select>
        
        
    
        <input type="submit" id="apps_jtrac_search_submit" value="Refresh">
    </div>
  
  <!-- script src="jquery-1.6.1.min.js"></script -->
  
  <script src="<?=$fullurl?>includes/js/jquery.address-1.4.min.js"></script>
  <script src="<?=$fullurl?>includes/js/arbor.js"></script>
  <script src="<?=$fullurl?>includes/js/arbor-graphics.js"></script>
  <script src="<?=$fullurl?>includes/js/arbor-dashboard.js"></script>
  <script src="<?=$fullurl?>includes/js/arbor-help.js"></script>
  <script src="<?=$fullurl?>includes/js/arbor-io.js"></script>
  <script src="<?=$fullurl?>includes/js/arbor-parseur.js"></script>
  <script src="<?=$fullurl?>includes/js/arbor-renderer.js"></script>
  
  <!-- the main driver code: start here -->
  <script src="<?=$fullurl?>includes/js/arbor-halfviz.js"></script> 

  <script>
    var mcp;
    $(document).ready(function(){
    mcp = HalfViz("#halfviz");
    //mcp.newDoc();
    mcp.loadData("; some example nodes\n venkat {color:red, label:VENKAT}\nworld {color:blue, link:'http://www.google.com',shape:dot}\n\n; some edges\nvenkat -> world");
  });
   
  $(document).ready(function (){
      
        $('#apps_jtrac_search_group_by').change(function(){
          jtrac_data_fetch();
        });
  
	// Dynamic populate cost centre for edit staff, cost centre field
	$('#apps_jtrac_search_status').change(function(){ //any select change on the dropdown with id country trigger this code
            jtrac_data_fetch();    
	});

        $('#apps_jtrac_search_category').change(function(){
          jtrac_data_fetch();
        });
        
        $('#apps_jtrac_search_rootcause').change(function(){
          jtrac_data_fetch();
        });
        
        $('#apps_jtrac_search_assigned_to').change(function(){
          jtrac_data_fetch();
        });
        
        $('#apps_jtrac_search_submit').click(function(){
          jtrac_data_fetch();
        });
        
        function jtrac_data_fetch() {
            
            //$(".editStaffForm #staff_cost_centre_id > option").remove(); //first of all clear select items

		//var bu_id = $('.editStaffForm #staff_bus_unit_id').val();  // here we are taking country id of the selected one.
		//$("#editarea").html("hi");
                //mcp.newDoc();
                var whereClause = "28_" + $('#apps_jtrac_search_group_by').val() 
                        + "_" + $('#apps_jtrac_search_status').val()
                        + "_" + $('#apps_jtrac_search_category').val()
                        + "_" + $('#apps_jtrac_search_rootcause').val()
                        + "_" + $('#apps_jtrac_search_assigned_to').val();
                
                $.blockUI({ message: null });
                
		$.ajax({
			type: "POST",
			url: "<?=$fullurl?>apps/get_jtrac_ticket_data/"+whereClause, //here we are calling our user controller and get_cities method with the country_id
	
			success: function(outcome) //we're calling the response json array 'cities'
			{
                            $("#editarea").html(outcome);    
                            mcp.loadData(outcome);
                            $.unblockUI();
			}, error: function(returnval) { 
                            window.status = returnval;
                            $.unblockUI();
                        }
                });
                
        }

});

  </script>
</body>
</html>

<?php $this->load->view('footer'); ?>
        
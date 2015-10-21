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
      <!-- div class="io">
        <div class="ctrl"><a href="#" class="new">clear</a><a class="examples" href="#">examples <span></span></a></div>
        <ul class="dialog"></ul>
      </div -->
    <!-- input type="hidden" id="code" -->
      <textarea id="code"></textarea>
      <!-- div id="editarea" style="font-size: 6px;display: none;"></div -->
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
    <div id="site_search">
        Search:
        <select id="site_search_by">
            <option value="ALL">All</option>
            <option value="PEP">People</option>
        </select>
        
        <input type="text" id="site_search_text" value=""/>
        
        <input type="submit" id="site_search_submit" value="Refresh"/>
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
    var graphData = "; some example nodes\n venkat {color:red, label:VENKAT}\nworld {color:blue, link:'http://www.google.com',shape:dot}\n\n; some edges\nvenkat -> world";
    $(document).ready(function(){
    mcp = HalfViz("#halfviz");
    //mcp.newDoc();
    mcp.loadData(graphData);
  });
   
  $(document).ready(function (){
      
        $('#site_search_by').change(function(){
            site_data_fetch();
        });
  
	$('#site_search_text').change(function(){ //any select change on the dropdown with id country trigger this code
            site_data_fetch();    
	});
        
        $('#site_search_submit').click(function(){
            site_data_fetch();
        });
        
        function site_data_fetch() {
            //$(".editStaffForm #staff_cost_centre_id > option").remove(); //first of all clear select items

		//var bu_id = $('.editStaffForm #staff_bus_unit_id').val();  // here we are taking country id of the selected one.
		//$("#editarea").html("hi");
                //mcp.newDoc();
                $('#site_search_text').val($('#site_search_text').val().trim());
                var whereClause = $('#site_search_by').val()
                        + "_" + $('#site_search_text').val();
                
                $.blockUI({ message: null });
                
		$.ajax({
			type: "POST",
			url: "<?=$fullurl?>site/get_site_data/"+whereClause, //here we are calling our user controller and get_cities method with the country_id
	
			success: function(outcome) //we're calling the response json array 'cities'
			{ 
//                            if(outcome == "")
//                                mcp.loadData("; some example nodes\n venkat {color:red, label:VENKAT}\nworld {color:blue, link:'http://www.google.com',shape:dot}\n\n; some edges\nvenkat -> world");
//                            else {
                                graphData = outcome;
                                mcp.loadData(graphData);
                            //}
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
        
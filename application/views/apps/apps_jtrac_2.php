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
    <canvas id="viewport" width="800" height="600"></canvas>
    <div id="editor">
      <div class="io">
        <div class="ctrl"><a href="#" class="new">clear</a><a class="examples" href="#">examples <span></span></a></div>
        <ul class="dialog"></ul>
      </div>
      <textarea id="code"></textarea>  
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
  
  <script src="<?=$fullurl?>includes/js/jquery-1.6.1.min.js"></script>
  <script src="<?=$fullurl?>includes/js/jquery.address-1.4.min.js"></script>
  <script src="<?=$fullurl?>includes/js/arbor.js"></script>
  <script src="<?=$fullurl?>includes/js/arbor-graphics.js"></script>

  <!-- the halfviz source, broken out one ‘class’ per file -->
  <script src="<?=$fullurl?>includes/js/arbor-dashboard.js"></script>
  <script src="<?=$fullurl?>includes/js/arbor-help.js"></script>
  <script src="<?=$fullurl?>includes/js/arbor-io.js"></script>
  <script src="<?=$fullurl?>includes/js/arbor-parseur.js"></script>
  <script src="<?=$fullurl?>includes/js/arbor-renderer.js"></script>
  
  <!-- the main driver code: start here -->
  <script src="<?=$fullurl?>includes/js/arbor-halfviz.js"></script> 

</body>
</html>

<?php $this->load->view('footer'); ?>
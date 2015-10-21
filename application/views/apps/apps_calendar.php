
<?php $this->load->view('header'); ?>
<script language="javscript">
    //document.getElementById("luxcal").style.width = getPageWidth();
    //document.getElementById("luxcal").style.height = getPageHeight()+50;
</script>
<style>
    #luxcal { float: both; width: 99%; height: 715px; margin:8px; border-style:solid; border-width:1px; border-color:grey; };
</style>
<iframe id="luxcal" src="../../calendar/?cP=2&cUser=<?=$this->session->userdata('username')?>"></iframe>

<?php $this->load->view('footer'); ?>

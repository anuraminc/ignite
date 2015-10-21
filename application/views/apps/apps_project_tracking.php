
<?php $this->load->view('header'); ?>

<script language="javascript">
     $(document).ready(function() {
    $('#tasks_table').dataTable();
} );

</script>
<font id="app_header" >&nbsp;Project Tracking</font>
<br>
<br>
            <!-- th>SBU</th -->
<table id="tasks_table">
    <thead>
        <tr>

            <th>Project</th>
            <th>Module</th>
            <th>Task Description</th>
            <th>Status</th>
            <th>Milestone?</th>
            <th>Resource</th>
            <th>Start Date</th>
            <th>End Date</th>
        </tr>
    </thead>
    <tbody>
<?php 
    if(!empty($tasks_data))
    {
        foreach($tasks_data as $row)
        {
            echo "<tr>";
           // echo "<td>" . $row->sbudesc . "</td>";
            echo "<td class='center'>" . $row->projectdesc . "</td>";
            echo "<td class='center'>" . $row->moduledesc . "</td>";
            //echo "<td>" . $row->taskid . "</td>";
            echo "<td>" . $row->taskdesc . "</td>";
            echo "<td class='center'>" . $row->taskstts . "</td>";
            echo "<td class='center'>" . $row->ismilestone . "</td>";
            echo "<td class='center'>" . $row->username . "</td>";
            echo "<td class='center'>" . $row->task_startdt . "</td>";
            echo "<td class='center'>" . $row->task_enddt . "</td>";
            echo "</tr>";
        }
    }
    else
    {
        echo "<tr><td colspan='9'>No Tasks Found.</td></tr>";
    }
?>
    </tbody>
</table>

<?php $this->load->view('footer'); ?>

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_model extends CI_Model
{
	function loginCheck($datafield)
	{
		// Hash password before comparing, and check that the status is active = account activated
		$query = $this->db->get_where('users', array('userid' => $datafield['uname'], 'password' => $datafield['ucode']));	
		//$query = $this->db->get_where('staff', array('staff_id' => $datafield['staff_id'], 'staff_pwd' => $datafield['staff_pwd'], 'staff_status' => 'new'));	
		return $query->row();
	}
        function successLogin($userid)
        {
            $this->db->update('users',array('lastlogin' => date('Y-m-d H:i:s')), array('userid' => $userid));
        }
        function getAccessObj($userid)
        {
            $accStr = "";
            $appgrpres = $this->db->query("select appgrpid, appgrpname from appgrp where appgrpid in (select appgrpid from app where appid in (select appid from appaccess where access = 1 and usergrp in (select usergrp from users where userid = '" . $userid . "'))) order by menupos;");
            foreach ($appgrpres->result() as $rowgrp) 
             {
                $accStr = $accStr . '<li><a href="#" class="parent"><span>' . $rowgrp->appgrpname . '</span></a><ul>';

                $appres = $this->db->query("select appid, appname from app where appid in (select appid from appaccess where access = 1 and usergrp in (select usergrp from users where userid = '" . $userid . "') and appgrpid = '" . $rowgrp->appgrpid . "') order by menupos;");
                foreach($appres->result() as $row)
                {
                   $accStr = $accStr . '<li><a href="'. base_url() . 'apps/'. str_replace(' ', '_', strtolower($row->appname)) .'"><span>' . $row->appname . '</span></a></li>';
                }
                $accStr = $accStr . '</ul></li>';
             }
             return $accStr;
        }
	/*
	function verifyEmail($datafield, $randomPwd)
	{
		$value = false;
		//Check if email exist, if exist proceed to change password.
		//$query = $this->db->get_where('staff', array('staff_id' => $datafield['staff_id'], 'staff_email' => $datafield['staff_email'], 'staff_status' => 'active'));

		$query = $this->db->query("select staff_id from staff where staff_id = " . $datafield['staff_id'] . " and staff_email ='" . $datafield['staff_email'] ."' and staff_status in ('active','new')"); 

		// Email exist, generate a random password and send to user, reset the pwd sent then encrypt
		if($query->num_rows() > 0)
		{
			$this->db->update('staff', array('staff_pwd' => sha1($randomPwd)), array('staff_id' => $datafield['staff_id'], 'staff_email' => $datafield['staff_email']));
			
			if($this->db->affected_rows() > 0)
			{
				$value = true;
			}
			else
			{
				$value = false;
			}
		}
		else
		{
			$value = false;
		}
		
		return $value;
	}
	
	function checkIfEvalutor($staffID)
	{
		$result = false;
		
		$query = $this->db->get_where('cost_centre', array('bus_unit_evaluator_id' => $staffID) );

		// Check multiple evaluator id in cc_more_evaluator		
		$query2 = $this->db->get_where('cc_more_evaluator', array('ccme_evluator_id' => $staffID) );
		
		if($query->num_rows() > 0 || $query2->num_rows() > 0)
		{
			$result = true;
		}
		
		return $result;
	}
	
	
	function checkIfCoordinator($staffID)
	{
		$result = false;

		$query = $this->db->get_where('cost_centre', array('bus_unit_coordinator_id' => $staffID) );
		
		if($query->num_rows() > 0)
		{
			$result = true;
		}
		
		return $result;
	}
	
	function checkIfChiefCoordinator($staffID)
	{
		$result = false;

		$query = $this->db->get_where('general_setting', array('chief_coordinator_staff_id' => $staffID) );
		
		if($query->num_rows() > 0)
		{
			$result = true;
		}

		return $result;
	}
	
	function userUpdate($datafield)
	{
		if( $datafield['staff_email'] )
		{
			$this->db->update('staff', array('staff_pwd' => sha1($datafield['staff_pwd']), 'staff_status' => 'active', 'staff_email' => $datafield['staff_email'] ), array('staff_id' => $datafield['staff_id']) );		
		}
		else
		{
			$this->db->update('staff', array('staff_pwd' => sha1($datafield['staff_pwd']), 'staff_status' => 'active'), array('staff_id' => $datafield['staff_id']) );		
		}
		
		return $this->db->affected_rows();
	}
         
         */
}
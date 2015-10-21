<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site_model extends CI_Model
{
    
    function getSiteData($whereClause = null) {
        
        if($whereClause == null || $whereClause == "") {
            return "; some example nodes\n venkat {color:green, label:VENKAT}\nworld {color:blue, link:'http://www.google.com',shape:dot}\n\n; some edges\nvenkat -> world";
        }
        
        
        $whereValue = NULL;
        $dbQry = "";
        if ($whereClause != NULL) {
            $whereValue = explode('_', $whereClause);
            if($whereValue[0] == "ALL") {
                $dbQry = "select login_name as data_id, name as data_desc from jtrac.users where name like '%". $whereValue[1] ."%'";
                        //"select staff_id as data_id, staff_name as data_desc from stke3s_db.staff where staff_name like '%". $whereValue[1] ."%';";
            }
        }
        
            /*
        $this->db->select("id as ticket_id, sequence_num as ticket_desc, status, (select item_status_color from jtrac.item_status where item_status_id = items.status) ticket_status_color");

        $statusData = "";
        $whereValue = NULL;
        if ($whereClause != NULL) {
            $whereValue = explode('_', $whereClause);
            $this->db->where('space_id = ' . $whereValue[0]);
            if($whereValue[2] != "0") {
                $this->db->where('status = ' . $whereValue[2]);
            }
            if($whereValue[3] != "0") {
                $this->db->where('cus_int_01 = ' . $whereValue[3]);
            }
            if($whereValue[4] != "0") {
                $this->db->where('cus_int_03 = ' . $whereValue[4]);
            }
            if($whereValue[5] != "0") {
                if($whereValue[5] != "11111") {
                    $this->db->where('assigned_to in (6,9,12,94,108,109)');
                } else if($whereValue[5] != "22222") {
                    $this->db->where('(assigned_to not in (6,9,12,94,108,109) or assigned_to is null)');
                }
            }
        }
        
        $this->db->where('space_id = 28');
        //$this->db->order_by('cost_centre_desc');
        //$this->db->limit(1, 20);
        $query = $this->db->get('jtrac.items');
        
        $ticketData = ""; //ZZZZ1 {label:,color:#ffffff} \n";

        if ($query->result()) {
            foreach ($query->result() as $row) {
                
                if($whereClause != NULL) {
                    if($whereValue[2] == "0") {
                    $ticketData = $ticketData . " " . $row->ticket_id . " {shape:dot,label:'.', color:" . $row->ticket_status_color . ", link:'" . $row->ticket_id . "'}" . " \n ";
                    } else {
                        $ticketData = $ticketData . " " . $row->ticket_id . " {label:" . $row->ticket_desc . ", color:" . $row->ticket_status_color . ", link:'" . $row->ticket_id . "'}" . " \n ";
                    }
                }
                $statusData = $statusData . " S" . $row->status . " -- " . $row->ticket_id . " \n ";
            }
            
            if($whereClause != NULL) {
                if($whereValue[1] == "1111") {
                    $ticketData = $ticketData . " \n " . $statusData;
                }
            }
            return $ticketData;
        } else {
            return "";
        }
        */

        $query = $this->db->query($dbQry);
        $siteData = "";
        if ($query->result()) {
            foreach ($query->result() as $row) {
                if($whereClause != NULL) {
                    //if($whereValue[0] == "ALL") {
                    //$siteData = $siteData . " " . $row->data_id . " {shape:dot,label:'.', color:#ff8788, link:'" . $row->data_id . "'}" . " \n ";
                    //} else {
                        $siteData = $siteData . " " . $row->data_id . " {label:" . $row->data_desc . ", color:#78b3ac, link:'" . $row->data_id . "'}" . "\n";
                   // }
                }
                //$statusData = $statusData . " S" . $row->status . " -- " . $row->ticket_id . " \n ";
            }
            
            /*if($whereClause != NULL) {
                if($whereValue[1] == "1111") {
                    $ticketData = $ticketData . " \n " . $statusData;
                }
            } */
            return $siteData;
        } else {
            return "; some example nodes\n nodata {color:red, label:No Data}\nvenkat {color:red, label:VENKAT}\nworld {color:blue, link:'http://www.google.com',shape:dot}\n\n; some edges\nvenkat -> world";
        }
        
    }
    
    /*
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
                   $accStr = $accStr . '<li><a href="'. base_url() . 'index.php/site/'. str_replace(' ', '_', strtolower($row->appname)) .'"><span>' . $row->appname . '</span></a></li>';
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
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Apps_model extends CI_Model {

    function getProjectData($data) {
        $resset = $this->db->query("select * from (
                            select (select sbudesc from sbu where sbu.sbuid = tasks.sbuid) as sbudesc, 
                            (select projectdesc from projects where projects.projectid = tasks.projectid) as projectdesc,
                            (select moduledesc from modules where modules.moduleid = tasks.moduleid) as moduledesc,
                            (select username from users where users.userid = tasks.userid) as username,
                            tasks.*, date_format(startdt,'%a, %d %b %Y') as task_startdt, date_format(enddt,'%a, %d %b %Y') as task_enddt from tasks) taskinfo;");
        return $resset->result();
    }

//    function getJtracTicketData($spaceID) {
//        
//        $qry = "select concat(space_id,'_',sequence_num) as ticket_id, sequence_num as ticket_desc from jtrac.items where space_id = $spaceID;";
//        $query = $this->db->query($qry);
//        return $query->result();
//                    
//    }

    function getJtracTicketData($whereClause = null) {
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

//        $ticketData = array();
//
//        if ($query->result()) {
//            foreach ($query->result() as $row) {
//                $ticketData[$row->ticket_id] = $row->ticket_desc;
//            }
//
//            return $ticketData;
//        } else {
//            return FALSE;
//        }
        
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
    }
}

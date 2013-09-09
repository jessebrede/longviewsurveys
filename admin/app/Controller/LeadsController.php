<?php

class LeadsController extends AppController {
    public $helpers = array('Html', 'Form', 'Session', 'Csv');
    public $components = array('Session', 'RequestHandler');
	 public $scaffold = 'admin';
	 // Include the RequestHandler, it makes sure the proper layout and views files are used 

    public function index() {
        $this->set('leads', $this->Lead->find('all'));
    }

    public function view($id) {
        if (!$id) {
            throw new NotFoundException(__('Invalid lead'));
        }

        $lead = $this->Lead->findById($id);
        if (!$lead) {
            throw new NotFoundException(__('Invalid lead'));
        }
        $this->set('lead', $lead);
    }

    public function add() {
        if ($this->request->is('lead')) {
            $this->Lead->create();
            if ($this->Lead->save($this->request->data)) {
                $this->Session->setFlash(__('Your lead has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your lead.'));
        }
    }
	
	public function edit($id = null) {
		echo $id;
    if (!$id) {
        throw new NotFoundException(__('Invalid lead'));
    }

    $lead = $this->Lead->findById($id);
    if (!$lead) {
        throw new NotFoundException(__('Invalid lead'));
    }

    if ($this->request->is('lead') || $this->request->is('put')) {
        $this->Lead->id = $id;
        if ($this->Lead->save($this->request->data)) {
            $this->Session->setFlash(__('Your lead has been updated.'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Unable to update your lead.'));
    }

    if (!$this->request->data) {
        $this->request->data = $lead;
    }
}

public function delete($id) {
    if ($this->request->is('get')) {
        throw new MethodNotAllowedException();
    }

    if ($this->Lead->delete($id)) {
        $this->Session->setFlash(__('The lead with id: %s has been deleted.', h($id)));
        $this->redirect(array('action' => 'index'));
    }
}

        
 	function export() 
        { 
            // Stop Cake from displaying action's execution time 
            Configure::write('debug',0); 
			//$csv = new csvHelper();
            // Find fields needed without recursing through associated models 
            $data = $this->Lead->find( 
                'all', 
                array( 
                    'fields' => array('first_name', 'last_name', 'zipcode', 'phone', 'dob', 'marital_status', 'email', 'signup_date', 'subid', 'status'), 
                    'order' => "Lead.id ASC", 
                    'contain' => false 
            	)
			); 
            // Define column headers for CSV file, in same array format as the data itself 
            $headers = array( 
                'Lead'=>array( 
                   
                    'first_name'=>'First Name', 'last_name'=>'Last Name', 'zipcode'=>'Zipcode', 'phone'=>'Phone', 'dob'=>'Date of Birth', 'marital_status'=>'Marital Status', 'email'=>'Email', 'signup_date'=>'Signup Date', 'subid'=>'SubID', 'status'=>'Status'
                ) 
            ); 
            // Add headers to start of data array 
            array_unshift($data,$headers); 
            // Make the data available to the view (and the resulting CSV file) 
			$this->create_export_file($data);
            //$this->set(compact('data')); 
			
        } 
		
			

		function create_export_file($data){
			ini_set('max_execution_time', 600); //increase max_execution_time to 10 min if data set is very large
			//create a file
			$filename = "DLB_Industries_Survey_Leads_".date("Y.m.d").".csv";
			$csv_file = fopen('php://output', 'w');
			
			header('Content-type: application/csv');
			header('Content-Disposition: attachment; filename="'.$filename.'"');
			//loop through data array passed by $this->set in controller
			
			 foreach ($data as $row) 
				{ 
					// Loop through every value in a row 
				   //// foreach ($row['Lead'] as &$value) 
					// {
					
						//echo $value."<br>";
						//echo "<pre>";
						//print_r($value);
						//echo "</pre>";
						// Apply opening and closing text delimiters to every value 
					//    $value = "\"".$value."\""; 
				   // } 
					// Echo all values in a row comma separated 
					//$row_data =  implode(",",$row['Lead'])."\n"; 
					fputcsv($csv_file,$row['Lead'],',','"');
					
				} 
				
				fclose($csv_file);
				$this->sendFile($csv_file);
		}
		
		
		public function sendFile($id) {
   			 $file = $this->Attachment->getFile($id);
    		$this->response->file($file['path']);
   			 //Return reponse object to prevent controller from trying to render a view
    		return $this->response;
		}
		

	
}

?>
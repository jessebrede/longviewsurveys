<!-- File: /app/View/Posts/index.ctp -->

<h1>Survey Leads</h1>
<p><?php echo $this->Html->link('Add Lead', array('action' => 'add')); ?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Zipcode</th>
        <th>Phone</th>
        <th>DOB</th>
        <th>Marital Status</th>
        <th>Email</th>
        <th>Signup Date</th>
        <th>SubID</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>

<!-- Here's where we loop through our $posts array, printing out post info -->

    <?php foreach ($leads as $lead): ?>
    <tr>
        <td><?php 
		//print_r($lead);
		echo $lead['Lead']['ID']; ?></td>
        <td>
            <?php echo $this->Html->link($lead['Lead']['first_name']." ".$lead['Lead']['last_name'], array('action' => 'view', $lead['Lead']['ID'])); ?>
        </td>
        <td>
            <?php echo $this->Html->link($lead['Lead']['zipcode'], array('action' => 'view', $lead['Lead']['ID'])); ?>
        </td>
        <td>
            <?php echo $this->Html->link($lead['Lead']['phone'], array('action' => 'view', $lead['Lead']['ID'])); ?>
        </td>
        <td>
            <?php echo $this->Html->link($lead['Lead']['dob'], array('action' => 'view', $lead['Lead']['ID'])); ?>
        </td>
        <td>
            <?php echo $this->Html->link($lead['Lead']['marital_status'], array('action' => 'view', $lead['Lead']['ID'])); ?>
        </td>
        <td>
            <?php echo $this->Html->link($lead['Lead']['email'], array('action' => 'view', $lead['Lead']['ID'])); ?>
        </td>
        <td>
            <?php echo $this->Html->link($lead['Lead']['signup_date'], array('action' => 'view', $lead['Lead']['ID'])); ?>
        </td>
        <td>
            <?php echo $this->Html->link($lead['Lead']['subid'], array('action' => 'view', $lead['Lead']['ID'])); ?>
        </td>
        <td>
            <?php echo $this->Html->link($lead['Lead']['status'], array('action' => 'view', $lead['Lead']['ID'])); ?>
        </td>  
        <td>
            <?php 
			
				echo $this->Form->postLink(
              	  'Delete',
               		array('action' => 'delete', $lead['Lead']['ID']),
                	array('confirm' => 'Are you sure?'));
            ?>
            <?php echo $this->Html->link('Edit', array('action' => 'edit', $lead['Lead']['ID'])); ?>
        </td>
    </tr>
    <?php endforeach; ?>

</table>


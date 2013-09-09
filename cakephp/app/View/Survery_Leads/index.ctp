<!-- File: /app/View/Posts/index.ctp -->

<h1>Survey Leads</h1>
<p><?php echo $this->Html->link('Add Lead', array('action' => 'add')); ?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Actions</th>
        <th>Created</th>
    </tr>

<!-- Here's where we loop through our $posts array, printing out post info -->

    <?php foreach ($survey_leads as $lead): ?>
    <tr>
        <td><?php echo $lead['Surve_Lead']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($lead['Surevey_Lead']['name'], array('action' => 'view', $lead['Survey_Lead']['id'])); ?>
        </td>
        <td>
            <?php 
			
			//echo $this->Form->postLink(
              //  'Delete',
               // array('action' => 'delete', $post['Post']['id']),
                //array('confirm' => 'Are you sure?'));
            ?>
            <?php //echo $this->Html->link('Edit', array('action' => 'edit', $post['Post']['id'])); ?>
        </td>
        <td>
            <?php //echo $post['Post']['created']; ?>
        </td>
    </tr>
    <?php endforeach; ?>

</table>


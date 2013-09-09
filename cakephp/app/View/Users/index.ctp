<!-- File: /app/View/Posts/index.ctp -->

<h1>Users</h1>
<?php echo $this->Html->link(
    'Add Post',
    array('controller' => 'posts', 'action' => 'add')
); ?>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th></th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($posts as $post): ?>
    <tr>
        <td><?php echo $post['User']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($post['User']['ID'],
array('controller' => 'users', 'action' => 'view', $post['User']['id'])); ?>
        </td>
        <td><?php echo $post['User']['created']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($post); ?>
</table>


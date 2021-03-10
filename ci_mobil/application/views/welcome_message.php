<table>
  <thead>
    <tr>
      <th>No</th>
      <th>Username</th>
      <th>Email</th>
      <th>Role Name</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 0;
    foreach ($dataUser as $row):
      $no++ ?>
      <tr>
        <td><?=$no?>
        <td><?=$row->username?></td>
        <td><?=$row->email?></td>
        <td><?=$row->name?></td>
      </tr>
    <?php endforeach; ?>
    <tbody>
    </table>
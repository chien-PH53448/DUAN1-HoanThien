<?php include_once ROOT_DIR . "views/admin/header.php" ?>
<div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#ID</th>
      <th scope="col">Họ tên</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Quyền</th>
      <th scope="col">Hành động</th>
      <th scope="col">Địa chỉ</th>
   
      <th scope="col">

      </th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($users as $user): ?>
    <tr>
      <th scope="row"><?= $user['id'] ?></th>
      <td><?= $user['name'] ?></td>
      <td><?= $user['email'] ?></td>
      <td><?= $user['sdt'] ?></td>
      <td><?= $user['role'] ?></td>
   
     
      <td>
        <?php if($user['active'] == 1) : ?>
            <span class="badge bg-success">
          Hoạt động
            </span>
            <?php else : ?>
                <span class="badge bg-danger">
            Khoá
            </span>
            <?php endif ?>
      </td>
      <td><?= $user['diachi'] ?></td>
      <td>
        <form action="<?= ADMIN_URL . '?ctl=updateuser' ?>" method="post">
            <input type="hidden" name="id" value="<?= $user['id'] ?>">
            <input type="hidden" name="active" value="<?= $user['active'] ?>">
            <?php if($user['role'] != 'admin') : ?>
        <?php if($user['active'] == 1) : ?>
            <button type="submit"  class="badge bg-danger">Khoá</button>
            <?php else : ?>
                <button type="submit"  class="badge bg-primary">Kích hoạt</button>
                <?php endif ?>
                <?php endif ?>
        </form>
      </td>
    </tr>
<?php endforeach ?>
  </tbody>
</table>
</div>
<?php include_once ROOT_DIR . "views/admin/footer.php" ?>
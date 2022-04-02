<html>
<!DOCTYPE html>


<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Users Page</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>




  <link rel="stylesheet" href="<?php echo e(url('css/userspage.css')); ?>">

</head>

<body>
  <div class="container box">
    <h3>All Users</h3><br />



    <?php if(isset(Auth::user()->name)): ?>
    <div class="alert alert-danger success-block">
      <strong>Welcome <?php echo e(Auth::user()->name); ?></strong>
      <br />
      <a href="/logout">Logout</a>
    </div>
    <?php endif; ?>

    <?php if(!Auth::check()): ?>
    <script>
      window.location = "/";
    </script>
    <?php endif; ?>

    <br />
    <form class="validate-form" method="post" action="<?php echo e(route('insert.data')); ?>">
      <?php echo csrf_field(); ?>
      <?php echo e(csrf_field()); ?>



      <p>
        <?php if($success=Session::get('success')): ?>
        <?php echo e($success); ?>

        <?php endif; ?>
      </p>
      <table class="usersTable table table-hover" id="editable">
        <tr class="userTable-tr">
          <th class="userTable-td" scope="col">ID</th>
          <th class="userTable-td" scope="col">Name</th>
          <th class="userTable-td" scope="col">Email</th>
          <th class="userTable-td" scope="col">Password</th>

        </tr>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $eachuser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr class="userTable-tr">
          <td class="userTable-td" contenteditable="false"><?php echo e($eachuser['id']); ?></td>
          <td class="userTable-td" contenteditable="true"><?php echo e($eachuser['name']); ?></td>
          <td class="userTable-td" contenteditable="true"><?php echo e($eachuser['email']); ?></td>
          <td class="userTable-td" contenteditable="true"><?php echo e($eachuser['password']); ?>></td>

        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      </table>
    </form>

    <button id="addRows" class="btn btn-info">New</button>
  </div>
</body>

</html>

<script>
  $(function() {
    $("#addRows").click(function() {
      $("#editable").append(`
            <tr class="userTable-tr">
                <td class="userTable-td"><div class="validate-input">ID #</div></td>
                <td class="userTable-td"><div class="validate-input"><input type="text" placeholder="Name" name="name"  class="input "></div></td>
                <td class="userTable-td"><div class="validate-input"><input type="email" placeholder="Email" name="email"  class="input "></div></td>
                <td class="userTable-td"><div class="validate-input"><input type="password" placeholder="Password" name="password" class="input "></div></td>
                <td class="userTable-td"><input type="submit" class="btn btn-success" value="Save"></td>                       
              </tr>   
                                    `)
    });
  })
</script>

<script type="text/javascript">
  $(document).ready(function() {

    $.ajaxSetup({
      headers: {
        'X-CSRF-Token': $("input[name=_token]").val()
      }
    });

    $('#editable').Tabledit({
      url: '<?php echo e(route("tabledit.action")); ?>',
      dataType: "json",
      columns: {
        identifier: [0, 'id'],
        editable: [
          [1, 'name'],
          [2, 'email'],
          [3, 'password']
        ]
      },
      restoreButton: false,
      onSuccess: function(data, textStatus, jqXHR) {
        if (data.action == 'delete') {
          $('#' + data.id).remove();
        }
      }
    });

  });
</script><?php /**PATH C:\Users\hassa\Desktop\laravel\Nadeera-Project\resources\views/successlogin.blade.php ENDPATH**/ ?>
<html>
<!DOCTYPE html>


<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Users Page</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>




  <link rel="stylesheet" href="{{url('css/userspage.css') }}">

</head>

<body>
  <div class="container box">
    <h3>All Users</h3><br />



    @if(isset(Auth::user()->name))
    <div class="alert alert-danger success-block">
      <strong>Welcome {{ Auth::user()->name }}</strong>
      <br />
      <a href="/logout">Logout</a>
    </div>
    @endif

    @if(!Auth::check())
    <script>
      window.location = "/";
    </script>
    @endif

    <br />
    <form class="validate-form" method="post" action="{{ route('insert.data') }}">
        @csrf
        {{ csrf_field() }}
    <form action = "/edit/<?php echo $users[0]->id; ?>" method = "post">
    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">


        <p>
          @if($success=Session::get('success'))
          {{ $success }}
          @endif
        </p>
        <table class="usersTable table table-hover" id="editable">
          <tr class="userTable-tr">
            <th class="userTable-td" scope="col">Name</th>
            <th class="userTable-td" scope="col">Email</th>
            <th class="userTable-td" scope="col">Password</th>
            <th class="userTable-td" scope="col">Edit</th>
            <th class="userTable-td" scope="col">Delete</th>
          </tr>
          @foreach( $users as $eachuser)
          <tr class="userTable-tr">
            <td class="userTable-td"><input type="text" value="{{$eachuser['name']}}"></td>
            <td class="userTable-td"><input type="text" class="email-text" value="{{$eachuser['email']}}"></td>
            <td class="userTable-td"><input type="text" class="password-text" value="{{$eachuser['password']}}"></td>
            <td class="userTable-td"><a href="/edit/{{ $eachuser->id }}" class="btn btn-success">Save</td>
            <td class="userTable-td"> <a href="/click_delete/{{ $eachuser->id }}" class="btn btn-danger">Delete</td>

          </tr>
          @endforeach

        </table>
      </form>
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
                                      
                                        <td class="userTable-td"><div class="validate-input"><input type="text" placeholder="Name" name="name"  class="input "></div></td>
                                        <td class="userTable-td"><div class="validate-input"><input type="email" placeholder="Email" name="email"  class="input "></div></td>
                                        <td class="userTable-td"><div class="validate-input"><input type="password" placeholder="Password" name="password" class="input "></div></td>
                                        <td class="userTable-td"><input type="submit" class="btn btn-success" value="Save"></td> 
                                        
                                        </tr>
                                        
                                    `)

    });
  })
</script>
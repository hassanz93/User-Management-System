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

      <p>
        @if($success=Session::get('success'))
        {{ $success }}
        @endif
      </p>
      <table class="usersTable table table-hover" id="editable">
        <tr class="userTable-tr">
          <th class="userTable-td" scope="col">ID</th>
          <th class="userTable-td" scope="col">Name</th>
          <th class="userTable-td" scope="col">Email</th>
          <th class="userTable-td" scope="col">Password</th>
        </tr>
        @foreach( $users as $eachuser)
        <tr class="userTable-tr">
          <td class="userTable-td" contenteditable="false">{{$eachuser['id']}}</td>
          <td class="userTable-td" contenteditable="true">{{$eachuser['name']}}</td>
          <td class="userTable-td" contenteditable="true">{{$eachuser['email']}}</td>
          <td class="userTable-td" contenteditable="true">{{$eachuser['password']}}></td>
        </tr>
        @endforeach

      </table>
    </form>

    <button id="addRows" class="btn btn-info">New</button>
    
    <h2>Instructions</h2>
    <p>1) After login all users in the databse are shown except for the user who logined. </p>
    <p>2) Clicking the light blue <strong>'New'</strong> button adds a new row where one is able to a add new user. </p>
    <p>3) Clicking the green <strong>'Edit'</strong> button frames the text boxes and allows editing before
      confirming by pressing the newly added save button. </p>
    <p>4) Clicking the red <strong>'Delete'</strong> button reveals a newly added confirm button to approve
      the process of deleting the user for good.</p>
  </div>
</body>

</html>

<script>
  // Jquery onclick to add a new row for adding new user

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
  //Jquery and Ajax used to help with editing live without the need to refresh or edit in a seperate page.
  // Also used to edit by identifying the row based on the id of the user

  $(document).ready(function() {

    $.ajaxSetup({
      headers: {
        'X-CSRF-Token': $("input[name=_token]").val()
      }
    });

    $('#editable').Tabledit({
      url: '{{ route("tabledit.action") }}',
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
</script>
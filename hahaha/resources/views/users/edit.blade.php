<!DOCTYPE html>
<html>
<body>

<h2>HTML Forms</h2>

<form action="<?php echo route('user.update',$user->id)?>" method ="POST">
    @csrf
    @method('PUT')
  <label for="name">Name:</label><br>
  <input type="text" id="name" name="name" value="{{$user->name}}"><br>
  <label for="email ">Email:</label><br>
  <input type="text" id="email" name="email" value="{{$user->email}}"><br>
  <label for="password">PassWord:</label><br>
  <input type="text" id="password" name="password" value="{{$user->password}}"><br><br>
  <input type="submit" value="Submit">
</form>



</body>
</html>
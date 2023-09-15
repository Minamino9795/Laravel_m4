<!DOCTYPE html>
<html>
<body>

<h2>HTML Forms</h2>

<form action="{{ route('user.store') }}" method="POST">
    @csrf
  <label for="fname">Name:</label><br>
  <input type="text" id="fname" name="name" value=""><br>
  <label for="lname">Email:</label><br>
  <input type="email" id="lname" name="email" value=""><br><br>
  <label for="lname">Password:</label><br>
  <input type="text" id="lname" name="password" value=""><br><br>
  <input type="submit" value="Submit">
</form> 

</body>
</html>
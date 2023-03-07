<?php
function validate_user ($username, $password){
    return true;
}
   
// create empty array to store error messages
$errors = array();
$p =& $_POST;
   
if (count ($p) > 0){
     if (!isset ($p['username']) || (trim ($p['username']) == '')){
          $errors[] = 'You must enter a username.';
     }elseif(((strlen ($p['username']) < 8) || (ereg ('[^a-zA-Z0-9]', $p['username']))))
          $errors[] = 'You did not enter a valid username. Usernames must be
                      at least eight characters long and can only contain
                      letters and digits.';
     }
     
     if (!isset ($p['password']) || (trim ($p['password']) == '')){
          $errors[] = 'You must enter a password.';
     }elseif ((strlen ($p['password']) < 8) || (ereg ('[^[:alnum:][:punct:][:space:]]', $p['password']))){
          $errors[] = 'You did not enter a valid password. Passwords must be
                      at least eight characters long and can only contain
                      letters, digits, punctuation and spaces.';
     }
     
     if (count ($errors) == 0) {
          $r = validate_user ($p['username'], $p['password']);
   
          if ($r == false){
               $errors[] = 'Login failed. Username/password not found.';
          } else {
               print ('<html><head><title>Congratulations</title></head>
                      <body><h1>Congratulations!</h1><p>You logged in!</p>
                      </body></html>');
               exit;
          }
     }
?>
<html>
<head><title>Login Form</title></head>
<body>
<h1>Login Form</h1>
<?php
     if (count ($errors) > 0) {
          $n = count ($errors);
          for ($i = 0; $i < $n; $i++){
               print '<br /><font color="red">' . $errors[$i] . '</font>';
          }     
     }
?>
<form action="new.php" method="POST">
     <table>
     <tr><td>Username:</td>
     <td><input type="text" name="username" value="<?php if (isset ($p['username'])) print $p['username']; ?>" /></td>
     </tr>
     <tr><td>Password:</td>
     <td><input type="text" name="password" value="<?php if (isset ($p['password'])) print $p['password']; ?>" /></td>
     </tr>
     <tr><td colspan="2"><input type="submit" name="submit"></td></tr>
     </table>
     <input type="hidden" name="__process_form__" value="1" />
</form>
</body>
</html>
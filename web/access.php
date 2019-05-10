<?php include "openaccess-header.php" ?>
<main class="info-page">
  <div class="form-section" id="formcontainer">
    <form name="myForm" action="/mailer.php" method="post" onsubmit="return validateForm()">
      <h2>Fill out this form to request access to the Junk News Aggregator</h2>
      First name:<br>
      <input type="text" name="firstname" id="firstname"><br>
      <div id="firstnamecheck" class="check">Please enter a first name<br></div><br>
      Last name:<br>
      <input type="text" name="lastname" id="lastname"><br>
      <div id="lastnamecheck" class="check">Please enter a last name<br></div><br>
      Email:<br>
      <input type="email" name="email" id="email"><br>
      <div id="emailcheck" class="check">Please enter a valid email address<br></div><br>
      Mobile number (to receive password):<br>
      <input type="number" name="telephone" id="telephone"><br>
      <div id="telephonecheck" class="check">Please enter a valid telephone number<br></div><br>
      Reason for requesting access:<br>
      <input type="textarea" name="reason" id="reason"><br>
      <div id="reasoncheck" class="check">Please enter a reason<br></div><br>
      <br>
      Personal information collected via this form will be held in accordance with the provisions of the GDPR and solely for the purpose of authorising access to the Junk News Aggregator site. It will be held securely and not passed on to third parties. Please see our <a href="https://www.oii.ox.ac.uk/privacy-policy/">privacy policy</a> for further information.

      <input id="submit" type="submit">

    </form>
  </div>
</main>

<script src="./jquery-3.3.1.min.js"></script>
<?php include "validator.js"; ?>

<?php include "openaccess-footer.php"; ?>

<?php

require_once('includes/connectdb.php');

if (session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}

?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

<div class="container mt-3">

<div class="row justify-content-left">

<div class="col-md-6">


<form>


<div class="mb-3 form-floating col-sm">

<input type="text" class="form-control" id="test" placeholder="Enter Username">

<label for="test"> Enter Username</label>


</div>

</form>


</div>
</div>



</div>


<form action="" method="POST">

    <select name="sel_other" id="sel_other">
        <option value="Test">Test</option>
        <option value="other">Other</option>

    </select>

</form>

<script>
$('#sel_other').on('change', function() {

    var securityname = $(this).val();


    console.log(securityname);




})
</script>
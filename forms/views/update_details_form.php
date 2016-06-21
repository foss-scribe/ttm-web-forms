<h1>Update your details</h1>

<p>Use this page to view and update the personal details we hold about you in our database.</p>

<p>All information we collect is subject to our privacy policy and relevant Australian Laws and is intended for TTM purposes only. We will not share your information with third-parties unless with your expressed consent.</p>


<form method="post" action="<?php echo $_SERVER[PHP_SELF] ;?>" class="form">


<div class="form-group">
	<label for="name" class="col-sm-2 control-label">First Name</label>
	<input name="firstname" type="text" class="form-control" value='<?php echo $member['firstname'] ?>' required></input>
</div>

<div class="form-group">
	<label for="name" class="col-sm-2 control-label">Last Name</label>
	<input name="lastname" type="text" class="form-control" value='<?php echo $member['lastname'] ?>' required></input>
</div>



<div class="form-group">
	<label for="email" class="col-sm-2 control-label">Email Address</label>
	<input name="email" type="email" class="form-control"  placeholder="me@domain.com" value='<?php echo $member['email'] ?>' required></input>
</div>

<div class="form-group">
	<label for="phone" class="col-sm-2 control-label">Landline</label>
	<input name="phone" type="phone" class="form-control" placeholder="(03) 0000 0000"  value='<?php echo $member['phone'] ?>'></input>
</div>

<div class="form-group">
	<label for="mobile" class="col-sm-2 control-label">Mobile</label>
	<input name="mobile" type="mobile" class="form-control" placeholder="0000 000 000"  value='<?php echo $member['mobile'] ?>'></input>
</div>



<div class="form-group">
	<label for="address" class="col-sm-2 control-label">Street Address</label>
	<input name="address" type="text" class="form-control" value='<?php echo $member['address'] ?>' required></input>
</div>

<div class="form-group">
	<label for="name" class="col-sm-2 control-label">Suburb</label>
	<input name="suburb" type="text" class="form-control" value='<?php echo $member['suburb'] ?>' required></input>
</div>

<div class="form-group">
	<label for="name" class="col-sm-2 control-label">Postcode</label>
	<input name="postcode" type="text" class="form-control" value='<?php echo $member['postcode'] ?>' required></input>	
</div>

<h3>Social</h3>

<div class="form-group">
	<label for="name" class="col-sm-2 control-label">Website or blog</label>
	<input name="social_web" type="text" class="form-control" value='<?php echo $member['website'] ?>'></input>	
</div>

<div class="form-group">
	<label for="name" class="col-sm-2 control-label">Twitter</label>
	<input name="social_twitter" type="text" class="form-control" value='<?php echo $member['twitter'] ?>'></input>	
</div>

<div class="form-group">
	<label for="name" class="col-sm-2 control-label">Facebook</label>
	<input name="social_facebook" type="text" class="form-control" value='<?php echo $member['facebook'] ?>'></input>	
</div>

<div class="form-group">
	<label for="name" class="col-sm-2 control-label">Google+</label>
	<input name="social_googleplus" type="text" class="form-control" value='<?php echo $member['googleplus'] ?>'></input>	
</div>

<div class="form-group">
	<label for="name" class="col-sm-2 control-label">Instagram</label>
	<input name="social_instagram" type="text" class="form-control" value='<?php echo $member['instagram'] ?>'></input>	
</div>


  <hr>
	<div class="g-recaptcha" data-sitekey="<?php echo SITE_KEY; ?>"></div>	
  <hr>
<!-- <button type="clear" name="clear" class="btn btn-default">Clear</button> -->
<input type="hidden" name="member_id" value="<?php echo $member['id']; ?>">
<button type="submit" name="submit" class="btn btn-primary" value="true">Submit</button>

</form>

<!--

Bayswater North	 3153	 Ringwood	 3134
Croydon	 3136	 Ringwood East	 3135
Croydon Hills	 3136	 Ringwood North	 3134
Croydon North	 3136	 Vermont (part)	 3133
Croydon South	 3136	 Warranwood	 3134
Heathmont	 3135	 Wonga Park (part)	 3115
Kilsyth South	 3137	 

 -->

<?php
if(isset($_POST['landed_booking_form_submit'])):
if($_POST['first_name']==null):
$bookingRequest = new MP_Landed_BookingRequest($_POST);
$result = $bookingRequest->post();
is_int($result) AND $success = true ;
?>
<p class='green'>thanks for your request , the booking request had been
	sent and will be reviewed shortly.</p>
<?
endif;
endif;

?>
<div>
	<form id='MPLandedBookingForm' class='mp-landed-booking-form'
		action="<?=get_permalink()?>" method='POST'
		enctype="application/x-www-form-urlencoded">
		<input type='hidden' id='ajaxurl' name='ajaxurl' value='<?=admin_url('admin-ajax.php')?>'/>
		<label for="request_type">Type of Request:*</label> <select
			name="request_type" id="request_type">
			<option value="LANDED productions artist">LANDED productions artist</option>
			<option value="LANDED productions night">LANDED productions night</option>
			<option value="ANDED producions showcase">LANDED producions showcase</option>
		</select> <label for="artist_name">Artists:*</label>
		<div style='width: 300px; display: inline-block;'>
		<?=MP_Landed_BookingForm::GetArtistCheckBoxList("artists[]",$_POST['artists'])?>
		</div>
		<p>(Please use the "Further Information box" If you want to book more
			than one artist)</p>
		<label for="booking_date">Date for booking:*</label> <input
			value='<?=$_POST['booking_date']?>' type="text" name='booking_date' />
		<label>Promoter/Company name:* </label> <input type="text"
			name="company_name" value='<?= $_POST['company_name']?>' /> <label>Venue:*
		</label> <input type="text" name="venue" value='<?=$_POST['venue']?>' />
		<label>Country:*</label> <input type='text' name='country'
			value='<?=$_POST['country']?>' /> <label>Contact name:*</label> <input
			type="text" name='contact_name' value='<?=$_POST['contact_name']?>' />
		<label>Email:*</label> <input type="text" name='email'
			value='<?=$_POST['email']?>' /> <label> Phone Number:* </label> <input
			type="text" name="phone" value='<?=$_POST['phone']?>' /> <label>Further
			Information:</label>
		<textarea name="informations" id="" cols="30" rows="10"><?=$_POST['informations']?></textarea>
		<label for="">&nbsp;</label> <input name='reset' type='text'
			name='first_name' style='display: none' /> <input name='reset'
			type='reset' id='reset' value='reset' class='reset' />
			<?if(!isset($success)):?>
		<input type="submit" name="submit" id='submit' value="submit"
			name='landed_booking_form_submit' />
			<? endif; ?>
		<p id='output' class='red'></p>
	</form>
</div>
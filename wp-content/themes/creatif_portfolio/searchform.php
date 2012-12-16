<form action="<? bloginfo('url') ?>">
<p>
<input type="text" value='<?= wp_specialchars($s,1)?>' name='s' size="15"/>
<input type="submit" value="Search" id='search_submit'>
</p>
</form>
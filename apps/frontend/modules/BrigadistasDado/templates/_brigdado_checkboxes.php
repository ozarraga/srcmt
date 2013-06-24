
<form id="miforma">
	<fieldset >
		<ul class="datatables-checkboxes">
			<?php for ($i = 0; $i < 11; ++$i): ?>
				<li><?php $checkBoxesArray[$i]->checkbox_tag() ?></li>
			<?php endfor ?>
		</ul>
	</fieldset >
	<fieldset >
		<ul class="datatables-checkboxes">
			<?php for ($i = 11; $i < 22; ++$i): ?>
				<li><?php $checkBoxesArray[$i]->checkbox_tag() ?></li>
			<?php endfor ?>
		</ul>
	</fieldset>
	<fieldset >
		<ul class="datatables-checkboxes">
			<?php for ($i = 22; $i < 33; ++$i): ?>
				<li><?php $checkBoxesArray[$i]->checkbox_tag() ?></li>
			<?php endfor ?>
		</ul>
	</fieldset>
	<fieldset >

		<ul class="datatables-checkboxes">
			<?php for ($i = 33; $i < 44; ++$i): ?>
				<li><?php $checkBoxesArray[$i]->checkbox_tag() ?></li>
			<?php endfor ?>
		</ul>
	</fieldset>
	<fieldset >

		<ul class="datatables-checkboxes">
			<?php for ($i = 44; $i < sizeof($checkBoxesArray); ++$i): ?>
				<li><?php $checkBoxesArray[$i]->checkbox_tag() ?></li>
			<?php endfor ?>
		</ul>
	</fieldset>
</form>

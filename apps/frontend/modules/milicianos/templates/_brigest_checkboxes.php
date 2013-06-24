
<form id="miforma">
	<fieldset >
		<ul class="datatables-checkboxes">
			<?php for ($i = 0; $i < 14; ++$i): ?>
				<li><?php $checkBoxesArray[$i]->checkbox_tag() ?></li>
			<?php endfor ?>
		</ul>
	</fieldset >
	<fieldset >
		<ul class="datatables-checkboxes">
			<?php for ($i = 14; $i < 28; ++$i): ?>
				<li><?php $checkBoxesArray[$i]->checkbox_tag() ?></li>
			<?php endfor ?>
		</ul>
	</fieldset>
	<fieldset >
		<ul class="datatables-checkboxes">
			<?php for ($i = 28; $i < 42; ++$i): ?>
				<li><?php $checkBoxesArray[$i]->checkbox_tag() ?></li>
			<?php endfor ?>
		</ul>
	</fieldset>
	<fieldset >

		<ul class="datatables-checkboxes">
			<?php for ($i = 42; $i < 56; ++$i): ?>
				<li><?php $checkBoxesArray[$i]->checkbox_tag() ?></li>
			<?php endfor ?>
		</ul>
	</fieldset>
	<fieldset >

		<ul class="datatables-checkboxes">
			<?php for ($i = 56; $i < sizeof($checkBoxesArray); ++$i): ?>
				<li><?php $checkBoxesArray[$i]->checkbox_tag() ?></li>
			<?php endfor ?>
		</ul>
	</fieldset>
</form>

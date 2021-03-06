<style type="text/css">
#folders_crud div.uploader {
	width:190px;
}
</style>
<?php if (isset($error)) echo $error; ?>
<?php echo form_open_multipart($this->uri->uri_string(), array('class' => 'crud', 'id' => 'folders_crud')); ?>
<h2><?php echo lang('files.upload.title'); ?></h2>
<ul>
	<li>
		<?php echo form_label(lang('files.folders.name'), 'name'); ?>
		<?php echo form_input('name', set_value('name', $name), 'class="crud"'); ?>
	</li>
	<li>
		<?php echo form_label(lang('files.description'), 'description'); ?>
		<?php
		$data = array(
		              'name'        => 'description',
		              'id'          => 'description',
		              'value'       => set_value('description', $description),
		              'rows'   		=> '4',
		              'cols'        => '30',
					  'class'		=> 'crud'
		            );
		?>
		<?php echo form_textarea($data); ?>
	</li>
	<li>
		<?php echo form_label(lang('files.folder.label'). ':', 'folder_id'); ?>
		<?php
		$folder_options['0'] = lang('files.dropdown.no_subfolders');
		foreach($folder->parents as $row)
		{
			$indent = ($row['parent_id'] != 0) ? repeater('&nbsp;&raquo;&nbsp;', $row['depth']) : '';
			$folder_options[$row['id']] = $indent.$row['name'];
		}
		echo form_dropdown('folder_id', $folder_options, $selected_id, 'id="folder_id" class="crud"');
		?>
	</li>
	<li>
		<?php echo form_label(lang('files.type'), 'type'); ?>
		<?php echo form_dropdown('type', $types, $type, 'id="type" class="crud"'); ?>
	</li>
	<li>
		<label for="nothing"><?php echo lang('files.file'); ?></label>
		<?php echo form_upload('userfile'); ?>
	</li>
	<li>
		<label for="nothing"></label>
		<?php echo form_submit('button_action', lang('buttons.save'), 'class="button"'); ?>
	</li>
</ul>

<?php echo form_close(); ?>


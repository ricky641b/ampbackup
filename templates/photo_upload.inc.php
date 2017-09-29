<?php

/* vim:set softtabstop=4 shiftwidth=4 expandtab: */
/**
 *
 * LICENSE: GNU Affero General Public License, version 3 (AGPLv3)
 * Copyright 2001 - 2015 Ampache.org
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */
?>

<?php UI::show_box_top(T_('Upload photo'), 'box box_add_user'); ?>
<?php AmpError::display('general'); ?>
<form enctype="multipart/form-data" method="post" action="<?php echo AmpConfig::get('web_path')?>/upload-pic.php">
    <table class="tabledata" cellspacing="0" cellpadding="0">
        <tr>
            <td>
                <?php echo T_('Photo'); ?> (&lt; <?php echo UI::format_bytes(AmpConfig::get('max_upload_size')); ?>)
            </td>
            <td>
                <input type="file" name="fileToUpload" id="fileToUpload">
            </td>
        </tr>
    </table>
    <div class="formValidation">
          <input type="submit" value="Upload Image" name="submit">
    </div>
</form>
<?php 
$target_dir = "../uploads/";
foreach(glob($target_dir.'*.*') as $file) {

    $file = str_replace("..",AmpConfig::get('web_path'),$file);
       echo "<img src='". $file."' width='20%' height='20%' style='margin:20px;' />";
}
UI::show_box_bottom(); ?>

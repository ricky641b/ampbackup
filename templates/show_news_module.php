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
<head><style type="text/css">#footer{display: none;}</style></head>
<?php UI::show_box_top(T_('News Module'), 'box box_add_user'); ?>
<?php AmpError::display('general'); ?>
<form name="form1" method="post" action="<?php echo AmpConfig::get('web_path')?>/admin/users.php?action=upload_news">
  <table width="50%" border="0" cellspacing="0" cellpadding="0">
    <tr> 
      <td width="50%">Headline</td>
      <td><input name="headline" type="text" id="headline"></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>News Story</td>
      <td><textarea name="story" id="story" style="margin-top: 20px"></textarea></td>
    </tr>
        <tr> 
      <td>Original Link (leave blank if their is none)</td>
      <td><input name="original_link" type="text" id="original_link" style="margin-top: 20px"></td>
    </tr>
    <tr> 
      <td colspan="2"><div align="center">
          <input name="hiddenfield" type="hidden" value="add_n">
          <input name="add" type="submit" id="add" value="Submit" style="margin-top: 20px">
        </div></td>
    </tr>
  </table>
  </form>
   <table  style="margin-top: 20px;" width="100%" cellspacing="0px" cellpadding="0px">
   <thead>
    <tr> 
      <td style="color:#D17B2B;">Headline</td>
      <td style="color:#D17B2B;">Story</td>
      <td style="color:#D17B2B;">Original Link</td>
      <td style="color:#D17B2B;">Timestamp</td>
    </tr>
    </thead>
<?php 
  require ('../admin/header.php');
  $query = "SELECT id,headline,story,original_link,timestamp FROM news ORDER BY timestamp DESC";
  $result = mysqli_query($db_connect,$query);
  if (mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result))
    { 
    echo '<tr> 
      <td>'.$row["headline"].'</td>
      <td>'.$row["story"].'</td>
      <td>'.$row["original_link"].'</td>
      <td>'.$row["timestamp"].'</td>
      <td><input name="delete" type="submit" value="Delete" id="delete"></td>
    </tr>';
  }
}
    ?>
  </table>
      <?
   mysqli_close($db_connect);
?>

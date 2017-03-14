<?php
  $page_title = 'Recordings';
  include_once('head.php');
?>
  <div id="rec_list">
    <div id="layout">
      <table width="100%" border="0" cellspacing="0" cellpadding="0" id="heading"><tr><td class="col_title"><h1>Recordings</h1></td></tr></table>
      <table width="100%" border=0 cellpadding=0 class="list hilight">
      <tr class="heading"><td class="col_date"><h2>Date</h2></td>
      <td class="col_time"><h2>Time</h2></td>
      <td class="col_length"><h2>Length</h2></td> 
      <td class="col_name"><h2>Name</h2></td></tr> 
<?php
        $recordings = get_recordings();
	$i = 0;
	foreach($recordings as $t) {
		$time = strftime("%H:%M", $t["start"]);
		$date = strftime("%a %e/%m/%y", $t["start"]);
		$duration = $t["stop_real"] - $t["start_real"];
		$hh = $duration / 3600;
		$mm = ($duration % 3600) / 60;
		if ($i % 2) {
			echo "<tr class=\"row_odd\">";
		}
		else {
			echo "<tr class=\"row_even\">";
		}
		printf("<td class=\"col_date selected\"><div>%s</div></td>", $date);
               printf("<td class=\"col_time\"><div>%s</div></td><td class=\"col_length\"><div>%d:%02d</div></td><td class=\"col_name\"><div class=\"epg_title\">%s</div><div class=\"epg_subtitle\">%s</div></td>", $time, $hh, $mm, $t["disp_title"], $t["disp_subtitle"]);
                echo "</tr>\n";
		$i++;
	}
	echo "</table></div>\n";
 ?>
    </div>
   </div>
  </body>
</html>

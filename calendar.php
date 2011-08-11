<?php
/* php-calendar
 * Creates a calendar for every month until 2037
 * @author John Moses
 * @email moses.john.r@gmail.com
 * @date June 12, 2011
 */

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
		<title>Calendar</title>
		<script type='text/css'>

		</script>
	</head>

	<body>
			<?php
				$year = 2011;
				cal_days_in_month(CAL_GREGORIAN, date('n'), date('Y'));//how many days in the month?
				for($year = 2011; $year < 2037; $year++){
					for($month = 1; $month <= 12; $month++){	
						$currentMonthTime = mktime(1, 1, 1, $month, 1, $year);
						print "<a name='$month-$year'>";
						print "<table style='width:250px'>"
								 ."<tr><td colspan='7' align='center'>".date('F', $currentMonthTime)." ".date('Y', $currentMonthTime)."</td></tr>"
								 ."<tr style='font-weight: bold;'>"
									."<td>Su</td>"
									."<td>M</td>"
									."<td>T</td>"
									."<td>W</td>"
									."<td>Th</td>"
									."<td>F</td>"
									."<td>Sa</td>"
								."</tr>";
						$totalDays = cal_days_in_month(CAL_GREGORIAN, date('n', $currentMonthTime), date('Y'));
						for($day = 1; $day <= $totalDays; $day++){
							$dayOfWeek = date('w', mktime(1, 1, 1, $month, $day, $year));
							if($dayOfWeek == 0){
								print "<tr>";
							}
							
							if($day == 1){
								print "<tr>";
								
								for($x=0; $x < $dayOfWeek; $x++){
									print "<td></td>";
								}
							}

							print "<td>$day</td>";
							
							if($day == $totalDays){
								for($x=$dayOfWeek; $x <= $dayOfWeek; $x++){
									print "<td></td>";
								}
							}
							
							if($dayOfWeek == 6 || $day == $totalDays){
								print "</tr>\n";
							}
						}
						print "</table>";
					}
				}
			?>

	</body>
</html>

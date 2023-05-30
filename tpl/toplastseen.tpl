<!-- BEGIN: MAIN -->
<h2><b><center>{PHP.L.Top_Last_Seen}</center></b></h2>
<table class="table table-striped">
	<tr>
		<td class="coltop">{PHP.L.Number}</td>
		<td align="center" class="coltop">{PHP.L.Username}</td>
		<td align="left"class="coltop">{PHP.L.seen}</td>
		<td align="left"class="coltop">{PHP.L.Log_amount}</td>
	</tr>
	<!-- BEGIN: UMP_ROW -->
	<tr>
		<td align="right"> {UMP_ROW_NUM}</td>
		<td align="center">{UMP_ROW_USERNAME}</td>
		<td align="left">{UMP_ROW_TIMEAGO} / {UMP_ROW_LASTLOGIN}</td>
		<td align="left">{UMP_ROW_LOG_AMOUNT}</td>
	</tr>
	<!-- END: UMP_ROW -->
</table>
<!-- END: MAIN -->
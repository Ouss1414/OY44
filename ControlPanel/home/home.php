<div class="row">
	<div class="col-sm-3 col-xs-6">

		<div class="tile-stats tile-red">
			<div class="icon"><i class="entypo-users"></i></div>
			<div class="num" data-start="0" data-end="83" data-postfix="" data-duration="1500" data-delay="0">0</div>

			<h3>Registered users</h3>
			<p>so far in our blog, and our website.</p>
		</div>

	</div>

	<div class="col-sm-3 col-xs-6">

		<div class="tile-stats tile-green">
			<div class="icon"><i class="entypo-chart-bar"></i></div>
			<div class="num" data-start="0" data-end="135" data-postfix="" data-duration="1500" data-delay="600">0</div>

			<h3>Daily Visitors</h3>
			<p>this is the average value.</p>
		</div>

	</div>

	<div class="clear visible-xs"></div>

	<div class="col-sm-3 col-xs-6">

		<div class="tile-stats tile-aqua">
			<div class="icon"><i class="entypo-mail"></i></div>
			<div class="num" data-start="0" data-end="23" data-postfix="" data-duration="1500" data-delay="1200">0</div>

			<h3>New Messages</h3>
			<p>messages per day.</p>
		</div>

	</div>

	<div class="col-sm-3 col-xs-6">

		<div class="tile-stats tile-blue">
			<div class="icon"><i class="entypo-rss"></i></div>
			<div class="num" data-start="0" data-end="52" data-postfix="" data-duration="1500" data-delay="1800">0</div>

			<h3>Subscribers</h3>
			<p>on our site right now.</p>
		</div>

	</div>
</div>

<br />

<hr>
<div class="row">
	<h2 align="center" class="margin-bottom">Your Book</h2>
	<div align="center">
		<table class="table-bordered text-center" width="90%">
			<tr class="theme-skins">
				<td style="padding: 5px">#</td>
				<td style="padding: 10px">Serial</td>
				<td style="padding: 10px">Book</td>
				<td style="padding: 10px">Price</td>
				<td style="padding: 10px">Add Exercise</td>
				<td style="padding: 10px">Edit</td>
				<td style="padding: 10px">Delete</td>
			</tr>
            <?php
                Get_books();
            ?>
		</table>
	</div>
</div>

<br />
<html>
	<head>
		<style>
			ul {
			list-style:none;
			padding-left:0;
		}
		</style>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	</head>
	<body>
		<ul class="cont">
		<li>var vids = [</li>
		</ul>
		<ul>
			<li>function spamVid() {</li>
			<li>&nbsp;if(i < vids.length){</li>
			<li>&nbsp;&nbsp;i++;</li>
			<li>&nbsp;&nbsp;global.sendcmd('add', {URL: vids[i]});</li>
			<li>&nbsp;}else{ </li>
			<li>&nbsp;&nbsp;clearInterval(inter);</li>
			<li>&nbsp;}</li>
			<li>}</li>
			<li>inter = setInterval(spamVid, 250);</li>
		</ul>

		<script>
			var x="<?php echo $_GET["id"]; ?>";
		</script>

		<script>
			var playListURL = 'http://gdata.youtube.com/feeds/api/playlists/'+x+'?v=2&alt=json&callback=?';
			var videoURL= 'http://www.youtube.com/watch?v=';
			$.getJSON(playListURL, function(data) {
				var list_data="";
				var i = 0;
				$.each(data.feed.entry, function(i, item) {
					i++;
					var feedTitle = item.title.$t;
					var feedURL = item.link[1].href;
					var fragments = feedURL.split("/");
					var videoID = fragments[fragments.length - 2];
					var url = videoURL + videoID;
					if(data.feed.entry.length==i){
						list_data += '<li>"'+url+'"];</li>';
					}else{
					   list_data += '<li>"'+url+'",</li>';
					}
				});
				$(list_data).appendTo(".cont");

			});
		</script>
	</body>
</html>
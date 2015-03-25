<?php

	$input = $image;
	//$input = 'img/photo1.jpg; img/photo2.gif; img/photo3.png; img/photo4.jpg;';
	$clear_div_every = 6;

	$lines = array();
	$input = trim($input);
	if (! empty($input)) {
		$counter = 0;
		$chunks = preg_split('#\;\s*#', trim($input, '; '));
		foreach($chunks as $chunk) {
			$info = pathinfo($chunk);
			$class = $info['filename'];
			$lines[] = "<div class=\"{$class}\"><a href=\"{$chunk}\"><img src=\"{$chunk}\"/></a></div>";
			if (++$counter == $clear_div_every) {
				$counter = 0;
				$lines[] = "<div class=\"clear\"></div>";
			}
		}

		$output = implode("\n", $lines);
		echo $output;
	}

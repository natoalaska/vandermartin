<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html>
<head>
	<title>Word Puzzle Maker</title>
	<style type="text/css">
		body {
			background: tan;
		}
	</style>
</head>
<body>
	<center>
		<ht>Word Puzzle Maker</h1>
		<form action="wordsearch/generate" method="post">
			<h3>Puzzle Name</h3>
			<input type="text" name="name" value="My Word Find">
			height: <input type="text" name="height" value="10" size="5">
			width: <input type="text" name="width" value="10" size="5">
			<br /><br />
			<h3>Word List</h3>
			<textarea rows=10 cols=60 name="wordList"></textarea>
			<br /><br />
			Please enter one word per row, no spaces. If you leave the list blank<br />
			We will generate a generic puzzle.
			<br />
			<input type="submit" value="Make Puzzle">
		</form>
	</center>
</body>
</html>
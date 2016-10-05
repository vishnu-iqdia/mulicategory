<?php
	
	require 'functions.php';
	$result  = '';	

	if(isset($_REQUEST['op']))
	{
		switch($_REQUEST['op'])
		{
			case 'create_category':
				$link = create_link();
				$data = $_REQUEST['data'];
				$result = add_category($link, $data); break;

			case 'del_cat':
		}
	}

	$link = create_link();
	$categories = load($link, 'category');
	display($categories);

?>
<html>
	<head></head>
	<style>
		html,body, table {
			font-family:verdana;
			font-size:90%;
		}
		table {
			border:1px solid #ccc;
		}
		table td {
			border:1px dashed #ccc;
		}
	</style>
	<body>
		(<a href="index.php">home</a>)
		<form action="" method="post">
		<table>
			<tr>
				<td>
					<input type="text" name="data[cname]" placeholder="category name..."/>
				</td>
			</tr>
			<tr>
				<td>
					<select name="data[parent_id]">
						<option value='0'>null</option>
					</select>
				</td>
			</tr>
			<tr><td>
				<input type="submit" name="op" value="create_category"/>
			</td></tr>
		</table>
	</form>

	<p></p>
	<code>
		<table>
				<tr>
					<td><strong>category name</strong></td><td>::</td><td></td>
				</tr>
				<?php
					$tbody = "";
					foreach($categories as $key => $value)
					{
						$tbody .= "<tr>";
						$tbody .= "<td>".$value['cname']."</td>";
						$tbody .= "<td><a href='index.php?op=del_cat&cid=".$value['id']
							   ."'>del</a></td>";						$tbody .= "<td><a href='index.php?op=del_cat&cid=".$value['id']
							   ."'>del</a></td>";
						$tbody .= "</tr>";
					}
					echo $tbody;
				?>
		</table>
	</code>
	</body>
</html>
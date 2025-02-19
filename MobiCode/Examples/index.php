<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>UnlockBase API : Examples</title>
<style type="text/css">
<!--
	body {
		font-family: Arial;
		font-size: 13px;
		color: #333333;
	}
	
	div {
		padding: 1px;
	}
	
	a {
		color: #6699CC;
	}
	
	a:hover {
		text-decoration: none;
	}
-->
</style>
</head>

<body>
<p>Click to view an example of the following actions :</p>
<?
	/* List all files in this directory, except the present one */
	$Dir = opendir('.');
	
	if (is_resource($Dir))
	{
		while (is_string($File = readdir($Dir)))
		{
			if (is_file($File))
			{
				if ($File != basename(__FILE__))
				{
					print('<div><a href="' . htmlspecialchars($File) . '">' . htmlspecialchars(basename($File, '.php')) . '</a></div>');
				}
			}
		}
		
		closedir($Dir);
	}
?>
</body>
</html>
<?php
	/**
	*	Placeto Setup
	*		This is the installation process portion of Placeto CMS.
	*
	*	Author: Benjamin Jay Young
	*		http://www.blahertech.org/projects/placeto
	*
	*	This source code is released under the GPL License.
	*	
	*	//////////////////////////////////////////////////
	*
	*	This is the main proccess page for the setup.
	**/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="../admin/include/login.css" />
        <link rel="shortcut icon" href="../admin/images/favicon.ico" type="image/x-icon" />
		<link rel="icon" href="../admin/images/favicon.ico" type="image/x-icon"/>
        <title>Placeto - Setup</title>
    </head>
<?php
	//top of the template
	include('inc/template.php');
	intro_box_top();
	if (!$pass)
	{
		//no cookies for you
?>
					<h1>Not Found</h1>
                    <p>
                    	Sorry, but I deleted the installation files to keep other users from cracking my shell.
                    </p>
<?php
	}
	else if (!isset($_GET['step']))
	{
		//oh, so you're new here
?>
                	<h1>Welcome to Placeto CMS</h1>
                    <p>
                    	Hello, my name is Asta (The Crayfish) and thank you for choosing Placeto CMS. We will now be going through the installation process, and I will try to keep this as easy as possible for you. If you are ready to start, then go ahead and click start, otherwise I can wait.
                    </p>
                    <form method="get">
                    	<input type="hidden" name="step" value="1" />
                        <input type="submit" value="Start" />
                    </form>
<?php
	}
	else if ($_GET['step']==='1')
	{
		//db info
?>
					<h1>Placeto Database Information</h1>
                    <p>
                    	First off, I need to know some database server information, in order for me to store information. You may need to retrieve this from your hosting provider or your server/network administrator.
                    </p>
                    <form method="post" action="?step=2">
                        <label for="db_server">Database Server</label>
                        <input type="text" name="db_server" value="localhost" />
                        <p>90% of the time, this will be localhost.</p>
                        <label for="db_user">Database User</label>
                        <input type="text" name="db_user" />
                        <label for="db_pass">Database User's Password</label>
                        <input type="password" name="db_pass" />
                        <label for="db_name">Placeto's Database Name</label>
                        <input type="text" name="db_name" value="placeto_db" />
                        <label for="db_prefix">Table Prefix?</label>
                        <input type="text" name="db_prefix" value="placeto_" />
                        <p>This will be applied before every table name.</p>
                        <label for="db_create">Create Database?</label>
                        <input type="checkbox" name="db_create" checked="checked" />
                        <p>If you don't have create privlages, you will have to manually create the database and don't select this.</p>
                        <br />
                        <input type="submit" value="Continue" />
                    </form>
<?php
	}
	else if ($_GET['step']==='2')
	{
		//check db connection
		$db_error=0;
		@$mysql=mysql_connect($_POST['db_server'], $_POST['db_user'], $_POST['db_pass']) or $db_error=1;
		
		if ($db_error===0)
		{
			if (mysql_select_db($_POST['db_name'], $mysql) && !$_POST['db_name'])
			{
				//check if they can select
				$db_error=2;
			}
		}
		if ($db_error===0)
		{
			if ($_POST['db_create'])
			{
				//check if they can create
				@mysql_query('CREATE DATABASE '.$_POST['db_name'], $mysql) or $db_error=3;
			}
			else if (!mysql_select_db($_POST['db_name'], $mysql))
			{
				//check if they can create and select
				$db_error=4;
			}
			
		}
		mysql_close($mysql);
		unset($mysql);
		
		//throw up what ever we eat
		if ($db_error===1)
		{
?>
					<h1>Error</h1>
					<p>
                    	I'm sorry, but I could not connect with the database. The server name and/or username and/or password may have been wrong. Please try again.
                    </p>
<?php
		}
		if ($db_error===2)
		{
?>
					<h1>Error</h1>
					<p>
                    	I'm sorry, I found the database you entered already exists. Please try again.
                    </p>
<?php
		}
		if ($db_error===3)
		{
?>
					<h1>Error</h1>
					<p>
                    	I'm sorry, but the username you entered does not let me have the privalages to create a new database. Please try again.
                    </p>
<?php
		}
		if ($db_error===4)
		{
?>
					<h1>Error</h1>
<p>
                    	I'm sorry, I could not find the database you entered. Please try again.
                    </p>
<?php
		}
		if ($db_error!==0)
		{
			//let's try again
?>
                <form method="post" action="?step=2">
                    <label for="db_server">Database Server</label>
                    <input type="text" name="db_server" value="<?php echo $_POST['db_server']; ?>" />
                    <p>90% of the time, this will be localhost.</p>
                    <label for="db_user">Database User</label>
                    <input type="text" name="db_user" value="<?php echo $_POST['db_user']; ?>" />
                    <label for="db_pass">Database User's Password</label>
                    <input type="password" name="db_pass" value="<?php echo $_POST['db_pass']; ?>" />
                    <label for="db_name">Placeto's Database Name</label>
                    <input type="text" name="db_name" value="<?php echo $_POST['db_name']; ?>" />
                    <label for="db_prefix">Table Prefix?</label>
                    <input type="text" name="db_prefix" value="<?php echo $_POST['db_prefix']; ?>" />
                    <p>This will be applied before every table name.</p>
                    <label for="db_create">Create Database?</label>
                    <input type="checkbox" name="db_create"<?php if($_POST['db_create']){echo ' checked="checked"';} ?> />
                    <p>If you don't have create privlages, you will have to manually create the database and don't select this.</p>
                    <br />
                    <input type="submit" value="Try Again" />
                </form>
<?php
		}
		else
		{
			//yay it worked
?>
				<h1>Placeto Setup</h1>
                <p>
                	Now that I have all the required information and have verified that everything is in working order, I will now begin to set up the application. Before I do so, I warn you it may take some time for me to swim back and forth between setup, so please be patient. When you are ready, click 'Install'.
                </p>
                <form method="post" action="?step=3">
                    <input type="hidden" name="db_server" value="<?php echo $_POST['db_server']; ?>" />
                    <input type="hidden" name="db_user" value="<?php echo $_POST['db_user']; ?>" />
                    <input type="hidden" name="db_pass" value="<?php echo $_POST['db_pass']; ?>" />
                    <input type="hidden" name="db_name" value="<?php echo $_POST['db_name']; ?>" />
                    <input type="hidden" name="db_prefix" value="<?php echo $_POST['db_prefix']; ?>" />
                    <input type="submit" value="Install" />
                </form>
<?php
		}
		unset($db_error);
	}
	else if ($_GET['step']==='3')
	{
		//setup the db
?>
				<h1>Placeto Checking Setup</h1>
<?php
		$mysql=mysql_connect($_POST['db_server'], $_POST['db_user'], $_POST['db_pass']);
		mysql_select_db($_POST['db_name'], $mysql);
		
		//import sql commands file
		$sqlfile=fopen('db.sql', 'r');
		$sqldata=fread($sqlfile, filesize('db.sql'));
		fclose($sqlfile);
		
		//set prefix if set
		if ($_POST['db_prefix'])
		{
			$sqldata=str_replace('CREATE TABLE IF NOT EXISTS `', 'CREATE TABLE IF NOT EXISTS `'.$_POST['db_prefix'], $sqldata);
			$sqldata=str_replace('INSERT INTO `', 'INSERT INTO `'.$_POST['db_prefix'], $sqldata);
		}
		
		//why I had to do it this way, don't ask
		$sqlary=explode(';;', $sqldata);
		$sqlec=0;
		$sqlet=0;
		$sqlstmt='';
		unset($sqldata, $sqlfile);
		
		//loop through each command
		foreach ($sqlary as $stmt)
		{
			if (strlen($stmt)>3)
			{
				$result=mysql_query($stmt);
				if (!$result)
				{
					$sqlec=mysql_errno();
					$sqlet=mysql_error();
					$sqlstmt=$stmt;
					break;
				}
			}
		}
		
		mysql_close($mysql);
		unset($mysql, $stmt, $result, $sqlary);
		
		//set up the config file
		if ($sqlec===0)
		{
			if(substr($_SERVER['PHP_SELF'], 0, strripos($_SERVER['PHP_SELF'], 'setup'))!=='/')
			{
				$dirc=substr($_SERVER['PHP_SELF'], 0, strripos($_SERVER['PHP_SELF'], 'setup')-1);
			}
			else
			{
				$dirc='/';
			}
			
			//configgy!
			$configcnt="<?php\n\t\$config['site']='http://".$_SERVER['HTTP_HOST']."';\n\t\$config['directory']='".$dirc."';\n\t\$config['template']='default';\n\n\t\$sql_login['server']='".$_POST['db_server']."';\n\t\$sql_login['user']='".$_POST['db_user']."';\n\t\$sql_login['pass']='".$_POST['db_pass']."';\n\t\$sql_login['db']='".$_POST['db_name']."';\n\t\$sql_login['prefix']='".$_POST['db_prefix']."';\n\t\$sql_login['die']='Databases failed, please contact the website admin.';\n\n\t\$config['encode']='utf-8';\n\t\$config['type']='text/html; charset='.\$config['encode'];\n?>";
			
			unset($dirc);
			@unlink('../config.php');
			$cnfff=false;
			
			//write the config
			@$configf=fopen('../inc/config.php', 'w') or $cnfff=true;
			@fwrite($configf, $configcnt) or $cnfff=true;
			fclose($configf);
			
			if ($cnfff)
			{
				//uh oh, no no writable
				echo 'I couldn\'t write to the configuration file. You will need to look at the online support and manually add the config.php file. When you\'r done, please click "Continue".';
			}
			else
			{
				//yay
				echo 'Installation Complete! Please Continue for the final step of setup.';
			}
?>
				<form method="post" action="?step=4">
                    <input type="hidden" name="db_server" value="<?php echo $_POST['db_server']; ?>" />
                    <input type="hidden" name="db_user" value="<?php echo $_POST['db_user']; ?>" />
                    <input type="hidden" name="db_pass" value="<?php echo $_POST['db_pass']; ?>" />
                    <input type="hidden" name="db_name" value="<?php echo $_POST['db_name']; ?>" />
                    <input type="hidden" name="db_prefix" value="<?php echo $_POST['db_prefix']; ?>" />
                    <input type="submit" value="Continue" />
                </form>
<?php
			unset($cnfff, $configf, $configcnt);
		}
		else
		{
			//grrr
			echo 'An error occured during installation!<br />';
			echo 'Error code: '.$sqlec.'<br />';
			echo 'Error text: '.$sqlet.'<br />';
			echo '<br />Statement:<br />'.$sqlstmt.'<br />';
		}
		unset($sqlstmt, $sqlec, $sqlet);
	}
	else if ($_GET['step']==='4')
	{
		//preferences
?>
				<h1>Placeto Personal Information</h1>
                <p>
                	Now that I have everything set up correctly, I will now need some personal information that will be stored on your server. It will also help me get to know you better. This information WILL NOT be sent any where other than to your website.
                </p>
                <form method="post" action="?step=5">
                    <input type="hidden" name="db_server" value="<?php echo $_POST['db_server']; ?>" />
                    <input type="hidden" name="db_user" value="<?php echo $_POST['db_user']; ?>" />
                    <input type="hidden" name="db_pass" value="<?php echo $_POST['db_pass']; ?>" />
                    <input type="hidden" name="db_name" value="<?php echo $_POST['db_name']; ?>" />
                    <input type="hidden" name="db_prefix" value="<?php echo $_POST['db_prefix']; ?>" />
                    <label for="name">Your Full Name</label>
                    <input type="text" name="name" />
                    <p>First and last.</p>
                    <label for="site">Website's Name</label>
                    <input type="text" name="site" />
                    <p>ie. Foosite Co.</p>
                    <label for="copyright">Copyright Statement</label>
                    <input type="text" name="copyright" value="Your site &amp;copy; Your name 2009" />
                    <label for="admin">Admin Email</label>
                    <input type="text" name="admin" />
                    <br />
                    <input type="submit" value="Finish" />
                </form>
<?php
	}
	else if ($_GET['step']==='5')
	{
		//complete
		$mysql=mysql_connect($_POST['db_server'], $_POST['db_user'], $_POST['db_pass']);
		mysql_select_db($_POST['db_name'], $mysql);
		$query='INSERT INTO '.$_POST['db_prefix'].'preferences (name, owner, copyright, adminemail) VALUES (\''.$_POST['site'].'\', \''.$_POST['name'].'\', \''.$_POST['copyright'].'\', \''.$_POST['admin'].'\')';
		@mysql_query($query);
		mysql_close($mysql);
		unset($mysql, $query);
?>
				<h1>Placeto Completed</h1>
                <p>
                	Congratulations! I have finished setting up Placeto and it's now ready to use.
                </p>
<?php
		//see if we can delete the pass, so no one else can run the setup
		$unlinkf=false;
		@unlink('./pass.php') or $unlinkf=true;
		if ($unlinkf)
		{
			//nope
			echo '<p>However I was not able to delete the file pass.php. If you would kindly do that your self from keeping others from cracking my shell, I would appreciate that.</p>';
		}
		unset($unlinkf);
		
		//bring me to your leader
?>
                <form method="post" action="../">
                    <input type="hidden" name="placeto_user" value="<?php echo $_POST['db_user']; ?>" />
                    <input type="hidden" name="placeto_pass" value="<?php echo $_POST['db_pass']; ?>" />
                    <input type="submit" value="Go to Admin" />
                </form>
<?php
	}
	unset($pass);
	intro_box_bottom();
?>
</html>
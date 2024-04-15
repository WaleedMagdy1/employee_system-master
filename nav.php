<?php
if(isset($_SESSION['city'])){
?>
<header>
		<nav>
			<h1><?= $_SESSION['name'] ; ?></h1>
			<ul id="navli">
				<li><a class="homered" href="myTasks.php">My Tasks</a></li>
				<li><a class="homeblack" href="chat.php">Chat</a></li>
				<li><a class="homeblack" href="myProfile.php">Profile</a></li>
        <li><a class="homeblack" href="logout.php">Logout</a></li>
			</ul>
		</nav>
	</header>
<?php
}
else if(isset($_SESSION['password'])){
?>
<header>
		<nav>
			<h1>Company Name</h1>
			<ul id="navli">
                <li><a class="homered" href="allTasks.php">All Tasks</a></li>
				<li><a class="homeblack" href="viewEmployees.php">View Employees</a></li>
				<li><a class="homeblack" href="logout.php">Logout</a></li>
			</ul>
		</nav>
	</header>
<?php
}
else{
?>
<header>
		<nav>
			<h1>Company Name</h1>
			<ul id="navli">
				<li><a class="homered" href="index.php">HOME</a></li>
				<li><a class="homeblack" href="empLogin.php">Employee Login</a></li>
				<li><a class="homeblack" href="admLogin.php">Admin Login</a></li>
			</ul>
		</nav>
	</header>
<?php
}
?>
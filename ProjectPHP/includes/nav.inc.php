<div>
    <a href="../index.php">Logo</a>
    <form action="" method="get">
        <input id="txtSearch" name="txtSearch" type="text" placeholder="search">
        <button type="submit">Search</button>
    </form>
    <a href="../profile.php"><?php echo $_SESSION['email']; ?></a>
    <a href="logout.inc.php">logout</a>
</div>
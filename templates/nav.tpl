<nav>
    {*<h1>{$title}</h1>*}
    {if ! isset($admin)}
        <form method="POST" action="auth" id="form">
            <div>
                <label>Usuario</label>
                <input type="text" name="userID" placeholder="Mail">
            </div>
            <div>
                <label>Password</label>
                <input type="text" name="passID" placeholder="Pass">
            </div>
            {* <div>{$msg}</div> *}
            <input type="submit" name="login" value="Login">
            <input type="submit" name="register" value="Register">
        </form>
    {/if}
    {if isset($user)}
        <h2>Bienvenido, {$user}!</h2>
        {*control de logout*}
    {/if}

    <a href="home">Back</a>
</nav>
<html>
<head>
    <title>Registration:</title>
</head>
<body>
    <h1>Registration</h1>
    <form action="/api/auth/register" method="POST">
        @csrf

        <table>
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" id="name" required minlength="3" maxlength="50" /></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" id="email" required minlength="5" maxlength="20" /></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" id="password" required minlength="6" /></td>
            </tr>
            <tr>
                <td>Confirm password:</td>
                <td><input type="password" name="password_confirmation" id="password_confirmation" required minlength="6" /></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Register" />
                </td>
            </tr>
        </table>
    </form>
    <button onclick="window.location.href='/'">Back to Homepage</button>
</body>
</html>

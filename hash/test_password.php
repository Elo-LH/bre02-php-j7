<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test password</title>
</head>
<body>
    <form action="decrypt_password.php" method="post">
        <label for="passwordTest">Your password:
            </label>
            <input type="password" name="passwordTest" id="passwordTest">
            
        <label for="hashTest">Your crypted password:
            </label>
            <input type="password" name="hashTest" id="hashTest">
            <button type="submit">Test</button>
    </form>
</body>
</html>
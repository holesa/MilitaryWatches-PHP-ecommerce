<h1>Kontaktní formulář</h1>

<p>Kontaktujte nás odesláním formuláře níže.</p>

<form method="post" id="form-email">
    Vaše emailová adresa<br />
    <input type="email" name="email" required="required" value="<?php if (isset($_POST['email'])) echo(htmlspecialchars($_POST['email'])); ?>" /><br />
    Antispam - zadejte aktuální rok<br />
    <input type="text" name="rok" required="required" /><br />
    <textarea name="zprava"><?php if (isset($_POST['zprava'])) echo(htmlspecialchars($_POST['zprava'])); ?></textarea><br />
    <input type="submit" value="Odeslat" />
</form>
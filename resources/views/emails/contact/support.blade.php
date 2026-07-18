<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Nouveau message de contact</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #233240;">
    <h2 style="color: #2d6a4f;">Nouveau message de contact</h2>
    <p>Vous avez reçu un nouveau message depuis le formulaire de contact du site.</p>

    <p><strong>Nom :</strong> {{ $name }}</p>
    <p><strong>Email :</strong> {{ $email }}</p>
    <p><strong>Sujet :</strong> {{ $subject }}</p>

    <div style="margin-top: 16px; padding: 16px; background: #f7f5ef; border-left: 4px solid #2d6a4f;">
        {{ $message }}
    </div>

    <p style="margin-top: 20px;">Vous pouvez répondre directement à cet email pour répondre au visiteur.</p>
</body>
</html>

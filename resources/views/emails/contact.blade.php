<!DOCTYPE html>
<html>
<head>
    <title>Nouveau message de contact</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; }
        h2 { color: #2c3e50; }
        .card {
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 20px;
            margin: 20px 0;
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <h2>Nouveau message de contact</h2>
    
    <div class="card">
        <p><strong>Nom:</strong> {{ $data['name'] ?? 'Non spécifié' }}</p>
        <p><strong>Email:</strong> {{ $data['email'] }}</p>
        <p><strong>Message:</strong></p>
        <p>{{ $data['message'] }}</p>
    </div>

    <p style="margin-top: 20px;">
        <em>Cet email a été envoyé automatiquement depuis le formulaire de contact.</em>
    </p>
</body>
</html>
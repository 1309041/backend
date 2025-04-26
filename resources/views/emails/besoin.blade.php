<!DOCTYPE html>
<html>
<head>
    <title>Nouvelle demande de service</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; }
        h2 { color: #2c3e50; }
        ul { padding-left: 20px; }
        li { margin-bottom: 5px; }
    </style>
</head>
<body>
    <h2>Nouvelle demande de service</h2>
    
    <p><strong>Nom:</strong> {{ $data['nom'] ?? 'Non spécifié' }}</p>
    <p><strong>Entreprise:</strong> {{ $data['entreprise'] ?? 'Non spécifié' }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>Téléphone:</strong> {{ $data['telephone'] ?? 'Non spécifié' }}</p>
    <p><strong>Projet:</strong> {{ $data['projet'] }}</p>
    <p><strong>Budget:</strong> {{ $data['budget'] ?? 'Non spécifié' }}</p>
    <p><strong>Délai:</strong> {{ $data['delai'] ?? 'Non spécifié' }}</p>
    
    @if(!empty($data['details']))
        <p><strong>Détails:</strong><br>{{ $data['details'] }}</p>
    @endif

    <p><strong>Services demandés:</strong></p>
    <ul>
    @foreach($data['services'] as $service)
        <li>{{ $service }}</li>
    @endforeach
    </ul>

    <p style="margin-top: 20px;">
        <em>Cet email a été envoyé automatiquement, merci de ne pas y répondre.</em>
    </p>
</body>
</html>
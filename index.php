<?php
// Incluye el archivo de configuración
$enlaces = [
    [
        'titulo' => 'Canal Publico',
        'url' => 'https://www.instagram.com/miusuario',
		'ico' => 'fab fa-telegram',
    ],
    [
        'titulo' => 'Ingreso VIP',
        'url' => 'https://www.youtube.com/c/miusuario',
		'ico' => 'fas fa-crown',
    ],
    [
        'titulo' => 'GreñitasTrader',
        'url' => 'https://www.miwebsite.com',
		'ico' => 'fas fa-chart-line',
    ],
    [
        'titulo' => 'JulianTrader',
        'url' => 'mailto:miemail@dominio.com',
		'ico' => 'fas fa-chart-line',
    ],
    [
        'titulo' => 'AndryTrader',
        'url' => 'https://github.com/miusuario',
		'ico' => 'fas fa-chart-line',
    ],
	[
        'titulo' => 'YovannyTrader',
        'url' => 'https://www.instagram.com/miusuario',
		'ico' => 'fas fa-chart-line',
    ],
	
];

// Obtener el parámetro "Trader" de la URL
$traderParam = isset($_GET['Trader']) ? $_GET['Trader'] : '';

// Definir los enlaces referidos para cada Trader
$enlacesReferidos = [
    'AndryTrader' => 'https://binomo-r3.com/promo/l28?a=ef679091c487&t=3&ac=Andry_trader&sa=Tg_Channel',
    'JulianTrader' => 'https://binomo-r3.com/promo/l28?a=ef679091c487&t=3&ac=Julian_Trader&sa=Tg_Channel'
    'GreñitasTrader' => 'https://binomo-r3.com/promo/l28?a=ef679091c487&t=3&ac=Mynor_Trader&sa=Tg_Channel'
];

// Reorganizar los enlaces si el parámetro "Trader" coincide con un título en el array
if ($traderParam) {
    // Si el Trader es uno de los que tiene un enlace referido, agregarlo al enlace de "Ingreso VIP"
    foreach ($enlaces as $index => $enlace) {
        if ($enlace['titulo'] === 'Ingreso VIP') {
            // Modificar el enlace de "Ingreso VIP" con el enlace referido
            if (array_key_exists($traderParam, $enlacesReferidos)) {
                $enlaces[$index]['url'] = $enlacesReferidos[$traderParam];
            }
            break;
        }
    }
}

// Reorganizar los enlaces si el parámetro "Trader" coincide con un título en el array
if ($traderParam) {
    // Encontrar el índice del enlace que coincide con el parámetro "Trader"
    $foundIndex = -1;
    foreach ($enlaces as $index => $enlace) {
        if ($enlace['titulo'] === $traderParam) {
            $foundIndex = $index;
            break;
        }
    }

    // Si encontramos el enlace, lo movemos al inicio
    if ($foundIndex !== -1) {
        $firstTrader = $enlaces[$foundIndex];
        unset($enlaces[$foundIndex]);
        array_unshift($enlaces, $firstTrader); // Mover al primer lugar
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Linktree</title>
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="profile">
            <img src="profile.png" width="200" alt="Foto de perfil" class="profile-img">
            <h1>Impulse Trading</h1>
			<p>Bienvenido al  Verdadero impulso que necesitas  como trader.</p>
        </div>
        
        <div class="links">
           <?php foreach ($enlaces as $enlace): ?>
                <div class="link">
                    <a href="<?php echo $enlace['url']; ?>" target="_blank">
                        <i class="<?php echo $enlace['ico']; ?>"></i> <?php echo $enlace['titulo']; ?>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>

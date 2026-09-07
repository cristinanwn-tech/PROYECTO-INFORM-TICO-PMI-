<?php
$pantalla = $_POST['pantalla'] ?? '';
$accion = $_POST['accion'] ?? '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($accion === 'C') {
        $pantalla = '';
    } elseif ($accion === '=') {
        if (!empty($pantalla)) {
            if (preg_match('/\/0(?!\d)/', $pantalla)) {
                $error = 'Error: Div / 0';
            } else {
                try {
                    $pantalla = (string) eval("return $pantalla;");
                } catch (Throwable $t) {
                    $error = 'Error de sintaxis';
                }
            }
        }
    } else {
        $pantalla .= $accion;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calculadora Móvil</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f0f2f5; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .calc { background: #17171c; width: 280px; padding: 20px; border-radius: 20px; box-shadow: 0 8px 20px rgba(0,0,0,0.3); }
        .pantalla { width: 100%; height: 50px; background: transparent; color: #fff; border: none; text-align: right; font-size: 2rem; outline: none; }
        .error { color: #ff4d4d; font-size: 0.8rem; text-align: right; height: 15px; }
        .grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 10px; margin-top: 10px; }
        button { height: 55px; border-radius: 50%; border: none; font-size: 1.2rem; font-weight: bold; cursor: pointer; color: #fff; }
        .num { background: #2e2f38; }
        .op { background: #4b5ebb; }
        .cero { grid-column: span 2; border-radius: 30px; text-align: left; padding-left: 20px; }
    </style>
</head>
<body>
    <main class="calc">
        <form method="POST">
            <div class="error"><?php echo htmlspecialchars($error); ?></div>
            <input type="text" name="pantalla" class="pantalla" value="<?php echo htmlspecialchars($pantalla); ?>" readonly>
            
            <div class="grid">
                <button type="submit" name="accion" value="C" style="background:#c62828">C</button>
                <button type="submit" name="accion" value="/" class="op">÷</button>
                <button type="submit" name="accion" value="*" class="op">×</button>
                <button type="submit" name="accion" value="-" class="op">-</button>

                <?php 
                $botones = ['7','8','9','+','4','5','6','=','1','2','3'];
                foreach ($botones as $btn): 
                    $clase = is_numeric($btn) ? 'num' : ($btn === '=' ? 'op' : 'op');
                    $estilo = ($btn === '=') ? 'style="grid-row: span 2; height: 100%; border-radius: 30px; background:#2e7d32"' : '';
                ?>
                    <button type="submit" name="accion" value="<?php echo $btn; ?>" class="<?php echo $clase; ?>" <?php echo $estilo; ?>><?php echo $btn; ?></button>
                <?php endforeach; ?>

                <button type="submit" name="accion" value="0" class="num cero">0</button>
                <button type="submit" name="accion" value="." class="num">.</button>
            </div>
        </form>
    </main>
</body>
</html>
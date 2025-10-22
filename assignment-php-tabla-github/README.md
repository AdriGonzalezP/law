# Tarea PHP — Tablas (Actividades 1–3)

Este repositorio contiene las tres actividades del ejercicio *Implantació d'Aplicacions Web — PHP*.

## Archivos

| Archivo | Descripción |
|----------|-------------|
| `tabla1.php` | Actividad 1 — Tabla estática (n=50–60, divisores 1–10). |
| `tabla1.html` | Formulario de entrada (Actividad 2). |
| `tabla2.php` | Actividad 2 — Tabla dinámica según los rangos del formulario. |
| `recupera.php` | Función `recupera()` separada. |
| `tabla3.php` | Actividad 3 — Igual que la 2, pero con `include('recupera.php')`. |
| `index.php` | Página de inicio con enlaces rápidos. |

## Cómo ejecutar en LAMP o XAMPP

1. Copia esta carpeta al directorio web (`/var/www/html/php-tabla` o `C:\xampp\htdocs\php-tabla`).
2. Asegúrate de que Apache y PHP estén activos.
3. Abre en tu navegador:

   ```
   http://localhost/php-tabla/
   ```

4. Desde ahí puedes entrar en cada actividad o usar el formulario.

## Cómo subir a GitHub

```bash
git init
git add .
git commit -m "Tarea PHP tablas"
git branch -M main
git remote add origin https://github.com/<tu-usuario>/<tu-repo>.git
git push -u origin main
```

## Autor

Tarea generada con ayuda de ChatGPT (GPT‑5) para prácticas educativas.

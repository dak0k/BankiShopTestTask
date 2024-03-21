## Как запустить проект через Docker
<ol>
    <li>Создать .env файл данные для него скопируйте из .env.example</li>
    <li><code>docker compose up -d</code></li>
    <li><code>docker exec -it project_app bash</code></li>
    <li><code>composer install</code></li>
    <li><code>php artisan key:generate</code></li>
    <li><code>php artisan migrate</code></li>
    <li><code>php artisan cache:clear</code> "Не обязательно"</li>
    <li><code>php artisan route:clear</code>  "Не обязательно"</li>
    <li><code>php artisan storage:link</code></li>

</ol>

## Тестовые фотографий можете взять из папки "public/test-images"
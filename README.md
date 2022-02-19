```bash
docker-compose up -d
```

Создание миграции
```bash
cd app && vendor/bin/doctrine orm:schema-tool:create
```

Приложение
http://localhost:8080/

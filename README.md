```bash
docker-compose up -d

crate migrations
cd app && vendor/bin/doctrine orm:schema-tool:create
```
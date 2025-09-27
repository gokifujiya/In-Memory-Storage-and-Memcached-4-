# In-Memory Storage and Memcached (Step 4)

This project demonstrates integrating **Memcached** as an in-memory storage layer alongside MySQL in a PHP application.

## Features
- Multiple DAO implementations (`MySQL` and `Memcached`)
- Static `DAOFactory` to switch between drivers
- Memcached caching layer using JSON encoding
- Routes for creating, updating, and retrieving `ComputerPart` objects
- Configurable via `.env` (`DATABASE_DRIVER`, `MEMCACHED_HOST`, `MEMCACHED_PORT`)

## Setup
1. Clone this repository:
   ```bash
   git clone git@github.com:gokifujiya/In-Memory-Storage-and-Memcached-4-.git
   cd In-Memory-Storage-and-Memcached-4-

2. Copy .env.example → .env and set your configs.

3. Start Memcached:
   ```bash
   sudo systemctl start memcached

4. Run PHP local server:
   ```bash
   php -S 127.0.0.1:8000 -t public

5. Test routes:
- http://127.0.0.1:8000/update/part → create/update parts
- http://127.0.0.1:8000/random/part → get a random part
- http://127.0.0.1:8000/parts?id={ID} → fetch a part by ID

## Notes
- In Memcached mode, IDs are based on cache stats, not MySQL auto-increment.
- Switching .env to DATABASE_DRIVER=mysql restores MySQL-backed storage.

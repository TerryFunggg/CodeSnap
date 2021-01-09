# Desc
Very Basic php env(php + apache + mysql) using in docker. There're two networks for two containers, one is frontend using php and apache, other one is backend for mysql DB. And the apache server will across two containers, which you can see all the detail in `docker-compose.yml`.

Feel free to change any things.

Remember, you should change the ip address for backend containers, it should select a private ip address on production.



# Run in Dokcer
```
docker-compose up
```

# Access db
The MySQL Workbench is recommended.
The host will be localhost:3306 by default.

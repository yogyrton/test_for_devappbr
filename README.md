# Порядок работы

- composer install
- npm install
- php artisan key:generate
- php artisan migrate --seed


## Создать .env (добавить бд и изменить почтовые данные)

- при регистрации нового пользователя приходит условный email с данными нового пользователя админу

- админ (Логин: admin@mail.ru, пароль: 11111)

- мои локальные настройки .env для почты
  MAIL_MAILER=smtp
  MAIL_HOST=localhost
  MAIL_PORT=25

- тестировал с помощью этого https://toolheap.com/test-mail-server-tool/


## Функционал

### По админ панели

- полный CRUD по категориям, с возможностью редактирования, удаления и т.д.

- полный CRUD по товарам, с возможностью редактирования, удаления и т.д.

- возможность обновления цены и остатка с помощью вручную у товара

- пользователям CRUD не реализовывал, там в принципе тоже самое, чисто вывел визуал по ним

### По пользовательской части с версткой особо не заморачивался :)

- миграции, фабрики и сиды для создания пользователей, категорий и товаров к ним

- регистрация / авторизация пользователей с отправкой почты через событие и слушателя

- вывод продуктов с подробной фильтрацией по категориям, ценам, названию и т.д.

- личный кабинет с возможностью редактирования, все данные не добавлял чтобы не тратить время

- страница товара с выводом сообщения, возможность оставить 1 пользователю только одно сообщение на конкретный товар

- корзину уже делать не стал ввиду других дел, на все ушло часов 10-11. но много времени ушло на работу с версткой

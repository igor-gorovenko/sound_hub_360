# sound_hub_360

Проект каталог звуков. Можем выбрать категорию, и воспроизвести все звуки, регулировать громкость

## Функции

- Выбор категории
- Регулировка громкости

## Getting Started

#### 1. Clone this repository:

```
git clone git@github.com:igor-gorovenko/sound_hub_360.git
```

Переходим в скопированный проект, в корневую папку

```
cd sound_hub_360
```

#### 2. Install dependencies:

Устанавливаем composer

```
composer install
```

Копируем .env.example и меняем имя: .env

Генерируем APP_KEY в .env файле

```
php artisan key:generate
```

Устанавливаем npm

```
npm install
```

Выполняем миграции

```
php artisan migrate
```

#### 3. Добавляем звуки в проект

Создаем папку sounds в storage

```
mkdir -p storage/app/public/sounds
```

Создаем символьную ссылку

```
php artisan storage:link
```

Распаковываем архив и добавляем звуки в папку

```
unzip sounds_for_hub.zip -d storage/app/public/sounds -x "__MACOSX/*"
```

#### 4. Генерируем данные

```
php artisan db:seed
```

#### 5. Запускаем проект

Запустить сервер с помощью artisan или своим способом

```
php artisan serve
```
# TOI-MEME

Applicazione web e-commerce sviluppata con Laravel 11, Livewire 3 e Filament per la gestione di ordini e prodotti.

## 📋 Requisiti di Sistema

Prima di iniziare, assicurati di avere installato:

-   **PHP** >= 8.2
-   **Composer** (ultima versione)
-   **Node.js** >= 18.x e **npm**
-   **PostgreSQL** >= 13 (o MySQL 8.0 se preferisci)
-   **Git**

## 🚀 Installazione

### 1. Estrai l'Archivio del Progetto

Estrai il file ZIP del progetto in una directory di tua scelta:

```bash
unzip toi-meme.zip
cd toi-meme
```

### 2. Installa le Dipendenze PHP

```bash
composer install
```

### 3. Installa le Dipendenze JavaScript

```bash
npm install
```

### 4. Configura il File di Ambiente

Copia il file `.env.example` e rinominalo in `.env`:

```bash
cp .env.example .env
```

Modifica il file `.env` con le tue configurazioni:

```env
APP_NAME="TOI-MEME"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost

# Database Configuration
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=toi_meme
DB_USERNAME=your_username
DB_PASSWORD=your_password

# Mail Configuration (opzionale per development)
MAIL_MAILER=log
```

### 5. Genera la Chiave dell'Applicazione

```bash
php artisan key:generate
```

### 6. Crea il Database

Crea un database PostgreSQL chiamato `toi_meme` (o il nome che hai specificato nel file `.env`):

```bash
# Usando psql
createdb toi_meme

# Oppure tramite client PostgreSQL
```

### 7. Esegui le Migrazioni

```bash
php artisan migrate
```

Se vuoi popolare il database con dati di esempio:

```bash
php artisan db:seed
```

### 8. Crea il Link Simbolico per lo Storage

```bash
php artisan storage:link
```

### 9. Compila gli Asset Frontend

Per development:

```bash
npm run dev
```

Per production:

```bash
npm run build
```

## 🏃 Avvio del Progetto

### Metodo 1: Comando Composer (Consigliato per Development)

Questo comando avvia simultaneamente server, queue worker, logs e Vite:

```bash
composer dev
```

Questo eseguirà in parallelo:

-   Server Laravel (http://localhost:8000)
-   Queue worker
-   Log viewer (Pail)
-   Vite dev server (hot reload)

### Metodo 2: Comandi Separati

In terminali separati, esegui:

```bash
# Terminal 1 - Server Laravel
php artisan serve

# Terminal 2 - Vite (per hot reload CSS/JS)
npm run dev

# Terminal 3 - Queue Worker (opzionale)
php artisan queue:listen

# Terminal 4 - Logs (opzionale)
php artisan pail
```

L'applicazione sarà disponibile su: **http://localhost:8000**

## 📁 Struttura del Progetto

```
toi-meme/
├── app/
│   ├── Actions/          # Business logic e azioni
│   ├── Enum/            # Enumerazioni
│   ├── Filament/        # Admin panel Filament
│   ├── Http/            # Controllers e Middleware
│   ├── Livewire/        # Componenti Livewire (Frontend)
│   │   ├── Components/  # Componenti riutilizzabili
│   │   └── Pages/       # Pagine dell'applicazione
│   ├── Models/          # Eloquent Models
│   └── Services/        # Servizi applicativi
├── config/              # File di configurazione
├── database/
│   ├── migrations/      # Migrazioni database
│   ├── seeders/         # Seeders
│   └── factories/       # Factory per test
├── public/              # File pubblici (entry point)
├── resources/
│   ├── css/            # File CSS
│   ├── js/             # File JavaScript
│   └── views/          # Template Blade
├── routes/              # Definizione routes
└── storage/             # File generati e logs
```

## 🎨 Modificare il Frontend

### Dove Trovare i File Frontend

Il frontend dell'applicazione è costruito principalmente con **Livewire 3**, **Blade** e **Tailwind CSS**. Ecco dove trovare i file da modificare:

#### 1. **Componenti Livewire** (`app/Livewire/`)

I componenti Livewire gestiscono la logica e l'interattività delle pagine:

-   **Pagine**: `app/Livewire/Pages/`

    -   `Home.php` - Homepage
    -   `Products.php` - Lista prodotti
    -   `Product.php` - Dettaglio prodotto
    -   `Cart.php` - Carrello
    -   `Login.php` - Login
    -   `Registration.php` - Registrazione
    -   `OrderList.php` - Lista ordini
    -   `Contacts.php` / `ContactsV2.php` - Pagina contatti
    -   `About.php` - Chi siamo
    -   `EditProfile.php` - Modifica profilo

-   **Componenti**: `app/Livewire/Components/`
    -   `MainMenu.php` - Menu principale

#### 2. **Template Blade** (`resources/views/`)

I template Blade definiscono la struttura HTML:

-   **Livewire Views**: `resources/views/livewire/`

    -   `pages/` - Template delle pagine Livewire
    -   `components/` - Template dei componenti Livewire

-   **Componenti Blade**: `resources/views/components/`
    -   `layouts/` - Layout principali dell'applicazione
    -   `sections/` - Sezioni riutilizzabili
    -   `icons/` - Icone SVG
    -   `utilities/` - Utility components

#### 3. **Stili CSS** (`resources/css/`)

-   `resources/css/app.css` - File CSS principale (Tailwind CSS)

Per modificare gli stili:

-   Usa le classi Tailwind direttamente nei template Blade
-   Aggiungi CSS personalizzato in `app.css` se necessario

#### 4. **JavaScript** (`resources/js/`)

-   `resources/js/app.js` - Entry point JavaScript
-   `resources/js/bootstrap.js` - Configurazione Axios e librerie

#### 5. **Configurazione Tailwind CSS**

-   `tailwind.config.js` - Configurazione Tailwind (colori, font, breakpoint, ecc.)
-   `postcss.config.js` - Configurazione PostCSS

#### 6. **Configurazione Vite**

-   `vite.config.js` - Configurazione del build tool Vite

### Workflow per Modifiche Frontend

1. **Modifica un componente Livewire**:

    - Logica PHP: `app/Livewire/Pages/NomeComponente.php`
    - Template: `resources/views/livewire/pages/nome-componente.blade.php`

2. **Modifica gli stili**:

    - Usa classi Tailwind nei file `.blade.php`
    - Oppure aggiungi CSS custom in `resources/css/app.css`

3. **Vedi le modifiche in tempo reale**:

    - Assicurati che `npm run dev` sia in esecuzione
    - Vite farà hot reload automatico delle modifiche

4. **Build per produzione**:
    ```bash
    npm run build
    ```

## 🛠️ Stack Tecnologico

### Backend

-   **Laravel** 11.44.7 - Framework PHP
-   **Livewire** 3.6.4 - Framework full-stack reattivo
-   **Filament** 3.3+ - Admin panel
-   **Laravel Fortify** 1.25.4 - Autenticazione
-   **PostgreSQL** - Database

### Frontend

-   **Tailwind CSS** 4.0.7 - Framework CSS utility-first
-   **Livewire Flux** 2.6.0 - Componenti UI
-   **Vite** 6.0.2 - Build tool e dev server
-   **Axios** - HTTP client

## 📝 Comandi Utili

### Artisan

```bash
# Pulire cache
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Creare un nuovo componente Livewire
php artisan make:livewire NomeComponente

# Creare una migration
php artisan make:migration create_table_name

# Formattare il codice (Laravel Pint)
./vendor/bin/pint

# Visualizzare le route
php artisan route:list

# Accedere a Tinker (REPL)
php artisan tinker
```

### NPM

```bash
# Development con hot reload
npm run dev

# Build per produzione
npm run build
```

## 🐳 Docker (Opzionale)

Il progetto include una configurazione Docker Compose con Laravel Sail:

```bash
# Avvia i container
./vendor/bin/sail up -d

# Esegui comandi Artisan
./vendor/bin/sail artisan migrate

# Esegui comandi npm
./vendor/bin/sail npm run dev
```

## 📄 Licenza

Questo progetto è proprietario.

## 👥 Supporto

Per supporto o domande, contatta il team di sviluppo.

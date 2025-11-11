# 🚀 Starter Kit v1.1 - Laravel 12

> **Base empresarial completa** para desarrollo rápido de sitios web profesionales para agencias.

[![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=flat&logo=laravel)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.3+-777BB4?style=flat&logo=php)](https://php.net)
[![Livewire](https://img.shields.io/badge/Livewire-3.x-FB70A9?style=flat)](https://livewire.laravel.com)
[![Tailwind](https://img.shields.io/badge/Tailwind-3.4-38B2AC?style=flat&logo=tailwind-css)](https://tailwindcss.com)
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)

---

## 📋 Índice

- [🎯 Descripción](#-descripción)
- [✨ Características](#-características)
- [🗂️ Arquitectura](#️-arquitectura)
- [🚀 Instalación Rápida](#-instalación-rápida)
- [📦 Módulos Incluidos](#-módulos-incluidos)
- [🎯 Roadmap](#-roadmap)
- [📚 Documentación](#-documentación)
- [🤝 Contribución](#-contribución)

---

## 🎯 Descripción

**Starter Kit v1.1** es una base empresarial completa construida sobre Laravel 12.x, diseñada específicamente para **agencias web** que necesitan:

✅ **Acelerar desarrollo** - 50% menos tiempo por proyecto  
✅ **Mantener calidad** - Arquitectura DDD probada  
✅ **Escalar fácilmente** - Estructura modular extensible  
✅ **Entregar rápido** - Setup completo en 5 minutos

### 🎨 Ideal para:

- **Agencias web** con múltiples proyectos cliente
- **Estudios de diseño** que necesitan backend robusto
- **Freelancers** que valoran código profesional
- **Startups** que buscan time-to-market rápido

---

## ✨ Características

### ⚡ Stack Tecnológico
```
Backend:  Laravel 12.x + PHP 8.3
Frontend: Livewire 3.x + Alpine.js 3.x + Tailwind CSS 3.4
Database: MySQL 8.0+ / PostgreSQL 13+
Cache:    Redis (recomendado)
Assets:   Vite 5.x
Testing:  Pest 3.x + PHPStan
```

---

### 🛠️ Funcionalidades Core

#### ✅ Backend Completo
- **9 módulos CRUD** funcionando out-of-the-box
- **Panel admin** con Livewire (Filament opcional)
- **Roles y permisos** (Spatie Permission)
- **Media management** con optimización de imágenes
- **Activity log** para auditoría

#### ✅ Frontend Público
- **Diseño responsive** mobile-first
- **Vistas Blade** optimizadas y reutilizables
- **Componentes Alpine.js** para interactividad
- **SEO dinámico** 100% configurable desde admin
- **Sitemap.xml** generado automáticamente

#### ✅ Performance & SEO
- **Eager loading** en todos los controllers
- **Settings cache** (24h TTL)
- **Lazy loading** de imágenes
- **Schema.org** markup automático
- **Meta tags** dinámicas desde admin

#### ✅ Developer Experience
- **Comandos starter** (install, enable, disable, status)
- **Arquitectura DDD** clara y escalable
- **Testing setup** con Pest
- **PHPStan** configurado (nivel 5)
- **Laravel Pint** para code style

---

## 🗂️ Arquitectura

### 📁 Estructura del Proyecto
```
agency-starter-kit/
├── 📂 app/
│   ├── 📂 Domain/              # Lógica de negocio (DDD)
│   │   ├── 📂 Common/          # Código compartido
│   │   │   ├── Services/       # BaseCrudService
│   │   │   └── Traits/         # HasSlug, HasPublishedScope
│   │   ├── 📂 Services/        # Módulo de servicios
│   │   ├── 📂 Portfolio/       # Módulo de portfolio
│   │   ├── 📂 Blog/            # Módulo de blog
│   │   ├── 📂 Pages/           # Módulo de páginas
│   │   ├── 📂 Contact/         # Módulo de contacto
│   │   ├── 📂 Users/           # Gestión de usuarios
│   │   └── 📂 Settings/        # Settings del sistema
│   │
│   ├── 📂 Http/                # Controllers y Middleware
│   │   ├── Controllers/
│   │   │   ├── Admin/          # Panel admin
│   │   │   └── Frontend/       # Sitio público
│   │   └── Requests/           # Form requests
│   │
│   ├── 📂 Livewire/            # Componentes Livewire
│   └── 📂 Support/             # Helpers y utilidades
│       ├── MenuRegistry.php    # Menú dinámico admin
│       └── SEO/                # Sistema SEO
│
├── 📂 database/
│   ├── migrations/             # Esquemas completos
│   └── seeders/                # Datos de ejemplo
│
├── 📂 resources/
│   ├── views/
│   │   ├── admin/              # Vistas admin
│   │   ├── frontend/           # Vistas públicas
│   │   └── layouts/            # Layouts principales
│   └── css/                    # Estilos Tailwind
│
├── 📂 tests/                   # Suite de testing (Pest)
├── 📂 docs/                    # Documentación
│
├── SETUP_NEW_PROJECT.md        # Guía completa de uso
└── TODO.md                     # Roadmap y pendientes
```

---

### 🎯 Principios de Diseño

**1. Domain-Driven Design (DDD)**
- Cada módulo en su propio dominio
- Separación clara de responsabilidades
- Código reutilizable con `Domain/Common`

**2. Modularidad**
- Agregar módulos sin modificar core
- Features opcionales con flags
- Fácil extender y mantener

**3. Performance First**
- Eager loading en relaciones
- Cache inteligente de settings
- Optimización de queries

**4. Developer Friendly**
- Comandos artisan útiles
- Testing setup incluido
- Documentación completa

---

## 🚀 Instalación Rápida

### 📋 Requisitos
```bash
✅ PHP 8.3+
✅ Composer 2.x
✅ Node.js 20+
✅ MySQL 8.0+ / PostgreSQL 13+
✅ Git
```

---

### ⚡ Setup en 5 minutos
```bash
# 1. Clonar repositorio
git clone https://github.com/Mardelherny-hub/agency-starter-kit.git proyecto-cliente
cd proyecto-cliente

# 2. Instalar dependencias
composer install
npm install

# 3. Configurar entorno
cp .env.example .env
php artisan key:generate

# 4. Configurar .env
# Editar DB_DATABASE, DB_USERNAME, DB_PASSWORD

# 5. Instalar starter kit (migra, seedea, links, cache)
php artisan starter:install --seed

# 6. Compilar assets
npm run build

# 7. Levantar servidor
php artisan serve
```

**🎉 Listo! Visita:**
- **Frontend:** http://localhost:8000
- **Admin:** http://localhost:8000/admin
  - Email: `admin@starter.local`
  - Password: `password`

**⚠️ Cambiar credenciales inmediatamente en producción**

---

### 🎛️ Comandos Disponibles
```bash
# Ver estado de features
php artisan starter:status

# Habilitar features opcionales (cuando estén desarrolladas)
php artisan starter:enable newsletter
php artisan starter:enable testimonials

# Deshabilitar features
php artisan starter:disable newsletter

# Reinstalar todo
php artisan starter:install --fresh --seed
```

---

## 📦 Módulos Incluidos

### ✅ Módulos Core (100% Funcionales)

| Módulo | Descripción | Admin | Frontend |
|--------|-------------|-------|----------|
| **🏠 Home** | Homepage configurable | ✅ | ✅ |
| **⚙️ Services** | Servicios con featured | ✅ CRUD | ✅ Listado + Detalle |
| **💼 Portfolio** | Proyectos + Categorías + Galería | ✅ CRUD | ✅ Filtros + Detalle |
| **📝 Blog** | Posts + Categorías + Editor Trix | ✅ CRUD | ✅ Listado + Artículo |
| **📄 Pages** | Páginas estáticas dinámicas | ✅ CRUD | ✅ Slug dinámico |
| **📧 Contact** | Formulario + Mensajes | ✅ Gestión | ✅ Form Livewire |
| **👥 Users** | Usuarios + Roles + Permisos | ✅ CRUD | - |
| **⚙️ Settings** | Configuración global + SEO | ✅ Panel | - |
| **🔍 SEO** | Meta tags + Schema.org + Sitemap | ✅ Automático | ✅ Todas páginas |

---

### 🟡 Features en Infraestructura (NO Desarrolladas Aún)

Estos módulos tienen la **infraestructura de comandos** lista pero **NO están desarrollados**:

| Feature | Estado | ETA | Descripción |
|---------|--------|-----|-------------|
| Newsletter | 🟡 Infraestructura | Q1 2026 | Suscripciones + Gestión |
| Testimonials | 🟡 Infraestructura | Q1 2026 | Reseñas de clientes |
| Team | 🟡 Infraestructura | Q1 2026 | Equipo de la empresa |
| FAQs | 🟡 Infraestructura | Q1 2026 | Preguntas frecuentes |
| Multi-language | 🟡 Infraestructura | Q2 2026 | Soporte i18n completo |

**Nota:** Puedes ver estas features con `php artisan starter:status`, pero al habilitarlas NO se agregará funcionalidad hasta que sean desarrolladas.

---

## 🎯 Roadmap

### 📅 Q1 2026 - Módulos Básicos

**Prioridad:** Alta  
**Tiempo:** ~10 días

- [ ] **Newsletter Module** (3 días)
  - CRUD de suscriptores
  - Formulario público Livewire
  - Export CSV/Excel
  
- [ ] **Testimonials Module** (3 días)
  - CRUD de testimonios
  - Vista pública con slider
  - Schema.org markup
  
- [ ] **FAQs Module** (2 días)
  - CRUD con categorías
  - Accordion público
  - Search functionality
  
- [ ] **Team Module** (2 días)
  - CRUD de miembros
  - Vista "Nuestro Equipo"
  - Social links

---

### 📅 Q2 2026 - E-commerce Foundation

**Prioridad:** Crítica (para monetización)  
**Tiempo:** ~40 días

- [ ] **Products Catalog** (7 días)
  - CRUD productos + categorías
  - Variantes (talla, color)
  - Stock management básico
  - Filtros y búsqueda
  
- [ ] **Shopping Cart** (10 días)
  - Cart Livewire component
  - Add/Update/Remove items
  - Cálculo de totales
  - Cupones básicos
  
- [ ] **Checkout & Orders** (14 días)
  - Multi-step checkout
  - Shipping/Billing forms
  - Order management admin
  - Email confirmación
  - Invoice PDF
  
- [ ] **MercadoPago Gateway** (10 días)
  - SDK integration
  - Checkout Pro/API
  - Webhooks
  - Testing sandbox

---

### 📅 Q3 2026 - E-commerce Advanced

**Prioridad:** Media  
**Tiempo:** ~30 días

- [ ] **Reviews & Ratings** (5 días)
- [ ] **Shipping Management** (10 días)
- [ ] **Coupons & Discounts** (7 días)
- [ ] **Analytics Dashboard** (7 días)

---

### 📅 Q4 2026 - Expansion

**Prioridad:** Media-Baja  
**Tiempo:** ~32 días

- [ ] **Multi-language completo** (7 días)
- [ ] **Customer Accounts** (5 días)
- [ ] **Inventory Management** (10 días)
- [ ] **Stripe Integration** (10 días)

---

### 🚀 Futuro (v2.0+)

- [ ] **Bookings/Appointments** - Para servicios
- [ ] **Memberships/Subscriptions** - Contenido premium
- [ ] **Live Chat** - Soporte en tiempo real
- [ ] **API RESTful** - Para mobile apps
- [ ] **Multi-vendor Marketplace** - Plataforma completa

**Ver roadmap completo:** [TODO.md](TODO.md)

---

## 📚 Documentación

### 📖 Guías Principales

| Documento | Descripción | Audiencia |
|-----------|-------------|-----------|
| **[SETUP_NEW_PROJECT.md](SETUP_NEW_PROJECT.md)** | Guía completa paso a paso | Todos |
| **[TODO.md](TODO.md)** | Roadmap detallado de módulos | Tech Leads |
| **docs/** *(próximamente)* | Arquitectura y módulos | Desarrolladores |

---

### 🎓 Quick Start por Perfil

#### 👨‍💻 Desarrollador
1. Leer [SETUP_NEW_PROJECT.md](SETUP_NEW_PROJECT.md) completo
2. Instalar según [Instalación Rápida](#-instalación-rápida)
3. Explorar código en `app/Domain/`
4. Revisar tests en `tests/`

#### 🎨 Diseñador
1. Seguir [Instalación Rápida](#-instalación-rápida)
2. Ver SETUP > Sección "Personalización de Marca"
3. Modificar `tailwind.config.js` para colores
4. Editar vistas en `resources/views/frontend/`

#### 👔 Project Manager
1. Leer este README completo
2. Revisar [Roadmap](#-roadmap) 
3. Ver [TODO.md](TODO.md) para estimaciones
4. Evaluar módulos necesarios por cliente

---

### 🛠️ Comandos Útiles
```bash
# Testing
./vendor/bin/pest                  # Ejecutar tests
./vendor/bin/pest --coverage       # Con coverage
./vendor/bin/phpstan analyse       # Análisis estático

# Code Quality
./vendor/bin/pint                  # Aplicar code style
./vendor/bin/pint --test           # Verificar sin aplicar

# Development
php artisan serve                  # Servidor local
npm run dev                        # Assets con hot reload
npm run build                      # Compilar para producción

# Maintenance
php artisan cache:clear            # Limpiar cache
php artisan config:clear           # Limpiar config cache
php artisan route:clear            # Limpiar route cache
php artisan view:clear             # Limpiar view cache

# Database
php artisan migrate:fresh --seed   # Resetear BD con datos
php artisan db:seed               # Solo ejecutar seeders
```

---

## 🧪 Testing

### Ejecutar Tests
```bash
# Todos los tests
./vendor/bin/pest

# Con coverage
./vendor/bin/pest --coverage --min=80

# Tests específicos
./vendor/bin/pest tests/Feature/ServiceTest.php
```

### Métricas de Calidad
```bash
# PHPStan - Análisis estático
./vendor/bin/phpstan analyse

# Laravel Pint - Code style
./vendor/bin/pint --test
```

**Objetivos:**
- ✅ **Test Coverage:** >80%
- ✅ **PHPStan:** Level 5+
- ✅ **Pint:** 100% compliance

---

## ⚙️ Configuración

### Variables de Entorno Principales
```env
# App
APP_NAME="Nombre Cliente"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://cliente.com

# Database
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_DATABASE=cliente_db
DB_USERNAME=root
DB_PASSWORD=

# Cache (Producción)
CACHE_STORE=redis
SESSION_DRIVER=redis
QUEUE_CONNECTION=redis

# Performance
RESPONSE_CACHE_ENABLED=true
RESPONSE_CACHE_LIFETIME=600
```

**Ver configuración completa:** [SETUP_NEW_PROJECT.md](SETUP_NEW_PROJECT.md#3️⃣-configuración-inicial)

---

### Personalizar para Cliente

1. **Logo y Branding**
   - Reemplazar `/public/images/logo.png`
   - Editar `tailwind.config.js` para colores

2. **Settings desde Admin**
   - Login → `/admin/settings`
   - Completar SEO, contacto, redes sociales

3. **Contenido Inicial**
   - Crear servicios, proyectos, posts
   - Configurar categorías

**Ver guía detallada:** [SETUP_NEW_PROJECT.md](SETUP_NEW_PROJECT.md)

---

## 🤝 Contribución

### 📝 Cómo Contribuir

1. Fork el repositorio
2. Crea una branch: `git checkout -b feature/nueva-feature`
3. Commit cambios: `git commit -m 'feat: agregar nueva feature'`
4. Push: `git push origin feature/nueva-feature`
5. Abre un Pull Request

### 📋 Guidelines

- ✅ Seguir **PSR-12** coding standards
- ✅ Escribir **tests** para nuevas features
- ✅ Usar **conventional commits**
- ✅ Actualizar **documentación**
- ✅ Pasar **PHPStan** y **Pint**

---

## 📊 Estadísticas del Proyecto
```
📁 Líneas de código:     ~15,000 (PHP)
🧪 Test coverage:        80%+
📦 Composer packages:    25+
🎨 NPM packages:         15+
📄 Archivos:             200+
🗂️ Módulos:              9 core
```

---

## 🏢 Casos de Uso

### ✅ Sitios Corporativos
- Website institucional
- Portfolio de servicios
- Blog corporativo
- Formulario de contacto

### ✅ Agencias Creativas
- Showcase de proyectos
- Team showcase
- Case studies
- Lead capture

### ✅ E-commerce (Futuro)
- Catálogo de productos
- Carrito de compras
- Checkout completo
- Gestión de órdenes

---

## 🎉 Créditos

Construido con ❤️ por **[Estudio Alcalde](https://estudioalclade.net)**

### 🙏 Agradecimientos

- **[Laravel](https://laravel.com)** - Framework excepcional
- **[Spatie](https://spatie.be)** - Paquetes de calidad superior
- **[Livewire](https://livewire.laravel.com)** - Simplicidad y poder
- **[Tailwind CSS](https://tailwindcss.com)** - Diseño moderno
- **[Alpine.js](https://alpinejs.dev)** - JavaScript minimalista
- **[Pest](https://pestphp.com)** - Testing elegante

---

## 📄 Licencia

Este proyecto está bajo la Licencia MIT - ver [LICENSE](LICENSE) para detalles.

---

## 📞 Contacto y Soporte
```
👨‍💻 Desarrollador: Víctor H. Alcalde
🏢 Agencia: Estudio Alclade
📧 Email: alcaldevictor1@gmail.com
🌐 Web: https://estudioalclade.net
📂 Repo: https://github.com/Mardelherny-hub/agency-starter-kit.git
```

---

## 💡 FAQ

### ¿Cuánto tiempo toma implementar un proyecto?

Con el Agency Starter Kit, un sitio corporativo completo se desarrolla en **5-10 días** vs 15-20 días desde cero.

### ¿Puedo usar esto en proyectos comerciales?

Sí, la licencia MIT permite uso comercial sin restricciones.

### ¿Cómo agrego un módulo nuevo?

Ver [TODO.md](TODO.md#-proceso-para-agregar-nuevo-módulo) para el proceso completo.

### ¿Incluye hosting?

No, pero incluye guía de deployment en [SETUP_NEW_PROJECT.md](SETUP_NEW_PROJECT.md#8️⃣-deploy-a-producción).

### ¿Hay soporte técnico?

Soporte comunitario vía GitHub Issues. Soporte premium disponible para agencias.

---

<div align="center">

**🚀 ¿Listo para acelerar tu desarrollo?**

[⭐ Star este proyecto](https://github.com/Mardelherny-hub/agency-starter-kit.git) • [📖 Documentación](SETUP_NEW_PROJECT.md) • 

**Construido con excelencia para agencias que valoran la calidad** ✨

</div>
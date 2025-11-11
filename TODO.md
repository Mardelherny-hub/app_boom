# 📋 TODO - Boom Starter Kit v1.1

**Última actualización:** 10 noviembre 2025  
**Estado:** 85% completo - Listo para producción con pendientes menores

---

## 🚨 CRÍTICO - Antes de usar en producción

### 1. Testing Completo
- [ ] Crear tests de features principales (Services, Projects, Posts)
- [ ] Tests de integración para flujos críticos
- [ ] Configurar snapshot testing para Livewire
- [ ] Verificar coverage mínimo 80%
- [ ] Ejecutar `./vendor/bin/pest --coverage`

**Comando rápido:**
```bash
php artisan make:test Feature/ServiceCrudTest
php artisan make:test Feature/BlogFlowTest
```

---

### 2. Response Cache (Opcional pero recomendado)
- [ ] Revisar conflicto con rutas admin
- [ ] Configurar exclusiones correctas
- [ ] Probar en staging antes de aplicar
- [ ] O DESINSTALAR si no se va a usar:
```bash
composer remove spatie/laravel-responsecache
```

---

### 3. Dashboard Cache
- [ ] Implementar cache de estadísticas en DashboardController
- [ ] TTL: 5 minutos
- [ ] Invalidar al crear/editar/eliminar contenido

**Código estimado:** ~30 líneas en DashboardController

---

## ⚙️ CONFIGURACIÓN INICIAL POR PROYECTO

### 1. Variables de entorno
```bash
# .env - Ajustar según proyecto cliente
APP_NAME="Nombre Cliente"
APP_URL=https://cliente.com

# SEO settings desde admin
# Logos en /public/images/
```

### 2. Branding
- [ ] Reemplazar `/public/images/logo.png`
- [ ] Reemplazar `/public/images/favicon.ico`
- [ ] Ajustar colores en `tailwind.config.js`

### 3. Settings iniciales
- [ ] Login admin → `/admin/settings`
- [ ] Completar todos los campos SEO
- [ ] Verificar metadata en páginas públicas

---

## 📚 DOCUMENTACIÓN

### 1. Docs por módulo (ALTA PRIORIDAD)
- [ ] Crear `/docs/modules/services.md`
- [ ] Crear `/docs/modules/portfolio.md`
- [ ] Crear `/docs/modules/blog.md`
- [ ] Crear `/docs/modules/pages.md`
- [ ] Crear `/docs/modules/contact.md`
- [ ] Crear `/docs/modules/seo.md`

**Template básico:**
```markdown
# Módulo [Nombre]

## Descripción
## Campos de BD
## Rutas
## Controladores
## Vistas
## Personalización
```

### 2. Docs generales
- [ ] `/docs/getting-started.md` - Instalación paso a paso
- [ ] `/docs/architecture.md` - Explicación DDD
- [ ] `/docs/deployment.md` - Deploy en producción
- [ ] `/docs/customization.md` - Cómo personalizar
- [ ] `/docs/creating-modules.md` - Guía para crear nuevos módulos

### 3. README principal
- [ ] Actualizar badges (tests, version)
- [ ] Screenshots del admin
- [ ] Video demo (opcional)

---

## 🔧 MEJORAS TÉCNICAS (NO BLOQUEANTES)

### 1. Lazy Loading de Imágenes
- [ ] Aplicar `<x-lazy-image>` en vistas cuando estén completas
- [ ] Archivos: `home.blade.php`, `blog/index.blade.php`, `portfolio/index.blade.php`

### 2. Telescope (Development)
```bash
composer require laravel/telescope --dev
php artisan telescope:install
php artisan migrate
```
- [ ] Configurar en `.env`: `TELESCOPE_ENABLED=true`
- [ ] Acceso solo en local/staging

### 3. Sentry (Production - Opcional)
```bash
composer require sentry/sentry-laravel
```
- [ ] Configurar DSN
- [ ] Testear envío de errores

---

## ✅ CHECKLIST PRE-ENTREGA CLIENTE

### Antes de entregar cualquier proyecto:
- [ ] Tests pasando al 100%
- [ ] PHPStan sin errores: `./vendor/bin/phpstan analyse`
- [ ] Pint aplicado: `./vendor/bin/pint`
- [ ] Seeders de producción creados (sin data de ejemplo)
- [ ] `.env.example` actualizado
- [ ] Backups automáticos configurados
- [ ] SSL activo y forzado
- [ ] Google Analytics/Tag Manager configurado
- [ ] Formularios testeados (emails llegando)
- [ ] Sitemap.xml generándose correctamente
- [ ] Robots.txt configurado
- [ ] Imágenes optimizadas (<200KB cada una)
- [ ] Performance Lighthouse >90

---

## 🎯 ROADMAP DE MÓDULOS

### Módulos Pendientes v1.2 (Básicos)

#### Newsletter Module
**Estado:** 🟡 Infraestructura lista, módulo NO desarrollado  
**Prioridad:** Media  
**Complejidad:** Baja (2-3 días)

**Incluye:**
- [ ] Migración `newsletters` table
- [ ] Modelo Newsletter con validaciones
- [ ] CRUD admin para gestionar suscriptores
- [ ] Formulario público de suscripción (Livewire)
- [ ] Export a CSV/Excel
- [ ] Integración con Brevo/Mailchimp (opcional)

**Valor para clientes:** Captar leads, email marketing básico

---

#### Testimonials Module
**Estado:** 🟡 Infraestructura lista, módulo NO desarrollado  
**Prioridad:** Media  
**Complejidad:** Baja (2-3 días)

**Incluye:**
- [ ] Migración `testimonials` table
- [ ] Modelo Testimonial (nombre, cargo, empresa, texto, foto, rating)
- [ ] CRUD admin completo
- [ ] Vista pública con slider/grid
- [ ] Featured testimonials para home
- [ ] Schema.org para rich snippets

**Valor para clientes:** Social proof, credibilidad

---

#### Team Module
**Estado:** 🟡 Infraestructura lista, módulo NO desarrollado  
**Prioridad:** Baja  
**Complejidad:** Baja (2 días)

**Incluye:**
- [ ] Migración `team_members` table
- [ ] Modelo TeamMember (nombre, cargo, bio, foto, socials)
- [ ] CRUD admin
- [ ] Vista pública "Nuestro Equipo"
- [ ] Order/sorting
- [ ] Integration con redes sociales

**Valor para clientes:** Humanizar la marca, mostrar expertise

---

#### FAQs Module
**Estado:** 🟡 Infraestructura lista, módulo NO desarrollado  
**Prioridad:** Media  
**Complejidad:** Baja (1-2 días)

**Incluye:**
- [ ] Migración `faqs` + `faq_categories` tables
- [ ] Modelo FAQ con categorías
- [ ] CRUD admin simple
- [ ] Vista pública con accordion
- [ ] Search en FAQs
- [ ] Schema.org FAQPage markup

**Valor para clientes:** Reducir consultas repetitivas, SEO

---

#### Multi-language (i18n)
**Estado:** 🟡 Infraestructura lista, módulo NO desarrollado  
**Prioridad:** Media  
**Complejidad:** Alta (5-7 días)

**Incluye:**
- [ ] Integración completa `spatie/laravel-translatable`
- [ ] Modelos traducibles (Posts, Projects, Services, Pages)
- [ ] Selector de idioma en frontend
- [ ] Admin: tabs por idioma en forms
- [ ] Middleware para locale detection
- [ ] Rutas con prefijo de idioma
- [ ] Fallback a idioma default

**Valor para clientes:** Mercados internacionales, SEO multi-región

---

### Módulos v1.3 (E-commerce Básico)

#### Products Catalog
**Estado:** ❌ No desarrollado  
**Prioridad:** Alta (para e-commerce)  
**Complejidad:** Media (5-7 días)

**Incluye:**
- [ ] Migraciones: `products`, `product_categories`, `product_images`
- [ ] Modelo Product (nombre, SKU, precio, stock, descripción, atributos)
- [ ] CRUD admin completo con galería
- [ ] Gestión de categorías jerárquicas
- [ ] Variantes de producto (talla, color, etc)
- [ ] Stock management básico
- [ ] Vista pública: listado con filtros
- [ ] Vista pública: detalle de producto
- [ ] SEO: Schema.org Product markup

**Valor:** Vender productos online (sin carrito aún)

---

#### Shopping Cart
**Estado:** ❌ No desarrollado  
**Prioridad:** Alta (depende de Products)  
**Complejidad:** Media-Alta (7-10 días)

**Incluye:**
- [ ] Migración `cart_items` (persistente o sesión)
- [ ] Livewire CartComponent
- [ ] Add to cart functionality
- [ ] Update quantities
- [ ] Remove items
- [ ] Cálculo de totales + impuestos
- [ ] Cupones de descuento básicos
- [ ] Carrito persistente (usuarios registrados)
- [ ] Mini-cart en header

**Valor:** Permitir compras, mejorar UX

---

#### Checkout & Orders
**Estado:** ❌ No desarrollado  
**Prioridad:** Alta (depende de Cart)  
**Complejidad:** Alta (10-14 días)

**Incluye:**
- [ ] Migraciones: `orders`, `order_items`, `order_statuses`
- [ ] Proceso de checkout multi-step
- [ ] Formulario de shipping/billing
- [ ] Selección de método de envío
- [ ] Cálculo de costos de envío
- [ ] Resumen de orden
- [ ] Confirmación de orden
- [ ] Email de confirmación
- [ ] Admin: gestión de órdenes
- [ ] Estados de orden (pending, processing, shipped, completed, cancelled)
- [ ] Invoice PDF generation

**Valor:** Completar flujo de venta

---

#### Payment Gateways
**Estado:** ❌ No desarrollado  
**Prioridad:** Crítica (para monetizar)  
**Complejidad:** Alta (10-15 días POR gateway)

**Gateways prioritarios para Argentina:**

##### MercadoPago
- [ ] Integración SDK MercadoPago
- [ ] Checkout Pro (redirect)
- [ ] Checkout API (on-site)
- [ ] Webhooks para notificaciones
- [ ] Manejo de estados de pago
- [ ] Refunds básicos
- [ ] Testing con credenciales sandbox

##### Stripe (internacional)
- [ ] Integración Stripe Checkout
- [ ] Payment Intents
- [ ] Webhooks
- [ ] Refunds
- [ ] Multi-currency support

##### Transferencia Bancaria
- [ ] Instrucciones de pago manual
- [ ] Upload de comprobante
- [ ] Verificación admin manual

**Valor:** Monetización real, cobrar por productos/servicios

---

### Módulos v1.4 (Avanzados)

#### Reviews & Ratings
**Estado:** ❌ No desarrollado  
**Prioridad:** Media  
**Complejidad:** Media (5 días)

**Incluye:**
- [ ] Migración `reviews` table
- [ ] Review de productos/servicios
- [ ] Rating con estrellas
- [ ] Moderación admin
- [ ] Likes/helpful votes
- [ ] Schema.org Review markup

---

#### Wishlist
**Estado:** ❌ No desarrollado  
**Prioridad:** Baja  
**Complejidad:** Baja (3 días)

**Incluye:**
- [ ] Migración `wishlists` table
- [ ] Add/remove de wishlist
- [ ] Vista de wishlist
- [ ] Share wishlist

---

#### Shipping Management
**Estado:** ❌ No desarrollado  
**Prioridad:** Media (para e-commerce físico)  
**Complejidad:** Alta (7-10 días)

**Incluye:**
- [ ] Migración: `shipping_zones`, `shipping_methods`
- [ ] Configuración de zonas geográficas
- [ ] Métodos de envío (flat rate, por peso, gratis)
- [ ] Integración con couriers (Correo Argentino, OCA, Andreani)
- [ ] Tracking de envíos
- [ ] Cálculo automático de costos

---

#### Inventory Management
**Estado:** ❌ No desarrollado  
**Prioridad:** Media  
**Complejidad:** Alta (10 días)

**Incluye:**
- [ ] Stock tracking avanzado
- [ ] Alertas de bajo stock
- [ ] Stock reservations (durante checkout)
- [ ] Multi-warehouse support
- [ ] Stock history/logs
- [ ] Reportes de inventario

---

#### Coupons & Discounts
**Estado:** ❌ No desarrollado  
**Prioridad:** Media  
**Complejidad:** Media (5-7 días)

**Incluye:**
- [ ] Migración `coupons` table
- [ ] Tipos: porcentaje, monto fijo, envío gratis
- [ ] Reglas: mínimo de compra, categorías, productos
- [ ] Fecha validez
- [ ] Límite de usos
- [ ] One-time / multi-use
- [ ] Admin CRUD de cupones

---

#### Analytics Dashboard
**Estado:** ❌ No desarrollado  
**Prioridad:** Alta (para e-commerce)  
**Complejidad:** Media-Alta (7 días)

**Incluye:**
- [ ] Dashboard de ventas (día, semana, mes, año)
- [ ] Top productos vendidos
- [ ] Revenue charts
- [ ] Conversión de carrito
- [ ] Métricas de clientes
- [ ] Export de reportes
- [ ] Integración con Google Analytics

---

#### Customer Accounts
**Estado:** ❌ No desarrollado  
**Prioridad:** Media  
**Complejidad:** Media (5 días)

**Incluye:**
- [ ] Registration público
- [ ] Login/Logout
- [ ] Perfil de usuario
- [ ] Order history
- [ ] Wishlist
- [ ] Addresses book
- [ ] Password reset

---

### Módulos v1.5+ (Nice to Have)

#### Bookings/Appointments
**Para:** Servicios con citas (médicos, peluquerías, abogados)  
**Complejidad:** Alta (14+ días)

---

#### Memberships/Subscriptions
**Para:** Contenido premium, SaaS básico  
**Complejidad:** Alta (14+ días)

---

#### Live Chat
**Para:** Soporte en tiempo real  
**Complejidad:** Alta (14+ días)

---

#### Advanced Search & Filters
**Para:** Catálogos grandes  
**Complejidad:** Media (7 días)

---

#### Notifications System
**Para:** Alertas in-app, emails, push  
**Complejidad:** Media (5-7 días)

---

#### Social Login
**Para:** Login con Google, Facebook, etc  
**Complejidad:** Media (3-5 días)

---

#### API RESTful
**Para:** Headless CMS, mobile apps  
**Complejidad:** Alta (10+ días)

---

#### Multi-vendor Marketplace
**Para:** Marketplace tipo MercadoLibre  
**Complejidad:** Muy Alta (30+ días)

---

## 📊 PRIORIZACIÓN RECOMENDADA

### Fase 1 (Q1 2026) - Módulos Básicos
1. **Newsletter** (3 días)
2. **FAQs** (2 días)
3. **Testimonials** (3 días)
4. **Team** (2 días)

**Total:** ~10 días de desarrollo

---

### Fase 2 (Q2 2026) - E-commerce Básico
1. **Products Catalog** (7 días)
2. **Shopping Cart** (10 días)
3. **Checkout & Orders** (14 días)
4. **MercadoPago Integration** (10 días)

**Total:** ~40 días de desarrollo

---

### Fase 3 (Q3 2026) - E-commerce Avanzado
1. **Reviews & Ratings** (5 días)
2. **Shipping Management** (10 días)
3. **Coupons & Discounts** (7 días)
4. **Analytics Dashboard** (7 días)

**Total:** ~30 días de desarrollo

---

### Fase 4 (Q4 2026) - Expansion
1. **Multi-language** (7 días)
2. **Customer Accounts** (5 días)
3. **Inventory Management** (10 días)
4. **Stripe Integration** (10 días)

**Total:** ~32 días de desarrollo

---

## 🎯 CRITERIOS DE PRIORIZACIÓN

### Alta Prioridad
- Módulo solicitado por 3+ clientes
- Impacto directo en revenue (payments, checkout)
- Mejora significativa de conversión

### Media Prioridad
- Solicitado por 1-2 clientes
- Mejora UX pero no crítico
- Módulo "nice to have"

### Baja Prioridad
- Solicitado por ningún cliente aún
- Funcionalidad muy específica
- Puede cubrirse con workarounds

---

## 📝 PROCESO PARA AGREGAR NUEVO MÓDULO

### 1. Planificación (1 día)
- [ ] Definir alcance del módulo
- [ ] Diseñar schema de base de datos
- [ ] Listar features incluidas
- [ ] Estimar tiempo de desarrollo

### 2. Desarrollo Backend (3-10 días)
- [ ] Crear migraciones
- [ ] Crear modelos con relaciones
- [ ] Crear Service (BaseCrudService)
- [ ] Crear Requests de validación
- [ ] Crear Controllers (admin + public)
- [ ] Definir rutas
- [ ] Escribir tests

### 3. Desarrollo Frontend (2-5 días)
- [ ] Crear vistas admin (CRUD)
- [ ] Crear vistas públicas
- [ ] Integrar con layout
- [ ] Aplicar estilos

### 4. Documentación (1 día)
- [ ] Crear `/docs/modules/{module}.md`
- [ ] Actualizar README
- [ ] Ejemplos de uso

### 5. Testing & QA (1-2 días)
- [ ] Tests unitarios
- [ ] Tests de feature
- [ ] Testing manual
- [ ] PHPStan sin errores

---

## 📞 SOPORTE

**Desarrollador:** Víctor H. Alcalde  
**Agencia:** Boom Studio  
**Repo:** [github.com/boom-studio/starter-kit]

---

## 📝 NOTAS

### Problemas conocidos
- Response Cache deshabilitado temporalmente (conflicto con admin)
- Lazy loading pendiente de aplicar en vistas

### Decisiones de arquitectura
- SoftDeletes activo en todos los modelos principales
- Settings cacheados 24h, invalidación manual al editar
- Eager loading aplicado en todos los controllers frontend
- Media Library para todas las imágenes
- Todos los módulos nuevos DEBEN seguir arquitectura DDD
- BaseCrudService para todos los CRUD

### Features listadas pero NO desarrolladas
Las siguientes features aparecen en `php artisan starter:status` pero **NO tienen módulos desarrollados**:
- ❌ newsletter
- ❌ testimonials
- ❌ team
- ❌ faqs
- ❌ multilang

Estos se desarrollarán progresivamente según roadmap.

---

**Última revisión:** 10/11/2025  
**Próxima revisión:** Cada trimestre o al agregar módulo nuevo
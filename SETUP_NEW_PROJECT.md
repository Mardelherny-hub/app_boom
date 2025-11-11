# 🚀 Guía Completa: Cómo Usar el Boom Starter Kit en un Nuevo Proyecto

**Boom Starter Kit v1.1** - Guía paso a paso para desarrolladores

---

## 📚 Índice

1. [Requisitos Previos](#requisitos-previos)
2. [Instalación Base](#instalación-base)
3. [Comandos Starter (Features)](#comandos-starter)
4. [Configuración Inicial](#configuración-inicial)
5. [Personalización de Marca](#personalización-de-marca)
6. [Crear Contenido Inicial](#crear-contenido-inicial)
7. [Personalizar Vistas](#personalizar-vistas)
8. [Deploy a Producción](#deploy-a-producción)
9. [Checklist Final](#checklist-final)

---

## 📋 Requisitos Previos

Antes de empezar, asegúrate de tener instalado:
```bash
✅ PHP 8.3 o superior
✅ Composer 2.x
✅ Node.js 20+ y NPM
✅ MySQL 8.0+ o PostgreSQL 13+
✅ Git
```

**Verificar versiones:**
```bash
php -v
composer -V
node -v
mysql --version
```

---

## 1️⃣ INSTALACIÓN BASE

### Paso 1: Clonar el repositorio
```bash
# Clonar el starter kit en una carpeta con el nombre del proyecto
git clone https://github.com/Mardelherny-hub/agency-starter-kit.git proyecto-cliente

# Entrar al directorio
cd proyecto-cliente
```

---

### Paso 2: Configurar Git para el nuevo proyecto
```bash
# Eliminar el remote del starter kit
git remote remove origin

# Agregar el remote del nuevo proyecto (crear repo primero en GitHub/GitLab)
git remote add origin https://github.com/studio/proyecto-cliente.git

# Verificar
git remote -v
```

---

### Paso 3: Instalar dependencias
```bash
# Dependencias PHP
composer install

# Dependencias JavaScript
npm install
```

**⏱️ Tiempo estimado:** 2-3 minutos

---

### Paso 4: Configurar variables de entorno
```bash
# Copiar el archivo de ejemplo
cp .env.example .env

# Generar la clave de la aplicación
php artisan key:generate
```

**Editar el archivo `.env` con los datos del proyecto:**
```env
# ============================================
# CONFIGURACIÓN BÁSICA
# ============================================
APP_NAME="Nombre Cliente"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://proyecto-cliente.test

# ============================================
# BASE DE DATOS
# ============================================
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=proyecto_cliente_db
DB_USERNAME=root
DB_PASSWORD=

# ============================================
# CACHE Y SESIONES (Development)
# ============================================
CACHE_STORE=database
SESSION_DRIVER=database
QUEUE_CONNECTION=sync

# ============================================
# PERFORMANCE (Development)
# ============================================
RESPONSE_CACHE_ENABLED=false
```

---

### Paso 5: Crear base de datos

**Opción A - Desde MySQL:**
```sql
CREATE DATABASE proyecto_cliente_db 
CHARACTER SET utf8mb4 
COLLATE utf8mb4_unicode_ci;
```

**Opción B - Desde Laravel:**
```bash
php artisan db:create proyecto_cliente_db
```

---

### Paso 6: Instalar el Starter Kit
```bash
# Este comando hace TODO:
# - Ejecuta migraciones
# - Crea seeders con datos de ejemplo
# - Crea el storage link
# - Limpia todos los caches

php artisan starter:install --seed
```

**📺 Lo que verás en pantalla:**
```
🚀 Installing Agency Starter Kit v1.1.0

📦 Running migrations...
✅ Migrations completed

🌱 Seeding database...
✅ Database seeded

🔗 Creating storage link...
✅ Storage link created

🧹 Clearing caches...
✅ Caches cleared

📧 Default Admin Credentials:
┌──────────┬────────────────────────┐
│ Field    │ Value                  │
├──────────┼────────────────────────┤
│ Email    │ admin@starter.local    │
│ Password │ password               │
└──────────┴────────────────────────┘

⚠️ Please change these credentials after first login!

🎉 Installation completed successfully!
```

---

### Paso 7: Compilar assets y levantar servidor

**Terminal 1 - Servidor PHP:**
```bash
php artisan serve
```

**Terminal 2 - Assets (dev):**
```bash
npm run dev
```

**✅ Verificar instalación:**
- Frontend: http://localhost:8000
- Admin: http://localhost:8000/admin
  - Email: `admin@starter.local`
  - Password: `password`

---

## 2️⃣ COMANDOS STARTER (FEATURES)

El Starter Kit incluye comandos para gestionar módulos opcionales.

### Ver estado de features
```bash
php artisan starter:status
```

**📺 Output:**
```
🎯 Agency Starter Kit - Feature Status
Version: 1.1.0

┌──────────────┬─────────────────┬────────────┬──────────────┐
│ Feature      │ Label           │ Status     │ Requirements │
├──────────────┼─────────────────┼────────────┼──────────────┤
│ newsletter   │ Newsletter      │ ❌ Disabled │              │
│ testimonials │ Testimonials    │ ❌ Disabled │              │
│ team         │ Team            │ ❌ Disabled │              │
│ faqs         │ FAQs            │ ❌ Disabled │              │
│ multilang    │ Multi-language  │ ❌ Disabled │              │
└──────────────┴─────────────────┴────────────┴──────────────┘

💡 To enable a feature: php artisan starter:enable {feature}
💡 To disable a feature: php artisan starter:disable {feature}
```

---

### Habilitar features según necesidades del cliente

**Ejemplo: Cliente necesita Newsletter y FAQs**
```bash
# Habilitar newsletter
php artisan starter:enable newsletter

# Output:
# ✅ Feature 'newsletter' has been enabled.
# 🔄 Run `php artisan config:clear` to apply changes.

# Habilitar FAQs
php artisan starter:enable faqs

# Limpiar cache para aplicar cambios
php artisan config:clear
```

---

### Verificar features habilitadas
```bash
php artisan starter:status
```

**📺 Output actualizado:**
```
┌──────────────┬─────────────────┬────────────┬──────────────┐
│ Feature      │ Label           │ Status     │ Requirements │
├──────────────┼─────────────────┼────────────┼──────────────┤
│ newsletter   │ Newsletter      │ ✅ Enabled  │              │
│ testimonials │ Testimonials    │ ❌ Disabled │              │
│ team         │ Team            │ ❌ Disabled │              │
│ faqs         │ FAQs            │ ✅ Enabled  │              │
│ multilang    │ Multi-language  │ ❌ Disabled │              │
└──────────────┴─────────────────┴────────────┴──────────────┘
```

---

### Features disponibles

| Feature | ¿Qué incluye? | ¿Cuándo usarla? |
|---------|---------------|-----------------|
| **newsletter** | Formulario de suscripción + gestión de suscriptores | Cliente quiere captar emails |
| **testimonials** | CRUD de testimonios + visualización pública | Cliente necesita reseñas/opiniones |
| **team** | CRUD de equipo + perfiles públicos | Mostrar el equipo de la empresa |
| **faqs** | CRUD de preguntas frecuentes + vista pública | Sección de ayuda/preguntas |
| **multilang** | Soporte multi-idioma con Spatie Translatable | Sitio en varios idiomas |

---

### Deshabilitar una feature
```bash
# Si ya no se necesita una feature
php artisan starter:disable newsletter

# Limpiar cache
php artisan config:clear
```

---

## 3️⃣ CONFIGURACIÓN INICIAL

### Paso 1: Cambiar credenciales de admin

**⚠️ IMPORTANTE: Hacer esto PRIMERO**

1. Login: http://localhost:8000/admin
2. Ir a perfil (arriba derecha)
3. Cambiar:
   - Nombre
   - Email
   - Password

---

### Paso 2: Configurar Settings globales

**Ruta:** `/admin/settings`

**Completar TODOS los campos:**

#### 📌 Sección: General
```
site_name: Nombre del Cliente
site_tagline: Descripción breve del negocio (1 línea)
contact_email: contacto@cliente.com
contact_phone: +54 223 XXX XXXX
address: Calle Falsa 123, Mar del Plata, Buenos Aires
```

**Ejemplo real:**
```
site_name: Estudio Jurídico López
site_tagline: Asesoramiento legal integral desde 1995
contact_email: info@estudilopez.com.ar
contact_phone: +54 223 491 5678
address: San Martín 2450, Mar del Plata (7600), Buenos Aires
```

---

#### 🌐 Sección: Redes Sociales
```
social_facebook: https://facebook.com/nombrecliente
social_instagram: https://instagram.com/nombrecliente
social_linkedin: https://linkedin.com/company/nombrecliente
social_twitter: https://twitter.com/nombrecliente
social_youtube: https://youtube.com/@nombrecliente
```

**💡 Tip:** Si el cliente no tiene alguna red, dejar el campo vacío.

---

#### 🔍 Sección: SEO - Home
```
seo_home_title: Título principal | Nombre Cliente
seo_home_description: Descripción de 150-160 caracteres explicando qué hace el cliente
seo_home_keywords: palabra1, palabra2, palabra3, palabra4
```

**Ejemplo real:**
```
seo_home_title: Estudio Jurídico López | Abogados en Mar del Plata
seo_home_description: Estudio jurídico con más de 25 años de experiencia en derecho civil, comercial y laboral. Asesoramiento profesional en Mar del Plata.
seo_home_keywords: abogados mar del plata, estudio juridico, asesoramiento legal, derecho civil
```

**📏 Reglas:**
- **Title:** Máximo 60 caracteres
- **Description:** Entre 150-160 caracteres
- **Keywords:** 4-6 palabras clave, separadas por comas

---

#### 🔍 Sección: SEO - Services
```
seo_services_title: Servicios | Nombre Cliente
seo_services_description: Breve descripción de los servicios
```

---

#### 🔍 Sección: SEO - Portfolio
```
seo_portfolio_title: Portfolio | Nombre Cliente
seo_portfolio_description: Breve descripción de trabajos/proyectos
```

---

#### 🔍 Sección: SEO - Blog
```
seo_blog_title: Blog | Nombre Cliente
seo_blog_description: Breve descripción del blog
```

---

#### 🔍 Sección: SEO - Contact
```
seo_contact_title: Contacto | Nombre Cliente
seo_contact_description: ¿Cómo contactarnos?
```

---

### Paso 3: Verificar que Settings se guardaron

1. Guardar los cambios
2. Visitar la home: http://localhost:8000
3. Ver el código fuente (Ctrl+U)
4. Buscar las meta tags:
```html
<title>Título principal | Nombre Cliente</title>
<meta name="description" content="Descripción que escribiste...">
```

**✅ Si las ves, está funcionando correctamente**

---

## 4️⃣ PERSONALIZACIÓN DE MARCA

### Paso 1: Logo y Favicon

**Reemplazar estos archivos:**
```
/public/images/logo.png          ← Logo principal
/public/images/logo-dark.png     ← Logo para fondo oscuro (opcional)
/public/images/favicon.ico       ← Favicon del sitio
```

**📐 Dimensiones recomendadas:**
- **Logo:** 200x60 px (PNG con transparencia)
- **Favicon:** 32x32 px (formato ICO o PNG)

**💡 Herramientas útiles:**
- Crear favicon: https://favicon.io
- Optimizar PNG: https://tinypng.com

---

### Paso 2: Colores de marca

**Archivo:** `tailwind.config.js`
```javascript
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
    ],
    theme: {
        extend: {
            colors: {
                // Colores del cliente
                primary: {
                    50: '#eff6ff',
                    100: '#dbeafe',
                    200: '#bfdbfe',
                    300: '#93c5fd',
                    400: '#60a5fa',
                    500: '#3b82f6',  // ← Color principal
                    600: '#2563eb',
                    700: '#1d4ed8',
                    800: '#1e40af',
                    900: '#1e3a8a',
                },
                secondary: {
                    500: '#8b5cf6',  // ← Color secundario
                },
            },
        },
    },
    plugins: [],
}
```

**🎨 Cómo elegir colores:**

1. Usar la herramienta: https://uicolors.app
2. Ingresar el color principal del cliente (ej: #3b82f6)
3. Copiar la paleta completa generada
4. Pegar en `tailwind.config.js`

**Después de modificar, recompilar:**
```bash
npm run build
```

---

### Paso 3: Tipografías (fonts)

**Archivo:** `resources/css/app.css`
```css
/* Importar Google Fonts */
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

@tailwind base;
@tailwind components;
@tailwind utilities;

/* Aplicar la fuente globalmente */
body {
    font-family: 'Inter', sans-serif;
}
```

**🔤 Fuentes populares:**
- **Inter:** Moderna, legible, profesional
- **Poppins:** Amigable, redondeada
- **Roboto:** Clásica, neutral
- **Montserrat:** Elegante, geométrica

**Buscar fuentes:** https://fonts.google.com

---

## 5️⃣ CREAR CONTENIDO INICIAL

### Crear Categorías Primero

Las categorías son necesarias antes de crear contenido.

#### Portfolio Categories

**Ruta:** `/admin/project-categories/create`

**Ejemplos:**
```
1. Diseño Web (slug: diseno-web)
2. Desarrollo (slug: desarrollo)
3. Branding (slug: branding)
4. Marketing Digital (slug: marketing-digital)
```

---

#### Blog Categories

**Ruta:** `/admin/post-categories/create`

**Ejemplos:**
```
1. Noticias (slug: noticias)
2. Tutoriales (slug: tutoriales)
3. Casos de Éxito (slug: casos-de-exito)
4. Industria (slug: industria)
```

---

### Crear Servicios

**Ruta:** `/admin/services/create`

**Campos a completar:**
```
┌─────────────────┬───────────────────────────────────────────┐
│ Campo           │ Descripción                               │
├─────────────────┼───────────────────────────────────────────┤
│ Title           │ Nombre del servicio                       │
│ Slug            │ Se genera automáticamente                 │
│ Description     │ Descripción corta (1-2 líneas)            │
│ Content         │ Descripción completa con detalles         │
│ Image           │ Imagen principal (opcional)               │
│ Icon            │ Icono del servicio (opcional)             │
│ Order           │ Número para ordenar (1, 2, 3...)          │
│ Featured        │ ✓ Para mostrar en home                    │
│ Published At    │ Fecha y hora de publicación               │
└─────────────────┴───────────────────────────────────────────┘
```

**Ejemplo completo:**
```
Title: Desarrollo Web a Medida
Slug: desarrollo-web-medida (auto)
Description: Creamos sitios web modernos y funcionales adaptados a tu negocio
Content: 
  Desarrollamos sitios web profesionales utilizando las últimas tecnologías.
  Nuestro proceso incluye:
  - Análisis de requerimientos
  - Diseño personalizado
  - Desarrollo responsive
  - Testing completo
  - Capacitación y soporte
  
Image: [Subir una imagen representativa]
Icon: [Subir un icono SVG o PNG]
Order: 1
Featured: ✓ (checked)
Published At: [Fecha actual]
```

**📝 Crear 3-6 servicios para el cliente**

---

### Crear Proyectos (Portfolio)

**Ruta:** `/admin/projects/create`

**Campos a completar:**
```
┌─────────────────┬───────────────────────────────────────────┐
│ Campo           │ Descripción                               │
├─────────────────┼───────────────────────────────────────────┤
│ Title           │ Nombre del proyecto                       │
│ Slug            │ Se genera automáticamente                 │
│ Client          │ Nombre del cliente del proyecto           │
│ Category        │ Seleccionar categoría creada              │
│ Description     │ Descripción corta                         │
│ Content         │ Detalles completos del proyecto           │
│ Project Date    │ Fecha en que se realizó                   │
│ Featured Image  │ Imagen principal                          │
│ Gallery         │ Galería de imágenes (múltiples)           │
│ Featured        │ ✓ Para destacar en home                   │
│ Meta Title      │ Título SEO (opcional)                     │
│ Meta Desc       │ Descripción SEO (opcional)                │
│ Published At    │ Fecha de publicación                      │
└─────────────────┴───────────────────────────────────────────┘
```

**Ejemplo completo:**
```
Title: Sitio Web Corporativo - Empresa ABC
Slug: sitio-web-corporativo-empresa-abc (auto)
Client: Empresa ABC S.A.
Category: Diseño Web
Description: Desarrollo de sitio corporativo responsive con panel de administración
Content:
  Desarrollamos un sitio web corporativo completo para Empresa ABC, 
  incluyendo:
  
  - Home con slider de servicios
  - Sección de portfolio
  - Blog corporativo
  - Formulario de contacto
  - Panel admin para gestión de contenidos
  
  Tecnologías: Laravel, Tailwind CSS, Alpine.js
  
Project Date: 2024-03-15
Featured Image: [Subir screenshot o mockup]
Gallery: [Subir 3-5 imágenes del proyecto]
Featured: ✓
Published At: [Fecha actual]
```

**📝 Crear 6-10 proyectos de ejemplo**

---

### Crear Posts (Blog)

**Ruta:** `/admin/posts/create`

**Campos a completar:**
```
┌─────────────────┬───────────────────────────────────────────┐
│ Campo           │ Descripción                               │
├─────────────────┼───────────────────────────────────────────┤
│ Title           │ Título del artículo                       │
│ Slug            │ Se genera automáticamente                 │
│ Category        │ Seleccionar categoría                     │
│ Excerpt         │ Resumen corto del artículo                │
│ Content         │ Contenido completo (editor Trix)          │
│ Featured Image  │ Imagen destacada                          │
│ Featured        │ ✓ Para destacar                           │
│ Meta Title      │ Título SEO                                │
│ Meta Desc       │ Descripción SEO                           │
│ Published At    │ Fecha de publicación                      │
└─────────────────┴───────────────────────────────────────────┘
```

**Ejemplo completo:**
```
Title: 5 Tendencias de Diseño Web en 2025
Slug: 5-tendencias-diseno-web-2025 (auto)
Category: Noticias
Excerpt: Descubre las principales tendencias que marcarán el diseño web este año
Content: [Usar el editor Trix para formatear]
  
  El diseño web evoluciona constantemente. Aquí las tendencias de 2025:
  
  1. Minimalismo extremo
  El less is more sigue vigente. Interfaces limpias...
  
  2. Dark mode por defecto
  Cada vez más usuarios prefieren...
  
  [etc...]
  
Featured Image: [Subir imagen relacionada]
Featured: ✓
Meta Title: 5 Tendencias de Diseño Web en 2025 | Blog Boom
Meta Description: Descubre las 5 principales tendencias de diseño web que dominarán 2025...
Published At: [Fecha actual]
```

**💡 Tips para el editor Trix:**
- **Negrita:** Seleccionar texto + Ctrl+B
- **Itálica:** Seleccionar texto + Ctrl+I
- **Link:** Seleccionar texto + botón de link
- **Imagen:** Botón de imagen (se sube automáticamente)
- **Lista:** Botones de bullets o números

**📝 Crear 3-5 artículos de ejemplo**

---

### Crear Páginas Estáticas

**Ruta:** `/admin/pages/create`

**Páginas recomendadas:**

#### 1. Sobre Nosotros
```
Title: Sobre Nosotros
Slug: sobre-nosotros
Content:
  [Historia de la empresa]
  [Misión y Visión]
  [Equipo]
  [Por qué elegirnos]
```

#### 2. Términos y Condiciones
```
Title: Términos y Condiciones
Slug: terminos-condiciones
Content:
  [Términos legales del sitio]
```

#### 3. Política de Privacidad
```
Title: Política de Privacidad
Slug: politica-privacidad
Content:
  [Política de tratamiento de datos]
```

**Acceso público:** `https://sitio.com/sobre-nosotros`

---

## 6️⃣ PERSONALIZAR VISTAS

### Estructura de archivos
```
resources/views/
├── layouts/
│   ├── app.blade.php              ← Layout principal público
│   └── admin.blade.php            ← Layout del admin
│
├── frontend/
│   ├── home.blade.php             ← Homepage
│   │
│   ├── services/
│   │   ├── index.blade.php        ← Listado de servicios
│   │   └── show.blade.php         ← Detalle de servicio
│   │
│   ├── portfolio/
│   │   ├── index.blade.php        ← Listado de proyectos
│   │   └── show.blade.php         ← Detalle de proyecto
│   │
│   ├── blog/
│   │   ├── index.blade.php        ← Listado de posts
│   │   └── show.blade.php         ← Artículo completo
│   │
│   ├── pages/
│   │   └── show.blade.php         ← Páginas dinámicas
│   │
│   └── contact.blade.php          ← Formulario de contacto
│
└── components/
    ├── header.blade.php           ← Header global
    ├── footer.blade.php           ← Footer global
    └── ...                        ← Otros componentes
```

---

### Personalizar Home (Homepage)

**Archivo:** `resources/views/frontend/home.blade.php`

**Secciones típicas:**
```blade
{{-- ============================================ --}}
{{-- 1. HERO SECTION --}}
{{-- ============================================ --}}
<section class="hero bg-gradient-to-r from-primary-500 to-secondary-500 text-white py-20">
    <div class="container mx-auto text-center">
        <h1 class="text-5xl font-bold mb-4">
            {{ settings('site_name') }}
        </h1>
        <p class="text-xl mb-8">
            {{ settings('site_tagline') }}
        </p>
        <a href="{{ route('contact') }}" class="btn-primary">
            Contáctanos
        </a>
    </div>
</section>

{{-- ============================================ --}}
{{-- 2. SERVICES SECTION --}}
{{-- ============================================ --}}
<section class="services py-16 bg-gray-50">
    <div class="container mx-auto">
        <h2 class="text-3xl font-bold text-center mb-12">
            Nuestros Servicios
        </h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($services as $service)
                <div class="service-card bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition">
                    {{-- Icono --}}
                    @if($service->hasMedia('icon'))
                        <img src="{{ $service->getFirstMediaUrl('icon') }}" 
                             alt="{{ $service->title }}"
                             class="w-16 h-16 mb-4">
                    @endif
                    
                    {{-- Título --}}
                    <h3 class="text-xl font-semibold mb-3">
                        {{ $service->title }}
                    </h3>
                    
                    {{-- Descripción --}}
                    <p class="text-gray-600 mb-4">
                        {{ $service->description }}
                    </p>
                    
                    {{-- Link --}}
                    <a href="{{ route('services.show', $service->slug) }}" 
                       class="text-primary-500 hover:text-primary-700">
                        Ver más →
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============================================ --}}
{{-- 3. PORTFOLIO SECTION --}}
{{-- ============================================ --}}
<section class="portfolio py-16">
    <div class="container mx-auto">
        <h2 class="text-3xl font-bold text-center mb-12">
            Proyectos Destacados
        </h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($projects as $project)
                <div class="project-card rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition">
                    {{-- Imagen --}}
                    <img src="{{ $project->getFirstMediaUrl('featured_image') }}" 
                         alt="{{ $project->title }}"
                         class="w-full h-64 object-cover">
                    
                    {{-- Info --}}
                    <div class="p-6">
                        <span class="text-sm text-primary-500 font-semibold">
                            {{ $project->category->name }}
                        </span>
                        
                        <h3 class="text-xl font-semibold mt-2 mb-3">
                            {{ $project->title }}
                        </h3>
                        
                        <p class="text-gray-600 mb-4">
                            {{ $project->description }}
                        </p>
                        
                        <a href="{{ route('portfolio.show', $project->slug) }}" 
                           class="text-primary-500 hover:text-primary-700">
                            Ver proyecto →
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="text-center mt-12">
            <a href="{{ route('portfolio.index') }}" class="btn-primary">
                Ver todos los proyectos
            </a>
        </div>
    </div>
</section>

{{-- ============================================ --}}
{{-- 4. BLOG SECTION --}}
{{-- ============================================ --}}
<section class="blog py-16 bg-gray-50">
    <div class="container mx-auto">
        <h2 class="text-3xl font-bold text-center mb-12">
            Últimas Noticias
        </h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($posts as $post)
                <article class="bg-white rounded-lg overflow-hidden shadow-lg">
                    {{-- Imagen --}}
                    <img src="{{ $post->getFirstMediaUrl('featured_image') }}" 
                         alt="{{ $post->title }}"
                         class="w-full h-48 object-cover">
                    
                    {{-- Contenido --}}
                    <div class="p-6">
                        <span class="text-sm text-primary-500">
                            {{ $post->category->name }}
                        </span>
                        
                        <h3 class="text-xl font-semibold mt-2 mb-3">
                            {{ $post->title }}
                        </h3>
                        
                        <p class="text-gray-600 mb-4">
                            {{ $post->excerpt }}
                        </p>
                        
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500">
                                {{ $post->published_at->format('d M Y') }}
                            </span>
                            
                            <a href="{{ route('blog.show', $post->slug) }}" 
                               class="text-primary-500 hover:text-primary-700">
                                Leer más →
                            </a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
        
        <div class="text-center mt-12">
            <a href="{{ route('blog.index') }}" class="btn-primary">
                Ver todo el blog
            </a>
        </div>
    </div>
</section>

{{-- ============================================ --}}
{{-- 5. CTA (Call To Action) SECTION --}}
{{-- ============================================ --}}
<section class="cta bg-primary-500 text-white py-16">
    <div class="container mx-auto text-center">
        <h2 class="text-4xl font-bold mb-4">
            ¿Listo para empezar tu proyecto?
        </h2>
        <p class="text-xl mb-8">
            Conversemos sobre cómo podemos ayudarte
        </p>
        <a href="{{ route('contact') }}" class="btn-white">
            Contactar Ahora
        </a>
    </div>
</section>
```

---

### Personalizar Header

**Archivo:** `resources/views/components/header.blade.php` (o donde esté en tu layout)
```blade
<header class="bg-white shadow-sm sticky top-0 z-50">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-20">
            
            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center">
                <img src="{{ asset('images/logo.png') }}" 
                     alt="{{ settings('site_name') }}"
                     class="h-10">
            </a>
            
            {{-- Navegación Desktop --}}
            <nav class="hidden md:flex items-center space-x-8">
                <a href="{{ route('home') }}" 
                   class="text-gray-700 hover:text-primary-500 transition">
                    Inicio
                </a>
                
                <a href="{{ route('services.index') }}" 
                   class="text-gray-700 hover:text-primary-500 transition">
                    Servicios
                </a>
                
                <a href="{{ route('portfolio.index') }}" 
                   class="text-gray-700 hover:text-primary-500 transition">
                    Portfolio
                </a>
                
                <a href="{{ route('blog.index') }}" 
                   class="text-gray-700 hover:text-primary-500 transition">
                    Blog
                </a>
                
                <a href="{{ route('page.show', 'sobre-nosotros') }}" 
                   class="text-gray-700 hover:text-primary-500 transition">
                    Nosotros
                </a>
                
                <a href="{{ route('contact') }}" 
                   class="btn-primary">
                    Contacto
                </a>
            </nav>
            
            {{-- Botón hamburguesa Mobile --}}
            <button class="md:hidden" @click="mobileMenuOpen = !mobileMenuOpen">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
    </div>
    
    {{-- Menú Mobile --}}
    <div x-show="mobileMenuOpen" 
         x-cloak
         class="md:hidden border-t">
        <nav class="container mx-auto px-4 py-4 space-y-2">
            <a href="{{ route('home') }}" class="block py-2">Inicio</a>
            <a href="{{ route('services.index') }}" class="block py-2">Servicios</a>
            <a href="{{ route('portfolio.index') }}" class="block py-2">Portfolio</a>
            <a href="{{ route('blog.index') }}" class="block py-2">Blog</a>
            <a href="{{ route('page.show', 'sobre-nosotros') }}" class="block py-2">Nosotros</a>
            <a href="{{ route('contact') }}" class="block py-2">Contacto</a>
        </nav>
    </div>
</header>
```

---

### Personalizar Footer

**Archivo:** `resources/views/components/footer.blade.php` (o donde esté en tu layout)
```blade
<footer class="bg-gray-900 text-white pt-16 pb-8">
    <div class="container mx-auto px-4">
        
        {{-- Sección principal --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
            
            {{-- Columna 1: Info de contacto --}}
            <div>
                <h3 class="text-xl font-bold mb-4">
                    {{ settings('site_name') }}
                </h3>
                
                <div class="space-y-3 text-gray-400">
                    <p>
                        <i class="fas fa-map-marker-alt mr-2"></i>
                        {{ settings('address') }}
                    </p>
                    
                    <p>
                        <i class="fas fa-envelope mr-2"></i>
                        {{ settings('contact_email') }}
                    </p>
                    
                    <p>
                        <i class="fas fa-phone mr-2"></i>
                        {{ settings('contact_phone') }}
                    </p>
                </div>
            </div>
            
            {{-- Columna 2: Enlaces --}}
            <div>
                <h4 class="text-lg font-semibold mb-4">Enlaces Rápidos</h4>
                
                <ul class="space-y-2 text-gray-400">
                    <li>
                        <a href="{{ route('services.index') }}" class="hover:text-white transition">
                            Servicios
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('portfolio.index') }}" class="hover:text-white transition">
                            Portfolio
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('blog.index') }}" class="hover:text-white transition">
                            Blog
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('page.show', 'sobre-nosotros') }}" class="hover:text-white transition">
                            Sobre Nosotros
                        </a>
                    </li>
                </ul>
            </div>
            
            {{-- Columna 3: Legal --}}
            <div>
                <h4 class="text-lg font-semibold mb-4">Legal</h4>
                
                <ul class="space-y-2 text-gray-400">
                    <li>
                        <a href="{{ route('page.show', 'terminos-condiciones') }}" class="hover:text-white transition">
                            Términos y Condiciones
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('page.show', 'politica-privacidad') }}" class="hover:text-white transition">
                            Política de Privacidad
                        </a>
                    </li>
                </ul>
            </div>
            
            {{-- Columna 4: Redes Sociales --}}
            <div>
                <h4 class="text-lg font-semibold mb-4">Síguenos</h4>
                
                <div class="flex space-x-4">
                    @if(settings('social_facebook'))
                        <a href="{{ settings('social_facebook') }}" 
                           target="_blank"
                           class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary-500 transition">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    @endif
                    
                    @if(settings('social_instagram'))
                        <a href="{{ settings('social_instagram') }}" 
                           target="_blank"
                           class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary-500 transition">
                            <i class="fab fa-instagram"></i>
                        </a>
                    @endif
                    
                    @if(settings('social_linkedin'))
                        <a href="{{ settings('social_linkedin') }}" 
                           target="_blank"
                           class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary-500 transition">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    @endif
                    
                    @if(settings('social_twitter'))
                        <a href="{{ settings('social_twitter') }}" 
                           target="_blank"
                           class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary-500 transition">
                            <i class="fab fa-twitter"></i>
                        </a>
                    @endif
                    
                    @if(settings('social_youtube'))
                        <a href="{{ settings('social_youtube') }}" 
                           target="_blank"
                           class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary-500 transition">
                            <i class="fab fa-youtube"></i>
                        </a>
                    @endif
                </div>
            </div>
        </div>
        
        {{-- Línea divisoria --}}
        <div class="border-t border-gray-800 pt-8">
            <div class="flex flex-col md:flex-row justify-between items-center text-gray-400 text-sm">
                <p>
                    &copy; {{ date('Y') }} {{ settings('site_name') }}. Todos los derechos reservados.
                </p>
                
                <p>
                    Desarrollado por 
                    <a href="https://boom.studio" target="_blank" class="text-primary-500 hover:text-primary-400">
                        Boom Studio
                    </a>
                </p>
            </div>
        </div>
    </div>
</footer>
```

**💡 Nota:** Para los iconos (FontAwesome), agregar en el `<head>` del layout:
```html
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
```

---

### Agregar estilos personalizados

**Archivo:** `resources/css/app.css`
```css
@tailwind base;
@tailwind components;
@tailwind utilities;

/* ============================================ */
/* Variables CSS del cliente */
/* ============================================ */
:root {
    --color-primary: #3b82f6;
    --color-secondary: #8b5cf6;
    --color-accent: #f59e0b;
}

/* ============================================ */
/* Componentes reutilizables */
/* ============================================ */

/* Botones */
.btn-primary {
    @apply bg-primary-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-primary-600 transition duration-300;
}

.btn-white {
    @apply bg-white text-primary-500 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition duration-300;
}

/* Cards */
.service-card,
.project-card {
    @apply transition duration-300 hover:-translate-y-2;
}

/* Secciones */
section {
    @apply scroll-mt-20; /* Para scroll suave con header sticky */
}

/* ============================================ */
/* Estilos específicos del proyecto */
/* ============================================ */

/* Hero */
.hero h1 {
    @apply drop-shadow-lg;
}

/* Animación de entrada */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-in {
    animation: fadeIn 0.6s ease-out;
}
```

**Recompilar después de cambios:**
```bash
npm run build
```

---

## 7️⃣ TESTING PRE-LAUNCH

### Checklist Técnico
```bash
# 1. Ejecutar tests
./vendor/bin/pest

# 2. Análisis estático
./vendor/bin/phpstan analyse

# 3. Code style
./vendor/bin/pint --test

# 4. Limpiar y cachear
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

### Checklist Manual

**✅ Frontend:**

- [ ] Home carga correctamente
- [ ] Todas las secciones visibles (hero, services, portfolio, blog, cta)
- [ ] Navegación funciona (todos los links)
- [ ] Footer con redes sociales
- [ ] Responsive (mobile, tablet, desktop)
- [ ] Imágenes optimizadas (<200KB cada una)

**✅ Servicios:**

- [ ] Listado de servicios carga
- [ ] Detalle de servicio funciona
- [ ] Botones y links funcionan

**✅ Portfolio:**

- [ ] Listado de proyectos carga
- [ ] Filtro por categoría funciona
- [ ] Detalle de proyecto muestra galería
- [ ] Proyectos relacionados aparecen

**✅ Blog:**

- [ ] Listado de posts carga
- [ ] Filtro por categoría funciona
- [ ] Detalle de post muestra contenido formateado
- [ ] Posts relacionados aparecen
- [ ] Imágenes del editor Trix cargan

**✅ Formulario de Contacto:**

- [ ] Formulario visible en `/contact`
- [ ] Validaciones funcionan
- [ ] Mensaje se guarda en `/admin/messages`
- [ ] Email llega al cliente (configurar SMTP)
- [ ] Rate limiting activo (no spam)

**✅ Admin:**

- [ ] Login funciona
- [ ] Dashboard muestra estadísticas
- [ ] CRUD de todos los módulos funciona
- [ ] Upload de imágenes funciona
- [ ] Editor Trix funciona en posts
- [ ] Settings se guardan correctamente

**✅ SEO:**

- [ ] Ver código fuente (Ctrl+U) en home
- [ ] Meta tags presentes (title, description)
- [ ] Open Graph tags presentes
- [ ] Sitemap.xml genera: `/sitemap.xml`
- [ ] Robots.txt correcto: `/robots.txt`

**✅ Performance:**

- [ ] Google PageSpeed: https://pagespeed.web.dev
- [ ] Score >90 en Mobile
- [ ] Score >90 en Desktop

---

## 8️⃣ DEPLOY A PRODUCCIÓN

### Requisitos del servidor
```
✅ PHP 8.3+ con extensiones:
   - BCMath, Ctype, JSON, Mbstring, OpenSSL
   - PDO, Tokenizer, XML, Fileinfo
   - GD o Imagick (para imágenes)

✅ MySQL 8.0+ / PostgreSQL 13+

✅ Nginx o Apache con mod_rewrite

✅ Composer instalado

✅ Node.js 20+ y NPM

✅ SSL/TLS configurado

✅ Redis (recomendado para cache)
```

---

### Deploy paso a paso

#### 1. Conectar al servidor (SSH)
```bash
ssh usuario@ip-del-servidor
```

---

#### 2. Clonar repositorio
```bash
# Ir al directorio web
cd /var/www

# Clonar proyecto
git clone https://github.com/boom-studio/proyecto-cliente.git
cd proyecto-cliente
```

---

#### 3. Instalar dependencias
```bash
# Dependencias PHP (sin dev)
composer install --no-dev --optimize-autoloader

# Dependencias Node
npm install

# Compilar assets para producción
npm run build
```

---

#### 4. Configurar permisos
```bash
# Dar permisos a storage y bootstrap/cache
sudo chown -R www-data:www-data storage bootstrap/cache
sudo chmod -R 775 storage bootstrap/cache
```

---

#### 5. Configurar .env
```bash
# Copiar y editar .env
cp .env.example .env
nano .env
```

**Configuración para producción:**
```env
APP_NAME="Nombre Cliente"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://cliente.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cliente_prod_db
DB_USERNAME=cliente_user
DB_PASSWORD=contraseña_segura

# Cache con Redis (recomendado)
CACHE_STORE=redis
SESSION_DRIVER=redis
QUEUE_CONNECTION=redis

# Redis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

# Performance
RESPONSE_CACHE_ENABLED=true
RESPONSE_CACHE_LIFETIME=600

# Mail (configurar SMTP real)
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=tu-email@gmail.com
MAIL_PASSWORD=tu-contraseña-app
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@cliente.com
MAIL_FROM_NAME="${APP_NAME}"
```

---

#### 6. Generar key y ejecutar migraciones
```bash
# Generar APP_KEY
php artisan key:generate

# Ejecutar migraciones
php artisan migrate --force

# Opcional: Seeders solo con datos esenciales (NO ejemplos)
php artisan db:seed --class=ProductionSeeder --force

# Storage link
php artisan storage:link
```

---

#### 7. Optimizar aplicación
```bash
# Cachear configuración
php artisan config:cache

# Cachear rutas
php artisan route:cache

# Cachear vistas
php artisan view:cache

# Optimizar Composer
composer dump-autoload --optimize --classmap-authoritative
```

---

#### 8. Configurar Nginx
```bash
sudo nano /etc/nginx/sites-available/cliente.com
```

**Configuración:**
```nginx
# Redireccionar HTTP a HTTPS
server {
    listen 80;
    server_name cliente.com www.cliente.com;
    return 301 https://$server_name$request_uri;
}

# HTTPS
server {
    listen 443 ssl http2;
    server_name cliente.com www.cliente.com;
    root /var/www/proyecto-cliente/public;

    # SSL (Let's Encrypt)
    ssl_certificate /etc/letsencrypt/live/cliente.com/fullchain.pem;
    ssl_certificate_key /etc/letsencrypt/live/cliente.com/privkey.pem;

    # Security headers
    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";
    add_header X-XSS-Protection "1; mode=block";

    index index.php;

    charset utf-8;

    # Logs
    access_log /var/log/nginx/cliente.com-access.log;
    error_log /var/log/nginx/cliente.com-error.log;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.3-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

**Activar sitio:**
```bash
sudo ln -s /etc/nginx/sites-available/cliente.com /etc/nginx/sites-enabled/
sudo nginx -t
sudo systemctl reload nginx
```

---

#### 9. Configurar SSL con Let's Encrypt
```bash
# Instalar Certbot
sudo apt install certbot python3-certbot-nginx

# Obtener certificado
sudo certbot --nginx -d cliente.com -d www.cliente.com

# Renovación automática (cron ya configurado por certbot)
```

---

#### 10. Configurar Cron (tareas programadas)
```bash
crontab -e
```

**Agregar:**
```
* * * * * cd /var/www/proyecto-cliente && php artisan schedule:run >> /dev/null 2>&1
```

---

#### 11. Configurar Queue Worker (opcional)
```bash
sudo nano /etc/supervisor/conf.d/proyecto-cliente-worker.conf
```

**Contenido:**
```ini
[program:proyecto-cliente-worker]
process_name=%(program_name)s_%(process_num)02d
command=php /var/www/proyecto-cliente/artisan queue:work --sleep=3 --tries=3
autostart=true
autorestart=true
user=www-data
numprocs=2
redirect_stderr=true
stdout_logfile=/var/www/proyecto-cliente/storage/logs/worker.log
```

**Activar:**
```bash
sudo supervisorctl reread
sudo supervisorctl update
sudo supervisorctl start proyecto-cliente-worker:*
```

---

### Verificar deploy
```
✅ https://cliente.com → carga home
✅ https://cliente.com/admin → carga login
✅ Certificado SSL válido (candado verde)
✅ Formulario de contacto envía email
✅ Todas las imágenes cargan
```

---

## 9️⃣ CHECKLIST FINAL PRE-ENTREGA

### Configuración

- [ ] .env configurado para producción
- [ ] APP_DEBUG=false
- [ ] APP_URL correcto con https://
- [ ] Credenciales admin cambiadas
- [ ] SMTP configurado (emails funcionando)

### Contenido

- [ ] Logo y favicon del cliente
- [ ] Colores de marca aplicados
- [ ] Settings completados en /admin/settings
- [ ] Mínimo 3 servicios creados
- [ ] Mínimo 6 proyectos en portfolio
- [ ] Mínimo 3 posts en blog
- [ ] Páginas estáticas creadas (sobre, términos, privacidad)

### Frontend

- [ ] Home personalizada con contenido del cliente
- [ ] Header con logo y navegación
- [ ] Footer con datos de contacto y redes
- [ ] Formulario de contacto funcionando
- [ ] Todas las rutas públicas funcionan
- [ ] Responsive (mobile, tablet, desktop)

### SEO

- [ ] Meta tags en todas las páginas
- [ ] Open Graph configurado
- [ ] Sitemap.xml generándose: /sitemap.xml
- [ ] Robots.txt correcto: /robots.txt
- [ ] URLs amigables (slugs)

### Performance

- [ ] Google PageSpeed >90
- [ ] Imágenes optimizadas (<200KB)
- [ ] Cache activado en producción
- [ ] HTTPS activo (candado verde)

### Seguridad

- [ ] SSL/TLS configurado
- [ ] Headers de seguridad activos
- [ ] Rate limiting en formularios
- [ ] Backups configurados

### Testing

- [ ] Tests pasando: ./vendor/bin/pest
- [ ] PHPStan sin errores: ./vendor/bin/phpstan analyse
- [ ] Pint aplicado: ./vendor/bin/pint
- [ ] Todos los CRUD funcionan en admin

### Monitoreo

- [ ] Google Analytics configurado (si aplica)
- [ ] Google Search Console agregado
- [ ] Uptime monitoring (UptimeRobot o similar)
- [ ] Backups automáticos funcionando

---

## 🆘 TROUBLESHOOTING (Problemas Comunes)

### Error: "No application encryption key"
```bash
php artisan key:generate
```

---

### Error: Permisos en storage/logs
```bash
sudo chown -R www-data:www-data storage bootstrap/cache
sudo chmod -R 775 storage bootstrap/cache
```

---

### Error: "Class not found"
```bash
composer dump-autoload
php artisan cache:clear
php artisan config:clear
```

---

### Error: Assets no cargan (404)
```bash
npm run build
php artisan storage:link
```

---

### Error: 500 en producción
```bash
# 1. Ver logs
tail -f storage/logs/laravel.log

# 2. Activar debug TEMPORALMENTE
# En .env: APP_DEBUG=true

# 3. Revisar el error específico

# 4. DESACTIVAR debug después
# En .env: APP_DEBUG=false
```

---

### Error: Imágenes no suben
```bash
# Verificar permisos
sudo chown -R www-data:www-data storage
sudo chmod -R 775 storage

# Verificar storage link
php artisan storage:link

# Verificar extensión GD o Imagick
php -m | grep -i gd
```

---

### Error: Emails no se envían
```env
# Verificar .env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=tu-email@gmail.com
MAIL_PASSWORD=tu-contraseña-app
MAIL_ENCRYPTION=tls

# Gmail requiere "App Password", no la contraseña normal
# https://myaccount.google.com/apppasswords
```

---

## 📞 SOPORTE Y RECURSOS

### Documentación

- **Laravel:** https://laravel.com/docs
- **Tailwind CSS:** https://tailwindcss.com/docs
- **Alpine.js:** https://alpinejs.dev
- **Livewire:** https://livewire.laravel.com

### Soporte Estudio Alcalde
```
👨‍💻 Desarrollador: Víctor H. Alcalde
🏢 Agencia: Estudio alcalde
📧 Email: alcaldevictor1@gmail.com
🌐 Web: https://estudioalcalde.net
📂 Docs: /docs/ en el proyecto
```

---

## ✅ RESUMEN

**Acabas de:**

1. ✅ Clonar el Starter Kit
2. ✅ Instalar dependencias
3. ✅ Configurar base de datos
4. ✅ Gestionar features opcionales
5. ✅ Personalizar marca (logo, colores, fonts)
6. ✅ Configurar settings desde admin
7. ✅ Crear contenido inicial (servicios, portfolio, blog)
8. ✅ Personalizar vistas (home, header, footer)
9. ✅ Testear todo el sitio
10. ✅ Deployar a producción

**🎉 ¡Tu proyecto está listo!**

---

**Última actualización:** 10 noviembre 2025  
**Versión:** 1.0  
**Boom Starter Kit:** v1.1.0
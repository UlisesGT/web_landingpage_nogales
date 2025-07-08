# 🌮 Restaurante Jalisco - Landing Page

## 📋 Descripción

Landing page profesional y elegante para un restaurante de comida tradicional mexicana especializado en platillos típicos de Jalisco como birria, tortas ahogadas, sopes, antojitos y servicio de catering.

## 🚀 Características

### 🎯 Estructura General
- **Framework**: Laravel 11
- **Frontend**: TailwindCSS con diseño responsive
- **Vistas**: Blade organizadas en carpetas (layouts/, components/, pages/)
- **Layout base** reutilizable con encabezado y pie de página
- **Sistema de rutas** web sin autenticación

### 🎨 Diseño Visual
- **Paleta de colores**: Tonos rojo terracota, crema y acentos de azul agave
- **Tipografía**: Playfair Display (títulos) e Inter (texto)
- **Animaciones**: Efectos suaves en botones y tarjetas
- **Responsive**: Optimizado para móviles y desktop

### 📱 Secciones Incluidas

#### 🏠 Página Principal (/)
- **Hero Section**: Imagen destacada con título llamativo
- **Sección de especialidades**: Tarjetas para servicios/productos
- **Call to action**: Botones para contacto y pedidos

#### 🧭 Navegación
- **Header**: Logo centrado + menú horizontal
  - Birria
  - Sopes  
  - Comida Jalisciense
  - Catering
  - Botón destacado "Catenos"

#### 🦶 Footer
- Datos de contacto (dirección, WhatsApp, teléfono)
- Enlaces a redes sociales (Facebook, Instagram, WhatsApp)
- Información adicional del restaurante

### 🛠️ Componentes Reutilizables
- **Header**: Navegación responsiva con menú móvil
- **Footer**: Información de contacto y redes sociales  
- **Product-Card**: Tarjetas de productos/servicios
- **Layout base**: Estructura general de páginas

## 🔧 Instalación

### Prerrequisitos
- PHP >= 8.2
- Composer
- Node.js >= 18
- NPM

### Pasos de instalación

1. **Clonar el repositorio**
   ```bash
   git clone <url-repositorio>
   cd restaurante-jalisco
   ```

2. **Instalar dependencias de PHP**
   ```bash
   composer install
   ```

3. **Instalar dependencias de Node.js**
   ```bash
   npm install
   ```

4. **Configurar archivo de entorno**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Compilar assets**
   ```bash
   npm run build
   ```

6. **Iniciar servidor de desarrollo**
   ```bash
   php artisan serve
   ```

La aplicación estará disponible en `http://localhost:8000`

## 📂 Estructura del Proyecto

```
restaurante-jalisco/
├── resources/
│   ├── views/
│   │   ├── layouts/
│   │   │   └── app.blade.php          # Layout base
│   │   ├── components/
│   │   │   ├── header.blade.php       # Componente header
│   │   │   ├── footer.blade.php       # Componente footer
│   │   │   └── product-card.blade.php # Tarjeta de producto
│   │   └── pages/
│   │       ├── home.blade.php         # Página principal
│   │       ├── catenos.blade.php      # Página de contacto
│   │       ├── birria.blade.php       # Página de birria
│   │       ├── sopes.blade.php        # Página de sopes
│   │       ├── catering.blade.php     # Página de catering
│   │       └── comida-jalisciense.blade.php
│   └── css/
│       └── app.css                    # Estilos principales con TailwindCSS
├── routes/
│   └── web.php                        # Rutas de la aplicación
├── tailwind.config.js                 # Configuración de TailwindCSS
└── postcss.config.js                  # Configuración de PostCSS
```

## 🎨 Paleta de Colores

### Colores Principales
- **Terracota**: #c7592c (principal), #a64521 (oscuro), #87381e (más oscuro)
- **Crema**: #e9c099 (principal), #f7e7d1 (claro), #cb8a52 (oscuro)
- **Azul Agave**: #0ea5e9 (principal), #0284c7 (oscuro), #0369a1 (más oscuro)
- **Rojo Mexicano**: #dc2626 (principal), #b91c1c (oscuro), #991b1b (más oscuro)

### Uso de Colores
- **Terracota**: Elementos principales, encabezados
- **Crema**: Fondos, elementos suaves
- **Azul Agave**: Enlaces, elementos secundarios
- **Rojo Mexicano**: Botones de acción, elementos destacados

## 🌟 Características Especiales

### 🎭 Animaciones
- **Efecto vapor**: Animación CSS para simular vapor en elementos destacados
- **Hover effects**: Transformaciones suaves en tarjetas y botones
- **Fade in**: Aparición progresiva de elementos al hacer scroll
- **Gradientes**: Fondos con degradados temáticos mexicanos

### 📱 Responsive Design
- **Mobile First**: Diseño optimizado para móviles
- **Breakpoints**: Adaptación a tablet y desktop
- **Menú móvil**: Hamburger menu para navegación en dispositivos pequeños

### ♿ Accesibilidad
- **Semántica HTML**: Estructura correcta de encabezados
- **Alt texts**: Descripciones para elementos visuales
- **Contraste**: Combinaciones de colores accesibles
- **Navegación por teclado**: Soporte completo

## 🔮 Funcionalidades Preparadas para Expansión

### 🚀 Backend Ready
- **Estructura Laravel**: Lista para agregar funcionalidades backend
- **Rutas organizadas**: Sistema escalable de rutas
- **Blade components**: Componentes reutilizables y modulares

### 📈 Posibles Mejoras Futuras
- Sistema de pedidos online
- Panel administrativo
- Galería de platillos
- Sistema de reservas
- Blog de recetas
- Programa de lealtad

## 📞 Información de Contacto

- **Teléfono**: +52 33 1234-5678
- **WhatsApp**: +52 33 1234-5678
- **Dirección**: Av. López Mateos 123, Guadalajara, Jalisco
- **Horarios**: Lun-Dom 9:00 AM - 10:00 PM

## 🤝 Contribuciones

Para contribuir al proyecto:

1. Fork el repositorio
2. Crea una rama para tu feature (`git checkout -b feature/nueva-funcionalidad`)
3. Commit tus cambios (`git commit -am 'Agrega nueva funcionalidad'`)
4. Push a la rama (`git push origin feature/nueva-funcionalidad`)
5. Abre un Pull Request

## 📄 Licencia

Este proyecto está bajo la licencia MIT. Ver el archivo `LICENSE` para más detalles.

---

**¡Gracias por elegir el auténtico sabor de Jalisco! 🌶️**

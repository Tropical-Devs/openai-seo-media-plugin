# OpenAI SEO Media Generator

**Versión:** 1.0.0
**Autor:** Dagoberto Medina

## Descripción

**OpenAI SEO Media Generator** es un plugin para WordPress que utiliza la API de OpenAI para generar contenido SEO-friendly para tus archivos multimedia. Con este plugin, puedes automatizar la creación de títulos, descripciones y textos alternativos (alt text) optimizados para SEO, ahorrando tiempo y asegurando que tus imágenes estén perfectamente optimizadas para los motores de búsqueda.

Este plugin es ideal para aquellos que manejan grandes volúmenes de contenido multimedia y necesitan una solución eficiente y escalable para mejorar el SEO de su sitio web.

## Características

- **Generación Automática de Contenido SEO:** Utiliza la API de OpenAI para generar automáticamente títulos, descripciones y alt text para cada imagen en tu biblioteca de medios.
- **Compatibilidad con GPT-4o y GPT-4o-mini:** Selecciona entre dos modelos de OpenAI según tus necesidades:
  - **GPT-4o:** Proporciona resultados más precisos y detallados, ideal para contenido crítico, pero con un costo ligeramente mayor.
  - **GPT-4o-mini:** Más rápido y económico, perfecto para grandes volúmenes de imágenes, aunque con una precisión ligeramente menor.
- **Integración Directa en WordPress:** Accede a las funcionalidades del plugin desde la lista de medios o directamente desde el editor de medios, con opciones personalizadas en la interfaz de usuario.

## Requisitos

- **Cuenta en OpenAI:** Necesitas una cuenta en OpenAI y una API key válida para utilizar este plugin.
- **WordPress 5.0 o superior:** El plugin está diseñado para funcionar con las versiones más recientes de WordPress.

## Instalación

1. **Descarga el Plugin:** Descarga el archivo ZIP del plugin desde el repositorio.
2. **Sube e Instala:** Ve a `Plugins > Añadir nuevo` en tu panel de WordPress, selecciona `Subir Plugin`, elige el archivo ZIP y haz clic en `Instalar Ahora`.
3. **Activa el Plugin:** Una vez instalado, activa el plugin desde la lista de plugins.
4. **Configura tu API key:** Ve a `Ajustes > OpenAI SEO Media` y agrega tu API key de OpenAI. Si no tienes una, sigue las instrucciones para obtenerla desde el dashboard de OpenAI.

## Uso

### Desde la Lista de Medios

En la lista de medios, verás un nuevo botón llamado "Generar SEO" junto a cada archivo multimedia. Haz clic en este botón para generar automáticamente un título, descripción y alt text optimizados para SEO.

### Desde el Editor de Medios

Al abrir un archivo multimedia para editarlo, encontrarás una nueva sección en el panel derecho que te permite generar contenido SEO directamente desde el editor de medios. Si no has configurado tu API key, el plugin te mostrará una advertencia para que lo hagas.

## Opciones de Configuración

### Modelos de OpenAI

- **GPT-4o:** Ideal para aquellos que buscan máxima precisión y están dispuestos a invertir un poco más por imagen.
- **GPT-4o-mini:** Más eficiente en términos de costo y tiempo, adecuado para grandes volúmenes de imágenes.

### Idiomas Disponibles

- **Inglés**
- **Español**

Selecciona el idioma en el que deseas generar el contenido SEO desde la página de configuraciones del plugin.

## Costos y Consideraciones

El uso de la API de OpenAI tiene un costo asociado que depende de la cantidad de tokens utilizados. A modo de referencia, con $1 puedes procesar:

- **74 a 95 imágenes** usando el modelo GPT-4o.
- **148 a 190 imágenes** usando el modelo GPT-4o-mini.

Estos valores son aproximados y pueden variar según el contenido exacto generado por la API.

## Instrucciones para Obtener la API Key

Para utilizar este plugin, necesitas una API key de OpenAI. Sigue estos pasos para obtenerla:

1. Accede al [dashboard de OpenAI](https://platform.openai.com/account/api-keys).
2. Genera una nueva API key si no tienes una.
3. Copia la API key y pégala en el campo correspondiente en `Ajustes > OpenAI SEO Media` dentro de tu panel de WordPress.

## Contribuciones y Soporte

Este proyecto está en constante desarrollo. Si encuentras algún problema o tienes sugerencias, por favor abre un issue en el repositorio de GitHub o contacta directamente con el autor.

---

Este `README.md` proporciona una visión general clara y completa del plugin, junto con instrucciones detalladas y explicaciones sobre cómo funciona todo. Si necesitas algún ajuste o cambio, estaré encantado de ayudarte. ¡Buena suerte con tu proyecto!
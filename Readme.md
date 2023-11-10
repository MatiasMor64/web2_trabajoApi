# tp de web 2 - Tercera entrega 13/11
## Nombres de los integrantes del grupo (emails): 
- Matias Morcillo - matiasmorcillo128@gmail.com
- Ignacio Giordano Margni - icasas760@gmail.com

## Temática del TPE: -Mercado de productos fantasticos 
Breve descripción de la temática: -En resumen, la pagina es una version parecida a MercadoLibre pero que se basa en vender productos de fantasia de distintas franquicias, donde los usuarios pueden entrar, registrarse y también añadir o quitar productos si tienen los permisos correspondientes

## ENDPOINTS usados:
- GET: localhost/uni/laburoapi/api/tareas
- GET: localhost/uni/laburoapi/api/tareas/ID (cualquier id de los productos)
- DELETE: localhost/uni/laburoapi/api/tareas/ID (cualquier id de los productos)
- POST: localhost/uni/laburoapi/api/tareas (deberia de tener un codigo disponible para agregar a la base de datos)
## ejemplo de codigo que se puede usar para los POST o PUT:
- {
    - "Producto": "manta invisible",
    - "Imagen": "https://media.biobiochile.cl/wp-content/uploads/2019/06/img_cfaneca_20170118-121945_imagenes_md_otras_fuentes_170118_harry_potter_capa_invisibilidad-kwc-u413464598686fod-980x554mundodeportivo-web.jpg",
    - "Precio": 10000,
    - "Categoria": "Harry Potter",
    - "Descripcion": "esta descripcion no es invisible, a diferencia de la manta"
- }

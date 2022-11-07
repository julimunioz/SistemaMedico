# Sistema Medico

![image](https://user-images.githubusercontent.com/103261440/199813603-836ea509-139d-4393-b130-f781d29b4a3f.png)

## Descripción

Este proyecto es la tesis con la que finalice mis estudios (Tecnicatura Superior en Analisis de Sistemas Informáticos).

Es una aplicación web de gestión para uso medico. Desarrollado con PHP, JavaScript (jQuery), HTML, CSS, Bootstrap, MySQL, utilizando el patrón MVC.
Tambien se utilizaron diferentes librerias, como mdpf (para generar recibos en formato pdf), datables, datepicker, moment.js, select2, etc. 

## Objetivos generales

Implementar un sistema que permita la carga de pacientes y médicos, como también la realización de consultas médicas, prácticas y 
la generación de reportes de la misma. Logrando agilidad a la hora de atender a pacientes y evitando la burocracia del papelerío, 
también reducir costos, tiempos y esfuerzos.

## Propuesta

El sistema debe ser utilizado por personal administrativo.

Cuando se atiende al paciente, en caso de que no esté registrado en el sistema, se le toma los datos (nombre y apellido, DNI, fecha de nacimiento, edad, 
genero, domicilio, localidad, provincia y teléfono) para luego poder cargar la consulta médica o la practica a realizarse. 
Para cargar la consulta médica o la práctica, primero se carga al paciente. Luego seleccionamos el médico, también la prestación que se va a realizar 
(consulta médica, o una práctica). En el caso de una práctica, se ingresa el diagnostico, y también te da la opción de ingresar un resumen clínico. 
Una vez completado todos los campos, te permite validar la operación, para luego, imprimir el ticket y cobrar su costo.
El sistema también te permite anular la carga incorrecta de alguna practica o consulta médica, como así también ver el resumen de todas las prestaciones 
realizadas en el centro médico y la posibilidad de volver a imprimir el ticket si se desea. En estos casos filtrando por paciente o fecha en la que se atendió.

## Documentación

El sistema cuenta con su respectivo Manual de Usuarion, el cual contiene la siguiente información:

• Relevamiento

• Objetivos

• Propuesta Narrativa

• Alcances del Sistema

• Estudio de Factibilidad

• Diagramas UML

• Codigo Documentado

## Imagenes del Sistema

### Login

![image](https://user-images.githubusercontent.com/103261440/200310740-66d23ede-2bae-40b2-a3e3-1aaeae0e70a9.png)


### Inicio / Menú

![image](https://user-images.githubusercontent.com/103261440/199820422-d3a7ef5f-5a32-42bf-9d8c-5212250f02c9.png)

### Pacientes

Carga PACIENTES. Con su respectiva validación de formulario. (JavaScript + Expresiones Regulares)

![image](https://user-images.githubusercontent.com/103261440/199821429-02c1c715-3139-4c6d-a507-5d76bfe1eb12.png)

Listado PACIENTES. Te da la opción de ver la información completa, modificarla o eliminarla si es necesario.

![image](https://user-images.githubusercontent.com/103261440/200313010-ebf4cc72-0f23-47f8-8928-4dd4576b9573.png)

### Medicos

Listado MEDICOS.

![image](https://user-images.githubusercontent.com/103261440/200311327-b268f328-2210-46af-bbf7-0203b0fde5c7.png)

Carga MEDICOS. Con la misma validación de formulario.

![image](https://user-images.githubusercontent.com/103261440/200311481-f2285e79-3f3e-4bab-b675-f4ba6e4ff85d.png)

### Atención Ambulatoria

A la hora de realizar una atención medica, el primer paso consta de buscar al PACIENTE por su dni.

![image](https://user-images.githubusercontent.com/103261440/200311901-c940ad81-a79d-4b14-995e-bdae6e9bf633.png)


Selección de Paciente. Opción si es diferido, para cargar la consulta médica con fecha atrazada.


![image](https://user-images.githubusercontent.com/103261440/200309584-b6b350ec-e749-4f3a-a5a1-ee0f26e4ad8f.png)


Proximo paso. Seleccionar al medico buscando por Nro Matricula o Nombre y Apellido. Luego seleccionar el diágnostico del paciente y la practica a realizar.


![image](https://user-images.githubusercontent.com/103261440/200323721-8455b77f-a059-49d4-b8d0-19f5dde54678.png)


Una vez completo todos los campos, se habilita el botón para VALIDAR.


![image](https://user-images.githubusercontent.com/103261440/199824473-25b8ba6d-acfb-4ce9-8c5f-646f48d71b7b.png)


Al validar, se genera el reporte en formato pdf, el cual se debe imprimir, para que firme el paciente.


![image](https://user-images.githubusercontent.com/103261440/200309814-2ad5810d-f8ae-45f9-85bb-1e5e6e1f3ce0.png)

### Consultas

![image](https://user-images.githubusercontent.com/103261440/200310301-f852cfd4-c49b-405c-8f4d-22e06a2fa6ef.png)

En la vista “CONSULTAS”, encontraremos el listado de todas las consumiciones que se realizaron hasta el momento, teniendo la opción de ver detalladamente cada una de ellas como también imprimirlas o descargarlas, y anular la que desee.

![image](https://user-images.githubusercontent.com/103261440/200310489-ea639dc3-a261-4d03-b97e-b089e17c935b.png)

### Configuración de Usuario

También cuenta con una pequeña configuracion para el usuario, en este caso CAMBIO DE CONTRASEÑA.

![image](https://user-images.githubusercontent.com/103261440/200312501-ba26f69e-7946-435b-b20d-fd74825a35ab.png)

Para eso, primero debemos verificar la contraseña actual.

![image](https://user-images.githubusercontent.com/103261440/200312567-de06b285-88b6-48e9-900d-70843e90cfb5.png)

Una vez verificada, podremos ingresar la nueva contraseña, que debe tener entre 6 a 12 dígitos.

![image](https://user-images.githubusercontent.com/103261440/200312612-a78892de-af17-4719-936c-b88c8ccbf37e.png)



















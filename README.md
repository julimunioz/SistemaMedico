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

### Inicio

![image](https://user-images.githubusercontent.com/103261440/199820422-d3a7ef5f-5a32-42bf-9d8c-5212250f02c9.png)

### Carga de Paciente. 

Validación con Expresiones Regulares

![image](https://user-images.githubusercontent.com/103261440/199821429-02c1c715-3139-4c6d-a507-5d76bfe1eb12.png)

### Listado Pacientes. 

Te da la opción de ver la información completa, modificarla o eliminarla si es necesario.

![image](https://user-images.githubusercontent.com/103261440/199823046-13f93d30-5642-4c74-af6c-c3cf2db2ed61.png)

### Atención Ambulatoria

Selección de Paciente. Opción si es diferido, para cargar la consulta médica con fecha atrazada.

![image](https://user-images.githubusercontent.com/103261440/199823549-a9ca8151-7789-49a6-b613-4fcf3144877d.png)

Proximo paso. Seleccionar al medico buscando por Nro Matricula o Nombre y Apellido. Luego seleccionar el diágnostico del paciente y la practica a realizar.

![image](https://user-images.githubusercontent.com/103261440/199824238-e068cf58-f99e-4bc6-b3dd-98c1f05db9a8.png)

Una vez completo todos los campos, se habilita el botón para VALIDAR.

![image](https://user-images.githubusercontent.com/103261440/199824473-25b8ba6d-acfb-4ce9-8c5f-646f48d71b7b.png)

Al validar, se genera el reporte en formato pdf, el cual se debe imprimir, para que firme el paciente.

![image](https://user-images.githubusercontent.com/103261440/199830037-d97060eb-d1ba-45c1-ab65-66b9a9d55220.png)





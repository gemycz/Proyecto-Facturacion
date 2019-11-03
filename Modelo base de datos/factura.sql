/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     25/10/2019 10:35:42                          */
/*==============================================================*/


drop table if exists CLIENTE;

drop table if exists DETALLE_FACTURA;

drop table if exists FACTURA;

drop table if exists PRODUCTO;

/*==============================================================*/
/* Table: CLIENTE                                               */
/*==============================================================*/
create table CLIENTE
(
   ID_CLI               int AUTO_INCREMENT not null ,
   NOMBRE_CLI           varchar(50),
   DIRECCION_CLI        varchar(100),
   TELEFONO_CLI         varchar(10),
   CEDULA_CLI           varchar(10),
   EMAIL_CLI            varchar(100),
   primary key (ID_CLI) 
);

/*==============================================================*/
/* Table: DETALLE_FACTURA                                       */
/*==============================================================*/
create table DETALLE_FACTURA
(
   ID_FAC               int AUTO_INCREMENT not null,
   ID_PRO               int not null,
   ID_DETFACT           int,
   CANT_DETFACT         int,
   VALORTOTAL_DETFACT   float,
   PRECIO_DETFACT       float,
   primary key (ID_FAC, ID_PRO)  
);

/*==============================================================*/
/* Table: FACTURA                                               */
/*==============================================================*/
create table FACTURA
(
   ID_FAC               int  AUTO_INCREMENT not null,
   ID_CLI               int,
   SUBTOTAL_FAC         float,
   IVA_FAC              float,
   TOTAL_TAC            float,
   primary key (ID_FAC)  
);

/*==============================================================*/
/* Table: PRODUCTO                                              */
/*==============================================================*/
create table PRODUCTO
(
   ID_PRO               int AUTO_INCREMENT not null ,
   NOMBRE_PRO           varchar(50),
   CODIGO_PRO           int,
   CANTIDAD_PRO         int,
   PRECIO_PRO           float,
   primary key (ID_PRO)   
);

alter table DETALLE_FACTURA add constraint FK_DETALLE_FACTURA foreign key (ID_FAC)
      references FACTURA (ID_FAC) on delete restrict on update restrict;

alter table DETALLE_FACTURA add constraint FK_DETALLE_FACTURA2 foreign key (ID_PRO)
      references PRODUCTO (ID_PRO) on delete restrict on update restrict;

alter table FACTURA add constraint FK_RELATIONSHIP_1 foreign key (ID_CLI)
      references CLIENTE (ID_CLI) on delete restrict on update restrict;


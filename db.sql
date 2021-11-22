create database chat;
use chat;
create table t_message(
    id_message int primary key auto_increment not null,
    nick varchar(20) not null,
    txt_message text not null, 
    tstamp int not null
);
<?php
/**
 * @author Kauê Delgado
 * @version 0.0.1 
 * @since 22-11-21
 * API PHP para registro de menssagens junto ao seu timestamp e nickname do emissor
 * !!! trocar senha e usuário do PDO por segurança !!!
 */
    if(isset($_POST['nick']) and isset($_POST['message'])){
        $timestamp = time();  

        try {
            $pdo = new PDO('mysql:host=localhost;dbname=chat', "root", "0");
          
            $stmt = $pdo->prepare('INSERT INTO t_message (nick, txt_message, tstamp) VALUES(:nick, :message, :tstamp)');
            $stmt->execute(array(
              ':nick' => $_POST['nick'],
              ':message' => $_POST['message'],
              ':tstamp' => $timestamp
            ));
          } catch(PDOException $e) {
            echo '{status: "error"}';
          }
          $data = "{timestamp: ".$timestamp.", status: success}";
          echo $data;
          json_encode($data); // retorna em formato json
    }else{
        $e = '{status: "error"}';
        echo $e;
        json_encode($e);
    }

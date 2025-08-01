<?php

namespace Controllers;
use Model\Propiedad;
use MVC\Router;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController{
    public static function index(Router $r){
        $propiedades = Propiedad::get(3);
        $inicio = true;
        $r->render("paginas/index",[
            "propiedades"=>$propiedades,
            "inicio"=>$inicio
        ]);
    }

    public static function nosotros(Router $r){
        $r->render("paginas/nosotros");
    }

    public static function propiedades(Router $r){
        $propiedades = Propiedad::all();
        $r->render("paginas/propiedades",[
            "propiedades"=>$propiedades
        ]);
    }

    public static function propiedad(Router $r){
        $id = validar("/");
        $p = Propiedad::find($id);

        $r->render("paginas/propiedad",[
            "p"=>$p
        ]);
        
    }
    public static function blog(Router $r){
        $r->render("paginas/blog");
        
    }
    public static function entrada(Router $r){
        $r->render("paginas/entrada");
    }
    public static function contacto(Router $r){
        $mensaje = null;

        if($_SERVER["REQUEST_METHOD"]==="POST"){

            $res = $_POST["contacto"];

            //Crear instancia de phpmailer
            $mail = new PHPMailer();

            //Configurar SMTP(Protocolo para envío de mails)
            $mail->isSMTP();
            $mail->Host = "sandbox.smtp.mailtrap.io";
            $mail->SMTPAuth = true;
            $mail ->Username = "71c66aa9966131";
            $mail->Password = "3adfb2478a5c04";
            $mail->SMTPSecure = "tls";
            $mail->Port=2525;

            //Configurar contenido del email
            $mail->setFrom("admin@bienesraices.com");
            $mail->addAddress("admin@bienesraices.com","BienesRaices.com");
            $mail->Subject = "Tienes un nuevo mensaje";

            //Habilitar html
            $mail->isHTML(true);
            $mail->CharSet = "UTF-8";

            //Definir el contenido
            $content = "<html>";
            $content .=" <p>Tienes un nuevo mensaje de " . $res["name"] . "</p>";
            $content .= "<p>" . $res["msg"] . "</p>";

            if($res["contacto"]==="Telefono"){
                $content .= "<p>Contactar por telefono</p>";
                $content .= "<p>Telefono: " . $res["tel"] . "</p>";
                $content .= "<p>Fecha a contactar: " . $res["date"] . " a las " . $res["time"] . "</p>";
            }
            else{
                $content .= "<p>Contactar por email</p>";
                $content .= "<p>Email: " . $res["email"] . "</p>";
            } 
            $content .= "<p>Tipo: " . $res["option"] . "</p>";
            $content .= "<p>Precio o presupuesto: " . $res["price"] . "</p>";
            
            $content.=" </html>";


            $mail->Body=$content;
            $mail->AltBody="Texto alternativo sin html";
            
            //Enviar el email
            if($mail->send()){
                $mensaje = "Mensaje enviado correctamente";
            }
            else{
                $mensaje = "El mensaje no se pudo enviar";
            }
            


        }
        $r->render("paginas/contacto",[
            "mensaje"=>$mensaje
        ]);
        
    }
}
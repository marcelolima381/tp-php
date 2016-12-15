<?php

namespace Entity;

	class ConnectionFactory{

		

		public static function getConnection(){

            $conexao = mysqli_connect("localhost", "root", "48h12rp6", "jobfinder");

		    if(!$conexao){
//                throw new FalhaNaConexaoException("Failed to Conect.");
                echo "não deu";
            }

            mysqli_set_charset($conexao,'utf8');
            ini_set('default_charset','utf-8');

            return $conexao;
		}
	}
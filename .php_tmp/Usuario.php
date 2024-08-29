<?php

class Usuario {

    /**
     * O metodo construtor dessa classe ja está no padrão novo
     * do PHP, onde pode-se definir a propriedade da classe na passagem
     * do parâmetro ja.
     * 
     * @author Fabio Leal Schmitz
     */
    public function __construct(
        public ?int $id,
        public string $usuario,
        public string $email,
        public string $password 
    ){}
    
}
<?php
    // CRIA O NAMESPACE PARA USAR A CLASSE
    namespace Post;

    class Postagem {

        // DECLARAÇÃO DE ATRIBUTOS
        private $id;
        private $user_id;
        private $descricao_post;
        private $codigo_post;
        private $linguagem_post;

        // DECLARAÇÃO DOS MÉTODOS
        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of user_id
         */ 
        public function getUser_id()
        {
                return $this->user_id;
        }

        /**
         * Set the value of user_id
         *
         * @return  self
         */ 
        public function setUser_id($user_id)
        {
                $this->user_id = $user_id;

                return $this;
        }

        /**
         * Get the value of descricao_post
         */ 
        public function getDescricao_post()
        {
                return $this->descricao_post;
        }

        /**
         * Set the value of descricao_post
         *
         * @return  self
         */ 
        public function setDescricao_post($descricao_post)
        {
                $this->descricao_post = $descricao_post;

                return $this;
        }

        /**
         * Get the value of codigo_post
         */ 
        public function getCodigo_post()
        {
                return $this->codigo_post;
        }

        /**
         * Set the value of codigo_post
         *
         * @return  self
         */ 
        public function setCodigo_post($codigo_post)
        {
                $this->codigo_post = $codigo_post;

                return $this;
        }

        /**
         * Get the value of linguagem_post
         */ 
        public function getLinguagem_post()
        {
                return $this->linguagem_post;
        }

        /**
         * Set the value of linguagem_post
         *
         * @return  self
         */ 
        public function setLinguagem_post($linguagem_post)
        {
                $this->linguagem_post = $linguagem_post;

                return $this;
        }
    }
?>
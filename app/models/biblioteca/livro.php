<?php
class Livro extends Model {
    
    public static $_table = 'biblioteca_items';

    public function escola() {
        return $this->belongs_to('Escola');
    }
    
}
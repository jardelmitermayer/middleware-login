<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoControlador extends Controller
{
    private $produtos = ["Televisao 40", "Notebook Acer", "Impressora HP", "HD Externo"];

    public function __construct()
    {
        $this->middleware(\App\Http\Middleware\ProdutoAdmin::class);
    }
    public function index () {
        echo "<h3>Produtos</h3>";
        echo "<ol>";
        foreach($this->produtos as $prod){
            echo "<li>" . $prod . "</li>";
        }
        echo "</ol>";
    }
}

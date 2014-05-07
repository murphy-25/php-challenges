<?php
namespace shoppingcart;


class ShoppingCart {
    private $items = array();
    private $totalCost = 0;

    public function addItem($productId, $productName, $quantity, $cost) {
        $this->items[$productId] = array();
        $this->items[$productId]['productName'] = $productName;
        $this->items[$productId]['quantity'] = $quantity;
        $this->items[$productId]['cost'] = $cost * $quantity;
    }

    public function deleteItem($productId) {
        foreach($this->items as $index => $value) {
            if($index == $productId) {
                unset($this->items[$index]);
            }
        }
    }

    public function calculateTotalCost($items) {
        foreach($items as $key => $value) {
            if(is_array($value)) {
                $this->calculateTotalCost($value);
            } else {
                if($key == 'cost') {
                    $this->totalCost += $value;
                }
                echo $key.' '.$value.' ';
            }
            echo '<br>';
        }
    }

    public function displayCart() {
        $this->totalCost = 0;
        $this->calculateTotalCost($this->items);
        echo 'Total Cost: '.$this->totalCost.'<br>';
        echo '<br>';
    }
} 